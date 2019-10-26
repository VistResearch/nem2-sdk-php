<?php
/**
 * MosaicAddressRestrictionTransactionDTO
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
 * MosaicAddressRestrictionTransactionDTO Class Doc Comment
 *
 * @category Class
 * @description Transaction to set a restriction rule to an address.
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class MosaicAddressRestrictionTransactionDTO implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'MosaicAddressRestrictionTransactionDTO';

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
        'mosaic_id' => 'string',
        'restriction_key' => 'string',
        'target_address' => 'string',
        'previous_restriction_value' => 'string',
        'new_restriction_value' => 'string'
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
        'mosaic_id' => 'hexa',
        'restriction_key' => 'hex',
        'target_address' => null,
        'previous_restriction_value' => null,
        'new_restriction_value' => null
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
        'mosaic_id' => 'mosaicId',
        'restriction_key' => 'restrictionKey',
        'target_address' => 'targetAddress',
        'previous_restriction_value' => 'previousRestrictionValue',
        'new_restriction_value' => 'newRestrictionValue'
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
        'mosaic_id' => 'setMosaicId',
        'restriction_key' => 'setRestrictionKey',
        'target_address' => 'setTargetAddress',
        'previous_restriction_value' => 'setPreviousRestrictionValue',
        'new_restriction_value' => 'setNewRestrictionValue'
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
        'mosaic_id' => 'getMosaicId',
        'restriction_key' => 'getRestrictionKey',
        'target_address' => 'getTargetAddress',
        'previous_restriction_value' => 'getPreviousRestrictionValue',
        'new_restriction_value' => 'getNewRestrictionValue'
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
        $this->container['mosaic_id'] = isset($data['mosaic_id']) ? $data['mosaic_id'] : null;
        $this->container['restriction_key'] = isset($data['restriction_key']) ? $data['restriction_key'] : null;
        $this->container['target_address'] = isset($data['target_address']) ? $data['target_address'] : null;
        $this->container['previous_restriction_value'] = isset($data['previous_restriction_value']) ? $data['previous_restriction_value'] : null;
        $this->container['new_restriction_value'] = isset($data['new_restriction_value']) ? $data['new_restriction_value'] : null;
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
        if ($this->container['mosaic_id'] === null) {
            $invalidProperties[] = "'mosaic_id' can't be null";
        }
        if ($this->container['restriction_key'] === null) {
            $invalidProperties[] = "'restriction_key' can't be null";
        }
        if ($this->container['target_address'] === null) {
            $invalidProperties[] = "'target_address' can't be null";
        }
        if ($this->container['previous_restriction_value'] === null) {
            $invalidProperties[] = "'previous_restriction_value' can't be null";
        }
        if ($this->container['new_restriction_value'] === null) {
            $invalidProperties[] = "'new_restriction_value' can't be null";
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
     * @param string $mosaic_id Mosaic identifier. If the most significant bit of byte 0 is set, a namespaceId (alias) is used instead of the real  mosaic identifier.
     *
     * @return $this
     */
    public function setMosaicId($mosaic_id)
    {
        $this->container['mosaic_id'] = $mosaic_id;

        return $this;
    }

    /**
     * Gets restriction_key
     *
     * @return string
     */
    public function getRestrictionKey()
    {
        return $this->container['restriction_key'];
    }

    /**
     * Sets restriction_key
     *
     * @param string $restriction_key Restriction key.
     *
     * @return $this
     */
    public function setRestrictionKey($restriction_key)
    {
        $this->container['restriction_key'] = $restriction_key;

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
     * @param string $target_address Address decoded. If the bit 0 of byte 0 is not set (like in 0x90), then it is a regular address. Else (e.g. 0x91) it represents a namespace id which starts at byte 1.
     *
     * @return $this
     */
    public function setTargetAddress($target_address)
    {
        $this->container['target_address'] = $target_address;

        return $this;
    }

    /**
     * Gets previous_restriction_value
     *
     * @return string
     */
    public function getPreviousRestrictionValue()
    {
        return $this->container['previous_restriction_value'];
    }

    /**
     * Sets previous_restriction_value
     *
     * @param string $previous_restriction_value Previous restriction value.
     *
     * @return $this
     */
    public function setPreviousRestrictionValue($previous_restriction_value)
    {
        $this->container['previous_restriction_value'] = $previous_restriction_value;

        return $this;
    }

    /**
     * Gets new_restriction_value
     *
     * @return string
     */
    public function getNewRestrictionValue()
    {
        return $this->container['new_restriction_value'];
    }

    /**
     * Sets new_restriction_value
     *
     * @param string $new_restriction_value New restriction value.
     *
     * @return $this
     */
    public function setNewRestrictionValue($new_restriction_value)
    {
        $this->container['new_restriction_value'] = $new_restriction_value;

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

