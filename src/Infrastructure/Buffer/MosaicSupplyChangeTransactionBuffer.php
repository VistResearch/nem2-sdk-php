<?php

namespace NEM\Infrastructure\Buffer;

use NEM\Core\SerializeBase;
use NEM\util\Base32;
use NEM\Infrastructure\Buffer\TransactionBuffer;

class MosaicSupplyChangeTransactionBuffer extends TransactionBuffer{
	const Elements = ["Version"
					,"Fee"
					,"Type"
					,"Deadline"
					,"Size"
					,"Signature"
					,"Signer"
					
					,"MosaicId"
					,"Direction"
					,"Delta"];

	private $data;

	function __construct(){
		$this->data = [];
	}


	public function addMosaicId(Array $Id){
		$this->data["MosaicId"] = SerializeBase::serializeUInt64($Id);
	}

	public function addDirection(int $action){
		$this->data["Direction"] = SerializeBase::serializeUInt8($action);
	}
	public function addDelta(Array $delta){
		$this->data["Delta"] = SerializeBase::serializeUInt64($delta);
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
			,$this->data["Direction"]
			,$this->data["Delta"]);		

		return $output;
	}

}