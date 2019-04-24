<?php
class util{
	public static function unhexlify($str){
	    return pack("H*", $str);
	}
	public static function decode_hex($str){
		if (ctype_xdigit($str)){
			return $str;
		}
		else{
			return hex2bin($str);
		}
	}
	public static function utf82hex($str){
		$intArray = unpack("C*", $str);
		$chars = array_map("chr", $intArray);
		$bin = join($chars);
		$hex = bin2hex($bin);
		return $hex;
	}
}