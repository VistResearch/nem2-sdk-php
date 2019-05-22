<?php

namespace NEM\Models\Transaction;

import {CosignatureTransaction as CosignaturetransactionLibrary} from 'nem2-library';
use NEM\Models\Account\Account';
use NEM\Models\Transaction\AggregateTransaction';
use NEM\Models\Transaction\CosignatureSignedTransaction';

/**
 * Cosignature transaction is used to sign an aggregate transactions with missing cosignatures.
 */
export class CosignatureTransaction {
    /**
     * @param transactionToCosign
     */
    constructor(/**
                 * Transaction to cosign.
                 */
                public readonly transactionToCosign: AggregateTransaction) {

    }

    /**
     * Create a cosignature transaction
     * @param transactionToCosign - Transaction to cosign.
     * @returns {CosignatureTransaction}
     */
    public static create(transactionToCosign: AggregateTransaction) {
        if (transactionToCosign.isUnannounced()) {
            throw new Error('transaction to cosign should be announced first');
        }
        return new CosignatureTransaction(transactionToCosign);
    }

    /**
     * @internal
     * Serialize and sign transaction creating a new SignedTransaction
     * @param account
     * @returns {CosignatureSignedTransaction}
     */
    public signWith(account: Account): CosignatureSignedTransaction {
        const aggregateSignatureTransaction = new CosignaturetransactionLibrary(this.transactionToCosign.transactionInfo!.hash);
        const signedTransactionRaw = aggregateSignatureTransaction.signCosignatoriesTransaction(account);
        return new CosignatureSignedTransaction(signedTransactionRaw.parentHash,
            signedTransactionRaw.signature,
            signedTransactionRaw.signer);
    }
}