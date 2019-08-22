<?php

namespace NEM\Models\Transaction;

use NEM\Models\Account\RestrictionType;
use NEM\Models\Account\PublicAccount;
use NEM\Models\Blockchain\NetworkType;
use NEM\Models\UInt64;
use NEM\Models\Transaction\AccountPropertyModification;
use NEM\Models\Transaction\Deadline;
use NEM\Models\Transaction\Transaction;
use NEM\Models\Transaction\TransactionInfo;
use NEM\Models\Transaction\TransactionType;
use NEM\Models\Transaction\TransactionVersion;

use NEM\Infrastructure\Buffer\AccountRestrictionsMosaicTransactionBuffer as Buffer;

class AccountMosaicRestrictionModificationTransaction extends Transaction {

	public $RestrictionType;
	public $modifications;
    /**
     * Create a modify account property mosaic transaction object
     * @param deadline - The deadline to include the transaction.
     * @param propertyType - The account property type.
     * @param modifications - The array of modifications.
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {ModifyAccountPropertyAddressTransaction}
     */
    public static function create(Deadline $deadline,
                         int $RestrictionType,
                         Array $modifications,
                         int $networkType,
                         UInt64 $maxFee = new UInt64([0, 0])): ModifyAccountPropertyMosaicTransaction {
        return new ModifyAccountPropertyMosaicTransaction($networkType,
            TransactionVersion::MODIFY_ACCOUNT_PROPERTY_MOSAIC,
            $deadline,
            $maxFee,
            $propertyType,
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
                int $RestrictionType,
                Array $modifications,
                string $signature = "",
                PublicAccount $signer = null, 
                TransactionInfo $ransactionInfo= null) {
    	$this->RestrictionType = $RestrictionType;
    	$this->modifications = $modifications;
        parent::__construct(TransactionType::MODIFY_ACCOUNT_PROPERTY_MOSAIC, $networkType, $version, $deadline, $maxFee, $signature, $signer, $transactionInfo);
    }

    /**
     * @override Transaction.size()
     * @description get the byte size of a ModifyAccountPropertyMosaicTransaction
     * @returns {number}
     * @memberof ModifyAccountPropertyMosaicTransaction
     */
    public function size(): int {
        $byteSize = parent::size();

        // set static byte size fields
        $bytePropertyType = 1;
        $byteModificationCount = 1;

        // each modification contains :
        // - 1 byte for modificationType
        // - 8 bytes for the modification value (mosaicId)
        $byteModifications = 9 * sizeof($this->modifications);

        return $byteSize + $bytePropertyType + $byteModificationCount + $byteModifications;
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
        $s->addType(TransactionType::MODIFY_ACCOUNT_RESTRICTION_MOSAIC);
        $s->addSize($this->getsize());
        $s->addVersion($this->version);
        $s->addSigner($this->signer);

    	$modifications = [];
        foreach ($this->data->modifications as $key => $value) {
            array_merge($modifications,$value->toCatbuffer());
        }

        $s->addModifications($modifications);
        $s->addRestrictionType($this->RestrictionType);
        return $s->buildModifyAccountPropertyMosaicTransaction();
    }

}