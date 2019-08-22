<?php

namespace NEM\Infrastructure\Buffer;

use NEM\Core\SerializeBase;
use NEM\util\Base32;
use NEM\Infrastructure\Buffer\TransactionBuffer;

class SecretProofTransactionBuffer extends TransactionBuffer{
	const Elements = ["Version"
					,"Fee"
					,"Type"
					,"Deadline"
					,"Size"
					,"Signature"
					,"Signer"
					
					,"HashAlgorithm"
					,"Secret"
					,"Recipient"
					,"ProofSize"
					,"Proof"];

	private $data;

	function __construct(){
		$this->data = [];
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

	public function addProof(string $proof){
		$this->data["Proof"] = unpack("C*",hex2bin($proof));
		$this->data["ProofSize"] = SerializeBase::serializeUInt16(sizeof($proof));
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
			
			,$this->data["HashAlgorithm"]
			,$this->data["Secret"]
			,$this->data["Recipient"]
			,$this->data["ProofSize"]
			,$this->data["Proof"]);		

		return $output;
	}

}