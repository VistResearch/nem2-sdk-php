<?php
/**
 * StatementsDTO
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
 * StatementsDTO Class Doc Comment
 *
 * @category Class
 * @description Collection of transaction statements and resolutions triggered for the block requested.
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class StatementsDTO implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'StatementsDTO';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'transaction_statements' => '\OpenAPI\Client\Model\TransactionStatementDTO[]',
        'address_resolution_statements' => '\OpenAPI\Client\Model\ResolutionStatementDTO[]',
        'mosaic_resolution_statements' => '\OpenAPI\Client\Model\ResolutionStatementDTO[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'transaction_statements' => null,
        'address_resolution_statements' => null,
        'mosaic_resolution_statements' => null
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
        'transaction_statements' => 'transactionStatements',
        'address_resolution_statements' => 'addressResolutionStatements',
        'mosaic_resolution_statements' => 'mosaicResolutionStatements'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'transaction_statements' => 'setTransactionStatements',
        'address_resolution_statements' => 'setAddressResolutionStatements',
        'mosaic_resolution_statements' => 'setMosaicResolutionStatements'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'transaction_statements' => 'getTransactionStatements',
        'address_resolution_statements' => 'getAddressResolutionStatements',
        'mosaic_resolution_statements' => 'getMosaicResolutionStatements'
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
        $this->container['transaction_statements'] = isset($data['transaction_statements']) ? $data['transaction_statements'] : null;
        $this->container['address_resolution_statements'] = isset($data['address_resolution_statements']) ? $data['address_resolution_statements'] : null;
        $this->container['mosaic_resolution_statements'] = isset($data['mosaic_resolution_statements']) ? $data['mosaic_resolution_statements'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['transaction_statements'] === null) {
            $invalidProperties[] = "'transaction_statements' can't be null";
        }
        if ($this->container['address_resolution_statements'] === null) {
            $invalidProperties[] = "'address_resolution_statements' can't be null";
        }
        if ($this->container['mosaic_resolution_statements'] === null) {
            $invalidProperties[] = "'mosaic_resolution_statements' can't be null";
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
     * Gets transaction_statements
     *
     * @return \OpenAPI\Client\Model\TransactionStatementDTO[]
     */
    public function getTransactionStatements()
    {
        return $this->container['transaction_statements'];
    }

    /**
     * Sets transaction_statements
     *
     * @param \OpenAPI\Client\Model\TransactionStatementDTO[] $transaction_statements Array of transaction statements for the block requested.
     *
     * @return $this
     */
    public function setTransactionStatements($transaction_statements)
    {
        $this->container['transaction_statements'] = $transaction_statements;

        return $this;
    }

    /**
     * Gets address_resolution_statements
     *
     * @return \OpenAPI\Client\Model\ResolutionStatementDTO[]
     */
    public function getAddressResolutionStatements()
    {
        return $this->container['address_resolution_statements'];
    }

    /**
     * Sets address_resolution_statements
     *
     * @param \OpenAPI\Client\Model\ResolutionStatementDTO[] $address_resolution_statements Array of address resolutions for the block requested.
     *
     * @return $this
     */
    public function setAddressResolutionStatements($address_resolution_statements)
    {
        $this->container['address_resolution_statements'] = $address_resolution_statements;

        return $this;
    }

    /**
     * Gets mosaic_resolution_statements
     *
     * @return \OpenAPI\Client\Model\ResolutionStatementDTO[]
     */
    public function getMosaicResolutionStatements()
    {
        return $this->container['mosaic_resolution_statements'];
    }

    /**
     * Sets mosaic_resolution_statements
     *
     * @param \OpenAPI\Client\Model\ResolutionStatementDTO[] $mosaic_resolution_statements Array of mosaic resolutions for the block requested.
     *
     * @return $this
     */
    public function setMosaicResolutionStatements($mosaic_resolution_statements)
    {
        $this->container['mosaic_resolution_statements'] = $mosaic_resolution_statements;

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


