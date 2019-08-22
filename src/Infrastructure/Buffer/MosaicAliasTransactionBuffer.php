<?php

namespace NEM\Infrastructure\Buffer;

use NEM\Core\SerializeBase;
use NEM\util\Base32;
use NEM\Infrastructure\Buffer\TransactionBuffer;

class MosaicAliasTransactionBuffer extends TransactionBuffer{
	const Elements = ["Version"
					,"Fee"
					,"Type"
					,"Deadline"
					,"Size"
					,"Signature"
					,"Signer"
					
					,"ActionType"
					,"NamespaceId"
					,"MosaicId"];

	private $data;

	function __construct(){
		$this->data = [];
	}



	public function addActionType(int $action){
		$this->data["ActionType"] = SerializeBase::serializeUInt8($action);
	}

	public function addMosaicId(Array $Id){
		$this->data["MosaicId"] = SerializeBase::serializeUInt64($Id);
	}

	public function addNamespaceId(Array $Id){
		$this->data["NamespaceId"] = SerializeBase::serializeUInt64($Id);
	}

	public function build(){
		foreach (AccountLinkTransactionBuffer::Elements as $key) {
			if(!array_key_exists($key, $this->data) ){
				print("Error! AccountLinkTransaction need ".$key." to be set.\n");
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
			,$this->data["MosaicId"]);		

		return $output;
	}

}