<?php
/**
 * AggregateBondedTransactionDTO
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
 * AggregateBondedTransactionDTO Class Doc Comment
 *
 * @category Class
 * @description Transaction to combine multiple transactions together.
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class AggregateBondedTransactionDTO implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AggregateBondedTransactionDTO';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'signature' => 'string',
        'signer_public_key' => 'string',
        'version' => 'int',
        'type' => 'int',
        'max_fee' => 'string',
        'deadline' => 'string',
        'cosignatures' => '\OpenAPI\Client\Model\CosignatureDTO[]',
        'transactions' => '\OpenAPI\Client\Model\EmbeddedTransactionInfoDTO[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'signature' => null,
        'signer_public_key' => null,
        'version' => 'int32',
        'type' => 'int32',
        'max_fee' => null,
        'deadline' => null,
        'cosignatures' => null,
        'transactions' => null
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
        'signature' => 'signature',
        'signer_public_key' => 'signerPublicKey',
        'version' => 'version',
        'type' => 'type',
        'max_fee' => 'maxFee',
        'deadline' => 'deadline',
        'cosignatures' => 'cosignatures',
        'transactions' => 'transactions'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'signature' => 'setSignature',
        'signer_public_key' => 'setSignerPublicKey',
        'version' => 'setVersion',
        'type' => 'setType',
        'max_fee' => 'setMaxFee',
        'deadline' => 'setDeadline',
        'cosignatures' => 'setCosignatures',
        'transactions' => 'setTransactions'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'signature' => 'getSignature',
        'signer_public_key' => 'getSignerPublicKey',
        'version' => 'getVersion',
        'type' => 'getType',
        'max_fee' => 'getMaxFee',
        'deadline' => 'getDeadline',
        'cosignatures' => 'getCosignatures',
        'transactions' => 'getTransactions'
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
        $this->container['signature'] = isset($data['signature']) ? $data['signature'] : null;
        $this->container['signer_public_key'] = isset($data['signer_public_key']) ? $data['signer_public_key'] : null;
        $this->container['version'] = isset($data['version']) ? $data['version'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['max_fee'] = isset($data['max_fee']) ? $data['max_fee'] : null;
        $this->container['deadline'] = isset($data['deadline']) ? $data['deadline'] : null;
        $this->container['cosignatures'] = isset($data['cosignatures']) ? $data['cosignatures'] : null;
        $this->container['transactions'] = isset($data['transactions']) ? $data['transactions'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['signature'] === null) {
            $invalidProperties[] = "'signature' can't be null";
        }
        if ($this->container['signer_public_key'] === null) {
            $invalidProperties[] = "'signer_public_key' can't be null";
        }
        if ($this->container['version'] === null) {
            $invalidProperties[] = "'version' can't be null";
        }
        if ($this->container['type'] === null) {
            $invalidProperties[] = "'type' can't be null";
        }
        if ($this->container['max_fee'] === null) {
            $invalidProperties[] = "'max_fee' can't be null";
        }
        if ($this->container['deadline'] === null) {
            $invalidProperties[] = "'deadline' can't be null";
        }
        if ($this->container['cosignatures'] === null) {
            $invalidProperties[] = "'cosignatures' can't be null";
        }
        if ($this->container['transactions'] === null) {
            $invalidProperties[] = "'transactions' can't be null";
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
     * Gets signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->container['signature'];
    }

    /**
     * Sets signature
     *
     * @param string $signature Entity's signature generated by the signer.
     *
     * @return $this
     */
    public function setSignature($signature)
    {
        $this->container['signature'] = $signature;

        return $this;
    }

    /**
     * Gets signer_public_key
     *
     * @return string
     */
    public function getSignerPublicKey()
    {
        return $this->container['signer_public_key'];
    }

    /**
     * Sets signer_public_key
     *
     * @param string $signer_public_key signer_public_key
     *
     * @return $this
     */
    public function setSignerPublicKey($signer_public_key)
    {
        $this->container['signer_public_key'] = $signer_public_key;

        return $this;
    }

    /**
     * Gets version
     *
     * @return int
     */
    public function getVersion()
    {
        return $this->container['version'];
    }

    /**
     * Sets version
     *
     * @param int $version Entity version. The higher byte represents the network identifier: * 0x68 (MAIN_NET) - Public main network. * 0x98 (TEST_NET) - Public test network. * 0x60 (MIJIN) - Private network. * 0x90 (MIJIN_TEST) - Private test network.
     *
     * @return $this
     */
    public function setVersion($version)
    {
        $this->container['version'] = $version;

        return $this;
    }

    /**
     * Gets type
     *
     * @return int
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param int $type type
     *
     * @return $this
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets max_fee
     *
     * @return string
     */
    public function getMaxFee()
    {
        return $this->container['max_fee'];
    }

    /**
     * Sets max_fee
     *
     * @param string $max_fee Absolute amount. An amount of 123456789 (absolute) for a mosaic with divisibility 6 means 123.456789 (relative).
     *
     * @return $this
     */
    public function setMaxFee($max_fee)
    {
        $this->container['max_fee'] = $max_fee;

        return $this;
    }

    /**
     * Gets deadline
     *
     * @return string
     */
    public function getDeadline()
    {
        return $this->container['deadline'];
    }

    /**
     * Sets deadline
     *
     * @param string $deadline Duration expressed in number of blocks.
     *
     * @return $this
     */
    public function setDeadline($deadline)
    {
        $this->container['deadline'] = $deadline;

        return $this;
    }

    /**
     * Gets cosignatures
     *
     * @return \OpenAPI\Client\Model\CosignatureDTO[]
     */
    public function getCosignatures()
    {
        return $this->container['cosignatures'];
    }

    /**
     * Sets cosignatures
     *
     * @param \OpenAPI\Client\Model\CosignatureDTO[] $cosignatures Array of transaction cosignatures.
     *
     * @return $this
     */
    public function setCosignatures($cosignatures)
    {
        $this->container['cosignatures'] = $cosignatures;

        return $this;
    }

    /**
     * Gets transactions
     *
     * @return \OpenAPI\Client\Model\EmbeddedTransactionInfoDTO[]
     */
    public function getTransactions()
    {
        return $this->container['transactions'];
    }

    /**
     * Sets transactions
     *
     * @param \OpenAPI\Client\Model\EmbeddedTransactionInfoDTO[] $transactions Array of transactions initiated by different accounts.
     *
     * @return $this
     */
    public function setTransactions($transactions)
    {
        $this->container['transactions'] = $transactions;

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


