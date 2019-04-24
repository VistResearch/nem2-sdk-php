<?php

require_once dirname(__FILE__) ."\\..\\..\\innerLoader.php";



class BlockInfo{
    public $hash; //: str;
    public $generation_hash; // str;
    public $total_fee; // UInt64;
    public $num_transactions; // int;
    public $signature; // str;
    public $signer; // PublicAccount;
    public $network_type; // int in class NetWorkType;
    public $version; // int in TransactionVersion;
    public $type; // BlockType;
    public $height; // UInt64;
    public $timestamp; // UInt64;
    public $difficulty; // UInt64;
    public $previous_block_hash; // str;
    public $block_transactions_hash; // str;
    public $merkle_tree; // OptionalMerkleTreeType;

    function __construct(string $hash, string $generation_hash, UInt64 $total_fee, int $num_transactions,
    					 int $signature, PublicAccount $signer, int $network_type, int $version, int $type,
    					 UInt64 $height, UInt64 $timestamp, UInt64 $difficulty, string $previous_block_hash,
    					 string $block_transactions_hash, $merkle_tree = null){
	    $this->hash = $hash; 
	    $this->generation_hash = $generation_hash;
	    $this->total_fee = $total_fee;
	    $this->num_transactions = $num_transactions;
	    $this->signature = $signature;
	    $this->signer = $signer;
	    $this->network_type = $network_type;
	    $this->version = $version;
	    $this->type = $type;
	    $this->height = $height;
	    $this->timestamp = $timestamp;
	    $this->difficulty = $difficulty;
	    $this->previous_block_hash = $previous_block_hash;
	    $this->block_transactions_hash = $block_transactions_hash;
	    $this->merkle_tree = $merkle_tree;
    }

    
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



