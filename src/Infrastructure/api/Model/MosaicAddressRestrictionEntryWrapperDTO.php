<?php
/**
 * MosaicAddressRestrictionEntryWrapperDTO
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
 * MosaicAddressRestrictionEntryWrapperDTO Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class MosaicAddressRestrictionEntryWrapperDTO implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'MosaicAddressRestrictionEntryWrapperDTO';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'composite_hash' => 'string',
        'entry_type' => '\OpenAPI\Client\Model\MosaicRestrictionEntryTypeEnum',
        'mosaic_id' => 'string',
        'target_address' => 'string',
        'restrictions' => '\OpenAPI\Client\Model\MosaicAddressRestrictionEntryDTO[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'composite_hash' => null,
        'entry_type' => null,
        'mosaic_id' => 'hex',
        'target_address' => null,
        'restrictions' => null
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
        'entry_type' => 'entryType',
        'mosaic_id' => 'mosaicId',
        'target_address' => 'targetAddress',
        'restrictions' => 'restrictions'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'composite_hash' => 'setCompositeHash',
        'entry_type' => 'setEntryType',
        'mosaic_id' => 'setMosaicId',
        'target_address' => 'setTargetAddress',
        'restrictions' => 'setRestrictions'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'composite_hash' => 'getCompositeHash',
        'entry_type' => 'getEntryType',
        'mosaic_id' => 'getMosaicId',
        'target_address' => 'getTargetAddress',
        'restrictions' => 'getRestrictions'
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
        $this->container['entry_type'] = isset($data['entry_type']) ? $data['entry_type'] : null;
        $this->container['mosaic_id'] = isset($data['mosaic_id']) ? $data['mosaic_id'] : null;
        $this->container['target_address'] = isset($data['target_address']) ? $data['target_address'] : null;
        $this->container['restrictions'] = isset($data['restrictions']) ? $data['restrictions'] : null;
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
        if ($this->container['entry_type'] === null) {
            $invalidProperties[] = "'entry_type' can't be null";
        }
        if ($this->container['mosaic_id'] === null) {
            $invalidProperties[] = "'mosaic_id' can't be null";
        }
        if ($this->container['target_address'] === null) {
            $invalidProperties[] = "'target_address' can't be null";
        }
        if ($this->container['restrictions'] === null) {
            $invalidProperties[] = "'restrictions' can't be null";
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
     * Gets entry_type
     *
     * @return \OpenAPI\Client\Model\MosaicRestrictionEntryTypeEnum
     */
    public function getEntryType()
    {
        return $this->container['entry_type'];
    }

    /**
     * Sets entry_type
     *
     * @param \OpenAPI\Client\Model\MosaicRestrictionEntryTypeEnum $entry_type entry_type
     *
     * @return $this
     */
    public function setEntryType($entry_type)
    {
        $this->container['entry_type'] = $entry_type;

        return $this;
    }

    /**
     * Gets mosaic_id
     *
     * @return string
     */
    public function getMosaicId()
    {
        return $this->container['mosaic_id'];
    }

    /**
     * Sets mosaic_id
     *
     * @param string $mosaic_id Mosaic identifier.
     *
     * @return $this
     */
    public function setMosaicId($mosaic_id)
    {
        $this->container['mosaic_id'] = $mosaic_id;

        return $this;
    }

    /**
     * Gets target_address
     *
     * @return string
     */
    public function getTargetAddress()
    {
        return $this->container['target_address'];
    }

    /**
     * Sets target_address
     *
     * @param string $target_address Decoded address.
     *
     * @return $this
     */
    public function setTargetAddress($target_address)
    {
        $this->container['target_address'] = $target_address;

        return $this;
    }

    /**
     * Gets restrictions
     *
     * @return \OpenAPI\Client\Model\MosaicAddressRestrictionEntryDTO[]
     */
    public function getRestrictions()
    {
        return $this->container['restrictions'];
    }

    /**
     * Sets restrictions
     *
     * @param \OpenAPI\Client\Model\MosaicAddressRestrictionEntryDTO[] $restrictions restrictions
     *
     * @return $this
     */
    public function setRestrictions($restrictions)
    {
        $this->container['restrictions'] = $restrictions;

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

