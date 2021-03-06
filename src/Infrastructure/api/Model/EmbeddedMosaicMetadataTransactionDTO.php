<?php
/**
 * EmbeddedMosaicMetadataTransactionDTO
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
 * EmbeddedMosaicMetadataTransactionDTO Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class EmbeddedMosaicMetadataTransactionDTO implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'EmbeddedMosaicMetadataTransactionDTO';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'signer_public_key' => 'string',
        'version' => 'int',
        'type' => 'int',
        'max_fee' => 'string',
        'deadline' => 'string',
        'target_public_key' => 'string',
        'scoped_metadata_key' => 'string',
        'target_mosaic_id' => 'string',
        'value_size_delta' => 'int',
        'value_size' => 'int',
        'value' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'signer_public_key' => null,
        'version' => 'int32',
        'type' => 'int32',
        'max_fee' => null,
        'deadline' => null,
        'target_public_key' => null,
        'scoped_metadata_key' => 'hex',
        'target_mosaic_id' => 'hexa',
        'value_size_delta' => 'int32',
        'value_size' => 'int32',
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
        'signer_public_key' => 'signerPublicKey',
        'version' => 'version',
        'type' => 'type',
        'max_fee' => 'maxFee',
        'deadline' => 'deadline',
        'target_public_key' => 'targetPublicKey',
        'scoped_metadata_key' => 'scopedMetadataKey',
        'target_mosaic_id' => 'targetMosaicId',
        'value_size_delta' => 'valueSizeDelta',
        'value_size' => 'valueSize',
        'value' => 'value'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'signer_public_key' => 'setSignerPublicKey',
        'version' => 'setVersion',
        'type' => 'setType',
        'max_fee' => 'setMaxFee',
        'deadline' => 'setDeadline',
        'target_public_key' => 'setTargetPublicKey',
        'scoped_metadata_key' => 'setScopedMetadataKey',
        'target_mosaic_id' => 'setTargetMosaicId',
        'value_size_delta' => 'setValueSizeDelta',
        'value_size' => 'setValueSize',
        'value' => 'setValue'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'signer_public_key' => 'getSignerPublicKey',
        'version' => 'getVersion',
        'type' => 'getType',
        'max_fee' => 'getMaxFee',
        'deadline' => 'getDeadline',
        'target_public_key' => 'getTargetPublicKey',
        'scoped_metadata_key' => 'getScopedMetadataKey',
        'target_mosaic_id' => 'getTargetMosaicId',
        'value_size_delta' => 'getValueSizeDelta',
        'value_size' => 'getValueSize',
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
        $this->container['signer_public_key'] = isset($data['signer_public_key']) ? $data['signer_public_key'] : null;
        $this->container['version'] = isset($data['version']) ? $data['version'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
        $this->container['max_fee'] = isset($data['max_fee']) ? $data['max_fee'] : null;
        $this->container['deadline'] = isset($data['deadline']) ? $data['deadline'] : null;
        $this->container['target_public_key'] = isset($data['target_public_key']) ? $data['target_public_key'] : null;
        $this->container['scoped_metadata_key'] = isset($data['scoped_metadata_key']) ? $data['scoped_metadata_key'] : null;
        $this->container['target_mosaic_id'] = isset($data['target_mosaic_id']) ? $data['target_mosaic_id'] : null;
        $this->container['value_size_delta'] = isset($data['value_size_delta']) ? $data['value_size_delta'] : null;
        $this->container['value_size'] = isset($data['value_size']) ? $data['value_size'] : null;
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
        if ($this->container['target_public_key'] === null) {
            $invalidProperties[] = "'target_public_key' can't be null";
        }
        if ($this->container['scoped_metadata_key'] === null) {
            $invalidProperties[] = "'scoped_metadata_key' can't be null";
        }
        if ($this->container['target_mosaic_id'] === null) {
            $invalidProperties[] = "'target_mosaic_id' can't be null";
        }
        if ($this->container['value_size_delta'] === null) {
            $invalidProperties[] = "'value_size_delta' can't be null";
        }
        if ($this->container['value_size'] === null) {
            $invalidProperties[] = "'value_size' can't be null";
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
     * Gets target_mosaic_id
     *
     * @return string
     */
    public function getTargetMosaicId()
    {
        return $this->container['target_mosaic_id'];
    }

    /**
     * Sets target_mosaic_id
     *
     * @param string $target_mosaic_id Mosaic identifier. If the most significant bit of byte 0 is set, a namespaceId (alias) is used instead of the real  mosaic identifier.
     *
     * @return $this
     */
    public function setTargetMosaicId($target_mosaic_id)
    {
        $this->container['target_mosaic_id'] = $target_mosaic_id;

        return $this;
    }

    /**
     * Gets value_size_delta
     *
     * @return int
     */
    public function getValueSizeDelta()
    {
        return $this->container['value_size_delta'];
    }

    /**
     * Sets value_size_delta
     *
     * @param int $value_size_delta Change in value size in bytes.
     *
     * @return $this
     */
    public function setValueSizeDelta($value_size_delta)
    {
        $this->container['value_size_delta'] = $value_size_delta;

        return $this;
    }

    /**
     * Gets value_size
     *
     * @return int
     */
    public function getValueSize()
    {
        return $this->container['value_size'];
    }

    /**
     * Sets value_size
     *
     * @param int $value_size Value size in bytes.
     *
     * @return $this
     */
    public function setValueSize($value_size)
    {
        $this->container['value_size'] = $value_size;

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
     * @param string $value When there is an existing value, the new value is calculated as xor(previous-value, value).
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


