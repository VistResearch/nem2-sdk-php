<?php

namespace NEM\Models\Transaction;

use NEM\Models\Account\PublicAccount;
use NEM\Models\Blockchain\NetworkType;
use NEM\Models\UInt64;
use NEM\Models\Transaction\Deadline;
use NEM\Models\Transaction\HashType;
use NEM\Models\Transaction\Transaction;
use NEM\Models\Transaction\TransactionInfo;
use NEM\Models\Transaction\TransactionType;
use NEM\Models\Transaction\TransactionVersion;

use NEM\Core\Buffer;

class SecretProofTransaction extends Transaction {

    public $proof;
    public $secret;
    public $hashType;

    /**
     * Create a secret proof transaction object.
     *
     * @param deadline - The deadline to include the transaction.
     * @param hashType - The hash algorithm secret is generated with.
     * @param secret - The seed proof hashed.
     * @param proof - The seed proof.
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     *
     * @return a SecretProofTransaction instance
     */
    public static function create(Deadline $deadline,
                         int $hashType,
                         string $secret,
                         string $proof,
                         int $networkType,
                         UInt64 $maxFee = new UInt64([0, 0])): SecretProofTransaction {
        return new SecretProofTransaction(
            $networkType,
            TransactionVersion::SECRET_PROOF,
            $deadline,
            $maxFee,
            $hashType,
            $secret,
            $proof
        );
    }

    /**
     * @param networkType
     * @param version
     * @param deadline
     * @param maxFee
     * @param hashType
     * @param secret
     * @param proof
     * @param signature
     * @param signer
     * @param transactionInfo
     */
    function __construct(int $networkType,
                int $version,
                Deadline $deadline,
                UInt64 $maxFee,
                int $hashType,
                string $secret,
                string $proof,
                string $signature = "",
                PublicAccount $signer = null, 
                TransactionInfo $ransactionInfo= null) {
        $this->hashType = $hashType;
        $this->secret = $secret;
        $this->proof = $proof;

        parent::__construct(TransactionType::SECRET_PROOF, $networkType, $version, $deadline, $maxFee, $signature, $signer, $transactionInfo);
        if (!HashTypeLengthValidator($hashType, $this->secret)) {
            throw new Error('HashType and Secret have incompatible length or not hexadecimal string');
        }
    }

    /**
     * @override Transaction.size()
     * @description get the byte size of a SecretProofTransaction
     * @returns {number}
     * @memberof SecretProofTransaction
     */
    public function size(): int {
        $byteSize = parent::size();

        // hash algorithm and proof size static byte size
        $byteAlgorithm = 1;
        $byteProofSize = 2;

        // convert secret and proof to uint8
        $byteSecret = strlen($this->secret)/2;
        $byteProof = strlen($this->proof)/2;

        return $byteSize + $byteAlgorithm + $byteSecret + $byteProofSize + $byteProof;
    }

    /**
     * @internal
     * @returns {VerifiableTransaction}
     */
    protected function serialize(): Array {
        $s = new Buffer();
        $s->addDeadline($this->deadline->toDTO());
        $s->addVersion($this->versionToDTO());
        $s->addType($this->type);
        $s->addFee($this->maxFee->toDTO());
        $s->addHashAlgorithm($this->hashType);
        $s->addSecret($this->secret);
        $s->addProof($this->proof);

        return $s->buildSecretProofTransaction();
    }

}