<?php
namespace TeeWordpress;

use \Webmozart\Glob\Glob;

final class App {
    protected static $_instance;
    protected $_loader;
	protected $_config;

    final public static function instance() {
        if (!isset(self::$_instance)) self::$_instance = new self(func_get_args());
        return self::$_instance;
    }  
    public function loadConfig($path) {
        $configFiles = Glob::glob($path.'/**/*.json5');
        var_dump($configFiles);
    }
    public function setLoader($loader) {
        $this->_loader = $loader;
    }
    public function getLoader() {
        if(!isset($this->_loader)) {
            $this->_loader = new \Composer\Autoload\ClassLoader();
        }
        return $this->_loader;
    }
    public function addNamespace($prefix,$path) {        
        $this->getLoader()->addPsr4($prefix,$path);
        return $this;
    }

    public function run() {

    }
}