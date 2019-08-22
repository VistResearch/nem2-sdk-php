    <?php

namespace NEM\Models\Transaction;

use NEM\Models\Account\PublicAccount;
use NEM\Models\Blockchain\NetworkType;
use NEM\Models\Mosaic\MosaicId;
use NEM\Models\Namespace\AliasActionType;
use NEM\Models\Namespace\NamespaceId;
use NEM\Models\UInt64;
use NEM\Models\Transaction\Deadline;
use NEM\Models\Transaction\Transaction;
use NEM\Models\Transaction\TransactionInfo;
use NEM\Models\Transaction\TransactionType;
use NEM\Models\Transaction\TransactionVersion;

use NEM\Infrucstructure\Buffer\MosaicAliasTransactionBuffer as Buffer;

class MosaicAliasTransaction extends Transaction {

	public $namespaceId;
	public $mosaicId;
	public $actionType;

    /**
     * Create a mosaic alias transaction object
     * @param deadline - The deadline to include the transaction.
     * @param actionType - The alias action type.
     * @param namespaceId - The namespace id.
     * @param mosaicId - The mosaic id.
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {MosaicAliasTransaction}
     */
    public static function create(Deadline $deadline,
                         int $actionType,
                         NamespaceId $namespaceId,
                         MosaicId $mosaicId,
                         int $networkType,
                         UInt64 $maxFee = new UInt64([0, 0])): MosaicAliasTransaction {
        return new MosaicAliasTransaction($networkType,
            TransactionVersion::MOSAIC_ALIAS,
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
                UInt64 $maxFee,
                /**
                 * The alias action type.
                 */
                int $actionType,
                /**
                 * The namespace id that will be an alias.
                 */
                NamespaceId $namespaceId,
                /**
                 * The mosaic id.
                 */
                MosaicId $mosaicId,
                string $signature = "",
                PublicAccount $signer = null, 
                TransactionInfo $ransactionInfo= null) {
    	$this->mosaicId = $mosaicId;
    	$this->namespaceId = $namespaceId;
    	$this->actionType = $actionType;

        parent::__construct(TransactionType::MOSAIC_ALIAS, $networkType, $version, $deadline, $maxFee, $signature, $signer, $transactionInfo);
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
        $byteType = 1;
        $byteNamespaceId = 8;
        $byteMosaicId = 8;

        return $byteSize + $byteType + $byteNamespaceId + $byteMosaicId;
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

        $s->addActionType($this->actionType);
        $s->addNamespaceId($this->namespaceId->id->toDTO());
        $s->addMosaicId($this->mosaicId->id->toDTO());

        return $s->build();

    }

}