<?php
class Str{
	
	static function random($length){
		
	$alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN".
	substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
	}
}