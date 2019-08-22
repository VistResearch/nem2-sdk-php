<?php

namespace NEM\Models\Transaction;

use NEM\Models\Transaction\Transaction;
use NEM\Models\Transaction\TransactionVersion;
use NEM\Models\Transaction\Message;
use NEM\Models\Transaction\LinkAction;
use NEM\Models\Transaction\Deadline;
use NEM\Models\UInt64;
use NEM\Models\Blockchain\NetworkType;
use NEM\Models\Account\PublicAccount;
use NEM\Models\Account\Address;
use NEM\Models\Transaction\TransactionType;
use NEM\Models\Mosaic\MosaicId;
use NEM\Models\Mosaic\MosaicRestrictionType;


use NEM\Infrastructure\Buffer\MosaicGlobalRestrictionTransactionBuffer as Buffer;

class MosaicGlobalRestrictionTransaction extends Transaction {

    /**
     * Create a mosaic address restriction transaction object
     *
     * The mosaic global restrictions are the network-wide rules that will determine
     * whether an account will be able to transact a given mosaic.
     *
     * Only accounts tagged with the key identifiers and values that meet the conditions
     * will be able to execute transactions involving the mosaic.
     *
     * Additionally, the mosaic creator can define restrictions that depend directly on
     * global restrictions set on another mosaic - known as **reference mosaic**.
     * The referenced mosaic and the restricted mosaic do not necessarily have to be created
     * by the same account, enabling the delegation of mosaic permissions to a third party.
     *
     * @param deadline - The deadline to include the transaction.
     * @param mosaicId - The mosaic id ex: new MosaicId([481110499, 231112638]).
     * @param referenceMosaicId - The mosaic id providing the restriction key.
     * @param restrictionKey - The restriction key.
     * @param previousRestrictionValue - The previous restriction value.
     * @param previousRestrictionType - The previous restriction type.
     * @param newRestrictionValue - The new restriction value.
     * @param previousRestrictionType - The previous restriction tpye.
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {MosaicGlobalRestrictionTransaction}
     */
    public static function create(Deadline $deadline,
                         MosaicId $mosaicId,
                         MosaicId $referenceMosaicId,
                         UInt64 $restrictionKey,
                         UInt64 $previousRestrictionValue,
                         int $previousRestrictionType,
                         UInt64 $newRestrictionValue,
                         int $newRestrictionType,
                         int $networkType,
                         UInt64 $maxFee = new UInt64([0, 0])): MosaicGlobalRestrictionTransaction {
        return new MosaicGlobalRestrictionTransaction($networkType,
            TransactionVersion::MOSAIC_GLOBAL_RESTRICTION,
            $deadline,
            $maxFee,
            $mosaicId,
            $referenceMosaicId,
            $restrictionKey,
            $previousRestrictionValue,
            $previousRestrictionType,
            $newRestrictionValue,
            $newRestrictionType,
        );
    }

    /**
     * @param networkType
     * @param version
     * @param deadline
     * @param maxFee
     * @param mosaicNonce
     * @param mosaicId
     * @param mosaicProperties
     * @param signature
     * @param signer
     * @param transactionInfo
     */
    function __construct(int $networkType,
                int $version,
                Deadline $deadline,
                UInt64 $maxFee,
                /**
                 * The mosaic id.
                 */
                MosaicId $mosaicId,
                /**
                 * The refrence mosaic id.
                 */
                MosaicId $referenceMosaicId,
                /**
                 * The restriction key.
                 */
                UInt64 $restrictionKey,
                /**
                 * The previous restriction value.
                 */
                UInt64 $previousRestrictionValue,
                /**
                 * The previous restriction type.
                 */
                int $previousRestrictionType,
                /**
                 * The new restriction value.
                 */
                UInt64 $newRestrictionValue,
                /**
                 * The new restriction type.
                 */
                int $newRestrictionType,
                string $signature = "",
                PublicAccount $signer = null,
                TransactionInfo $transactionInfo = null) {
        $this->networkType = $networkType;
        $this->version = $version; 
        $this->deadline = $deadline; 
        $this->maxFee = $maxFee; 
        $this->mosaicId = $mosaicId;
        $this->referenceMosaicId = $referenceMosaicId;
        $this->restrictionKey = $restrictionKey;
        $this->previousRestrictionValue = $previousRestrictionValue;
        $this->previousRestrictionType = $previousRestrictionType;
        $this->newRestrictionValue = $newRestrictionValue;
        $this->newRestrictionType = $newRestrictionType;

        $this->signature = $signature; 
        $this->signer = $signer; 
        $this->transactionInfo = $transactionInfo; 

        parent::__construct(TransactionType::MOSAIC_GLOBAL_RESTRICTION, $networkType, $version, $deadline, $maxFee, $signature, $signer, $transactionInfo);
    }

    /**
     * @override Transaction.size()
     * @description get the byte size of a MosaicDefinitionTransaction
     * @returns {number}
     * @memberof MosaicGlobalRestrictionTransaction
     */
    public function size(): int {
        $byteSize = parent::size();

        // set static byte size fields
        $byteNonce = 4;
        $byteMosaicId = 8;
        $byteReferenceMosaicId = 8;
        $byteRestrictionKey = 8;
        $bytePreviousRestrictionValue = 8;
        $byteNewRestrictionValue = 8;
        $bytePreviousRestrictionType = 1;
        $byteNewRestrictionType = 1;

        return $byteSize + $byteNonce + $byteMosaicId + $byteRestrictionKey + $byteReferenceMosaicId +
               $bytePreviousRestrictionValue + $byteNewRestrictionValue + $byteNewRestrictionType +
               $bytePreviousRestrictionType;
    }

    /**
     * @internal
     * @returns {VerifiableTransaction}
     */
    protected function serialize(): Array {
        $s = new Buffer();
        $s->addDeadline($this->deadline->toDTO());
        $s->addFee($this->maxFee->toDTO());
        $s->addSignature($this->signature);
        $s->addType(TransactionType::ADDRESS_ALIAS);
        $s->addSize(154);
        $s->addVersion($this->version);
        $s->addSigner($this->signer);

        $s->addMosaicId($this->mosaicId->id->toDTO());
        $s->addReferenceMosaicId($this->referenceMosaicId->id->toDTO());
        $s->addRestrictionKey($this->restrictionKey->toDTO());
        $s->addPreviousRestrictionValue($this->previousRestrictionValue->toDTO());
        $s->addPreviousRestrictionType($this->previousRestrictionType);
        $s->addNewRestrictionValue($this->newRestrictionValue->toDTO());
        $s->addNewRestrictionType($this->newRestrictionType);

        return $s->build();
    }

}