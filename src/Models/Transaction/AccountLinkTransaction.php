<?php

namespace NEM\Models\Transaction;

use NEM\Models\Transaction\Transaction;
use NEM\Models\Transaction\TransactionVersion;
use NEM\Models\Transaction\Message;
use NEM\Models\Transaction\LinkAction;
use NEM\Models\Transaction\Deadline;
use NEM\Models\UInt64;
use NEM\Models\Account\PublicAccount;
use NEM\Models\Transaction\TransactionType;

use NEM\Infrastructure\Buffer\AccountLinkTransactionBuffer as Buffer;




class AccountLinkTransaction extends Transaction{

	
    public $remoteAccountKey;
    public $linkAction; 

    /**
     * Create a link account transaction object
     * @param deadline - The deadline to include the transaction.
     * @param remoteAccountKey - The public key of the remote account.
     * @param linkAction - The account link action.
     * @param maxFee - (Optional) Max fee defined by the sender
     * @returns {AccountLinkTransaction}
     */
    
	public static function create(Deadline $deadline,
                         string $remoteAccountKey,
                         int $linkAction,
                         int $networkType,
                         UInt64 $maxFee = new UInt64([0, 0])): AccountLinkTransaction {
        return new AccountLinkTransaction($networkType,
            TransactionVersion::LINK_ACCOUNT,
            $deadline,
            $maxFee,
            $remoteAccountKey,
            $linkAction);
    }

    function __construct(int $networkType, int $version, Deadline $deadline, UInt64 $maxFee, int $linkAction, string $remoteAccountKey, string $signature = "", PublicAccount $signer = null, TransactionInfo $ransactionInfo= null){
    	$this->networkType = $networkType;
	    $this->version = $version; 
	    $this->deadline = $deadline; 
	    $this->maxFee = $maxFee; 
	    $this->linkAction = $linkAction;
        $this->remoteAccountKey = $remoteAccountKey;

	    $this->signature = $signature; 
	    $this->signer = $signer; 
	    $this->transactionInfo = $transactionInfo; 


    	parent::__construct(TransactionVersion::TRANSFER, $networkType, $version, $deadline, $maxFee, $signature, $signer, $ransactionInfo);
    }

     /**
     * @override Transaction.size()
     * @description get the byte size of a TransferTransaction
     * @returns {number}
     * @memberof TransferTransaction
     */
    public function getsize(): int {
        $byteSize = parent->size;

        // set static byte size fields
        $bytePublicKey = 32;
        $byteLinkAction = 1;



        return $byteSize + $byteLinkAction + $bytePublicKey;
    }

    /**
     * @internal
     * @returns serialized tx 
     */
    protected function serialize(): Array {
    	$s = new Buffer();
    	$s->addDeadline($this->deadline->toDTO());
    	$s->addFee($this->maxFee->toDTO());
    	$s->addRemoteAccountKey($this->remoteAccountKey);
    	$s->addAccountLinkAction($this->linkAction);
        $s->addSignature($this->signature);
        $s->addType(TransactionType::LINK_ACCOUNT);
        $s->addSize(153);
        $s->addVersion($this->version);
        $s->addSigner($this->signer);

        return $s->build();
    }


}