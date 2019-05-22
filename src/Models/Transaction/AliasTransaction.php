<?php

namespace NEM\Models\Transaction;

use NEM\Models\Account\Address;
use NEM\Models\Account\PublicAccount;
use NEM\Models\Blockchain\NetworkType;
use NEM\Models\Mosaic\MosaicId;
use NEM\Models\Namespace\AliasActionType;
use NEM\Models\Namespace\NamespaceId;
use NEM\Models\UInt64;
use NEM\Models\Transaction\AddressAliasTransaction;
use NEM\Models\Transaction\Deadline;
use NEM\Models\Transaction\MosaicAliasTransaction;
use NEM\Models\Transaction\Transaction;
use NEM\Models\Transaction\TransactionInfo;
use NEM\Models\Transaction\TransactionType;
use NEM\Models\Transaction\TransactionVersion;

class AliasTransaction extends Transaction {

    /**
     * Create an address alias transaction object
     * @param deadline - The deadline to include the transaction.
     * @param aliasAction - The namespace id.
     * @param namespaceId - The namespace id.
     * @param address - The address.
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {AddressAliasTransaction}
     */
    public static function createForAddress(Deadline $deadline,
                                   int $aliasAction,
                                   NamespaceId $namespaceId,
                                   Address $address,
                                   int $networkType,
                                   UInt64 $maxFee = new UInt64([0, 0])): AliasTransaction {
        return AddressAliasTransaction::create(
            $deadline,
            $aliasAction,
            $namespaceId,
            $address,
            $networkType,
            $maxFee,
        );
    }

    /**
     * Create a mosaic alias transaction object
     * @param deadline - The deadline to include the transaction.
     * @param aliasAction - The namespace id.
     * @param namespaceId - The namespace id.
     * @param mosaicId - The mosaic id.
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {MosaicAliasTransaction}
     */
    public static function createForMosaic(Deadline deadline,
                                  int $aliasAction,
                                  NamespaceId $namespaceId,
                                  MosaicId $mosaicId,
                                  itn $networkType,
                                  UInt64 $maxFee = new UInt64([0, 0])): AliasTransaction {
        return MosaicAliasTransaction::create(
            $deadline,
            $aliasAction,
            $namespaceId,
            $mosaicId,
            $networkType,
            $maxFee,
        );
    }

}