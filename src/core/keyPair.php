<?php

namespace NEM\Core;

require_once dirname(__FILE__) ."\\sodium_compat\\autoload.php";

use kornrunner\Keccak as Keccak;

use \ParagonIE_Sodium_Core32_Ed25519 as Ed25519_32;
use \ParagonIE_Sodium_Core_Ed25519 as Ed25519;
use \ParagonIE_Sodium_Core_Util as Sodium_Util;

use NEM\Core\Format\Convert as Convert;

class KeyPair{
	private $privateKey; //binary, build by pbk.prk
	private $publicKey; // binary, pbk

  /**
     * Creates a key pair from a private key string.
     * @param {string} privateKeyString A hex encoded private key string.
     * @param {SignSchema} signSchema The Sign Schema. (KECCAK(NIS1) / SHA3(Catapult))
     * @returns {module:crypto/keyPair~KeyPair} The key pair.
     */

  static function createKeyPairFromPrivateKeyString(string $privateKey,string $signSchema = "SHA3"): keyPair{
    $Publicbkey = keyPair::privatekeyToPublicbkey($privateKey, $signSchema);
    return new KeyPair($privateKey, $Publicbkey);
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

    return Ed25519::verify_detached($sig, $message, $pbk, $signSchema);	
	}

    /**
     * sign a message string with a built up keypair
     * @returns {string} (hex string with len = 128)
     */
  static function signData(string $message,KeyPair $signer,string $signSchema = "SHA3"): string{
    $innerPrivateKey = $this->generateInnerPrivatekey($signer->getPrivateKey(),$signSchema);
    $sig = Ed25519::sign_detached($message, $innerPrivateKey, $signSchema);
    return bin2hex($sig);
  }


  /**
   * return publickey of this keypair
   * @returns {string} hex string with len = 64
   */
  public function getPublicKey(): string{
    return $this->publicKey;
  }

    /**
     * return PrivateKey of this keypair
     * @returns {string} (hex string with len = 64)
     */
  public function getPrivateKey(): string{
    return $this->privateKey;
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

    $publicKey = Ed25519::publickey_from_secretkey($secretKey, $signSchema);

    return bin2hex($publicKey);
  }


    /**
     * build a new keypair object with random seed
     * @param seed (int)
     * @returns keyPair object
     */
  static function generateNewPair(int $seed = 0): keyPair
      $innerPrivateKey = Ed25519::keypair($seed);      
      return new KeyPair($innerPrivateKey, $signSchema);
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


		$publicKey = Ed25519::publickey_from_secretkey($secretKey, $signSchema);
    return $secretKey.$publicKey;
	}

  /**
   * please don't directly call this to build a keypair
   */
  function __construct(string $PrivateKey,string $Publicbkey) {
      $this->PrivateKey = $PrivateKey;
   		$this->PublicKey = $Publicbkey;
  }
}