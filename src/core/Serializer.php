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
	public function addDeadline(Array $Deadline){
		$this->data["Deadline"] = SerializeBase::serializeUInt8($Deadline);
	}

	// Need Uint64 DTO Array as input
	public function addFee(Array $Fee){
		$this->data["Fee"] = SerializeBase::serializeUInt64($Fee);
	}

	// address as plain, ex: SB3KUBHATFCPV7UZQLWAQ2EUR6SIHBSBEOEDDDF3
	public function addRecipient(string $Address){
		$this->data["Recipient"] = Base32::decode($Address,"array");
	}

	// int of version as input
	public function addVersion(int $version){
		$this->data["Version"] = [$version];
	}

	//  Array created from msg DTO
	public function addMessage(Array $messageDTO){
		$msg = SerializeBase::serializeString($messageDTO["payload"]);
		array_push($msg, $messageDTO["type"]);
		$this->data["Message"] = $msg;
		$this->data["MessageSize"] = [sizeof($msg) >> 8, sizeof($msg) % 256];
	}

	//  Array of Mosaic DTO
	public function addMosaics(Array $mosaicArray){
		$this->data["Mosaic"] = $mosaicArray;
		$this->data["MosaicNum"] = sizeof($mosaicArra);
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
		$Transaction = array_merge([0,0,0,0],[0,0,0,0,0,0,0,0],$EntityBody,$this->data->Fee,$this->ddata->Deadline);


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

	// input are public key string
	public function addRemoteAccountKey(string $key){
		$this->data["RemoteAccountKey"] = unpack("C*",hex2bin($key));

	}

	// input will only be 0 or 1
	public function addAccountLinkAction(int $action){
		$this->data["AccountLinkAction"] = SerializeBase::parseInt($action);
	}

	public function buildAccountLinkTransaction(){
		$this->data = [];

		$version = $this->data->Version;
		$type = array_merge([0,0,0,0],SerializeBase::parseInt(0x414C));

		$EntityBody = array_merge([0,0,0,0],$version,$type);
		$Transaction = array_merge([0,0,0,0],[0,0,0,0,0,0,0,0],$EntityBody,$this->data->Fee,$this->ddata->Deadline);


		$AccountLinkTransactionBody = array_merge($this->data->RemoteAccountKey,$this->data->AccountLinkAction);

		$this->data = array_merge($version,$type,$Transaction,$AccountLinkTransactionBody);

		return $AccountLinkTransactionBody;

	}


	public function addPropertyType(int $PropertyType){
		$this->data["PropertyType"] = $PropertyType;
	}

	public function buildAccountPropertiesAddressTransaction(){
		$this->data = [];

		$version = $this->data->Version;
		$type = array_merge([0,0,0,0],SerializeBase::parseInt(0x4150));

		$EntityBody = array_merge([0,0,0,0],$version,$type);
		$Transaction = array_merge([0,0,0,0],[0,0,0,0,0,0,0,0],$EntityBody,$this->data->Fee,$this->ddata->Deadline);


		$modificationsArray = [];
		foreach ($this->data->Modifications as $key => $value) {
			array_merge($modificationsArray, $value->modificationType);
			array_merge($modificationsArray, $value->value);
		}

		$AccountPropertyModificationTransactionBody = array_merge($this->data->PropertyType,SerializeBase::parseInt(sizeof($this->data->Modifications)),$modificationsArray);

		$tx = array_merge($version,$type,$Transaction,$AccountPropertyModificationTransactionBody);

		return $AccountPropertyModificationTransactionBody;
	}

	public function addMinApprovalDelta(int $l){
		$data = [$l & 0xff];
		$this->data["MinApprovalDelta"]  = $data;
	}

	public function addMinRemovalDelta(int $l){
		$data = [$l & 0xff];
		$this->data["MinRemovalDelta"] = $data;		
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

	public function buildModifyMultisigAccountTransaction(){
		$this->data = [];

		$version = $this->data->Version;
		$type = array_merge([0,0,0,0],SerializeBase::parseInt(0x4155));

		$EntityBody = array_merge([0,0,0,0],$version,$type);
		$Transaction = array_merge([0,0,0,0],[0,0,0,0,0,0,0,0],$EntityBody,$this->data->Fee,$this->ddata->Deadline);


		$ModifyMultisigAccountTransactionBody = array_merge($this->data->MinRemovalDelta,$this->data->MinApprovalDelta,$this->data->ModificationsCount,$this->data->Modifications);

		$tx = array_merge($version,$type,$Transaction,$ModifyMultisigAccountTransactionBody);

		return $AccountPropertyModificationTransactionBody;		
	}

	public function buildModifyAccountPropertyEntityTypeTransaction(){
		$this->data = [];

		$version = $this->data->Version;
		$type = array_merge([0,0,0,0],SerializeBase::parseInt(0x4350));

		$EntityBody = array_merge([0,0,0,0],$version,$type);
		$Transaction = array_merge([0,0,0,0],[0,0,0,0,0,0,0,0],$EntityBody,$this->data->Fee,$this->ddata->Deadline);


		$modificationsArray = [];
		foreach ($this->data->Modifications as $key => $value) {
			array_merge($modificationsArray, $value->modificationType);
			array_merge($modificationsArray, $value->value);
		}

		$AccountPropertyModificationTransactionBody = array_merge($this->data->PropertyType,SerializeBase::parseInt(sizeof($this->data->Modifications)),$modificationsArray);

		$tx = array_merge($version,$type,$Transaction,$AccountPropertyModificationTransactionBody);

		return $AccountPropertyModificationTransactionBody;
	}

}