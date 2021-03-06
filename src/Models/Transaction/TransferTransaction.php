<?php

namespace NEM\Models\Transaction;

use NEM\Models\Transaction\Transaction;
use NEM\Models\Transaction\TransactionVersion;
use NEM\Models\Transaction\Message;
use NEM\Models\Transaction\Deadline;
use NEM\Models\UInt64;
use NEM\Models\Account\PublicAccount;
use NEM\Core\SerializeBase;

use NEM\Infrastructure\Buffer\TransferTransactionBuffer as Buffer;



class TransferTransaction extends Transaction{

	
    public $networkType;
    public $version; 
    public $deadline; 
    public $maxFee; 
    public $recipient; 
    public $mosaics; 
    public $message; 
    public $signature; 
    public $signer; 
    public $transactionInfo; 

    /**
     * Create a transfer transaction object
     * @param deadline - The deadline to include the transaction.
     * @param recipient - The recipient of the transaction.
     * @param mosaics - The array of mosaics.
     * @param message - The transaction message.
     * @param networkType - The network type.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {TransferTransaction}
     */
    
	static function create(Deadline $deadline,
                         $recipient,
                         Array $mosaics,
                         Message $message,
                         int $networkType,
                         UInt64 $maxFee = null): TransferTransaction {
        if ($maxFee == null){
            $maxFee = new UInt64([0,0]);
        }
        return new TransferTransaction($networkType,
            TransactionVersion::TRANSFER,
            $deadline,
            $maxFee,
            $recipient,
            $mosaics,
            $message);
    }

    function __construct(int $networkType, int $version, Deadline $deadline, UInt64 $maxFee, $recipient,
    	Array $mosaics, Message $message, string $signature = "", PublicAccount $signer = null, TransactionInfo $transactionInfo= null){
    	$this->networkType = $networkType;
	    $this->version = $version; 
	    $this->deadline = $deadline; 
	    $this->maxFee = $maxFee; 
	    $this->recipient = $recipient; 
	    $this->mosaics = $mosaics; 
	    $this->message = $message; 
	    $this->signature = $signature; 
	    $this->signer = $signer; 
	    $this->transactionInfo = $transactionInfo; 


    	parent::__construct(TransactionType::TRANSFER, $networkType, $version, $deadline, $maxFee, $signature, $signer, $transactionInfo);
    }

    /**
     * Return the string notation for the set recipient
     * @internal
     * @returns {string}
     */
    public function recipientToString(): string {

        if ($this->recipient instanceof NamespaceId) {
            // namespaceId recipient, return hexadecimal notation
            return $this->recipient.toHex();
        }

        // address recipient
        return $this->recipient.plain();
    }
     /**
     * @override Transaction.size()
     * @description get the byte size of a TransferTransaction
     * @returns {number}
     * @memberof TransferTransaction
     */
    public function size(): int {
        $byteSize = parent::size();

        // recipient and number of mosaics are static byte size
        $byteRecipient = 25;
        $byteNumMosaics = 2;

        // read message payload size
        $bytePayload = sizeof(SerializeBase::serializeString($this->message->payload));

        // mosaicId / namespaceId are written on 8 bytes
        $byteMosaics = 8 * sizeof($this->mosaics);

        return $byteSize + $byteRecipient + $byteNumMosaics + $bytePayload + $byteMosaics;
    }

    /**
     * @internal
     * @returns serialized tx 
     */
    public function serialize(): Array {
        $s = new Buffer();
        $s->addDeadline($this->deadline->toDTO());
        $s->addFee($this->maxFee->toDTO());
        $s->addSignature($this->signature);
        $s->addType(TransactionType::TRANSFER);
        
        $s->addVersion($this->versionToDTO());
        $s->addSigner($this->signer);

    	$m = [];
    	for($i = 0; $i < sizeof($this->mosaics); $i += 1) {
    		array_push ($m, $this->mosaics[$i]->toDTO());
    	}

        $s->addRecipient($this->recipient->plain());
    	$s->addMosaics($m);
    	$s->addMessage($this->message->toDTO());

        $s->addSize(149 + 16*sizeof($this->mosaics) + sizeof(SerializeBase::serializeString($this->message->payload)));
        return $s->build();
    }


}

