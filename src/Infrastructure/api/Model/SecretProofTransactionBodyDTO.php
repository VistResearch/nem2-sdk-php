<?php
/**
 * SecretProofTransactionBodyDTO
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
 * SecretProofTransactionBodyDTO Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class SecretProofTransactionBodyDTO implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'SecretProofTransactionBodyDTO';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'hash_algorithm' => '\OpenAPI\Client\Model\LockHashAlgorithmEnum',
        'secret' => 'string',
        'recipient_address' => 'string',
        'proof' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'hash_algorithm' => null,
        'secret' => null,
        'recipient_address' => null,
        'proof' => null
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
        'hash_algorithm' => 'hashAlgorithm',
        'secret' => 'secret',
        'recipient_address' => 'recipientAddress',
        'proof' => 'proof'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'hash_algorithm' => 'setHashAlgorithm',
        'secret' => 'setSecret',
        'recipient_address' => 'setRecipientAddress',
        'proof' => 'setProof'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'hash_algorithm' => 'getHashAlgorithm',
        'secret' => 'getSecret',
        'recipient_address' => 'getRecipientAddress',
        'proof' => 'getProof'
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
        $this->container['hash_algorithm'] = isset($data['hash_algorithm']) ? $data['hash_algorithm'] : null;
        $this->container['secret'] = isset($data['secret']) ? $data['secret'] : null;
        $this->container['recipient_address'] = isset($data['recipient_address']) ? $data['recipient_address'] : null;
        $this->container['proof'] = isset($data['proof']) ? $data['proof'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['hash_algorithm'] === null) {
            $invalidProperties[] = "'hash_algorithm' can't be null";
        }
        if ($this->container['secret'] === null) {
            $invalidProperties[] = "'secret' can't be null";
        }
        if ($this->container['recipient_address'] === null) {
            $invalidProperties[] = "'recipient_address' can't be null";
        }
        if ($this->container['proof'] === null) {
            $invalidProperties[] = "'proof' can't be null";
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
     * Gets hash_algorithm
     *
     * @return \OpenAPI\Client\Model\LockHashAlgorithmEnum
     */
    public function getHashAlgorithm()
    {
        return $this->container['hash_algorithm'];
    }

    /**
     * Sets hash_algorithm
     *
     * @param \OpenAPI\Client\Model\LockHashAlgorithmEnum $hash_algorithm hash_algorithm
     *
     * @return $this
     */
    public function setHashAlgorithm($hash_algorithm)
    {
        $this->container['hash_algorithm'] = $hash_algorithm;

        return $this;
    }

    /**
     * Gets secret
     *
     * @return string
     */
    public function getSecret()
    {
        return $this->container['secret'];
    }

    /**
     * Sets secret
     *
     * @param string $secret secret
     *
     * @return $this
     */
    public function setSecret($secret)
    {
        $this->container['secret'] = $secret;

        return $this;
    }

    /**
     * Gets recipient_address
     *
     * @return string
     */
    public function getRecipientAddress()
    {
        return $this->container['recipient_address'];
    }

    /**
     * Sets recipient_address
     *
     * @param string $recipient_address Address decoded. If the bit 0 of byte 0 is not set (like in 0x90), then it is a regular address. Else (e.g. 0x91) it represents a namespace id which starts at byte 1.
     *
     * @return $this
     */
    public function setRecipientAddress($recipient_address)
    {
        $this->container['recipient_address'] = $recipient_address;

        return $this;
    }

    /**
     * Gets proof
     *
     * @return string
     */
    public function getProof()
    {
        return $this->container['proof'];
    }

    /**
     * Sets proof
     *
     * @param string $proof Original random set of bytes.
     *
     * @return $this
     */
    public function setProof($proof)
    {
        $this->container['proof'] = $proof;

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


