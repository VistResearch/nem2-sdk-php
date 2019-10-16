<?php

namespace NEM\Models\Account;

use NEM\Models\Account\Addresss;
use NEM\Models\Account\PublicAccount;

class AccountInfo{
    
    public $address; // Address
    public $addressHeight; // UInt64
    public $publicKey; // string
    public $publicKeyHeight; // UInt64
    public $mosaics; // Array of mosaics
    public $importance; // UInt64
    public $importanceHeight; // UInt64


    function __construct(Adress $address,UInt64 $addressHeight, string $publicKey,
                         UInt64 $publicKeyHeight, Array $mosaics, UInt64 $importance, UInt64 $importanceHeight) {
        $this->address = $address;
        $this->addressHeight = $addressHeight;
        $this->publicKey = $publicKey;
        $this->publicKeyHeight = $publicKeyHeight;
        $this->mosaics = $mosaics;
        $this->importance = $importance;
        $this->importanceHeight = $importanceHeight;
    }

    public function publicAccount(): PublicAccount{
        return PublicAccount::createFromPublicKey($this->publicKey,$this->address->networkType);
    }

} 