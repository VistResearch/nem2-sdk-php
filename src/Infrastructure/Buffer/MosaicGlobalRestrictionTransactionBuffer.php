<?php

namespace NEM\Infrastructure\Buffer;

use NEM\Core\SerializeBase;
use NEM\util\Base32;
use NEM\Infrastructure\Buffer\TransactionBuffer;

class MosaicGlobalRestrictionTransactionBuffer extends TransactionBuffer{
	const Elements = ["Version"
					,"Fee"
					,"Type"
					,"Deadline"
					,"Size"
					,"Signature"
					,"Signer"
					
					,"MosaicId"
					,"ReferenceMosaicId"
					,"RestrictionKey"
					,"PreviousRestrictionValue"
					,"PreviousRestrictionType"
					,"NewRestrictionValue"
					,"NewRestrictionType"];

	private $data;

	function __construct(){
		$this->data = [];
	}


	public function addMosaicId(Array $Id){
		$this->data["MosaicId"] = SerializeBase::serializeUInt64($Id);
	}

	public function addReferenceMosaicId(Array $Id){
		$this->data["ReferenceMosaicId"] = SerializeBase::serializeUInt64($Id);
	}

	public function addRestrictionKey(Array $Id){
		$this->data["RestrictionKey"] = SerializeBase::serializeUInt64($Id);
	}


	public function addPreviousRestrictionValue(Array $Id){
		$this->data["PreviousRestrictionValue"] = SerializeBase::serializeUInt64($Id);
	}

	public function addPreviousRestrictionType(int $type){
		$this->data["PreviousRestrictionType"] = SerializeBase::serializeUInt8($type);
	}

	public function addNewRestrictionValue(Array $Id){
		$this->data["NewRestrictionValue"] = SerializeBase::serializeUInt64($Id);
	}

	public function addNewRestrictionType(int $type){
		$this->data["NewRestrictionType"] = SerializeBase::serializeUInt8($type);
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