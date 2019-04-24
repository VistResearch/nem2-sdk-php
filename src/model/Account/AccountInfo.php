<?php

require_once dirname(__FILE__) ."\\..\\..\\innerLoader.php";

class AccountInfo{
    
    public $meta; //OptionalAccountMetadata;
    public $address; // Address
    public $addressHeight; // UInt64
    public $publicKey; // string
    public $publicKeyHeight; // UInt64
    public $mosaics; // Array of mosaics
    public $importance; // UInt64
    public $importanceHeight; // UInt64


    function __construct(AccountMetadata $meta,Adress $address,UInt64 $addressHeight, string $publicKey,
                         UInt64 $publicKeyHeight, Array $mosaics, UInt64 $importance, UInt64 $importanceHeight) {
        $this->meta = $meta;
        $this->address = $address;
        $this->addressHeight = $addressHeight;
        $this->publicKey = $publicKey;
        $this->publicKeyHeight = $publicKeyHeight;
        $this->mosaics = $mosaics;
        $this->importance = $importance;
        $this->importanceHeight = $importanceHeight;
    }

    // DTO part

    // public function toDTO(): Array {
    //     $nameList =  get_class_vars(get_class($this));
    //     $Dto = [];
    //     foreach ($nameList as $key => $value) {
    //         $Dto[$key] = $this->$key;
    //     }
    //     return $Dto;
    // }

    // public function FromDTO($DTOArray){
    //     foreach ($DTOArray as $key => $value) {
    //        $this->$key = $value;
    //     }
    //     return;
    // }
} 