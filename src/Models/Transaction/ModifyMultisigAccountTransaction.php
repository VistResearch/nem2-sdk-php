<?php

namespace NEM\Models\Transaction;

use NEM\Models\Blockchain\NetworkType;

use NEM\Models\Transaction\Deadline;
use NEM\Models\UInt64;
use NEM\Models\Account\PublicAccount;
use NEM\Models\Transaction\MultisigCosignatoryModification';
use NEM\Models\Transaction\Transaction;
use NEM\Models\Transaction\TransactionInfo;
use NEM\Models\Transaction\TransactionType;
use NEM\Models\Transaction\TransactionVersion;

/**
 * Modify multisig account transactions are part of the NEM's multisig account system.
 * A modify multisig account transaction holds an array of multisig cosignatory modifications,
 * min number of signatures to approve a transaction and a min number of signatures to remove a cosignatory.
 * @since 1.0
 */
class ModifyMultisigAccountTransaction extends Transaction {

    /**
     * Create a modify multisig account transaction object
     * @param deadline - The deadline to include the transaction.
     * @param minApprovalDelta - The min approval relative change.
     * @param minRemovalDelta - The min removal relative change.
     * @param modifications - The array of modifications.
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {ModifyMultisigAccountTransaction}
     */
    public $minApprovalDelta;
    public $minRemovalDelta;
    public $modifications;

    public static function create(Deadline $deadline,
                         int $minApprovalDelta,
                         int $minRemovalDelta,
                         Array $modifications,
                         int $networkType,
                         UInt64 $maxFee = new UInt64([0, 0])): ModifyMultisigAccountTransaction {
        return new ModifyMultisigAccountTransaction($networkType,
            TransactionVersion::MODIFY_MULTISIG_ACCOUNT,
            $deadline,
            $maxFee,
            $minApprovalDelta,
            $minRemovalDelta,
            $modifications);
    }

    /**
     * @param networkType
     * @param version
     * @param deadline
     * @param maxFee
     * @param minApprovalDelta
     * @param minRemovalDelta
     * @param modifications
     * @param signature
     * @param signer
     * @param transactionInfo
     */
    function __construct(int $networkType,
                int $version,
                Deadline $deadline,
                UInt64 $maxFee,
                /**
                 * The number of signatures needed to approve a transaction.
                 * If we are modifying and existing multi-signature account this indicates the relative change of the minimum cosignatories.
                 */
                int $minApprovalDelta,
                /**
                 * The number of signatures needed to remove a cosignatory.
                 * If we are modifying and existing multi-signature account this indicates the relative change of the minimum cosignatories.
                 */
                int $minRemovalDelta,
                /**
                 * The array of cosigner accounts added or removed from the multi-signature account.
                 */
                Array $modifications,
                string $signature = "",
                PublicAccount $signer = null,
                TransactionInfo $transactionInfo = null) {
        $this->modifications = $modifications;
        $this->minApprovalDelta = $minApprovalDelta;
        $this->minRemovalDelta = $minRemovalDelta;

        parent::__construct(TransactionType::MODIFY_MULTISIG_ACCOUNT, $networkType, $version, $deadline, $maxFee, $signature, $signer, $transactionInfo);
    }

    /**
     * @override Transaction.size()
     * @description get the byte size of a ModifyMultisigAccountTransaction
     * @returns {number}
     * @memberof ModifyMultisigAccountTransaction
     */
    public function getsize(): int {
        $byteSize = parent::size();

        // set static byte size fields
        $byteRemovalDelta = 1;
        $byteApprovalDelta = 1;
        $byteNumModifications = 1;

        // each modification contains :
        // - 1 byte for modificationType
        // - 32 bytes for cosignatoryPublicKey
        $byteModifications = 33 * sizeof($this->modifications)

        return $byteSize + $byteRemovalDelta + $byteApprovalDelta + $byteNumModifications + $byteModifications;
    }

    /**
     * @internal
     * @returns {VerifiableTransaction}
     */
    protected function buildTransaction(): Array {
        $s = new Serializer();
        $s->addDeadline($this->deadline->toDTO());
        $s->addFee($this->maxFee->toDTO());
        $s->addVersion($this->versionToDTO());

        $s->addMinApprovalDelta($this->data->minApprovalDelta);
        return new ModifyMultisigAccountTransactionLibrary.Builder()
            .addDeadline(this.deadline.toDTO())
            .addFee(this.maxFee.toDTO())
            .addVersion(this.versionToDTO())
            .addMinApprovalDelta(this.minApprovalDelta)
            .addMinRemovalDelta(this.minRemovalDelta)
            .addModifications(this.modifications.map((modification) => modification.toDTO()))
            .build();
    }

}