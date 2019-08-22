<?php

namespace NEM\Models\Transaction;

use NEM\MOdels\blockchain\NetworkType;

/**
 * SignedTransaction object is used to transfer the transaction data and the signature to NIS
 * in order to initiate and broadcast a transaction.
 */

class SignedTransaction {
    /**
     * @internal
     * @param payload
     * @param hash
     * @param signer
     * @param type
     * @param networkType
     */
    public $payload;
    public $hash;
    public $signer;
    public $type;
    public $networkType;

    function __construct(/**
                 * Transaction serialized data
                 */
                string $payload,
                /**
                 * Transaction hash
                 */
                string $hash,
                /**
                 * Transaction signer
                 */
                string $signer,
                /**
                 * Transaction type
                 */
                int $type,
                /**
                 * Signer network type
                 */
                int $networkType) {
        if (strlen($hash) !== 64) {
            throw new Error('hash must be 64 characters long');
        }

        $this->payload = $payload;
        $this->hash = $hash;
        $this->signer = $signer;
        $this->type = $type;
        $this->networkType = $networkType;
    }

    /**
     * Create DTO object
     */
    public function toDTO() {
        return [
            "payload" => $this->payload,
            "hash" => $this->hash,
            "signer" => $this->signer,
            "type" => $this->type,
            "networkType" => $this->networkType,
        ];
    }
}