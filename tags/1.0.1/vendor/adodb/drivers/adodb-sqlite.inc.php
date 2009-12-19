<?php
/*
V4.64 20 June 2005  (c) 2000-2005 John Lim (jlim@natsoft.com.my). All rights reserved.
Released under both BSD license and Lesser GPL library license.
Whenever there is any discrepancy between the two licenses,
the BSD license will take precedence.

Latest version is available at http://adodb.sourceforge.net

SQLite info: http://www.hwaci.com/sw/sqlite/

Install Instructions:
====================
1. Place this in adodb/drivers
2. Rename the file, remove the .txt prefix.
*/

// security - hide paths
if (!defined('ADODB_DIR')) die();

class ADODB_sqlite extends ADOConnection {
    public $databaseType = "sqlite";
    public $replaceQuote = "''"; // string to use to replace quotes
    public $concat_operator='||';
    public $_errorNo = 0;
    public $hasLimit = true;
    public $hasInsertID = true; 		/// supports autoincrement ID?
    public $hasAffectedRows = true; 	/// supports affected rows for update/delete?
    public $metaTablesSQL = "SELECT name FROM sqlite_master WHERE type='table' ORDER BY name";
    public $sysDate = "adodb_date('Y-m-d')";
    public $sysTimeStamp = "adodb_date('Y-m-d H:i:s')";
    public $fmtTimeStamp = "'Y-m-d H:i:s'";

    public function ADODB_sqlite()
    {
    }

    /*
    public function __get($name)
    {
    switch($name) {
    case 'sysDate': return "'".date($this->fmtDate)."'";
    case 'sysTimeStamp' : return "'".date($this->sysTimeStamp)."'";
    }
    }*/

    public function ServerInfo()
    {
        $arr['version'] = sqlite_libversion();
        $arr['description'] = 'SQLite ';
        $arr['encoding'] = sqlite_libencoding();
        return $arr;
    }

    public function BeginTrans()
    {
        if ($this->transOff) return true;
        $ret = $this->Execute("BEGIN TRANSACTION");
        $this->transCnt += 1;
        return true;
    }

    public function CommitTrans($ok=true)
    {
        if ($this->transOff) return true;
        if (!$ok) return $this->RollbackTrans();
        $ret = $this->Execute("COMMIT");
        if ($this->transCnt>0)$this->transCnt -= 1;
        return !empty($ret);
    }

    public function RollbackTrans()
    {
        if ($this->transOff) return true;
        $ret = $this->Execute("ROLLBACK");
        if ($this->transCnt>0)$this->transCnt -= 1;
        return !empty($ret);
    }

    public function _insertid()
    {
        return sqlite_last_insert_rowid($this->_connectionID);
    }

    public function _affectedrows()
    {
        return sqlite_changes($this->_connectionID);
    }

    public function ErrorMsg()
    {
        if ($this->_logsql) return $this->_errorMsg;
        return ($this->_errorNo) ? sqlite_error_string($this->_errorNo) : '';
    }

    public function ErrorNo()
    {
        return $this->_errorNo;
    }

    public function SQLDate($fmt, $col=false)
    {
        $fmt = $this->qstr($fmt);
        return ($col) ? "adodb_date2($fmt,$col)" : "adodb_date($fmt)";
    }

    public function &MetaColumns($table)
    {
        global $ADODB_FETCH_MODE;
        $save = $ADODB_FETCH_MODE;
        $ADODB_FETCH_MODE = ADODB_FETCH_NUM;

        if ($this->fetchMode !== false) $savem = $this->SetFetchMode(false);
        $rs = $this->Execute("PRAGMA table_info ( '$table' )");

        if (isset($savem)) $this->SetFetchMode($savem);
        $ADODB_FETCH_MODE = $save;
        if (!is_object($rs)) {
            $false = false;
            return $false;
        }

        $retarr = array();
        while (!$rs->EOF){
            $fld = new ADOFieldObject();
            $fld->name = $rs->fields[1];
            $type = $rs->fields[2];

            // split type into type(length):
            $fld->scale = null;
            if (preg_match("/^(.+)\((\d+),(\d+)/", $type, $query_array)) {
                $fld->type = $query_array[1];
                $fld->max_length = is_numeric($query_array[2]) ? $query_array[2] : -1;
                $fld->scale = is_numeric($query_array[3]) ? $query_array[3] : -1;
            } elseif (preg_match("/^(.+)\((\d+)/", $type, $query_array)) {
                $fld->type = $query_array[1];
                $fld->max_length = is_numeric($query_array[2]) ? $query_array[2] : -1;
            } elseif (preg_match("/^(enum)\((.*)\)$/i", $type, $query_array)) {
                $fld->type = $query_array[1];
                $arr = explode(",",$query_array[2]);
                $fld->enums = $arr;
                $zlen = max(array_map("strlen",$arr)) - 2; // PHP >= 4.0.6
                $fld->max_length = ($zlen > 0) ? $zlen : 1;
            } else {
                $fld->type = $type;
                $fld->max_length = -1;
            }
            $fld->not_null = ($rs->fields[3] != 0);
            $fld->primary_key = ($rs->fields[5] == 1);
            $fld->auto_increment = $rs->fields[1] == 'id';
            $fld->binary = (strpos($type,'blob') !== false);
            $fld->unsigned = (strpos($type,'unsigned') !== false);

            if (!$fld->binary) {
                $d = $rs->fields[4];
                if ($d != '' && $d != 'NULL') {
                    $fld->has_default = true;
                    $fld->default_value = $d;
                } else {
                    $fld->has_default = false;
                }
            }

            if ($save == ADODB_FETCH_NUM) {
                $retarr[] = $fld;
            } else {
                $retarr[strtoupper($fld->name)] = $fld;
            }

            $rs->MoveNext();
        }

        $rs->Close();

        return $retarr;
    }


    /*
    public function &MetaColumns($tab)
    {
    global $ADODB_FETCH_MODE;

    $rs = $this->Execute("select * from $tab limit 1");
    if (!$rs) {
    $false = false;
    return $false;
    }
    $arr = array();
    for ($i=0,$max=$rs->_numOfFields; $i < $max; $i++) {
    $fld =& $rs->FetchField($i);
    if ($ADODB_FETCH_MODE == ADODB_FETCH_NUM) $retarr[] =& $fld;
    else $arr[strtoupper($fld->name)] =& $fld;
    }
    $rs->Close();
    return $arr;
    }

    */

    public function _createFunctions()
    {
        @sqlite_create_function($this->_connectionID, 'adodb_date', 'adodb_date', 1);
        @sqlite_create_function($this->_connectionID, 'adodb_date2', 'adodb_date2', 2);
    }


    // returns true or false
    public function _connect($argHostname, $argUsername, $argPassword, $argDatabasename)
    {
        if (!function_exists('sqlite_open')) return null;
        if (empty($argHostname) && $argDatabasename) $argHostname = $argDatabasename;

        $this->_connectionID = sqlite_open($argHostname);
        if ($this->_connectionID === false) return false;
        $this->_createFunctions();
        return true;
    }

    // returns true or false
    public function _pconnect($argHostname, $argUsername, $argPassword, $argDatabasename)
    {
        if (!function_exists('sqlite_open')) return null;
        if (empty($argHostname) && $argDatabasename) $argHostname = $argDatabasename;

        $argHostname = str_replace('+',' ',$argHostname);
        $this->_connectionID = sqlite_popen($argHostname);
        if ($this->_connectionID === false) return false;
        $this->_createFunctions();
        return true;
    }

    // returns query ID if successful, otherwise false
    public function _query($sql,$inputarr=false)
    {
        $rez = sqlite_query($sql,$this->_connectionID);
        if (!$rez) {
            $this->_errorNo = sqlite_last_error($this->_connectionID);
        }

        return $rez;
    }

    public function SelectLimit($sql,$nrows=-1,$offset=-1,$inputarr=false,$secs2cache=0)
    {
        $offsetStr = ($offset >= 0) ? " OFFSET $offset" : '';
        $limitStr  = ($nrows >= 0)  ? " LIMIT $nrows" : ($offset >= 0 ? ' LIMIT 999999999' : '');
        if ($secs2cache)
        $rs =& $this->CacheExecute($secs2cache,$sql."$limitStr$offsetStr",$inputarr);
        else
        $rs = $this->Execute($sql."$limitStr$offsetStr",$inputarr);

        return $rs;
    }

    /*
    This algorithm is not very efficient, but works even if table locking
    is not available.

    Will return false if unable to generate an ID after $MAXLOOPS attempts.
    */
    public $_genSeqSQL = "create table %s (id integer)";

    public function GenID($seq='adodbseq',$start=1)
    {
        // if you have to modify the parameter below, your database is overloaded,
        // or you need to implement generation of id's yourself!
        $MAXLOOPS = 100;
        //$this->debug=1;
        while (--$MAXLOOPS>=0) {
            @($num = $this->GetOne("select id from $seq"));
            if ($num === false) {
                $this->Execute(sprintf($this->_genSeqSQL ,$seq));
                $start -= 1;
                $num = '0';
                $ok = $this->Execute("insert into $seq values($start)");
                if (!$ok) return false;
            }
            $this->Execute("update $seq set id=id+1 where id=$num");

            if ($this->affected_rows() > 0) {
                $num += 1;
                $this->genID = $num;
                return $num;
            }
        }
        if ($fn = $this->raiseErrorFn) {
            $fn($this->databaseType,'GENID',-32000,"Unable to generate unique id after $MAXLOOPS attempts",$seq,$num);
        }
        return false;
    }

    public function CreateSequence($seqname='adodbseq',$start=1)
    {
        if (empty($this->_genSeqSQL)) return false;
        $ok = $this->Execute(sprintf($this->_genSeqSQL,$seqname));
        if (!$ok) return false;
        $start -= 1;
        return $this->Execute("insert into $seqname values($start)");
    }

    public $_dropSeqSQL = 'drop table %s';
    public function DropSequence($seqname)
    {
        if (empty($this->_dropSeqSQL)) return false;
        return $this->Execute(sprintf($this->_dropSeqSQL,$seqname));
    }

    // returns true or false
    public function _close()
    {
        return @sqlite_close($this->_connectionID);
    }

    public function &MetaIndexes ($table, $primary = FALSE, $owner=false)
    {
        $false = false;
        // save old fetch mode
        global $ADODB_FETCH_MODE;
        $save = $ADODB_FETCH_MODE;
        $ADODB_FETCH_MODE = ADODB_FETCH_NUM;
        if ($this->fetchMode !== FALSE) {
            $savem = $this->SetFetchMode(FALSE);
        }
        $SQL=sprintf("SELECT name,sql FROM sqlite_master WHERE type='index' AND tbl_name='%s'", strtolower($table));
        $rs = $this->Execute($SQL);
        if (!is_object($rs)) {
            if (isset($savem))
            $this->SetFetchMode($savem);
            $ADODB_FETCH_MODE = $save;
            return $false;
        }

        $indexes = array ();
        while ($row = $rs->FetchRow()) {
            if ($primary && preg_match("/primary/i",$row[1]) == 0) continue;
            preg_match('/\(([^\)]+)\)$/',$row[1],$match);
            if(!empty($match[1])){
                if (!isset($indexes[$row[0]])) {
                    $indexes[$row[0]] = array(
                    'unique' => preg_match("/unique/i",$row[1]),
                    'columns' => array());
                }
                $indexes[$row[0]]['columns'] = array_diff(array_map('trim', explode(',', $match[1].',')), array(''));
            }
        }
        if (isset($savem)) {
            $this->SetFetchMode($savem);
            $ADODB_FETCH_MODE = $save;
        }
        return $indexes;
    }
}

/*--------------------------------------------------------------------------------------
Class Name: Recordset
--------------------------------------------------------------------------------------*/

class ADORecordset_sqlite extends ADORecordSet {

    public $databaseType = "sqlite";
    public $bind = false;

    public function ADORecordset_sqlite($queryID,$mode=false)
    {

        if ($mode === false) {
            global $ADODB_FETCH_MODE;
            $mode = $ADODB_FETCH_MODE;
        }
        switch($mode) {
            case ADODB_FETCH_NUM: $this->fetchMode = SQLITE_NUM; break;
            case ADODB_FETCH_ASSOC: $this->fetchMode = SQLITE_ASSOC; break;
            default: $this->fetchMode = SQLITE_BOTH; break;
        }
        $this->adodbFetchMode = $mode;

        $this->_queryID = $queryID;

        $this->_inited = true;
        $this->fields = array();
        if ($queryID) {
            $this->_currentRow = 0;
            $this->EOF = !$this->_fetch();
            @$this->_initrs();
        } else {
            $this->_numOfRows = 0;
            $this->_numOfFields = 0;
            $this->EOF = true;
        }

        return $this->_queryID;
    }


    public function &FetchField($fieldOffset = -1)
    {
        $fld = new ADOFieldObject;
        $fld->name = sqlite_field_name($this->_queryID, $fieldOffset);
        $fld->type = 'VARCHAR';
        $fld->max_length = -1;
        return $fld;
    }

    public function _initrs()
    {
        $this->_numOfRows = @sqlite_num_rows($this->_queryID);
        $this->_numOfFields = @sqlite_num_fields($this->_queryID);
    }

    public function Fields($colname)
    {
        if ($this->fetchMode != SQLITE_NUM) return $this->fields[$colname];
        if (!$this->bind) {
            $this->bind = array();
            for ($i=0; $i < $this->_numOfFields; $i++) {
                $o = $this->FetchField($i);
                $this->bind[strtoupper($o->name)] = $i;
            }
        }

        return $this->fields[$this->bind[strtoupper($colname)]];
    }

    public function _seek($row)
    {
        return sqlite_seek($this->_queryID, $row);
    }

    public function _fetch($ignore_fields=false)
    {
        $this->fields = @sqlite_fetch_array($this->_queryID,$this->fetchMode);
        return !empty($this->fields);
    }

    public function _close()
    {
    }

}
?>