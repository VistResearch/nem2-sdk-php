<?php

namespace NEM\Models\Transaction;

use NEM\Models\Account\PublicAccount;
use NEM\Models\Blockchain\NetworkType;
use NEM\Models\Mosaic\Mosaic;
use NEM\Models\UInt64;
use NEM\Models\Transaction\Deadline;
use NEM\Models\Transaction\SignedTransaction;
use NEM\Models\Transaction\Transaction;
use NEM\Models\Transaction\TransactionInfo;
use NEM\Models\Transaction\TransactionType;
use NEM\Models\Transaction\TransactionVersion;

use NEM\Core\Buffer;
/**
 * Lock funds transaction is used before sending an Aggregate bonded transaction, as a deposit to announce the transaction.
 * When aggregate bonded transaction is confirmed funds are returned to LockFundsTransaction signer.
 *
 * @since 1.0
 */
class LockFundsTransaction extends Transaction {

    /**
     * Aggregate bonded hash.
     */
    public $hash;
    public $signedTransaction;
    public $duration;
    public $mosaic;

    /**
     * Create a Lock funds transaction object
     * @param deadline - The deadline to include the transaction.
     * @param mosaic - The locked mosaic.
     * @param duration - The funds lock duration.
     * @param signedTransaction - The signed transaction for which funds are locked.
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {LockFundsTransaction}
     */
    public static function create(Deadline $deadline,
                         Mosaic $mosaic,
                         UInt64 $duration,
                         SignedTransaction $signedTransaction,
                         int $networkType,
                         UInt64 $maxFee = new UInt64([0, 0])): LockFundsTransaction {
        return new LockFundsTransaction(
            $networkType,
            TransactionVersion::LOCK,
            $deadline,
            $maxFee,
            $mosaic,
            $duration,
            $signedTransaction
        );
    }

    /**
     * @param networkType
     * @param version
     * @param deadline
     * @param maxFee
     * @param mosaic
     * @param duration
     * @param signedTransaction
     * @param signature
     * @param signer
     * @param transactionInfo
     */
    function __construct(int $networkType,
                int $version,
                Deadline $deadline,
                UInt64 $maxFee,
                /**
                 * The locked mosaic.
                 */
                Mosaic $mosaic,
                /**
                 * The funds lock duration.
                 */
                UInt64 $duration,
                SignedTransaction $signedTransaction,
                string $signature = "",
                PublicAccount $signer = null, 
                TransactionInfo $ransactionInfo= null) {
    	$this->mosaic = $mosaic;
    	$this->signedTransaction = $signedTransaction;
    	$this->duration = $duration;

        parent::__construct(TransactionType::LOCK, $networkType, $version, $deadline, $maxFee, $signature,$signer, $transactionInfo);
        $this->hash = $signedTransaction->hash;
        if ($signedTransaction->type !== TransactionType::AGGREGATE_BONDED) {
            throw new Error('Signed transaction must be Aggregate Bonded Transaction');
        }
    }

    /**
     * @override Transaction.size()
     * @description get the byte size of a LockFundsTransaction
     * @returns {number}
     * @memberof LockFundsTransaction
     */
    public function size(): int {
        $byteSize = parent::size();

        // set static byte size fields
        $byteMosaicId = 8;
        $byteAmount = 8;
        $byteDuration = 8;
        $byteHash = 32;

        return $byteSize + $byteMosaicId + $byteAmount + $byteDuration + $byteHash;
    }

    /**
     * @internal
     * @return {VerifiableTransaction}
     */
    protected function serialize(): Array {
    	$s = new Buffer();
    	$s->addDeadline($this->deadline->toDTO());
    	$s->addVersion($this->versionToDTO());
    	$s->addType($this->type);
    	$s->addFee($this->maxFee->toDTO());
    	$s->addMosaic($this->mosaic->toDTO());
    	$s->addDuration($this->Duration->toDTO());
    	$s->addHash($this->hash);

        return $s->buildLockFundsTransaction();
    }

}