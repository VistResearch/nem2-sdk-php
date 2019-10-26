<?php
/**
 * MetadataEntryDTO
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
 * MetadataEntryDTO Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class MetadataEntryDTO implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'MetadataEntryDTO';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'composite_hash' => 'string',
        'sender_public_key' => 'string',
        'target_public_key' => 'string',
        'scoped_metadata_key' => 'string',
        'target_id' => 'AnyOfStringString',
        'metadata_type' => '\OpenAPI\Client\Model\MetadataTypeEnum',
        'value' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'composite_hash' => null,
        'sender_public_key' => null,
        'target_public_key' => null,
        'scoped_metadata_key' => 'hex',
        'target_id' => null,
        'metadata_type' => null,
        'value' => 'hex'
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
        'composite_hash' => 'compositeHash',
        'sender_public_key' => 'senderPublicKey',
        'target_public_key' => 'targetPublicKey',
        'scoped_metadata_key' => 'scopedMetadataKey',
        'target_id' => 'targetId',
        'metadata_type' => 'metadataType',
        'value' => 'value'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'composite_hash' => 'setCompositeHash',
        'sender_public_key' => 'setSenderPublicKey',
        'target_public_key' => 'setTargetPublicKey',
        'scoped_metadata_key' => 'setScopedMetadataKey',
        'target_id' => 'setTargetId',
        'metadata_type' => 'setMetadataType',
        'value' => 'setValue'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'composite_hash' => 'getCompositeHash',
        'sender_public_key' => 'getSenderPublicKey',
        'target_public_key' => 'getTargetPublicKey',
        'scoped_metadata_key' => 'getScopedMetadataKey',
        'target_id' => 'getTargetId',
        'metadata_type' => 'getMetadataType',
        'value' => 'getValue'
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
        $this->container['composite_hash'] = isset($data['composite_hash']) ? $data['composite_hash'] : null;
        $this->container['sender_public_key'] = isset($data['sender_public_key']) ? $data['sender_public_key'] : null;
        $this->container['target_public_key'] = isset($data['target_public_key']) ? $data['target_public_key'] : null;
        $this->container['scoped_metadata_key'] = isset($data['scoped_metadata_key']) ? $data['scoped_metadata_key'] : null;
        $this->container['target_id'] = isset($data['target_id']) ? $data['target_id'] : null;
        $this->container['metadata_type'] = isset($data['metadata_type']) ? $data['metadata_type'] : null;
        $this->container['value'] = isset($data['value']) ? $data['value'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['composite_hash'] === null) {
            $invalidProperties[] = "'composite_hash' can't be null";
        }
        if ($this->container['sender_public_key'] === null) {
            $invalidProperties[] = "'sender_public_key' can't be null";
        }
        if ($this->container['target_public_key'] === null) {
            $invalidProperties[] = "'target_public_key' can't be null";
        }
        if ($this->container['scoped_metadata_key'] === null) {
            $invalidProperties[] = "'scoped_metadata_key' can't be null";
        }
        if ($this->container['metadata_type'] === null) {
            $invalidProperties[] = "'metadata_type' can't be null";
        }
        if ($this->container['value'] === null) {
            $invalidProperties[] = "'value' can't be null";
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
     * Gets composite_hash
     *
     * @return string
     */
    public function getCompositeHash()
    {
        return $this->container['composite_hash'];
    }

    /**
     * Sets composite_hash
     *
     * @param string $composite_hash composite_hash
     *
     * @return $this
     */
    public function setCompositeHash($composite_hash)
    {
        $this->container['composite_hash'] = $composite_hash;

        return $this;
    }

    /**
     * Gets sender_public_key
     *
     * @return string
     */
    public function getSenderPublicKey()
    {
        return $this->container['sender_public_key'];
    }

    /**
     * Sets sender_public_key
     *
     * @param string $sender_public_key sender_public_key
     *
     * @return $this
     */
    public function setSenderPublicKey($sender_public_key)
    {
        $this->container['sender_public_key'] = $sender_public_key;

        return $this;
    }

    /**
     * Gets target_public_key
     *
     * @return string
     */
    public function getTargetPublicKey()
    {
        return $this->container['target_public_key'];
    }

    /**
     * Sets target_public_key
     *
     * @param string $target_public_key target_public_key
     *
     * @return $this
     */
    public function setTargetPublicKey($target_public_key)
    {
        $this->container['target_public_key'] = $target_public_key;

        return $this;
    }

    /**
     * Gets scoped_metadata_key
     *
     * @return string
     */
    public function getScopedMetadataKey()
    {
        return $this->container['scoped_metadata_key'];
    }

    /**
     * Sets scoped_metadata_key
     *
     * @param string $scoped_metadata_key Metadata key scoped to source, target and type.
     *
     * @return $this
     */
    public function setScopedMetadataKey($scoped_metadata_key)
    {
        $this->container['scoped_metadata_key'] = $scoped_metadata_key;

        return $this;
    }

    /**
     * Gets target_id
     *
     * @return AnyOfStringString|null
     */
    public function getTargetId()
    {
        return $this->container['target_id'];
    }

    /**
     * Sets target_id
     *
     * @param AnyOfStringString|null $target_id target_id
     *
     * @return $this
     */
    public function setTargetId($target_id)
    {
        $this->container['target_id'] = $target_id;

        return $this;
    }

    /**
     * Gets metadata_type
     *
     * @return \OpenAPI\Client\Model\MetadataTypeEnum
     */
    public function getMetadataType()
    {
        return $this->container['metadata_type'];
    }

    /**
     * Sets metadata_type
     *
     * @param \OpenAPI\Client\Model\MetadataTypeEnum $metadata_type metadata_type
     *
     * @return $this
     */
    public function setMetadataType($metadata_type)
    {
        $this->container['metadata_type'] = $metadata_type;

        return $this;
    }

    /**
     * Gets value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->container['value'];
    }

    /**
     * Sets value
     *
     * @param string $value Metadata value.
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->container['value'] = $value;

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

