<?php

namespace NEM\Models\Transaction;

use NEM\Models\UInt64;
/**
 * Transaction information model included in all transactions
 */

class TransactionInfo {

    /**
     * @param height
     * @param index
     * @param id
     * @param hash
     * @param merkleComponentHash
     */
	/**
     * The block height in which the transaction was included.
     */
	public $height; //UInt64

	/**
     * The index representing either transaction index/position within block or within an aggregate transaction.
     */
    public $index; // number
    
    /**
     * The transaction db id.
     */
    public $id; // String
    
 	/**
     * The transaction hash.
     */
    public $hash; // String
    
	/**
	 * The transaction merkle hash.
	 */
    public $merkleComponentHash; // String
    function __construct(UInt64 $height,int $index,string $id,string $hash = "",string $merkleComponentHash = "") {
    	$this->height = $height;
    	$this->index = $index;
    	$this->id = $id;
    	if ($hash != ""){
    		$this->hash = $hash;
    	}
    	if($merkleComponentHash){
    		$this->merkleComponentHash = $merkleComponentHash;
    	}
    }
}