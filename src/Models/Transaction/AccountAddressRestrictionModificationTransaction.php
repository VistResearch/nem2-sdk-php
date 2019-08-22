<?php

namespace NEM\Models\Transaction;

use NEM\Models\Transaction\Transaction;
use NEM\Models\Transaction\TransactionVersion;
use NEM\Models\Transaction\Message;
use NEM\Models\Transaction\Deadline;
use NEM\Models\Transaction\AccountPropertyModification;
use NEM\Models\UInt64;
use NEM\Models\Account\PublicAccount;
use NEM\Models\Account\PropertyType;

use NEM\Infrastructure\Buffer\AccountRestrictionsAddressTransactionBuffer as Buffer;




class AccountAddressRestrictionModificationTransaction extends Transaction{

	
    public $modifications;
    public $restrictionType;

    /**
     * Create a modify account property address transaction object
     * @param deadline - The deadline to include the transaction.
     * @param propertyType - The account property type.
     * @param modifications - The array of modifications.
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {ModifyAccountPropertyAddressTransaction}
     */
    
	public static function create(Deadline $deadline,
                         int $restrictionType,
                         Array $modifications,
                         int $networkType,
                         UInt64 $maxFee = new UInt64([0, 0])): ModifyAccountPropertyAddressTransaction {
        return new AccountAddressRestrictionModificationTransaction($networkType,
            TransactionVersion::MODIFY_ACCOUNT_PROPERTY_ADDRESS,
            $deadline,
            $maxFee,
            $restrictionType,
            $modifications);
    }

    function __construct(int $networkType, int $version, Deadline $deadline, UInt64 $maxFee, int $restrictionType, Array $modifications, string $signature = "", PublicAccount $signer = null, TransactionInfo $ransactionInfo= null){
    	$this->networkType = $networkType;
	    $this->version = $version; 
	    $this->deadline = $deadline; 
	    $this->maxFee = $maxFee; 
	    $this->modifications = $modifications;
        $this->restrictionType = $restrictionType;

	    // $this->signature = $signature; 
	    // $this->signer = $signer; 
	    // $this->transactionInfo = $transactionInfo; 


    	parent::__construct(TransactionVersion::MODIFY_ACCOUNT_PROPERTY_ADDRESS, $networkType, $version, $deadline, $maxFee, $signature, $signer, $transactionInfo);
    }

    /**
     * @override Transaction.size()
     * @description get the byte size of a ModifyAccountPropertyAddressTransaction
     * @returns {number}
     * @memberof ModifyAccountPropertyAddressTransaction
     */
    public function getsize(): int {
        $byteSize = parent->size;

    
        // set static byte size fields
        $bytePropertyType = 1;
        $byteModificationCount = 1;

        // each modification contains :
        // - 1 byte for modificationType
        // - 25 bytes for the modification value (address)
        $byteModifications = 26 * sizeof($this->modifications);


        return $byteSize + $bytePropertyType + $byteModificationCount + $byteModifications;
    }

    /**
     * @internal
     * @returns serialized tx 
     */
    protected function serialize(): Array {
        $s = new Buffer();
        $s->addDeadline($this->deadline->toDTO());
        $s->addFee($this->maxFee->toDTO());
        $s->addSignature($this->signature);
        $s->addType(TransactionType::MODIFY_ACCOUNT_PROPERTY_ADDRESS);
        $s->addSize(154);
        $s->addVersion($this->version);
        $s->addSigner($this->signer);

        $modifications = [];
        foreach ($this->modifications as $key => $value) {
            array_merge($modifications,$value->toCatbuffer());
        }

        $s->addModifications($modifications);
        $s->addRestrictionType($this->restrictionType);

        return $s->build();
    }


}