<?php

namespace NEM\Models\Mosiac;

use NEM\Models\UInt64;
use NEM\Models\Mosiac\MosaicId;
use NEM\Models\Namespace\NamespaceId;

class Mosaic{
	public $amount; //UInt64
	public $id; // MosaicId or NamespaceId


	function __construct(UInt64 $amount, $id){
        if(!($id instanceof MosaicId || $id instanceof NamespaceId)){
            throw new Exception("Wrong data type: Mosaic->id\n");
        }
        else{
            $this->amonut = $amount;
            $this->$id = $id;            
        }
	}


 //    public function toCatbuffer(int $network_type = null){
 //        $mosaic_id = $this->id->to_catbuffer($network_type);
 //        $amount = Catbuffer::uInt64_encode($this->amount);
 //        return $mosaic_id . $amount;
 //    }



	public function toDTO(): Array {
        return ["amonut" => $this->amount.toDTO(),
                "id" => $this->id->id->toDTO()]
    }

 //    public function FromDTO($DTOArray){
 //        foreach ($DTOArray as $key => $value) {
 //           $this->$key = $value;
 //        }
 //        return;
 //    }

 //    static function fromCatbuffer($data,int $network_type = null): Mosaic{
 //        $ar = Catbuffer::uInt64_decode($data);
 //        $mosaic_id = $ar[1];
 //        $amount = $ar[2];
 //        return new Mosaic($amount, new MosaicId($mosaic_id));
 //    }

}