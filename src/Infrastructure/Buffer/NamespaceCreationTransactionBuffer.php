<?php

namespace NEM\Infrastructure\Buffer;

use NEM\Core\SerializeBase;
use NEM\util\Base32;
use NEM\Infrastructure\Buffer\TransactionBuffer;

class NamespaceCreationTransactionBuffer extends TransactionBuffer{
	const Elements = ["Version"
					,"Fee"
					,"Type"
					,"Deadline"
					,"Size"
					,"Signature"
					,"Signer"
					
					,"NamespaceType"
					,"DurationParentId"
					,"NamespaceId"
					,"NamespaceNameSize"
					,"NamespaceName"];

	private $data;

	function __construct(){
		$this->data = [];
	}




	public function addNamespaceType(int $type){
		$this->data["NamespaceType"] = SerializeBase::serializeUInt8($type);
	}

	public function addNamespaceId(Array $Id){
		$this->data["NamespaceId"] = SerializeBase::serializeUInt64($Id);
	}

	public function addNamespaceName(string $name){
		$this->data["NamespaceName"] = SerializeBase::serializeString($name);
		$this->data["NamespaceNameSize"] = strlen($name);
	}

	public function addParentId(Array $Id){
		$this->data["DurationParentId"] = SerializeBase::serializeUInt64($Id);
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
			
			,$this->data["NamespaceType"]
			,$this->data["DurationParentId"]
			,$this->data["NamespaceId"]
			,$this->data["NamespaceNameSize"]
			,$this->data["NamespaceName"]);		

		return $output;
	}

}