<?php

namespace NEM\Models\Transaction;

use NEM\Models\Account\Address;
use NEM\Models\Account\PublicAccount;
use NEM\Models\Blockchain\NetworkType;
use NEM\Models\Mosaic\Mosaic;
use NEM\Models\UInt64;
use NEM\Models\Transaction\Deadline;
use NEM\Models\Transaction\HashType;
use NEM\Models\Transaction\Transaction;
use NEM\Models\Transaction\TransactionInfo;
use NEM\Models\Transaction\TransactionType;
use NEM\Models\Transaction\TransactionVersion;

use NEM\Core\SerializeBase;
use NEM\Core\Buffer;

class SecretLockTransaction extends Transaction {

	public $secret;
	public $recipient;
	public $mosaic;
	public $hashType;
	public $duration;

    /**
     * Create a secret lock transaction object.
     *
     * @param deadline - The deadline to include the transaction.
     * @param mosaic - The locked mosaic.
     * @param duration - The funds lock duration.
     * @param hashType - The hash algorithm secret is generated with.
     * @param secret - The proof hashed.
     * @param recipient - The recipient of the funds.
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     *
     * @return a SecretLockTransaction instance
     */
    public static function create(Deadline $deadline,
                         Mosaic $mosaic,
                         UInt64 $duration,
                         int $hashType,
                         string $secret,
                         Address $recipient,
                         int $networkType,
                         UInt64 $maxFee = new UInt64([0, 0])): SecretLockTransaction {
        return new SecretLockTransaction(
            $networkType,
            TransactionVersion::SECRET_LOCK,
            $deadline,
            $maxFee,
            $mosaic,
            $duration,
            $hashType,
            $secret,
            $recipient,
        );
    }

    /**
     * @param networkType
     * @param version
     * @param deadline
     * @param maxFee
     * @param mosaic
     * @param duration
     * @param hashType
     * @param secret
     * @param recipient
     * @param signature
     * @param signer
     * @param transactionInfo
     */
    function __construct(int $networkType,
                int $version,
                Deadline $deadline,
                UInt64 $maxFee,
                /**
                 * The locked mosaic.
                 */
                Mosaic $mosaic,
                /**
                 * The duration for the funds to be released or returned.
                 */
                UInt64 $duration,
                /**
                 * The hash algorithm, secret is generated with.
                 */
                int $hashType,
                /**
                 * The proof hashed.
                 */
                string $secret,
                /**
                 * The recipient of the funds.
                 */
                Address $recipient,
                string $signature = "",
                PublicAccount $signer = null, 
                TransactionInfo $ransactionInfo= null) {

	  	$this->secret = $secret;
		$this->recipient = $recipient;
		$this->mosaic = $mosaic;
		$this->hashType = $hashType;
		$this->duration = $duration;	

        parent::__construct(TransactionType::SECRET_LOCK, $networkType, $version, $deadline, $maxFee, $signature, $signer, $transactionInfo);
        if (!HashTypeLengthValidator($hashType, $this->secret)) {
            throw new Error('HashType and Secret have incompatible length or not hexadecimal string');
        }
    }

    /**
     * @override Transaction.size()
     * @description get the byte size of a SecretLockTransaction
     * @returns {number}
     * @memberof SecretLockTransaction
     */
    public function size(): int {
        $byteSize = parent->size();

        // set static byte size fields
        $byteMosaicId = 8;
        $byteAmount = 8;
        $byteDuration = 8;
        $byteAlgorithm = 1;
        $byteRecipient = 25;

        // secret length
        $byteSecret = strlen($this->secret)/2;

        return $byteSize + $byteMosaicId + $byteAmount + $byteDuration + $byteAlgorithm + $byteRecipient + $byteSecret;
    }

    /**
     * @internal
     * @returns {VerifiableTransaction}
     */
    protected function serialize(): Array {
    	$s = new Serializer();
    	$s->addDeadline($this->deadline->toDTO());
    	$s->addVersion($this->versionToDTO());
    	$s->addType($this->type);
    	$s->addFee($this->maxFee->toDTO());
    	$s->addMosaic($this->mosaic->toDTO());
    	$s->addDuration($this->Duration->toDTO());
    	$s->addHashAlgorithm($this->hashType);
    	$s->addSecret($this->secret);
    	$s->addRecipient($this->recipient->plain());

        return $s->buildSecretLockTransaction();
    }

}