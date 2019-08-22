<?php

namespace NEM\Infrastructure\Buffer;

use NEM\Core\SerializeBase;
use NEM\util\Base32;
use NEM\Infrastructure\Buffer\TransactionBuffer;

class AddressAliasTransactionBuffer extends TransactionBuffer{
	const Elements = ["Version"
					,"Fee"
					,"Type"
					,"Deadline"
					,"Size"
					,"Signature"
					,"Signer"
					,"ActionType"
					,"NamespaceId"
					,"Address"];

	private $data;

	function __construct(){
		$this->data = [];
	}

	public function addActionType(int $action){
		$this->data["ActionType"] = SerializeBase::serializeUInt8($action);
	}

	public function addNamespaceId(Array $Id){
		$this->data["NamespaceId"] = SerializeBase::serializeUInt64($Id);
	}

	public function addAddress(string $Address){
		$this->data["Address"] = Base32::decode($Address,"array");
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
			
			,$this->data["ActionType"]
			,$this->data["NamespaceId"]
			,$this->data["Address"]);		

		return $output;
	}


}