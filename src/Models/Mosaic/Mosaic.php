<?php

namespace NEM\Models\Mosaic;

use NEM\Models\UInt64;
use NEM\Models\Mosaic\MosaicId;
use NEM\Models\NEMnamespace\NamespaceId;

class Mosaic{
	public $amount; //UInt64
	public $id; // MosaicId or NamespaceId


	function __construct($id, UInt64 $amount){
        if($id instanceof MosaicId){
        }
        if(!($id instanceof MosaicId) && !($id instanceof NamespaceId)){
            throw new Exception("Wrong data type: Mosaic->id\n");
        }
        else{
            $this->amount = $amount;
            $this->id = $id;            
        }
	}

	public function toDTO(): Array {
        return ["amount" => $this->amount->toDTO(),
                "id" => $this->id->id->toDTO()];
    }

}