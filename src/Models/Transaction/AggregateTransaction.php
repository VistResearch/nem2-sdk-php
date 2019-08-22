<?php

namespace NEM\Models\Transaction;

use NEM\Models\Account\Account;
use NEM\Models\Account\PublicAccount;
use NEM\Models\blockchain\NetworkType;
use NEM\Models\UInt64;
use NEM\Models\Transaction\AggregateTransactionCosignature;
use NEM\Models\Transaction\CosignatureSignedTransaction;
use NEM\Models\Transaction\Deadline;
use NEM\Models\Transaction\InnerTransaction;
use NEM\Models\Transaction\SignedTransaction;
use NEM\Models\Transaction\Transaction;
use NEM\Models\Transaction\TransactionInfo;
use NEM\Models\Transaction\TransactionType;
use NEM\Models\Transaction\TransactionVersion;



import { Builder } from '../../infrastructure/builders/AggregateTransaction';
import { AggregateTransaction as AggregatedTransactionCore} from '../../infrastructure/builders/AggregateTransaction';

/**
 * Aggregate innerTransactions contain multiple innerTransactions that can be initiated by different accounts.
 */
class AggregateTransaction extends Transaction {

    public $innerTransactions;
    public $cosignatures;

    /**
     * @param networkType
     * @param type
     * @param version
     * @param deadline
     * @param maxFee
     * @param innerTransactions
     * @param cosignatures
     * @param signature
     * @param signer
     * @param transactionInfo
     */
    function __construct(int $networkType,
                int $type,
                int $version,
                Deadline $deadline,
                UInt64 $maxFee,
                /**
                 * The array of innerTransactions included in the aggregate transaction.
                 */
                Array $innerTransactions,
                /**
                 * The array of transaction cosigners signatures.
                 */
                Array $cosignatures,
                string $signature = "",
                PublicAccount $signer = null,
                TransactionInfo $transactionInfo = null) {
        parent::__construct($type, $networkType, $version, $deadline, $maxFee, $signature, $signer, $transactionInfo);
    }

    /**
     * Create an aggregate complete transaction object
     * @param deadline - The deadline to include the transaction.
     * @param innerTransactions - The array of inner innerTransactions.
     * @param networkType - The network type.
     * @param cosignatures
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {AggregateTransaction}
     */
    public static function createComplete(deadline: Deadline,
                                 innerTransactions: InnerTransaction[],
                                 networkType: NetworkType,
                                 cosignatures: AggregateTransactionCosignature[],
                                 maxFee: UInt64 = new UInt64([0, 0])): AggregateTransaction {
        return new AggregateTransaction($networkType,
            TransactionType::AGGREGATE_COMPLETE,
            TransactionVersion::AGGREGATE_COMPLETE,
            $deadline,
            $maxFee,
            $innerTransactions,
            $cosignatures,
        );
    }

    /**
     * Create an aggregate bonded transaction object
     * @param {Deadline} deadline
     * @param {InnerTransaction[]} innerTransactions
     * @param {NetworkType} networkType
     * @param {AggregateTransactionCosignature[]} cosignatures
     * @param {UInt64} maxFee - (Optional) Max fee defined by the sender
     * @return {AggregateTransaction}
     */
    public static function createBonded(Deadline $deadline,
                               Array $innerTransactions,
                               int $networkType,
                               Array $cosignatures = [],
                               UInt64 $maxFee = new UInt64([0, 0])): AggregateTransaction {
        return new AggregateTransaction($networkType,
            TransactionType::AGGREGATE_BONDED,
            TransactionVersion::AGGREGATE_BONDED,
            $deadline,
            $maxFee,
            $innerTransactions,
            $cosignatures,
        );
    }

    /**
     * @internal
     * @returns {AggregateTransaction}
     */
    public function buildTransaction(): AggregatedTransactionCore {
        $s = new Buffer();
        $s->addDeadline($this->deadline->toDTO());
        $s->addFee($this->maxFee->toDTO());
        $s->addSignature($this->signature);
        $s->addType(TransactionType::ADDRESS_ALIAS);
        $s->addSize(154);
        $s->addVersion($this->version);
        $s->addSigner($this->signer);

        $s->addTransactions($this->innerTransactions);

        return $s->build();
    }

    /**
     * @internal
     * Sign transaction with cosignatories creating a new SignedTransaction
     * @param initiatorAccount - Initiator account
     * @param cosignatories - The array of accounts that will cosign the transaction
     * @param generationHash - Network generation hash hex
     * @param {SignSchema} signSchema The Sign Schema. (KECCAK_REVERSED_KEY / SHA3)
     * @returns {SignedTransaction}
     */
    public function signTransactionWithCosignatories(Account $initiatorAccount,
                                            Array $cosignatories,
                                            string $generationHash,
                                            string $signSchema = "SHA3") {
        const aggregateTransaction = this.buildTransaction();
        const signedTransactionRaw = aggregateTransaction
                .signTransactionWithCosigners(initiatorAccount, cosignatories, generationHash, signSchema);
        return new SignedTransaction(signedTransactionRaw.payload, signedTransactionRaw.hash, initiatorAccount.publicKey,
                                     this.type, this.networkType);
    }

    /**
     * @internal
     * Sign transaction with cosignatories collected from cosigned transactions and creating a new SignedTransaction
     * For off chain Aggregated Complete Transaction co-signing.
     * @param initiatorAccount - Initiator account
     * @param {CosignatureSignedTransaction[]} cosignatureSignedTransactions - Array of cosigned transaction
     * @param generationHash - Network generation hash hex
     * @param {SignSchema} signSchema The Sign Schema. (KECCAK_REVERSED_KEY / SHA3)
     * @return {SignedTransaction}
     */
    public function signTransactionGivenSignatures(Account $initiatorAccount,
                                          Array $cosignatureSignedTransactions,
                                          string $generationHash,
                                          string $signSchema = "SHA3") {
        const aggregateTransaction = this.buildTransaction();
        const signedTransactionRaw = aggregateTransaction.signTransactionGivenSignatures(initiatorAccount,
                                                                                         cosignatureSignedTransactions,
                                                                                         generationHash,
                                                                                         signSchema);
        return new SignedTransaction(signedTransactionRaw.payload, signedTransactionRaw.hash, initiatorAccount.publicKey,
                                     this.type, this.networkType);
    }

    /**
     * Check if account has signed transaction
     * @param publicAccount - Signer public account
     * @returns {boolean}
     */
    public function signedByAccount(PublicAccount $publicAccount): boolean {
        foreach ($this->cosignatures as $key => $value) {
            if($publicAccount->equals($value)){
                return true;
            }
        }
        return false;
    }

    /**
     * @override Transaction.size()
     * @description get the byte size of a AggregateTransaction
     * @returns {number}
     * @memberof AggregateTransaction
     */
    public function size(): number {
        $byteSize = parent::size();

        // set static byte size fields
        $byteTransactionsSize = 4;

        // calculate each inner transaction's size
        $byteTransactions = 0;
        this.innerTransactions.map((transaction) => {
            byteTransactions += transaction.size;
        });

        return $byteSize + $byteTransactionsSize + $byteTransactions;
    }
}