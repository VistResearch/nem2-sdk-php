<?php

namespace NEM\Models\Transaction;

use NEM\Models\Account\PublicAccount;
use NEM\Models\Blockchain\NetworkType;
use NEM\Models\Mosaic\MosaicId;
use NEM\Models\Mosaic\MosaicNonce;
use NEM\Models\Mosaic\MosaicProperties;
use NEM\Models\UInt64;
use NEM\Models\Transaction\Deadline;
use NEM\Models\Transaction\Transaction;
use NEM\Models\Transaction\TransactionInfo;
use NEM\Models\Transaction\ransactionType;
use NEM\Models\Transaction\TransactionVersion;

use NEM\Infrucstructure\Buffer\MosaicCreationTransactionBuffer as Buffer;

/**
 * Before a mosaic can be created or transferred, a corresponding definition of the mosaic has to be created and published to the network.
 * This is done via a mosaic definition transaction.
 */
class MosaicDefinitionTransaction extends Transaction {

    public $nonce;
    public $mosaicId;
    public $mosaicProperties;

    /**
     * Create a mosaic creation transaction object
     * @param deadline - The deadline to include the transaction.
     * @param nonce - The mosaic nonce ex: MosaicNonce.createRandom().
     * @param mosaicId - The mosaic id ex: new MosaicId([481110499, 231112638]).
     * @param mosaicProperties - The mosaic properties.
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {MosaicDefinitionTransaction}
     */
    public static function create(Deadline $deadline,
                         MosaicNonce $nonce,
                         MosaicId $mosaicId,
                         MosaicProperties $mosaicProperties,
                         int $networkType,
                         UInt64 $maxFee = new UInt64([0, 0])): MosaicDefinitionTransaction {
        return new MosaicDefinitionTransaction($networkType,
            TransactionVersion::MOSAIC_DEFINITION,
            $deadline,
            $maxFee,
            $nonce,
            $mosaicId,
            $mosaicProperties,
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
                 * The mosaic nonce.
                 */
                MosaicNonce  $nonce,
                /**
                 * The mosaic id.
                 */
                MosaicId $mosaicId,
                /**
                 * The mosaic properties.
                 */
                MosaicProperties $mosaicProperties,
                string $signature = "",
                PublicAccount $signer = null, 
                TransactionInfo $ransactionInfo= null) {
        $this->nonce = $nonce;
        $this->mosaicId = $mosaicId;
        $this->mosaicProperties = $mosaicProperties;

        parent::__construct(TransactionType::MOSAIC_DEFINITION, $networkType, $version, $deadline, $maxFee, $signature, $signer, $transactionInfo);
    }

    /**
     * @override Transaction.size()
     * @description get the byte size of a MosaicDefinitionTransaction
     * @returns {number}
     * @memberof MosaicDefinitionTransaction
     */
    public function size(): int {
        $byteSize = parent::size();

        // set static byte size fields
        $byteNonce = 4;
        $byteMosaicId = 8;
        $byteNumProps = 1;
        $byteFlags = 1;
        $byteDivisibility = 1;
        $byteDurationSize = 1;
        $byteDuration = 8;

        return $byteSize + $byteNonce + $byteMosaicId + $byteNumProps + $byteFlags + $byteDivisibility + $byteDurationSize + $byteDuration;
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
        $s->addType(TransactionType::MOSAIC_DEFINITION);
        $s->addSize($this->getsize());
        $s->addVersion($this->version);
        $s->addSigner($this->signer);

        $s->addDivisibility($this->mosaicProperties->divisibility);
        $s->addDuration($this->mosaicProperties->duration ? $this->mosaicProperties->duration->toDTO() : []);
        $s->addNonce($this->nonce->toDTO());
        $s->addMosaicId($this->mosaicId->id->toDTO());

        $mosaicFlag = 0;
        
        if ($this->mosaicProperties->supplyMutable) {
            $mosaicFlag += 1;
        }

        if ($this->mosaicProperties->transferable) {
            $mosaicFlag += 2;
        }

        if ($this->mosaicProperties->levyMutable) {
            $mosaicFlag += 4;
        }
        $s->addMosaicProperties($mosaicFlag);

        return $s->build();
    }

}