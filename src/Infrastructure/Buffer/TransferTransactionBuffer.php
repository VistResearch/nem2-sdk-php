<?php

namespace NEM\Infrastructure\Buffer;

use NEM\Core\SerializeBase;
use NEM\util\Base32;
use NEM\Infrastructure\Buffer\TransactionBuffer;

class TransferTransactionBuffer extends TransactionBuffer{
	const Elements = ["Version"
					,"Fee"
					,"Type"
					,"Deadline"
					,"Size"
					,"Signature"
					,"Signer"

					,"Recipient"
					,"MosaicNum"
					,"MessageSize"
					,"Message"
					,"Mosaics"];



	// function __construct(){
	// 	$this->data = [];
	// }

	//  Array of Mosaic DTO
	public function addMosaics(Array $mosaicArray){

		$Mosaics = [];
		foreach ($mosaicArray as $key => $m) {
			$Mosaics = array_merge($Mosaics, SerializeBase::serializeUInt64($m["id"],true), SerializeBase::serializeUInt64($m["amount"],true));
		}
		$this->data["Mosaics"] = $Mosaics;

		$this->data["MosaicNum"] = SerializeBase::serializeUInt8(sizeof($mosaicArray),true);
	}

	public function addMessage(Array $messageDTO){
		$payload = SerializeBase::serializeString($messageDTO["payload"]);
		$msg = array_merge([$messageDTO["type"]], $payload);
		$this->data["Message"] = $msg;
		$this->data["MessageSize"] = [sizeof($msg) % 256, sizeof($msg) >> 8];
	}

	// address as plain, ex: SB3KUBHATFCPV7UZQLWAQ2EUR6SIHBSBEOEDDDF3
	public function addRecipient(string $Address){
		$this->data["Recipient"] = Base32::decode($Address,"array");
	}


	public function build(){
		
		foreach (TransferTransactionBuffer::Elements as $key) {
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
			
			,$this->data["Recipient"]
			,$this->data["MessageSize"]
			,$this->data["MosaicNum"]				
			,$this->data["Message"]
			,$this->data["Mosaics"]);		

		return $output;
	}


}