<?php

namespace NEM\Models\Transaction

use NEM\Models\Account\Address;
use NEM\Models\Account\PropertyModificationType;
use NEM\Models\Mosaic\MosaicId;
use NEM\Models\Transaction\TransactionType;

class AccountPropertyModification{

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
    		: AccountPropertyModification {
        return new AccountPropertyModification($modificationType, $address->plain(),"Address");
    }
    /**
     * Create an mosaic filter for account property modification
     * @param modificationType - modification type. 0: Add, 1: Remove
     * @param mosaicId - modification value (Mosaic)
     * @returns {AccountPropertyModification}
     */
    public static function createForMosaic(int $modificationType,
                                MosaicId $mosaicId): AccountPropertyModification{
    return new AccountPropertyModification($modificationType, $mosaicId->id->toDTO(),"Mosaic");
    }

    /**
     * Create an entity type filter for account property modification
     * @param modificationType - modification type. 0: Add, 1: Remove
     * @param entityType - modification value (Transaction Type)
     * @returns {AccountPropertyModification}
     */
    public static function createForEntityType(int $modificationType,int $entityType): AccountPropertyModification{
    return new AccountPropertyModification($modificationType, $entityType, "Transaction Type");
    }

    // /**
    //  * @internal
    //  */
    // toDTO() {
    //     return {
    //         value: this.value,
    //         modificationType: this.modificationType,
    //     };
    // }
}