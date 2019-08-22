<?php

namespace NEM\Models\Transaction;

use NEM\Models\Account\PublicAccount';
use NEM\Models\Blockchain\NetworkType';
/**
 * Model representing cosignature of an aggregate transaction.
 */
class AggregateTransactionCosignature {

    /**
     * @param signature
     * @param signer
     */
    public $signature;
    public $signer;
    function __construct(/**
                 * The signature of aggregate transaction done by the cosigner.
                 */
                string $signature,
                /**
                 * The cosigner public account.
                 */
                PublicAccount $signer) {
    	$this->signature = $signature;
    	$this->signer = $signer;

    }

    /**
     * Create DTO object
     */
    public function toDTO() {
        return [
            "signature" => $this->signature,
            "signer" => $this->signer->toDTO(),
        ];
    }
}