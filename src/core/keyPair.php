<?php

namespace NEM\Core;

require_once dirname(__FILE__) ."\\sodium_compat\\autoload.php";

use kornrunner\Keccak as Keccak;

use \ParagonIE_Sodium_Core32_Ed25519 as Ed25519_32;
use \ParagonIE_Sodium_Core_Ed25519 as Ed25519;
use \ParagonIE_Sodium_Core_Util as Sodium_Util;

use NEM\Core\Format\Convert as Convert;

class KeyPair{
	public $innerPrivateKey; //binary, build by pbk.prk
	public $innerPublicKey; // binary, pbk

  /**
   * should always build keypair object from this
   * build a keypair object
   * @param privateKey (should be a hex string with len = 64)
   * @returns keyPair object
   */
  static function createFromPrivateKey(string $privateKey,string $signSchema = "SHA3"): keyPair{
    $innerPrivateKey = keyPair::generateInnerPrivatekey($privateKey, $signSchema);
    return new KeyPair($innerPrivateKey, $signSchema);
  }

    /**
     * private key transfer
     * @param privateKey (should be a hex string with len = 64)
     * @returns Publickey (hex string with len = 64)
     */
	static function privatekeyToPublicbkey(string $privateKey,string $signSchema = "SHA3"): string{
    if ($signSchema !== "SHA3"){
      // For Keccak reverse
      $privateKey = Convert::hexToUint8Reverse($privateKey); 
      $privateKey = Convert::uint8ToHex($privateKey);      
    }
		$secretKey = Sodium_Util::hex2bin($privateKey);

		if (PHP_INT_SIZE === 4) {
           $publicKey = Ed25519_32::publickey_from_secretkey($secretKey, $signSchema);
       	} else {
           $publicKey = Ed25519::publickey_from_secretkey($secretKey, $signSchema);
       	}

		return bin2hex($publicKey);
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
       	return new KeyPair($innerPrivateKey, $signSchema);
	}

    /**
     * verify if this signature valid
     * @param signature (hex string with len = 128)
     * @param message (string)
     * @param publicKey (hex string with len = 64)
     * @returns true/false
     */
	static function verify(string $signature, string $message, string $publicKey,string $signSchema = "SHA3"){
		$sig = hex2bin($signature);
		$pbk = hex2bin($publicKey);

		if (PHP_INT_SIZE === 4) {
           return Ed25519_32::verify_detached($sig, $message, $pbk, $signSchema);
        } else {
           return Ed25519::verify_detached($sig, $message, $pbk, $signSchema);
        }		
	}

    /**
     * sign a message string with a built up keypair
     * @returns {string} (hex string with len = 128)
     */
  static function signData(string $message,KeyPair $signer,string $signSchema = "SHA3"): string{

    if (PHP_INT_SIZE === 4) {
           $sig = Ed25519_32::sign_detached($message, $signer->innerPrivateKey, $signSchema);
        } else {
           $sig = Ed25519::sign_detached($message, $signer->innerPrivateKey, $signSchema);
        }
    return bin2hex($sig);
  }




  /**
   * return publickey of this keypair
   * @returns {string} hex string with len = 64
   */
	public function getPublicKey(): string{
		return strtoupper(bin2hex($this->innerPublicKey));
	}

    /**
     * return PrivateKey of this keypair
     * @returns {string} (hex string with len = 64)
     */
	public function getPrivateKey(): string{
		return strtoupper(bin2hex(substr($this->innerPrivateKey,0,32)));
	}



	private function generateInnerPrivatekey(string $privateKey,string $signSchema = "SHA3"): string{
    if (strlen($privateKey) != 64){
      throw new Exception("Invalid privatekey\n");
    }
    if ($signSchema !== "SHA3"){
		  $privateKey = Convert::hexToUint8Reverse($privateKey); 
      $privateKey = Convert::uint8ToHex($privateKey);
      
    }
    $secretKey = Sodium_Util::hex2bin($privateKey);


		if (PHP_INT_SIZE === 4) {
           $publicKey = Ed25519_32::publickey_from_secretkey($secretKey, $signSchema);
       	} else {
           $publicKey = Ed25519::publickey_from_secretkey($secretKey, $signSchema);
       	}
       return $secretKey.$publicKey;
	}
    /**
     * please don't directly call this to build a keypair
     */
  function __construct(string $innerPrivateKey,string $signSchema = "SHA3") {
      $this->innerPrivateKey = $innerPrivateKey;
      if (PHP_INT_SIZE === 4) {
        $this->innerPublicKey = Ed25519_32::publickey_from_secretkey($innerPrivateKey, $signSchema);
    	}
    	else{
    		$this->innerPublicKey = Ed25519::publickey_from_secretkey($innerPrivateKey, $signSchema);
    	}
  }
}