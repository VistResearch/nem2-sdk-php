<?php

namespace NEM\Infrastructure\Buffer;

use NEM\Core\SerializeBase;
use NEM\util\Base32;
use NEM\Infrastructure\Buffer\TransactionBuffer;

class AccountLinkTransactionBuffer extends TransactionBuffer{
	const Elements = ["Version"
					,"Fee"
					,"Type"
					,"Deadline"
					,"Size"
					,"Signature"
					,"Signer"
					,"RemoteAccountKey"
					,"AccountLinkAction"];

	private $data;

	function __construct(){
		$this->data = [];
	}

	// input are public key string
	public function addRemoteAccountKey(string $key){
		$this->data["RemoteAccountKey"] = unpack("C*",hex2bin($key));

	}

	// input will only be 0 or 1
	public function addAccountLinkAction(int $action){
		$this->data["AccountLinkAction"] = SerializeBase::serializeUInt8($action);
	}

	public function build(){
		foreach (AccountLinkTransactionBuffer::Elements as $key) {
			if(!array_key_exists($key, $this->data) ){
				print("Error! AddressAliasTransaction need ".$key." to be set.\n");
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
			
			,$this->data["RemoteAccountKey"]
			,$this->data["AccountLinkAction"]);		

		return $output;
	}


}