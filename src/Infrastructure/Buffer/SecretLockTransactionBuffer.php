<?php

namespace NEM\Infrastructure\Buffer;

use NEM\Core\SerializeBase;
use NEM\util\Base32;
use NEM\Infrastructure\Buffer\TransactionBuffer;

class SecretLockTransactionBuffer extends TransactionBuffer{
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
					,"HashAlgorithm"
					,"Secret"
					,"Recipient"];

	private $data;

	function __construct(){
		$this->data = [];
	}


	// Mosaic DTO
	public function addMosaic(Array $value){
		$this->data["MosaicId"] = SerializeBase::serializeUInt64($value["id"]);
		$this->data["MosaicAmount"] = SerializeBase::serializeUInt64($value["amonut"]);
	}


	public function addDuration(Array $Duration){
		if (sizeof($Duration) == 2){
			$this->data["Duration"] = SerializeBase::serializeUInt64($Duration);
		}		
	}


	public function addHashAlgorithm(int $al){
		$this->data["HashAlgorithm"] = [$al & 0xff];
	}


	public function addSecret(string $secret){
		$this->data["Secret"] = array_reverse(unpack("C*",hex2bin($secret)));
	}


	// address as plain, ex: SB3KUBHATFCPV7UZQLWAQ2EUR6SIHBSBEOEDDDF3
	public function addRecipient(string $Address){
		$this->data["Recipient"] = Base32::decode($Address,"array");
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
			,$this->data["HashAlgorithm"]
			,$this->data["Secret"]
			,$this->data["Recipient"]);		

		return $output;
	}

}