<?php

namespace NEM\Core;

use NEM\Models\Mosaic\MosaicNonce;
use NEM\Core\Format\Convert as Convert;

use Exception;

class Identifier{
	static function packUint8(Array $input): Array{
		if(sizeof($input)%4 != 0){
			throw new Exception("wrong format uint8 array to pack\n");
		}

		$output = [];
		$t = 0;
		for($i = 0; $i<sizeof($input); $i += 1){
			$t += $input[$i] << (8 *($i%4));
			if($i%4 == 3){
				array_push($output, $t);
				$t = 0;
			}
		}
		return $output;
	}

	static function validNamesapceName(string $name): bool{


		return ctype_alnum($name);
	}

	static function generateMosaicId(MosaicNonce $nonce, string $pbkey): Array{
		$data = array_merge($nonce->nonce , unpack("C*",hex2bin($pbkey) ) );
			$result = hash('sha3-256', pack("C*" , ...$data));

		// little endian
		$tmp0 = unpack("H*", strrev(pack("H*", substr($hash,0,16))));
		$tmp0 = hexdec($tmp0[1]);

		$tmp1 = unpack("H*", strrev(pack("H*", substr($hash,0,16))));
		$tmp1 = hexdec($tmp1[1]);

		return [$tmp0, $tmp1 & 0x7FFFFFFF];
	}

	static function generateNamespaceId(string $name): Array{
		$names = explode('.', $name);

		if ($name == ''){
			throw new Exception("Namespace name " . $name . " has zero length\n");
			return [];
		}
		else if(sizeof($names) > 3){
        	throw new Exception("Namespace has too many parts.");
		}

	    $namespaceId = [0,0,0,0,0,0,0,0]; // This is the base namesapceId
	    $path = [];
	    $outputPath = [];
	    for ($index = 0; $index < sizeof($names); $index += 1) {


	    	if( !(self::validNamesapceName($names[$index])) ){
	    		throw new Exception("Invalid namespace name ".$names[$index]."\n");	    		
	    	}

	    	$namespaceId = self::generateSubNamespaceId($namespaceId, $names[$index]);


	    	array_push($path,$namespaceId);
	    } 

	    for ($index = 0; $index < sizeof($path); $index += 1) {
	    	array_push($outputPath,self::packUint8($path[$index]));
	    }
	    return $outputPath[sizeof($outputPath)-1];
	}

	static function generateSubNamespaceId(Array $parentId, string $name): Array{
		
		$parentIdStr = pack("C*",...$parentId);

		$h = hash_init('sha3-256');
		hash_update($h, $parentIdStr);
		hash_update($h, $name);
		$resultArray = Convert::hexToUint8(hash_final($h));

		$outputArray = array_slice($resultArray,0,8);

		$outputArray[7] |= 128;

	    return $outputArray;

	}


}