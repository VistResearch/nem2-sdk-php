<?php
/**
 * BlockMetaDTO
 *
 * PHP version 5
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Catapult REST Endpoints
 *
 * No description provided (generated by Openapi Generator https://github.com/openapitools/openapi-generator)
 *
 * The version of the OpenAPI document: 0.7.19
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 4.0.3
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPI\Client\Model;

use \ArrayAccess;
use \OpenAPI\Client\ObjectSerializer;

/**
 * BlockMetaDTO Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class BlockMetaDTO implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'BlockMetaDTO';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'hash' => 'string',
        'total_fee' => 'string',
        'generation_hash' => 'string',
        'state_hash_sub_cache_merkle_roots' => 'string[]',
        'num_transactions' => 'int',
        'num_statements' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'hash' => null,
        'total_fee' => null,
        'generation_hash' => null,
        'state_hash_sub_cache_merkle_roots' => null,
        'num_transactions' => 'int32',
        'num_statements' => 'int32'
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'hash' => 'hash',
        'total_fee' => 'totalFee',
        'generation_hash' => 'generationHash',
        'state_hash_sub_cache_merkle_roots' => 'stateHashSubCacheMerkleRoots',
        'num_transactions' => 'numTransactions',
        'num_statements' => 'numStatements'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'hash' => 'setHash',
        'total_fee' => 'setTotalFee',
        'generation_hash' => 'setGenerationHash',
        'state_hash_sub_cache_merkle_roots' => 'setStateHashSubCacheMerkleRoots',
        'num_transactions' => 'setNumTransactions',
        'num_statements' => 'setNumStatements'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'hash' => 'getHash',
        'total_fee' => 'getTotalFee',
        'generation_hash' => 'getGenerationHash',
        'state_hash_sub_cache_merkle_roots' => 'getStateHashSubCacheMerkleRoots',
        'num_transactions' => 'getNumTransactions',
        'num_statements' => 'getNumStatements'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['hash'] = isset($data['hash']) ? $data['hash'] : null;
        $this->container['total_fee'] = isset($data['total_fee']) ? $data['total_fee'] : null;
        $this->container['generation_hash'] = isset($data['generation_hash']) ? $data['generation_hash'] : null;
        $this->container['state_hash_sub_cache_merkle_roots'] = isset($data['state_hash_sub_cache_merkle_roots']) ? $data['state_hash_sub_cache_merkle_roots'] : null;
        $this->container['num_transactions'] = isset($data['num_transactions']) ? $data['num_transactions'] : null;
        $this->container['num_statements'] = isset($data['num_statements']) ? $data['num_statements'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['hash'] === null) {
            $invalidProperties[] = "'hash' can't be null";
        }
        if ($this->container['total_fee'] === null) {
            $invalidProperties[] = "'total_fee' can't be null";
        }
        if ($this->container['generation_hash'] === null) {
            $invalidProperties[] = "'generation_hash' can't be null";
        }
        if ($this->container['state_hash_sub_cache_merkle_roots'] === null) {
            $invalidProperties[] = "'state_hash_sub_cache_merkle_roots' can't be null";
        }
        if ($this->container['num_transactions'] === null) {
            $invalidProperties[] = "'num_transactions' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->container['hash'];
    }

    /**
     * Sets hash
     *
     * @param string $hash hash
     *
     * @return $this
     */
    public function setHash($hash)
    {
        $this->container['hash'] = $hash;

        return $this;
    }

    /**
     * Gets total_fee
     *
     * @return string
     */
    public function getTotalFee()
    {
        return $this->container['total_fee'];
    }

    /**
     * Sets total_fee
     *
     * @param string $total_fee Absolute amount. An amount of 123456789 (absolute) for a mosaic with divisibility 6 means 123.456789 (relative).
     *
     * @return $this
     */
    public function setTotalFee($total_fee)
    {
        $this->container['total_fee'] = $total_fee;

        return $this;
    }

    /**
     * Gets generation_hash
     *
     * @return string
     */
    public function getGenerationHash()
    {
        return $this->container['generation_hash'];
    }

    /**
     * Sets generation_hash
     *
     * @param string $generation_hash generation_hash
     *
     * @return $this
     */
    public function setGenerationHash($generation_hash)
    {
        $this->container['generation_hash'] = $generation_hash;

        return $this;
    }

    /**
     * Gets state_hash_sub_cache_merkle_roots
     *
     * @return string[]
     */
    public function getStateHashSubCacheMerkleRoots()
    {
        return $this->container['state_hash_sub_cache_merkle_roots'];
    }

    /**
     * Sets state_hash_sub_cache_merkle_roots
     *
     * @param string[] $state_hash_sub_cache_merkle_roots state_hash_sub_cache_merkle_roots
     *
     * @return $this
     */
    public function setStateHashSubCacheMerkleRoots($state_hash_sub_cache_merkle_roots)
    {
        $this->container['state_hash_sub_cache_merkle_roots'] = $state_hash_sub_cache_merkle_roots;

        return $this;
    }

    /**
     * Gets num_transactions
     *
     * @return int
     */
    public function getNumTransactions()
    {
        return $this->container['num_transactions'];
    }

    /**
     * Sets num_transactions
     *
     * @param int $num_transactions num_transactions
     *
     * @return $this
     */
    public function setNumTransactions($num_transactions)
    {
        $this->container['num_transactions'] = $num_transactions;

        return $this;
    }

    /**
     * Gets num_statements
     *
     * @return int|null
     */
    public function getNumStatements()
    {
        return $this->container['num_statements'];
    }

    /**
     * Sets num_statements
     *
     * @param int|null $num_statements num_statements
     *
     * @return $this
     */
    public function setNumStatements($num_statements)
    {
        $this->container['num_statements'] = $num_statements;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }
}


