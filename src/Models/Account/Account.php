<?php

namespace NEM\Models\Account;

use NEM\core\keyPair;
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
use NEM\Models\Account\Address;
use NEM\Models\Account\PublicAccount;


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

    private function __construct(
                        /**
                         * The account address.
                         */
                        Address $address,
                        /**
                         * The account keyPair, public and private key.
                         */
                        KeyPair $keyPair) {
        $this->address = $address;
        $this->keyPair = $keyPair;
    }

    /**
     * Create an Account from a given private key
     * @param privateKey - Private key from an account
     * @param networkType - Network type
     * @return {Account}
     */
    public static function createFromPrivateKey(string $privateKey, int $networkType): Account {
        $keyPair = KeyPair::createFromPrivateKey($privateKey);
        $address = Address::createFromPublicKey($keyPair->getPublicKey(),$networkType);
        return new Account($address,$keyPair);
    }

    public static function generateNewAccount(int $networkType): Account {
        $keyPair = KeyPair::generateNewPair();

        $address = Address::createFromPublicKey($keyPair->getPublicKey(),$networkType);

        return new Account($address,$keyPair);
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
        return PublicAccount::createFromPublicKey($this->publicKey, $this->address->networkType);
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
    public function sign(Transaction $transaction, $generationHash): SignedTransaction {
        return $transaction->signWith($this, $generationHash);
    }


    /**
     * Sign raw data
     * @param data - Data to be signed
     * @return {string} - Signed data result
     */
    public function signData(string $data): string {
        return $this->KeyPair->signData($data);
    }
}