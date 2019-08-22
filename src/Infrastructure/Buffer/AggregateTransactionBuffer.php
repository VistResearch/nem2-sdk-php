<?php

namespace NEM\Infrastructure\Buffer;

use NEM\Core\SerializeBase;
use NEM\util\Base32;
use NEM\Infrastructure\Buffer\TransactionBuffer;

class AggregateTransactionBuffer extends TransactionBuffer{
	const Elements = ["Version"
					,"Fee"
					,"Type"
					,"Deadline"
					,"Size"
					,"Signature"
					,"Signer"
					,"TransactionsSize"
					,"Transactions"];

	private $data;

	function __construct(){
		$this->data = [];
	}

	public function addTransactions(string $data){
		$this->data["TransactionsSize"] = SerializeBase::serializeUInt32(strlen($data));
		$this->data["Transactions"] = SerializeBase::serializeString($data);
	}

	public function build(){
		foreach (AccountLinkTransactionBuffer::Elements as $key) {
			if(!array_key_exists($key, $this->data) ){
				print("Error! Need ".$key." to be set.\n");
				return [];
			}		
		}

		$output = array_merge($this->data["Size"]
			,$this->data["Signature"]
			,$this->data["Signer"]
			,$this->data["Version"]
			,$this->data["Type"]
			,$this->data["Fee"]
			,$this->data["Deadline"]
			
			,$this->data["TransactionsSize"]
			,$this->data["Transactions"]);		

		return $output;
	}


}