<?php

namespace NEM\Models\Transaction;

use NEM\Models\Transaction\Deadline;
use NEM\Models\UInt64;
use NEM\Models\Account\PublicAccount;
use NEM\Models\Transaction\SignedTransaction;
use NEM\Models\Transaction\TransactionInfo;
use NEM\Models\Transaction\AggregateTransactionInfo;

abstract class Transaction{

	/**
     * The transaction type.
     */
    public $type; //: number,
    /**
     * The network type.
     */
    public $networkType; //: NetworkType,
    /**
     * The transaction version number.
     */
    public $version; //: number,
    /**
     * The deadline to include the transaction.
     */
    public $deadline; //: Deadline,
    /**
     * A sender of a transaction must specify during the transaction definition a max_fee,
     * meaning the maximum fee the account allows to spend for this transaction.
     */
    public $maxFee; //: UInt64,
    /**
     * The transaction signature (missing if part of an aggregate transaction).
     */
    public $signature; //?: string,
    /**
     * The account of the transaction creator.
     */
    public $signer; //?: PublicAccount,
    /**
     * Transactions meta data object contains additional information about the transaction.
     */
    public $transactionInfo; //?: TransactionInfo | AggregateTransactionInfo

    function __construct($type, int $networkType, $version, Deadline $deadline,
    				UInt64 $maxFee, string $signature = "", PublicAccount $signer = null,
						$transactionInfo = null ) {
    	if(! ( ($transactionInfo instanceof TransactionInfo) 
    		|| ($transactionInfo instanceof AggregateTransactionInfo) ) ){
    		$this->transactionInfo = $transactionInfo;
    	}
        $this->type = $type;
        $this->networkType = $networkType;
        $this->version = $version;
        $this->deadline = $deadline;
        $this->maxFee = $maxFee;
        $this->signature = $signature;
        $this->signer = $signer;
        $this->transactionInfo = $transactionInfo;
    }

    /**
     * @internal
     * Serialize and sign transaction creating a new SignedTransaction
     * @param account - The account to sign the transaction
     * @returns {SignedTransaction}
     */
    public function signWith(Account $account): SignedTransaction {
    	// TODO
        $bytes = $this.buildTransaction();
        $signedTransactionRaw = $account->sign($bytes);
        return new SignedTransaction(
            $signedTransactionRaw->payload,
            $signedTransactionRaw->hash,
            $account->publicKey,
            $this->type,
            $this->networkType);
    }

    /**
     * @internal
     * should return a byte array
     */
    protected abstract function buildTransaction();

    /**
     * @internal
     * @returns {Array<number>}
     */
    public function aggregateTransaction(): number[] {
        return $this->buildTransaction()->toAggregateTransaction($this->signer->publicKey);
    }

    /**
     * Convert an aggregate transaction to an inner transaction including transaction signer.
     * @param signer - Transaction signer.
     * @returns InnerTransaction
     */
    public function toAggregate(PublicAccount $signer): InnerTransaction {
        if ($this->type === TransactionType::AGGREGATE_BONDED || $this->type === TransactionType::AGGREGATE_COMPLETE) {
            throw new Error('Inner transaction cannot be an aggregated transaction.');
        }
        return Object.assign({__proto__: Object.getPrototypeOf(this)}, this, {signer});
    }

    /**
     * Transaction pending to be included in a block
     * @returns {boolean}
     */
    public isUnconfirmed(): boolean {
        return this.transactionInfo != null && this.transactionInfo.height.compact() === 0
            && this.transactionInfo.hash === this.transactionInfo.merkleComponentHash;
    }

    /**
     * Transaction included in a block
     * @returns {boolean}
     */
    public isConfirmed(): boolean {
        return this.transactionInfo != null && this.transactionInfo.height.compact() > 0;
    }

    /**
     * Returns if a transaction has missing signatures.
     * @returns {boolean}
     */
    public hasMissingSignatures(): boolean {
        return this.transactionInfo != null && this.transactionInfo.height.compact() === 0 &&
            this.transactionInfo.hash !== this.transactionInfo.merkleComponentHash;
    }

    /**
     * Transaction is not known by the network
     * @return {boolean}
     */
    public isUnannounced(): boolean {
        return this.transactionInfo == null;
    }

    /**
     * @internal
     */
    public versionToDTO(): number {
        const versionDTO = this.networkType.toString(16) + '0' + this.version.toString(16);
        return parseInt(versionDTO, 16);
    }

    /**
     * @description reapply a given value to the transaction in an immutable way
     * @param {Deadline} deadline
     * @returns {Transaction}
     * @memberof Transaction
     */
    public reapplyGiven(deadline: Deadline = Deadline.create()): Transaction {
        if (this.isUnannounced()) {
            return Object.assign({__proto__: Object.getPrototypeOf(this)}, this, {deadline});
        }
        throw new Error('an Announced transaction can\'t be modified');
    }

    /**
     * @description get the byte size of a transaction
     * @returns {number}
     * @memberof Transaction
     */
    public get size(): number {
        const byteSize = 4 // size
                        + 64 // signature
                        + 32 // signer
                        + 2 // version
                        + 2 // type
                        + 8 // maxFee
                        + 8; // deadline

        return byteSize;
    }

    /**
     * @description Serialize a transaction object
     * @returns {string}
     * @memberof Transaction
     */
    public serialize() {
        const transaction = this.buildTransaction();
        return transaction.serializeUnsignedTransaction();
    }

    /**
     * @description Create JSON object
     * @returns {Object}
     * @memberof Transaction
     */
    public toJSON() {
        const commonTransactionObject = {
            type: this.type,
            networkType: this.networkType,
            version: this.versionToDTO(),
            maxFee: this.maxFee.toDTO(),
            deadline: this.deadline.toDTO(),
            signature: this.signature ? this.signature : '',
        };

        if (this.signer) {
            Object.assign(commonTransactionObject, {signer: this.signer.publicKey});
        }

        const childClassObject = SerializeTransactionToJSON(this);
        return {transaction: Object.assign(commonTransactionObject, childClassObject)};
    }
}