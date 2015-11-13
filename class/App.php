<?php
class App{
	
	static $db = null;
	
	static function getDatabase(){
		if(!self::$db){
			
			self::$db = new Database('root', '', 'jvn-network');
		}
		return self::$db;
	}	
}