<?php

namespace NEM\Models\Transaction;

use NEM\Models\Account\PublicAccount;
use NEM\Models\Blockchain\NetworkType;
use NEM\Models\Mosaic\MosaicId;
use NEM\Models\Mosaic\MosaicSupplyType;
use NEM\Models\Namespace\AliasActionType;
use NEM\Models\Namespace\NamespaceId;
use NEM\Models\UInt64;
use NEM\Models\Transaction\Deadline;
use NEM\Models\Transaction\Transaction;
use NEM\Models\Transaction\TransactionInfo;
use NEM\Models\Transaction\TransactionType;
use NEM\Models\Transaction\TransactionVersion;

use NEM\Core\Serializer;

class MosaicSupplyChangeTransaction extends Transaction {

	public $namespaceId;
	public $mosaicId;
	public $actionType;

    /**
     * Create a mosaic supply change transaction object
     * @param deadline - The deadline to include the transaction.
     * @param mosaicId - The mosaic id.
     * @param direction - The supply type.
     * @param delta - The supply change in units for the mosaic.
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {MosaicSupplyChangeTransaction}
     */
    public static function create(Deadline $deadline,
                         MosaicId $mosaicId,
                         int $direction, //
                         UInt64 $delta,
                         int $networkType,
                         UInt64 $maxFee = new UInt64([0, 0])): MosaicSupplyChangeTransaction {
        return new MosaicSupplyChangeTransaction($networkType,
            TransactionVersion::MOSAIC_SUPPLY_CHANGE,
            $deadline,
            $maxFee,
            $actionType,
            $namespaceId,
            $mosaicId,
        );
    }

    /**
     * @param networkType
     * @param version
     * @param deadline
     * @param maxFee
     * @param actionType
     * @param namespaceId
     * @param mosaicId
     * @param signature
     * @param signer
     * @param transactionInfo
     */
    function __construct(int $networkType,
                int $version,
                Deadline $deadline,
                UInt64 $maxFee
                /**
                 * The mosaic id.
                 */
                MosaicId $mosaicId,
                /**
                 * The supply type.
                 */
                int $direction,
                /**
                 * The supply change in units for the mosaic.
                 */
                UInt64 $delta,
                string $signature = "",
                PublicAccount $signer = null, 
                TransactionInfo $ransactionInfo= null) {
        $this->namespaceId = $namespaceId;
        $this->mosaicId = $mosaicId;
        $this->actionType = $actionType;
        parent::__construct(TransactionType::MOSAIC_SUPPLY_CHANGE, $networkType, $version, $deadline, $maxFee, $signature, $signer, $transactionInfo);
    }
    /**
     * @override Transaction.size()
     * @description get the byte size of a MosaicAliasTransaction
     * @returns {number}
     * @memberof MosaicAliasTransaction
     */
    public function size(): int {
        $byteSize = parent::size();


        // set static byte size fields
        $byteMosaicId = 8;
        $byteDirection = 1;
        $byteDelta = 8;

        return $byteSize + $byteMosaicId + $byteDirection + $byteDelta;
    }

    /**
     * @internal
     * @returns {VerifiableTransaction}
     */
    protected serialize(): Array {
        $s = new Serializer();
        $s->addDeadline($this->deadline->toDTO());
        $s->addFee($this->maxFee->toDTO());
        $s->addVersion($this->versionToDTO());

        $s->addMosaicId($this->mosaicId->id->toDTO());
        $s->addDirection($this->direction);
        $s->addDelta($this->delta->toDTO());

        return $s->buildMosaicSupplyChangeTransaction();
       
    }

}