<?php


use NEM\Models\Account\PropertyType;
use NEM\Models\Account\PublicAccount;
use NEM\Models\Blockchain\NetworkType;
use NEM\Models\UInt64;
use NEM\Models\Transaction\AccountPropertyModification;
use NEM\Models\Transaction\Deadline;
use NEM\Models\Transaction\Transaction;
use NEM\Models\Transaction\TransactionInfo;
use NEM\Models\Transaction\TransactionType;
use NEM\Models\Transaction\TransactionVersion;

use NEM\Core\SerializeBase;
use NEM\Core\Serializer;

class ModifyAccountPropertyEntityTypeTransaction extends Transaction {

    /**
     * Create a modify account property entity type transaction object
     * @param deadline - The deadline to include the transaction.
     * @param propertyType - The account property type.
     * @param modifications - The array of modifications.
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {ModifyAccountPropertyEntityTypeTransaction}
     */
    public $propertyType;
    public $modifications;

    public static function create(Deadline $deadline,
                         int $propertyType,
                         Array $modifications,
                         int $networkType,
                         UInt64 $maxFee: UInt64 = new UInt64([0, 0])): ModifyAccountPropertyEntityTypeTransaction {
        return new ModifyAccountPropertyEntityTypeTransaction($networkType,
            TransactionVersion::MODIFY_ACCOUNT_PROPERTY_ENTITY_TYPE,
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
                int $propertyType,
                Array $modifications,
                string $signature = "", 
                PublicAccount $signer = null, 
                TransactionInfo $ransactionInfo= null) {
    	$this->propertyType = $propertyType;
    	$this->modifications = $modifications;
        parent::__construct(TransactionType::MODIFY_ACCOUNT_PROPERTY_ENTITY_TYPE, $networkType, $version, $deadline, $maxFee, $signature, $signer, $transactionInfo);
    }

    /**
     * @override Transaction.size()
     * @description get the byte size of a ModifyAccountPropertyEntityTypeTransaction
     * @returns {number}
     * @memberof ModifyAccountPropertyEntityTypeTransaction
     */
    public function getsize(): int {
        $byteSize = super->size();

        // set static byte size fields
        $bytePropertyType = 1;
        $byteModificationCount = 1;

        // each modification contains :
        // - 1 byte for modificationType
        // - 2 bytes for the modification value (transaction type)
        $byteModifications = 3 * sizeof($this->modifications);

        return $byteSize + $bytePropertyType + $byteModificationCount + $byteModifications;
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

        $s->addPropertyType($this->propertyType);

        $modifications = [];
        foreach ($this->data->modifications as $key => $value) {
            array_merge($modifications,$value->toCatbuffer());
        }

        $s->addModifications($modifications);

        return $s->buildModifyAccountPropertyEntityTypeTransaction();
    }

}