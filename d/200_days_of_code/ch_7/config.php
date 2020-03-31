<?php
//script 7.1 - config.php
//page 217
//Define the config class
class Config{
	static private $_instance = NULL;
	private $_settings = array();
	
	private function __construct(){}
	private function __clone(){}
	
	static function getInstance(){
		if(self::$_instance == null)
		{
			self::$_instance = new Config();
		}
		return self::$_instance;
	}
	function set($index,$value)
	{
		$this->_settings[$index]=$value;
	}
	function get($index)
	{
		return $this->_settings[$index];
	}
}
