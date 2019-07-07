<?php

namespace NEM\Models\Transaction;

use NEM\Models\Account\Account';
use NEM\Models\Transaction\AggregateTransaction';
use NEM\Models\Transaction\CosignatureSignedTransaction';

/**
 * Cosignature transaction is used to sign an aggregate transactions with missing cosignatures.
 */
class CosignatureTransaction {
    /**
     * @param transactionToCosign
     */
    public $transactionToCosign;
    function __construct(/**
                 * Transaction to cosign.
                 */
                 AggregateTransaction $transactionToCosign) {
    	$this->transactionToCosign = $transactionToCosign;
    }

    /**
     * Create a cosignature transaction
     * @param transactionToCosign - Transaction to cosign.
     * @returns {CosignatureTransaction}
     */
    public static function create(AggregateTransaction $transactionToCosign) {
        if ($transactionToCosign->isUnannounced()) {
            throw new Error('transaction to cosign should be announced first');
        }
        return new CosignatureTransaction($transactionToCosign);
    }

    /**
     * @internal
     * Serialize and sign transaction creating a new SignedTransaction
     * @param account
     * @returns {CosignatureSignedTransaction}
     */
    // public function signWith(Account $account): CosignatureSignedTransaction {
    //     $aggregateSignatureTransaction = new CosignaturetransactionLibrary($this->transactionToCosign->transactionInfo->hash);
    //     $signedTransactionRaw = aggregateSignatureTransaction.signCosignatoriesTransaction(account);
    //     return new CosignatureSignedTransaction(signedTransactionRaw.parentHash,
    //         signedTransactionRaw.signature,
    //         signedTransactionRaw.signer);
    // }
}