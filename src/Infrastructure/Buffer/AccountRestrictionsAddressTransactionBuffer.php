<?php

namespace NEM\Infrastructure\Buffer;

use NEM\Core\SerializeBase;
use NEM\util\Base32;
use NEM\Infrastructure\Buffer\TransactionBuffer;

class AccountRestrictionsAddressTransactionBuffer extends TransactionBuffer{
	const Elements = ["Version"
					,"Fee"
					,"Type"
					,"Deadline"
					,"Size"
					,"Signature"
					,"Signer"
					,"RestrictionType"
					,"Modifications"
					,"ModificationsCount"];

	private $data;

	function __construct(){
		$this->data = [];
	}

	public function addModifications(Array $m){
		$length = [sizeof($m) & 0xff];
		$data = [];
		foreach ($m as $key => $value) {
			array_merge($data,$value);			
		}
		$this->data["Modifications"] = $data;
		$this->data["ModificationsCount"] = $length;
	}


	// input will only be 0 or 1
	public function addRestrictionType(int $action){
		$this->data["RestrictionType"] = SerializeBase::serializeUInt8($action);
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
			
			,$this->data["RestrictionType"]
			,$this->data["ModificationsCount"]
			,$this->data["Modifications"]);		

		return $output;
	}


}