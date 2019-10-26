<?php
/**
 * NamespaceDTO
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
 * NamespaceDTO Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class NamespaceDTO implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'NamespaceDTO';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'registration_type' => '\OpenAPI\Client\Model\NamespaceRegistrationTypeEnum',
        'depth' => 'int',
        'level0' => 'string',
        'level1' => 'string',
        'level2' => 'string',
        'alias' => '\OpenAPI\Client\Model\AliasDTO',
        'parent_id' => 'string',
        'owner_public_key' => 'string',
        'owner_address' => 'string',
        'start_height' => 'string',
        'end_height' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'registration_type' => null,
        'depth' => 'int32',
        'level0' => 'hex',
        'level1' => 'hex',
        'level2' => 'hex',
        'alias' => null,
        'parent_id' => 'hex',
        'owner_public_key' => null,
        'owner_address' => null,
        'start_height' => null,
        'end_height' => null
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
        'registration_type' => 'registrationType',
        'depth' => 'depth',
        'level0' => 'level0',
        'level1' => 'level1',
        'level2' => 'level2',
        'alias' => 'alias',
        'parent_id' => 'parentId',
        'owner_public_key' => 'ownerPublicKey',
        'owner_address' => 'ownerAddress',
        'start_height' => 'startHeight',
        'end_height' => 'endHeight'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'registration_type' => 'setRegistrationType',
        'depth' => 'setDepth',
        'level0' => 'setLevel0',
        'level1' => 'setLevel1',
        'level2' => 'setLevel2',
        'alias' => 'setAlias',
        'parent_id' => 'setParentId',
        'owner_public_key' => 'setOwnerPublicKey',
        'owner_address' => 'setOwnerAddress',
        'start_height' => 'setStartHeight',
        'end_height' => 'setEndHeight'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'registration_type' => 'getRegistrationType',
        'depth' => 'getDepth',
        'level0' => 'getLevel0',
        'level1' => 'getLevel1',
        'level2' => 'getLevel2',
        'alias' => 'getAlias',
        'parent_id' => 'getParentId',
        'owner_public_key' => 'getOwnerPublicKey',
        'owner_address' => 'getOwnerAddress',
        'start_height' => 'getStartHeight',
        'end_height' => 'getEndHeight'
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
        $this->container['registration_type'] = isset($data['registration_type']) ? $data['registration_type'] : null;
        $this->container['depth'] = isset($data['depth']) ? $data['depth'] : null;
        $this->container['level0'] = isset($data['level0']) ? $data['level0'] : null;
        $this->container['level1'] = isset($data['level1']) ? $data['level1'] : null;
        $this->container['level2'] = isset($data['level2']) ? $data['level2'] : null;
        $this->container['alias'] = isset($data['alias']) ? $data['alias'] : null;
        $this->container['parent_id'] = isset($data['parent_id']) ? $data['parent_id'] : null;
        $this->container['owner_public_key'] = isset($data['owner_public_key']) ? $data['owner_public_key'] : null;
        $this->container['owner_address'] = isset($data['owner_address']) ? $data['owner_address'] : null;
        $this->container['start_height'] = isset($data['start_height']) ? $data['start_height'] : null;
        $this->container['end_height'] = isset($data['end_height']) ? $data['end_height'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['registration_type'] === null) {
            $invalidProperties[] = "'registration_type' can't be null";
        }
        if ($this->container['depth'] === null) {
            $invalidProperties[] = "'depth' can't be null";
        }
        if ($this->container['level0'] === null) {
            $invalidProperties[] = "'level0' can't be null";
        }
        if ($this->container['alias'] === null) {
            $invalidProperties[] = "'alias' can't be null";
        }
        if ($this->container['parent_id'] === null) {
            $invalidProperties[] = "'parent_id' can't be null";
        }
        if ($this->container['owner_public_key'] === null) {
            $invalidProperties[] = "'owner_public_key' can't be null";
        }
        if ($this->container['owner_address'] === null) {
            $invalidProperties[] = "'owner_address' can't be null";
        }
        if ($this->container['start_height'] === null) {
            $invalidProperties[] = "'start_height' can't be null";
        }
        if ($this->container['end_height'] === null) {
            $invalidProperties[] = "'end_height' can't be null";
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
     * Gets registration_type
     *
     * @return \OpenAPI\Client\Model\NamespaceRegistrationTypeEnum
     */
    public function getRegistrationType()
    {
        return $this->container['registration_type'];
    }

    /**
     * Sets registration_type
     *
     * @param \OpenAPI\Client\Model\NamespaceRegistrationTypeEnum $registration_type registration_type
     *
     * @return $this
     */
    public function setRegistrationType($registration_type)
    {
        $this->container['registration_type'] = $registration_type;

        return $this;
    }

    /**
     * Gets depth
     *
     * @return int
     */
    public function getDepth()
    {
        return $this->container['depth'];
    }

    /**
     * Sets depth
     *
     * @param int $depth Level of the namespace.
     *
     * @return $this
     */
    public function setDepth($depth)
    {
        $this->container['depth'] = $depth;

        return $this;
    }

    /**
     * Gets level0
     *
     * @return string
     */
    public function getLevel0()
    {
        return $this->container['level0'];
    }

    /**
     * Sets level0
     *
     * @param string $level0 Namespace identifier.
     *
     * @return $this
     */
    public function setLevel0($level0)
    {
        $this->container['level0'] = $level0;

        return $this;
    }

    /**
     * Gets level1
     *
     * @return string|null
     */
    public function getLevel1()
    {
        return $this->container['level1'];
    }

    /**
     * Sets level1
     *
     * @param string|null $level1 Namespace identifier.
     *
     * @return $this
     */
    public function setLevel1($level1)
    {
        $this->container['level1'] = $level1;

        return $this;
    }

    /**
     * Gets level2
     *
     * @return string|null
     */
    public function getLevel2()
    {
        return $this->container['level2'];
    }

    /**
     * Sets level2
     *
     * @param string|null $level2 Namespace identifier.
     *
     * @return $this
     */
    public function setLevel2($level2)
    {
        $this->container['level2'] = $level2;

        return $this;
    }

    /**
     * Gets alias
     *
     * @return \OpenAPI\Client\Model\AliasDTO
     */
    public function getAlias()
    {
        return $this->container['alias'];
    }

    /**
     * Sets alias
     *
     * @param \OpenAPI\Client\Model\AliasDTO $alias alias
     *
     * @return $this
     */
    public function setAlias($alias)
    {
        $this->container['alias'] = $alias;

        return $this;
    }

    /**
     * Gets parent_id
     *
     * @return string
     */
    public function getParentId()
    {
        return $this->container['parent_id'];
    }

    /**
     * Sets parent_id
     *
     * @param string $parent_id Namespace identifier.
     *
     * @return $this
     */
    public function setParentId($parent_id)
    {
        $this->container['parent_id'] = $parent_id;

        return $this;
    }

    /**
     * Gets owner_public_key
     *
     * @return string
     */
    public function getOwnerPublicKey()
    {
        return $this->container['owner_public_key'];
    }

    /**
     * Sets owner_public_key
     *
     * @param string $owner_public_key owner_public_key
     *
     * @return $this
     */
    public function setOwnerPublicKey($owner_public_key)
    {
        $this->container['owner_public_key'] = $owner_public_key;

        return $this;
    }

    /**
     * Gets owner_address
     *
     * @return string
     */
    public function getOwnerAddress()
    {
        return $this->container['owner_address'];
    }

    /**
     * Sets owner_address
     *
     * @param string $owner_address Decoded address.
     *
     * @return $this
     */
    public function setOwnerAddress($owner_address)
    {
        $this->container['owner_address'] = $owner_address;

        return $this;
    }

    /**
     * Gets start_height
     *
     * @return string
     */
    public function getStartHeight()
    {
        return $this->container['start_height'];
    }

    /**
     * Sets start_height
     *
     * @param string $start_height Height of the blockchain.
     *
     * @return $this
     */
    public function setStartHeight($start_height)
    {
        $this->container['start_height'] = $start_height;

        return $this;
    }

    /**
     * Gets end_height
     *
     * @return string
     */
    public function getEndHeight()
    {
        return $this->container['end_height'];
    }

    /**
     * Sets end_height
     *
     * @param string $end_height Height of the blockchain.
     *
     * @return $this
     */
    public function setEndHeight($end_height)
    {
        $this->container['end_height'] = $end_height;

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


