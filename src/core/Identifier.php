<?php

namespace NEM\Core;

use NEM\Models\Mosaic\MosaicNonce;

class Identifier{
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
		$name = "." . $name;
		$names = split ('.', $name);


		if ($name == ''){
			return [];
		}
		else if(sizeof($names) > 3){
        	throw Error("Namespace has too many parts.");
		}

	    $ids = [];
	    $parent_id = 0;
	    foreach ($names as $key => $name) {
	     	$parent_id = self::generateSubNamespaceId($parent_id, $name);
	        array_merge($ids,$parent_id);
	     } 

	    return $ids;
	}

	static function generateSubNamespaceId(int $parentId, string $name): int{

		$IdArray = [($parentId >> 24) & 0xff,
					($parentId >> 16) & 0xff,
					($parentId >> 8) & 0xff,
					($parentId >> 0) & 0xff];

		$nameArray = unpack('C*', $name);

		$data = array_merge($IdArray , $nameArray );


		$hash = hash('sha3-256', pack("C*" , ...$data));

		// little endian
		$tmp0 = unpack("H*", strrev(pack("H*", substr($hash,0,16))));
		$tmp0 = hexdec($tmp0[1]);

		$tmp1 = unpack("H*", strrev(pack("H*", substr($hash,0,16))));
		$tmp1 = hexdec($tmp1[1]);

	    return [$tmp0, $tmp1 & 0x80000000];

	}


}