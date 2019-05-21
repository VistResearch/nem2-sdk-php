<?php

namespace NEM\Models\Transaction;

use NEM\Models\Account\PublicAccount;
use NEM\Models\Blockchain\NetworkType;
use NEM\Models\Namespace\NamespaceId;
use NEM\Models\Namespace\NamespaceType;
use NEM\Models\UInt64;
use NEM\Models\Transaction\Deadline;
use NEM\Models\Transaction\Transaction;
use NEM\Models\Transaction\TransactionInfo;
use NEM\Models\Transaction\TransactionType;
use NEM\Models\Transaction\TransactionVersion;
use NEM\Core\Identifier;
use NEM\Core\Serializer;

/**
 * Accounts can rent a namespace for an amount of blocks and after a this renew the contract.
 * This is done via a RegisterNamespaceTransaction.
 */
class RegisterNamespaceTransaction extends Transaction {

	public $duration;
	public $namespaceName;
	public $namespaceType;
	public $namespaceId;
	public $parentId;
    /**
     * Create a root namespace object
     * @param deadline - The deadline to include the transaction.
     * @param namespaceName - The namespace name.
     * @param duration - The duration of the namespace.
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {RegisterNamespaceTransaction}
     */
    public static function createRootNamespace(Deadline $deadline,
                                      string $namespaceName,
                                      UInt64 $duration,
                                      int $networkType,
                                      UInt64 $maxFee = new UInt64([0, 0])): RegisterNamespaceTransaction {
        return new RegisterNamespaceTransaction($networkType,
            TransactionVersion::REGISTER_NAMESPACE,
            $deadline,
            $maxFee,
            NamespaceType::RootNamespace,
            $namespaceName,
            new NamespaceId($namespaceName),
            $duration,
        );
    }

    /**
     * Create a sub namespace object
     * @param deadline - The deadline to include the transaction.
     * @param namespaceName - The namespace name.
     * @param parentNamespace - The parent namespace name.
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {RegisterNamespaceTransaction}
     */
    public static function createSubNamespace(Deadline $deadline,
                                     string $namespaceName,
                                     $parentNamespace,  // tring | NamespaceId
                                     int $networkType,
                                     UInt64 $maxFee = new UInt64([0, 0])): RegisterNamespaceTransaction {
        // let parentId: NamespaceId;
        if (is_string ($parentNamespace)) {
            $parentId = new NamespaceId(Identifier::generateSubNamespaceId($parentNamespace, $namespaceName));
        } else {
            $parentId = $parentNamespace;
        }
        return new RegisterNamespaceTransaction($networkType,
            TransactionVersion::REGISTER_NAMESPACE,
            $deadline,
            $maxFee,
            NamespaceType::SubNamespace,
            $namespaceName,
            is_string ($parentNamespace) ?
                new NamespaceId(Identifier::generateSubNamespaceId($parentNamespace, $namespaceName)) :
                new NamespaceId(Identifier::generateNamespaceId($namespaceName)),
            null,
            $parentId
        );
    }

    /**
     * @param networkType
     * @param version
     * @param deadline
     * @param maxFee
     * @param namespaceType
     * @param namespaceName
     * @param namespaceId
     * @param duration
     * @param parentId
     * @param signature
     * @param signer
     * @param transactionInfo
     */
    function __construct($networkType,
                int $version,
                Deadline $deadline,
                UInt64 $maxFee,
                /**
                 * The namespace type could be namespace or sub namespace
                 */
                int $namespaceType,
                /**
                 * The namespace name
                 */
                string $namespaceName,
                /**
                 * The id of the namespace derived from namespaceName.
                 * When creating a sub namespace the namespaceId is derived from namespaceName and parentName.
                 */
                NamespaceId $namespaceId,
                /**
                 * The number of blocks a namespace is active
                 */
                UInt64 $duration = null,
                /**
                 * The id of the parent sub namespace
                 */
                NamespaceId $parentId = null,
                string $signature = "",
                PublicAccount $signer = null, 
                TransactionInfo $ransactionInfo= null) {

    	$this->namespaceId = $namespaceId;
    	$this->namespaceName = $namespaceName;
    	$this->namespaceType = $namespaceType;
    	$this->parentId = $parentId;
    	$this->duration = $duration;

        parent::__construct(TransactionType::REGISTER_NAMESPACE, $networkType, $version, $deadline, $maxFee, $signature, $signer, $transactionInfo);
    }

    /**
     * @override Transaction.size()
     * @description get the byte size of a RegisterNamespaceTransaction
     * @returns {number}
     * @memberof RegisterNamespaceTransaction
     */
    public size(): int {
        $byteSize = parent::size();

        // set static byte size fields
        $byteType = 1;
        $byteDurationParentId = 8;
        $byteNamespaceId = 8;
        $byteNameSize = 1;

        // convert name to uint8
        $byteName = strlen($this->namespaceName);

        return $byteSize + $byteType + $byteDurationParentId + $byteNamespaceId + $byteNameSize + $byteName;
    }

    /**
     * @internal
     * @returns {VerifiableTransaction}
     */
    protected serialize(): VerifiableTransaction {

    	$s = new Serializer();
    	$s->addDeadline($this->deadline->toDTO());
    	$s->addFee($this->maxFee->toDTO());
    	$s->addVersion($this->versionToDTO());

    	$s->addNamespaceType($this->namespaceType);
    	$s->addNamespaceId($this->namespaceId->id->toDTO());
    	$s->addNamespaceName($this->namespaceName);



        if ($this->namespaceType === NamespaceType::RootNamespace) {
            $s->addDuration($this->duration->toDTO());
        } else {
            $s->addParentId($this->parentId->id->toDTO());
        }

        return $s->buildRegisterNamespaceTransaction();
    }

}