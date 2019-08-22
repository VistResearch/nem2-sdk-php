<?php

namespace NEM\Infrastructure\Buffer;

use NEM\Core\SerializeBase;
use NEM\util\Base32;
use NEM\Infrastructure\Buffer\TransactionBuffer;

class MosaicCreationTransactionBuffer extends TransactionBuffer{
	const Elements = ["Version"
					,"Fee"
					,"Type"
					,"Deadline"
					,"Size"
					,"Signature"
					,"Signer"
					
					,"Nonce"
					,"MosaicId"
					,"NumOptionalProperties"
					,"MosaicFlag"
					,"Divisibility"
					,"indicateDuration"
					,"Duration"];

	private $data;

	function __construct(){
		$this->data = [];
	}




	public function addDivisibility(int $div){
		$this->data["Divisibility"] = SerializeBase::serializeUInt8($div);
	}

	public function addNonce(Array $Nonce){
		$this->data["Nonce"] = $Nonce;
	}

	public function addMosaicProperties(int $flag){
		$this->data["MosaicFlag"] = SerializeBase::serializeUInt8($flag);
	}

	public function addMosaicId(Array $Id){
		$this->data["MosaicId"] = SerializeBase::serializeUInt64($Id);
	}

	public function addDuration(Array $Duration){
		if (sizeof($Duration) == 2){
			$this->data["Duration"] = SerializeBase::serializeUInt64($Duration);
			$this->data["indicateDuration"] = [2];
			$this->data["NumOptionalProperties"] = [1];
		}		
		else{
			$this->data["Duration"] = [];
			$this->data["NumOptionalProperties"] = [0];
			$this->data["indicateDuration"] = [];
		} 
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
			
			,$this->data["Nonce"]
			,$this->data["MosaicId"]
			,$this->data["NumOptionalProperties"]
			,$this->data["MosaicFlag"]
			,$this->data["Divisibility"]
			,$this->data["indicateDuration"]
			,$this->data["Duration"]);		

		return $output;
	}

}