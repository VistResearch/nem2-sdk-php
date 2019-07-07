<?php

namespace NEM\Core\Format;

use NEM\Models\Mosaic\MosaicNonce;

 


class IdGenerator {
	 /**
     * Generates a mosaic id given a nonce and a public id.
     * @param {object} nonce The mosaic nonce.
     * @param {object} ownerPublicId The public id.
     * @returns {module:coders/uint64~uint64} The mosaic id.
     */
    static function generateMosaicId(MosaicNonce $noncee, string $ownerPublicId){
    	// Warning : generateMosaicId used to be public key in hex stirng form, make sure
    	// 			you use this function correctly.
        $data = array_merge($nonce->nonce , unpack("C*",hex2bin($ownerPublicId) ) );
		$result = hash('sha3-256', pack("C*" , ...$data));

		// little endian
		$tmp0 = unpack("H*", strrev(pack("H*", substr($hash,0,16))));
		$tmp0 = hexdec($tmp0[1]);

		$tmp1 = unpack("H*", strrev(pack("H*", substr($hash,0,16))));
		$tmp1 = hexdec($tmp1[1]);

		return [$tmp0, $tmp1 & 0x7FFFFFFF];
    }

    /**
     * Parses a unified namespace name into a path.
     * @param {string} name The unified namespace name.
     * @returns {array<module:coders/uint64~uint64>} The namespace path.
     */
    static function generateNamespacePath(string $name): Array{
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

	/**
     * Generate the namesoace id from parentId and name.
     * @param {int} parentId.
     * @param {string} name The unified namespace name.
     * @returns {array<module:coders/uint64~uint64>} The namespace path.
     */ 
	static function generateSubNamespaceId(int $parentId, string $name): Array{

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