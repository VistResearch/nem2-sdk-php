<?php

namespace NEM\Core;

require_once dirname(__FILE__) ."\\sodium_compat\\autoload.php";

use \ParagonIE_Sodium_Core32_Ed25519 as Ed25519_32;
use \ParagonIE_Sodium_Core_Ed25519 as Ed25519;
use \ParagonIE_Sodium_Core_Util as Sodium_Util;

class KeyPair{
	private $innerPrivateKey; //binary, build by pbk.prk
	private $innerPublicKey; // binary, pbk

    /**
     * private key transfer
     * @param privateKey (should be a hex string with len = 64)
     * @returns Publickey (hex string with len = 64)
     */
	static function privatekeyToPublicbkey(string $privateKey): string{
		$secretKey = Sodium_Util::hex2bin($privateKey);

		if (PHP_INT_SIZE === 4) {
           $publicKey = Ed25519_32::publickey_from_secretkey($secretKey);
       	} else {
           $publicKey = Ed25519::publickey_from_secretkey($secretKey);
       	}

		return bin2hex($publicKey);
	}

    /**
     * should always build keypair object from this
     * build a keypair object
     * @param privateKey (should be a hex string with len = 64)
     * @returns keyPair object
     */
	static function createFromPrivateKey(string $privateKey): keyPair{
		$innerPrivateKey = keyPair::generateInnerPrivatekey($privateKey);
		return new keyPair($innerPrivateKey);
	}

    /**
     * build a new keypair object with random seed
     * @param seed (int)
     * @returns keyPair object
     */
	static function generateNewPair(int $seed = 0): keyPair{
		if (PHP_INT_SIZE === 4) {
            $innerPrivateKey = Ed25519_32::keypair($seed);
       	} else {
            $innerPrivateKey = Ed25519::keypair($seed);
       	}
       	return new KeyPair($innerPrivateKey);
	}

    /**
     * verify if this signature valid
     * @param signature (hex string with len = 128)
     * @param message (string)
     * @param publicKey (hex string with len = 64)
     * @returns true/false
     */
	static function verify(string $signature, string $message, string $publicKey){
		$sig = hex2bin($signature);
		$pbk = hex2bin($publicKey);

		if (PHP_INT_SIZE === 4) {
           return Ed25519_32::verify_detached($sig, $message, $pbk);
        } else {
           return Ed25519::verify_detached($sig, $message, $pbk);
        }		
	}

    /**
     * return publickey of this keypair
     * @returns {string} hex string with len = 64
     */
	public function getPublicKey(): string{
		return bin2hex($this->innerPublicKey);
	}

    /**
     * return PrivateKey of this keypair
     * @returns {string} (hex string with len = 64)
     */
	public function getPrivateKey(): string{
		return bin2hex(substr($this->innerPrivateKey,0,32));
	}


    /**
     * sign a message string with a built up keypair
     * @returns {string} (hex string with len = 128)
     */
	public function signData(string $message): string{

		if (PHP_INT_SIZE === 4) {
           $sig = Ed25519_32::sign_detached($message, $this->innerPrivateKey);
        } else {
           $sig = Ed25519::sign_detached($message, $this->innerPrivateKey);
        }
        return bin2hex($sig);
	}




	private function generateInnerPrivatekey(string $privateKey): string{
		$secretKey = Sodium_Util::hex2bin($privateKey);

		if (PHP_INT_SIZE === 4) {
           $publicKey = Ed25519_32::publickey_from_secretkey($secretKey);
       	} else {
           $publicKey = Ed25519::publickey_from_secretkey($secretKey);
       	}
       return $secretKey.$publicKey;
	}

    /**
     * please don't directly call this to build a keypair
     */
    function __construct(string $innerPrivateKey) {
        $this->innerPrivateKey = $innerPrivateKey;
        if (PHP_INT_SIZE === 4) {
	        $this->innerPublicKey = Ed25519_32::publickey_from_secretkey($innerPrivateKey);
    	}
    	else{
    		$this->innerPublicKey = Ed25519::publickey_from_secretkey($innerPrivateKey);
    	}
    }
}