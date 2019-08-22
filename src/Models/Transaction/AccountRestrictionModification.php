<?php

namespace NEM\Models\Transaction

use NEM\Models\Account\Address;
use NEM\Models\Account\RestrictionModificationType;
use NEM\Models\Mosaic\MosaicId;
use NEM\Models\Transaction\TransactionType;

class AccountRestrictionModification{

    /**
     * Constructor
     * @param modificationType
     * @param value
     */
    public $modificationType;
    public $value;
    public $type;

    protected function __construct(
                /**
                 * Modification type.
                 */
                int $modificationType,
                /**
                 * Modification value (Address, Mosaic or Transaction Type).
                 */
                $value,
                /**
                 * Address, Mosaic or Transaction Type
                 */
            	string $type) {

    	$this->modificationType = $modificationType;
    	$this->value = $value;
    	$this->type = $type;

    }

    /**
     * Create an address filter for account property modification
     * @param modificationType - modification type. 0: Add, 1: Remove
     * @param address - modification value (Address)
     * @returns {AccountPropertyModification}
     */
    public static function createForAddress(int $modificationType, Address $address)
    		: AccountRestrictionModification {
        return new AccountRestrictionModification($modificationType, $address->plain(),"Address");
    }
    /**
     * Create an mosaic filter for account property modification
     * @param modificationType - modification type. 0: Add, 1: Remove
     * @param mosaicId - modification value (Mosaic)
     * @returns {AccountPropertyModification}
     */
    public static function createForMosaic(int $modificationType,
                                MosaicId $mosaicId): AccountRestrictionModification{
        return new AccountRestrictionModification($modificationType, $mosaicId->id->toDTO(),"Mosaic");
    }

    /**
     * Create an entity type filter for account property modification
     * @param modificationType - modification type. 0: Add, 1: Remove
     * @param entityType - modification value (Transaction Type)
     * @returns {AccountPropertyModification}
     */
    public static function createForEntityType(int $modificationType,int $entityType): AccountRestrictionModification{
        return new AccountRestrictionModification($modificationType, $entityType, "Transaction Type");
    }

    /**
     * @internal
     */
    public function toDTO() {

        if ($this->value instanceof int){
            $m = $this->value;
        }
        else{
            $m = $this->value->toDTO();
        }
        return [
            "value" => $m,
            "modificationType" => $this->modificationType,
        ];
    }
}