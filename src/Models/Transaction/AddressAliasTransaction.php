<?php

namespace NEM\Models\Transaction;

use NEM\Models\Account\Address;
use NEM\Models\Account\PublicAccount;
use NEM\Models\BlockchainNetworkType;
use NEM\Models\Namespace\AliasActionType;
use NEM\Models\Namespace\NamespaceId;
use NEM\Models\UInt64;
use NEM\Models\Transaction\Deadline;
use NEM\Models\Transaction\Transaction;
use NEM\Models\Transaction\TransactionInfo;
use NEM\Models\Transaction\TransactionType;
use NEM\Models\Transaction\TransactionVersion;

use NEM\Infrastructure\Buffer\AddressAliasTransactionBuffer as Buffer;

/**
 * In case a mosaic has the flag 'supplyMutable' set to true, the creator of the mosaic can change the supply,
 * i.e. increase or decrease the supply.
 */
class AddressAliasTransaction extends Transaction {

	public $actionType;
	public $namespaceId;
	public $address;

    /**
     * Create a address alias transaction object
     * @param deadline - The deadline to include the transaction.
     * @param actionType - The alias action type.
     * @param namespaceId - The namespace id.
     * @param address - The address.
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {AddressAliasTransaction}
     */
    public static function create(Deadline $deadline,
                         int $actionType,
                         NamespaceId $namespaceId,
                         Address $address,
                         int $networkType,
                         UInt64 $maxFee = new UInt64([0, 0])): AddressAliasTransaction {
        return new AddressAliasTransaction($networkType,
            TransactionVersion::ADDRESS_ALIAS,
            $deadline,
            $maxFee,
            $actionType,
            $namespaceId,
            $address,
        );
    }

    /**
     * @param networkType
     * @param version
     * @param deadline
     * @param maxFee
     * @param actionType
     * @param namespaceId
     * @param address
     * @param signature
     * @param signer
     * @param transactionInfo
     */
    function __construct(int $etworkType,
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
                Address $address,
                string $signature = "",
                PublicAccount $signer = null, 
                TransactionInfo $ransactionInfo= null) {
    	$this->actionType = $actionType;
    	$this->namespaceId = $namespaceId;
    	$this->address = $address;
        parent::__construct(TransactionType::ADDRESS_ALIAS, $networkType, $version, $deadline, $maxFee, $signature, $signer, $transactionInfo);
    }

    /**
     * @override Transaction.size()
     * @description get the byte size of a AddressAliasTransaction
     * @returns {number}
     * @memberof AddressAliasTransaction
     */
    public function size(): int {
        $byteSize = parent::size();

        // set static byte size fields
        $byteActionType = 1;
        $byteNamespaceId = 8;
        $byteAddress = 25;

        return $byteSize + $byteActionType + $byteNamespaceId + $byteAddress;
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
        $s->addType(TransactionType::ADDRESS_ALIAS);
        $s->addSize(154);
        $s->addVersion($this->version);
        $s->addSigner($this->signer);

        $s->addActionType($this->actionType);
        $s->addNamespaceId($this->namespaceId->id->toDTO());
        $s->addAddress($this->address->plain());



        return $s->build();
    }

}