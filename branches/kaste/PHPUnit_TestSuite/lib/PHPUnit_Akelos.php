<?php
define('AK_TEST_DATABASE_ON',true);
PHPUnit_Akelos_autoload::ensureConfigFileLoaded();

define('AK_PHPUNIT_TESTSUITE_LIB',dirname(__FILE__));
define('AK_PHPUNIT_TESTSUITE_BASE',dirname(dirname(__FILE__)));
define('AK_PHPUNIT_TESTSUITE_FIXTURES',AK_PHPUNIT_TESTSUITE_BASE.DS.'tests'.DS.'fixtures');

spl_autoload_register(array('PHPUnit_Akelos_autoload','__autoload'));

class PHPUnit_Akelos_autoload
{
    static function __autoload($classname)
    {
        $filename = AK_PHPUNIT_TESTSUITE_LIB.DS."$classname.php";
        if (is_file($filename)) {
            require_once $filename;
            return true;
        }
        if (preg_match('/(^Ak).*$/',$classname,$matches)){
    	   $filename = AK_LIB_DIR.DS.$classname.'.php';
    	   if (is_file($filename)){
    	       require_once $filename;
    	       return true;
    	   }
    	   return false;
        }
        if (preg_match('/^(.*)Controller$/',$classname,$matches)){
            $controller_file_name = AkInflector::underscore($classname).'.php';
            $filename = self::searchFileInIncludePath(self::CONTROLLER_FOLDERS(),$controller_file_name);
            if ($filename){
                require_once $filename;
                return true;
            }
            return false;            
        }
        if (preg_match('/^(.*)Installer$/',$classname,$matches)){
            $installer_file_name = AkInflector::underscore($classname).'.php';
            if ($filename = self::searchFileInIncludePath(self::INSTALLER_FOLDERS(),$installer_file_name)){
                require_once $filename;
                return true;
            }
            return false;
        }
        $model_file_name = AkInflector::underscore($classname).'.php';
        if ($filename = self::searchFileInIncludePath(self::MODEL_FOLDERS(),$model_file_name)){
            require_once $filename;
            return true;
        }
        return false; 
    }
    
    static function CONTROLLER_FOLDERS()
    {
        return array(AK_PHPUNIT_TESTSUITE_FIXTURES,AK_CONTROLLERS_DIR,AK_BASE_DIR.DS.'app'.DS.'controllers');
    }
    
    static function INSTALLER_FOLDERS()
    {
        return array(AK_PHPUNIT_TESTSUITE_FIXTURES,AK_APP_DIR.DS.'installers',AK_BASE_DIR.DS.'app'.DS.'installers');
    }

    static function MODEL_FOLDERS()
    {
        return array(AK_PHPUNIT_TESTSUITE_FIXTURES,AK_MODELS_DIR,AK_BASE_DIR.DS.'app'.DS.'models');
    }
    
    static function searchFileInIncludePath($folders,$filename)
    {
        foreach ($folders as $folder){
            $full_filename = $folder.DS.$filename;
            if (is_file($full_filename)) return $full_filename;
        }
        return false;
    }
    
    static function ensureConfigFileLoaded()
    {
        if (defined('AK_ENVIRONMENT')) return true;

        $DS = DIRECTORY_SEPARATOR;
        $config_file = preg_replace('@((vendor\\'.$DS.'PHPUnit_TestSuite|test\\'.$DS.'unit).*)$@',
                                    'test'.$DS.'fixtures'.$DS.'config'.$DS.'config.php',
                                    __FILE__);
        if (!is_file($config_file) || $config_file == __FILE__) 
            exit ("Whoa! That didnt start too well. config/config.php not found, tried: $config_file");
            
        require_once $config_file;
        return true;
    }
    
}


?>