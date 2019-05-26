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
        $bytes = $this->serialize();
        $payload = $account->sign(pack("C*",...array_slice($bytes,0,100)));
        $hashBuffer = array_merge(array_slice($bytes,4,36),$payload,array_slice($bytes,100));
        $hash = hash("sha3-256",pack("C*",...$hashBuffer));

        return new SignedTransaction(
            $payload,
            $hash,
            $account->publicKey,
            $this->type,
            $this->networkType);
    }

    /**
     * @internal
     * should return a byte array
     */
    protected abstract function serialize();

    /**
     * @internal
     * @returns {Array<number>}
     */
    public function aggregateTransaction(): number[] {
        $signer = unpack("C*",hex2bin($this->signer->publicKey));
        $resultBytes = $this->serialize();
        $resultBytes = aray_slice($resultBytes,0, 4 + 64 + 32);
        $resultBytes = array_merge($signer,$resultBytes);
        $resultBytes = aray_slice($resultBytes,32 + 2 + 2, 16);
        $tmpArray = [
            (sizeof($resultBytes) + 4 & 0x000000ff),
            (sizeof($resultBytes) + 4 & 0x0000ff00) >> 8,
            (sizeof($resultBytes) + 4 & 0x00ff0000) >> 16,
            (sizeof($resultBytes) + 4 & 0xff000000) >> 24
        ]

        return array_merge($tmpArray,$resultBytes)
    }

    /**
     * Convert an aggregate transaction to an inner transaction including transaction signer.
     * @param signer - Transaction signer.
     * @returns InnerTransaction
     */
    // public function toAggregate(PublicAccount $signer): InnerTransaction {
    //     if ($this->type === TransactionType::AGGREGATE_BONDED || $this->type === TransactionType::AGGREGATE_COMPLETE) {
    //         throw new Error('Inner transaction cannot be an aggregated transaction.');
    //     }
    //     return Object.assign({__proto__: Object.getPrototypeOf(this)}, this, {signer});
    // }

    /**
     * Transaction pending to be included in a block
     * @returns {boolean}
     */
    public function isUnconfirmed(): boolean {
        return $this->transactionInfo != null && $this->transactionInfo->height->compact() === 0
            && $this->transactionInfo->hash === $this->transactionInfo->merkleComponentHash;
    }

    /**
     * Transaction included in a block
     * @returns {boolean}
     */
    public function isConfirmed(): boolean {
        return $this->transactionInfo != null && $this->transactionInfo->height->compact() > 0;
    }

    /**
     * Returns if a transaction has missing signatures.
     * @returns {boolean}
     */
    public function hasMissingSignatures(): boolean {
        return $this->transactionInfo != null && $this.transactionInfo->height->compact() === 0 &&
            $this->transactionInfo->hash !== $this.transactionInfo->merkleComponentHash;
    }

    /**
     * Transaction is not known by the network
     * @return {boolean}
     */
    public function isUnannounced(): boolean {
        return $this->transactionInfo == null;
    }

    /**
     * @internal
     */
    public function versionToDTO(): number {
        $versionDTO = dechex ($this->networkType) . '0' + dechex ($this->version);
        return hexdec($versionDTO);
    }

    /**
     * @description reapply a given value to the transaction in an immutable way
     * @param {Deadline} deadline
     * @returns {Transaction}
     * @memberof Transaction
     */
    // TODO
    public function reapplyGiven(Deadline $deadline = Deadline::create()): Transaction {
        if ($this->isUnannounced()) {
            return Object.assign({__proto__: Object.getPrototypeOf(this)}, this, {deadline});
        }
        throw new Error('an Announced transaction can\'t be modified');
    }

    /**
     * @description get the byte size of a transaction
     * @returns {number}
     * @memberof Transaction
     */
    public function size(): int {
        $byteSize = 4 // size
                    + 64 // signature
                    + 32 // signer
                    + 2 // version
                    + 2 // type
                    + 8 // maxFee
                    + 8; // deadline

        return $byteSize;
    }

    /**
     * @description Serialize a transaction object
     * @returns {string}
     * @memberof Transaction
     */
    public function serializeTransaction() {
        return $this->serialize();
    }

    /**
     * @description Create JSON object
     * @returns {Object}
     * @memberof Transaction
     */
    public function toJSON() {
        $commonTransactionObject = [
            "type" => $this->type,
            "networkType" => $this->networkType,
            "version" => $this->versionToDTO(),
            "maxFee" => $this->maxFe->toDTO(),
            "deadline" => $this->deadlin->toDTO(),
            "signature" => $this->signature ? $thi->signature : '',
        ];

        if ($this->signer) {
            array_merge($commonTransactionObject, [$signer: $this->signer->publicKey]);
        }

        // TODO
        $childClassObject = SerializeTransactionToJSON(this);
        return array_merge($commonTransactionObject,$childClassObject);
    }
}