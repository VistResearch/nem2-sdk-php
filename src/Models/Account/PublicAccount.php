<?php

namespace NEM\Models\Account;

$Hash512 = 64;

class PublicAccount {

    private $publicKey;
    private $address;

    function __construct(string $publicKey,Address $address) {
        $this->publicKey = $publicKey;
        $this->address = $address;
    }

    /**
     * Create a PublicAccount from a public key and network type.
     * @param {string} publicKey Public key
     * @param {int} networkType Network type
     * @returns {PublicAccount}
     */
    static function createFromPublicKey(string $publicKey,int $networkType, string $signSchema = "SHA3"): publicAccount {
        if ($publicKey == "" || strlen($publicKey) !== 64) {
            throw new Error('Not a valid public key');
        }
        
        $address = Address::createFromPublicKey($publicKey, $networkType, $signSchema);
        return new PublicAccount($publicKey, $address);
    }

    /**
     * Verify a signature.
     *
     * @param {string} data - The data to verify. ex : "I am so so so awesome as always"
     * @param {string} signature - The signature to verify. ex : 2092660F5BD4AE832B2E290F34A76B41506EE473B02FD7FD468B32C80C945CF60A0D60D005FA9B2DB3AD3212F8028C1449D3DCF81C9FAB3EB4975A7409D8D802
     *      
     * @return {boolean}  - True if the signature is valid, false otherwise.
     */
    public function verifySignature(string $data, string $signature, string $signSchema = "SHA3"): bool {
        if (strlen($signature)/ 2 != $Hash512) {
            throw new Error('Signature length is incorrect');
        }

        if (!ctype_xdigit($signature)) {
            throw new Error('Signature must be hexadecimal only');
        }
        return KeyPair::verify($this->publicKey, $data, $signature, $signSchema);
    }

    /**
     * Compares public accounts for equality.
     * @param publicAccount
     * @returns {boolean}
     */
    public function equals(PublicAccount $publicAccount) {
        return $this->publicKey() === $publicAccount->publicKey() && $this->address()->plain() === $publicAccount->address()->plain();
    }

    public function publicKey(){
        return $this->publicKey;
    }

    public function address(){
        return $this->address;
    }

    /**
     * Create DTO object
     */
    public function toDTO(): Array {
        return ["publicKey"=>$this->publicKey,
                "address"=>$this->address->toDTO()];
    }

    // static function fromDTO($DTOArray): PublicAccount{
    //     return new PublicAccount($DTOArray["publicKey"],$DTOArray["address"]);
    // }

}
