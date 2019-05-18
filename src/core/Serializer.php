<?php

namespace NEM\Core;

use NEM\Core\SerializeBase;
use NEM\util\Base32;

class Serializer{
	// All method return a list of int between 0 ~ 255
	const NULL_SENTINEL = 0xffffffff;
	const TransferTransactionElements = ["Recipient","MessageSize","Message","MosaicNum","Mosaic","Version","Fee","Deadline"]

	private $data;

	function __construct(){
		$this->data = [];
	}

	// Need Uint64 DTO Array as input
	public function addDeadline(Array $Dearline){
		$this->data.setAttribute("Deadline",SerializeBase::serializeUInt8($Deadline));
	}

	// Need Uint64 DTO Array as input
	public function addFee(Array $Fee){
		$this->data.setAttribute("Fee",SerializeBase::serializeUInt64($Fee));
	}

	// address as plain, ex: SB3KUBHATFCPV7UZQLWAQ2EUR6SIHBSBEOEDDDF3
	public function addRecipient(string $Address){
		$this->data.setAttribute("Recipient",Base32::decode($Address,"array"));
	}

	// int of version as input
	public function addVersion(int $version){
		$this->data.setAttribute("Version",[$version]);
	}

	//  Array created from msg DTO
	public function addMessage(Array $messageDTO){
		$msg = SerializeBase::serializeString($messageDTO["payload"]);
		array_push($msg, $messageDTO["type"]);
		$this->data.setAttribute("Message",$msg);
		$this->data.setAttribute("MessageSize",	[sizeof($msg) >> 8, sizeof($msg) % 256]);
	}

	//  Array of Mosaic DTO
	public function addMosaics(Array $mosaicArray){
		$this->data.setAttribute("Mosaic",$mosaicArray);
		$this->data.setAttribute("MosaicNum",sizeof($mosaicArra));
	}

	public function buildTransferTransaction(){
		foreach (self::TransferTransactionElements as $key => $value) {
			if (!array_key_exists($value,$this->data)){
				throw new Exception("Transfer Transaction need " . $value . " to be set.\n");
			}
		}
		$output = [];

		$type = array_merge([0,0,0,0],SerializeBase::parseInt(0X4154));
		$version = $this->data->Version;

		// Tx = SizePrefixedEntity(uint32) + VerifiableEntity(binary_fixed(64)) + EntityBody(binary_fixed(32) + version + type)\\
		$EntityBody = array_merge([0,0,0,0],$version,$type);
		$Transaction = array_merge([0,0,0,0],[0,0,0,0,0,0,0,0],$EntityBody);


		$Mosaic = []
		foreach ($this->data->Mosaic as $key => $value) {
			$M = [SerializeBase::serializeUInt64($value->id),
					SerializeBase::serializeUInt64($value->amonut)];
			array_merge($Mosaic,$M);

		}
		$TransferTransactionBody = array_merge($this->data->Recipient,
												$this->data->MessageSize,
												$this->data->MosaicNum,
												$this->data->Message,
												$Mosaic);

		array_merge($output, $version, $type, $Transaction, $TransferTransactionBody);
		return $TransferTransactionBody;
	}


}