<?php
require_once dirname(__FILE__) ."\\..\\..\\innerLoader.php";

class Mosaic{
	public $amount; //UInt64
	public $id; // MosaicId or NamespaceId
	function __construct(UInt64 $amount,$id){
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



	// public function toDTO(): Array {
 //        $nameList =  get_class_vars(get_class($this));
 //        $Dto = [];
 //        foreach ($nameList as $key => $value) {
 //            $Dto[$key] = $this->$key;
 //        }
 //        return $Dto;
 //    }

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