<?php

namespace NEM\Models\Transaction;

use NEM\Models\Account\PublicAccount;
use NEM\Models\Transaction\Message;
use NEM\Models\Transaction\MessageType;
use NEM\Models\Transaction\PlainMessage;

// NOT DONE Yet

class EncryptedMessage extends Message {

    public $recipientPublicAccount; // PublicAccount;

    function __construct(string $payload,
                PublicAccount $recipientPublicAccount = none) {
        parent::__construct(MessageType::EncryptedMessage, $payload);
        if($recipientPublicAccount != none){
	        $this->recipientPublicAccount = $recipientPublicAccount;
        }
    }

    /**
     *
     * @param message - Plain message to be encrypted
     * @param recipientPublicAccount - Recipient public account
     * @param privateKey - Sender private key
     */
    public static function create(string $message, PublicAccount $recipientPublicAccount, $privateKey) {
        return new EncryptedMessage(
            crypto.encode(privateKey, recipientPublicAccount.publicKey, message).toUpperCase(),
            $recipientPublicAccount);
    }

    /**
     *
     * @param payload
     */
    public static function createFromPayload(string $payload): EncryptedMessage {
        return new EncryptedMessage($this->decodeHex($payload));
    }

    /**
     *
     * @param encryptMessage - Encrypted message to be decrypted
     * @param privateKey - Recipient private key
     * @param recipientPublicAccount - Sender public account
     */
    public static function decrypt(EncryptedMessage $encryptMessage, $privateKey, PublicAccount $recipientPublicAccount): PlainMessage {
        return new PlainMessage($this->decodeHex(crypto.decode($privateKey, $recipientPublicAccount->publicKey, $encryptMessage->payload)));
    }
}