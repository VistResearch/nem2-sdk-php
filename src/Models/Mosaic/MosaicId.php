<?php

namespace NEM\Models\Mosaic;

use NEM\Models\Id;
use NEM\Core\Identifier;
use NEM\Models\Mosaic\MosaicNonce;
use NEM\Models\Account\PublicAccount;

class MosaicId{

	public $id; // Id

	function __construct($id){
        if(is_array($id) && sizeof($id) == 2){
            $this->id = new Id($id);
        }
        else if ($id instanceof Id){
            $this->id = $id;
        }
        else{
            print("QQQ\n\n");
        }
	}

    /**
     * Create a MosaicId for given `nonce` MosaicNonce and `owner` PublicAccount.
     *
     * @param   nonce   {MosaicNonce}
     * @param   owner   {Account}
     * @return  {MosaicId}
     */
    public function createFromNonce(MosaicNonce $nonce, PublicAccount $owner): MosaicId {
        $mosaicId = Identifier::generateMosaicId($nonce->nonce, $owner->publicKey());
        return new MosaicId($mosaicId);
    }

	public function equals($data): bool{
		if ($data instanceof MosaicId) {
            return  $this->id->equals($data->id);
        }
		return bool(false);
	}

	public function toHex(): string {
        return $this->id->toHex();
    }

	public function toDTO(): Array {
        return $this->id->toDTO();
    }

}