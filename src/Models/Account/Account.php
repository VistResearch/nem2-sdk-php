<?php

namespace NEM\Models\Account;

use NEM\Core\KeyPair as KeyPair;
use NEM\Models\Account\PublicAccount;
use NEM\Models\Account\Address;

use NEM\Models\Blockchain\NetworkType;
use NEM\Models\Transaction\AggregateTransaction;
use NEM\Models\Transaction\CosignatureSignedTransaction;
use NEM\Models\Transaction\CosignatureTransaction;
use NEM\Models\Transaction\EncryptedMessage;
use NEM\Models\Transaction\PlainMessage;
use NEM\Models\Transaction\SignedTransaction;
use NEM\Models\Transaction\Transaction;


/**
 * The account structure describes an account private key, public key, address and allows signing transactions.
 */
class Account {

    /**
     * @internal
     * @param address
     * @param keyPair
     */
    public $address;
    public $keyPair;
    public $signSchema;

    private function __construct(
                        /**
                         * The account address.
                         */
                        Address $address,
                        /**
                         * The account keyPair, public and private key.
                         */
                        KeyPair $keyPair,
                        /**
                         * The Sign Schema (KECCAK_REVERSED_KEY / SHA3).
                         */
                        string $signSchema = "SHA3") {
        $this->address = $address;
        $this->keyPair = $keyPair;
        $this->signSchema = $signSchema;
    }

    /**
     * Create an Account from a given private key
     * @param privateKey - Private key from an account
     * @param networkType - Network type
     * @return {Account}
     */
    public static function createFromPrivateKey(string $privateKey, int $networkType, string $signSchema = "SHA3"): Account {
        $keyPair = KeyPair::createFromPrivateKey($privateKey, $signSchema);
        $address = Address::createFromPublicKey($keyPair->getPublicKey(),$networkType, $signSchema);
        return new Account($address,$keyPair, $signSchema);
    }

    public static function generateNewAccount(int $networkType, string $signSchema = "SHA3"): Account {
        $keyPair = KeyPair::generateNewPair();

        $address = Address::createFromPublicKey($keyPair->getPublicKey(),$networkType, $signSchema);

        return new Account($address,$keyPair, $signSchema);
    }

    /**
     * Account public key.
     * @return {string}
     */
    public function publicKey(): string {
        return $this->keyPair->getPublicKey();
    }

    /**
     * Public account.
     * @return {PublicAccount}
     */
    public function publicAccount(): PublicAccount {
        return PublicAccount::createFromPublicKey($this->publicKey, $this->address->networkType, $this->signSchema);
    }

    /**
     * Account private key.
     * @return {string}
     */
    public function privateKey(): string {
        return $this->keyPair->getPrivateKey();
    }

    /**
     * Sign a transaction
     * @param transaction - The transaction to be signed.
     * @param generationHash - Network generation hash hex
     * @return {SignedTransaction}
     */
    public function sign(Transaction $transaction, $generationHash): Array {
        return $transaction->signWith($this, $generationHash);
    }


    /**
     * Sign raw data
     * @param data - Data to be signed
     * @return {string} - Signed data result
     */
    public function signData(string $data, string $signSchema = "SHA3"): string {
        return KeyPair::signData($data, $this->keyPair, $signSchema);
    }
}