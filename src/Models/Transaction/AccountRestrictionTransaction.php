<?php

namespace NEM\Models\Transaction;

use NEM\Models\UInt64;
use NEM\Models\Transaction\AccountAddressRestrictionModificationTransaction;
use NEM\Models\Account\RestrictionType;
use NEM\Models\Transaction\AccountMosaicRestrictionModificationTransaction;
use NEM\Models\Transaction\AccountOperationRestrictionModificationTransaction;
use NEM\Models\Transaction\AccountRestrictionModification;
use NEM\Models\Transaction\Deadline;
use NEM\Models\Transaction\TransactionType;
use NEM\Models\blockchain\NetworkType;


class AccountRestrictionTransaction {
    /**
     * Create an account address restriction transaction object
     * @param deadline - The deadline to include the transaction.
     * @param restrictionType - Type of account restriction transaction
     * @param modification - array of address modifications
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {AccountAddressRestrictionModificationTransaction}
     */
    public static function createAddressRestrictionModificationTransaction(
        Deadline $deadline,
        int $restrictionType,
        Array $modifications,
        int $networkType,
        UInt64 $maxFee = new UInt64([0, 0]),
    ): AccountAddressRestrictionModificationTransaction {
        if ($restrictionType != RestrictionType::AllowAddress && $restrictionType != RestrictionType::BlockAddress) {
            throw new Error ('Restriction type is not allowed.');
        }
        return AccountAddressRestrictionModificationTransaction::create(
            $deadline,
            $restrictionType,
            $modifications,
            $networkType,
            $maxFee,
        );
    }

    /**
     * Create an account mosaic restriction transaction object
     * @param deadline - The deadline to include the transaction.
     * @param restrictionType - Type of account restriction transaction
     * @param modification - array of mosaic modifications
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {AccountMosaicRestrictionModificationTransaction}
     */
    public static function createMosaicRestrictionModificationTransaction(
        Deadline $deadline,
        int $restrictionType,
        Array $modifications,
        int $networkType,
        UInt64 $maxFee = new UInt64([0, 0]),
    ): AccountMosaicRestrictionModificationTransaction {
    	if ($restrictionType != RestrictionType::AllowMosaic && $restrictionType != RestrictionType::BlockMosaic) {
            throw new Error('Restriction type is not allowed.');
        }
        return AccountMosaicRestrictionModificationTransaction::create(
            $deadline,
            $restrictionType,
            $modifications,
            $networkType,
            $maxFee,
        );
    }

    /**
     * Create an account operation restriction transaction object
     * @param deadline - The deadline to include the transaction.
     * @param restrictionType - Type of account restriction transaction
     * @param modification - array of operation modifications
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {createOperationRestrictionModificationTransaction}
     */
    public static function createOperationRestrictionModificationTransaction(
        Deadline $deadline,
        int $restrictionType,
        Array $modifications,
        int $networkType,
        UInt64 $maxFee = new UInt64([0, 0]),
    ): AccountOperationRestrictionModificationTransaction {
    	if ($restrictionType != RestrictionType::AllowTransaction && $restrictionType != RestrictionType::BlockTransaction) {
            throw new Error ('Restriction type is not allowed.');
        }
        return AccountOperationRestrictionModificationTransaction::create(
            $deadline,
            $restrictionType,
            $modifications,
            $networkType,
            $maxFee,
        );
    }
}