<?php
require_once dirname(__FILE__) ."\\..\\..\\innerLoader.php";

class MosaicId{

	public $id; // Id
	function __construct(Id $id){
		$this->$id = $id;
	}

	//  TODO : not sure how this work
    /**
     * Create a MosaicId for given `nonce` MosaicNonce and `owner` PublicAccount.
     *
     * @param   nonce   {MosaicNonce}
     * @param   owner   {Account}
     * @return  {MosaicId}
     */
    // public static function createFromNonce(MosaicNonce $nonce, PublicAccount $owner): MosaicId {
    //     $mosaicId = MosaicIdentifierGenerator(nonce.nonce, convert.hexToUint8(owner.publicKey));
    //     return new MosaicId($mosaicId);
    // }

	public function equals($data):bool{
		if ($data instanceof MosaicId) {
            return  $this->Id.equals($data->id);
        }
		return bool(false);
	}

	public function toHex(): string {
        return $this->id->toHex();
    }

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

 //    public function toCatbuffer(int $network_type){
 //    	// ignore networktype?
 //    	return Catbuffer::uInt64($this->id);
 //    }
}