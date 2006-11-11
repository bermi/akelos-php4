<?php

/**
*@file cp1250.php
* CP1250 Mapping and Charset implementation.
*
*/

//
// +----------------------------------------------------------------------+
// | Akelos PHP Application Framework                                     |
// +----------------------------------------------------------------------+
// | Copyright (c) 2002-2005, Akelos Media, S.L.  http://www.akelos.org/  |
// | Released under the GNU Lesser General Public License                 |
// +----------------------------------------------------------------------+
// | You should have received the following files along with this library |
// | - COPYRIGHT (Additional copyright notice)                            |
// | - DISCLAIMER (Disclaimer of warranty)                                |
// | - README (Important information regarding this library)              |
// +----------------------------------------------------------------------+
//





/**
* CP1250  driver for Charset Class
*
* Charset::cp1250 provides functionality to convert
* CP1250 strings, to UTF-8 multibyte format and vice versa.
*
* @package AKELOS
* @subpackage Localize
* @author Bermi Ferrer Martinez <bermi@akelos.org>
* @copyright Copyright (c) 2002-2005, Akelos Media, S.L. http://www.akelos.org
* @license GNU Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
* @link http://www.unicode.org/Public/MAPPINGS/ Original Mapping taken from Unicode.org
* @since 0.1
* @version $Revision 0.1 $
*/
class cp1250 extends AkCharset
{


	// ------ CLASS ATTRIBUTES ------ //



	// ---- Private attributes ---- //


	/**
	* CP1250 to UTF-8 mapping array.
	*
	* @access private
	* @var    array    $_toUtfMap
	*/
	var $_toUtfMap = array(0=>0,1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10,11=>11,12=>12,13=>13,14=>14,15=>15,16=>16,17=>17,18=>18,19=>19,20=>20,21=>21,22=>22,23=>23,24=>24,25=>25,26=>26,27=>27,28=>28,29=>29,30=>30,31=>31,32=>32,33=>33,34=>34,35=>35,36=>36,37=>37,38=>38,39=>39,40=>40,41=>41,42=>42,43=>43,44=>44,45=>45,46=>46,47=>47,48=>48,49=>49,50=>50,51=>51,52=>52,53=>53,54=>54,55=>55,56=>56,57=>57,58=>58,59=>59,60=>60,61=>61,62=>62,63=>63,64=>64,65=>65,66=>66,67=>67,68=>68,69=>69,70=>70,71=>71,72=>72,73=>73,74=>74,75=>75,76=>76,77=>77,78=>78,79=>79,80=>80,81=>81,82=>82,83=>83,84=>84,85=>85,86=>86,87=>87,88=>88,89=>89,90=>90,91=>91,92=>92,93=>93,94=>94,95=>95,96=>96,97=>97,98=>98,99=>99,100=>100,101=>101,102=>102,103=>103,104=>104,105=>105,106=>106,107=>107,108=>108,109=>109,110=>110,111=>111,112=>112,113=>113,114=>114,115=>115,116=>116,117=>117,118=>118,119=>119,120=>120,121=>121,122=>122,123=>123,124=>124,125=>125,126=>126,127=>127,128=>8364,130=>8218,132=>8222,133=>8230,134=>8224,135=>8225,137=>8240,138=>352,139=>8249,140=>346,141=>356,142=>381,143=>377,145=>8216,146=>8217,147=>8220,148=>8221,149=>8226,150=>8211,151=>8212,153=>8482,154=>353,155=>8250,156=>347,157=>357,158=>382,159=>378,160=>160,161=>711,162=>728,163=>321,164=>164,165=>260,166=>166,167=>167,168=>168,169=>169,170=>350,171=>171,172=>172,173=>173,174=>174,175=>379,176=>176,177=>177,178=>731,179=>322,180=>180,181=>181,182=>182,183=>183,184=>184,185=>261,186=>351,187=>187,188=>317,189=>733,190=>318,191=>380,192=>340,193=>193,194=>194,195=>258,196=>196,197=>313,198=>262,199=>199,200=>268,201=>201,202=>280,203=>203,204=>282,205=>205,206=>206,207=>270,208=>272,209=>323,210=>327,211=>211,212=>212,213=>336,214=>214,215=>215,216=>344,217=>366,218=>218,219=>368,220=>220,221=>221,222=>354,223=>223,224=>341,225=>225,226=>226,227=>259,228=>228,229=>314,230=>263,231=>231,232=>269,233=>233,234=>281,235=>235,236=>283,237=>237,238=>238,239=>271,240=>273,241=>324,242=>328,243=>243,244=>244,245=>337,246=>246,247=>247,248=>345,249=>367,250=>250,251=>369,252=>252,253=>253,254=>355,255=>729);
		

	/**
	*  UTF-8 to CP1250 mapping array.
	*
	* @access private
	* @var    array    $_fromUtfMap
	*/
	var $_fromUtfMap = null;


	// ------------------------------



	// ------ CLASS METHODS ------ //


	// ---- Public methods ---- //


	/**
	* Encodes given CP1250 string into UFT-8
	*
	* @access public
	* @see UtfDecode
	* @param    string    $string CP1250 string
	* @return    string    UTF-8 string data
	*/
	function _Utf8StringEncode($string)
	{
		return parent::_Utf8StringEncode($string, $this->_toUtfMap);
	
	}// -- end of &Utf8StringEncode -- //

	/**
	* Decodes given UFT-8 string into CP1250
	*
	* @access public
	* @see UtfEncode
	* @param    string    $string UTF-8 string
	* @return    string    CP1250 string data
	*/
	function _Utf8StringDecode($string)
	{
		$this->_LoadInverseMap();
		return parent::_Utf8StringDecode($string, $this->_fromUtfMap);
	}// -- end of &Utf8StringDecode -- //
		
		
	// ---- Private methods ---- //
		
	/**
	* Flips $this->_toUtfMap to $this->_fromUtfMap
	*
	* @access private
	* @return	null
	*/
	function _LoadInverseMap()
	{
		static $loaded;
		if(!isset($loaded)){
			$loaded = true;
			$this->_fromUtfMap = array_flip($this->_toUtfMap);
		}
	}// -- end of _LoadInverseMap -- //
	
}

?>