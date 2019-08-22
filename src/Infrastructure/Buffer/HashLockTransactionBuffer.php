<?php

namespace NEM\Infrastructure\Buffer;

use NEM\Core\SerializeBase;
use NEM\util\Base32;
use NEM\Infrastructure\Buffer\TransactionBuffer;

class HashLockTransactionBuffer extends TransactionBuffer{
	const Elements = ["Version"
					,"Fee"
					,"Type"
					,"Deadline"
					,"Size"
					,"Signature"
					,"Signer"
					,"MosaicId"
					,"MosaicAmount"
					,"Duration"
					,"Hash"];

	private $data;

	function __construct(){
		$this->data = [];
	}



	public function addDuration(Array $Duration){
		if (sizeof($Duration) == 2){
			$this->data["Duration"] = SerializeBase::serializeUInt64($Duration);
		}
		
	}

	// Mosaic DTO
	public function addMosaic(Array $value){
		$this->data["MosaicId"] = SerializeBase::serializeUInt64($value["id"]);
		$this->data["MosaicAmount"] = SerializeBase::serializeUInt64($value["amonut"]);
	}


	public function addHash(string $hex){
		$hashArray = unpack("C*",hex2bin($hex))
		
		if(sizeof($hashArray) != 32){
			print("Error! Wrong Hash length.\n");
			return [];
		}
		$this->data["Hash"] = $hashArray;
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
			
			,$this->data["MosaicId"]
			,$this->data["MosaicAmount"]
			,$this->data["Duration"]
			,$this->data["Hash"]);		

		return $output;
	}


}