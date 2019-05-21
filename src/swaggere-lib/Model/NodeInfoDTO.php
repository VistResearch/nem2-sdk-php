<?php
/**
 * NodeInfoDTO
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Catapult REST API Reference
 *
 * No description provided (generated by Swagger Codegen https://github.com/swagger-api/swagger-codegen)
 *
 * OpenAPI spec version: 1.0.12
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.4
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;
use \Swagger\Client\ObjectSerializer;

/**
 * NodeInfoDTO Class Doc Comment
 *
 * @category Class
 * @package  Swagger\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class NodeInfoDTO implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'NodeInfoDTO';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'public_key' => 'string',
        'port' => 'int',
        'network_identifier' => 'int',
        'version' => 'int',
        'roles' => 'int',
        'host' => 'string',
        'friendly_name' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'public_key' => null,
        'port' => 'int32',
        'network_identifier' => 'int32',
        'version' => 'int32',
        'roles' => 'int32',
        'host' => null,
        'friendly_name' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'public_key' => 'publicKey',
        'port' => 'port',
        'network_identifier' => 'networkIdentifier',
        'version' => 'version',
        'roles' => 'roles',
        'host' => 'host',
        'friendly_name' => 'friendlyName'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'public_key' => 'setPublicKey',
        'port' => 'setPort',
        'network_identifier' => 'setNetworkIdentifier',
        'version' => 'setVersion',
        'roles' => 'setRoles',
        'host' => 'setHost',
        'friendly_name' => 'setFriendlyName'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'public_key' => 'getPublicKey',
        'port' => 'getPort',
        'network_identifier' => 'getNetworkIdentifier',
        'version' => 'getVersion',
        'roles' => 'getRoles',
        'host' => 'getHost',
        'friendly_name' => 'getFriendlyName'
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
        return self::$swaggerModelName;
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
        $this->container['public_key'] = isset($data['public_key']) ? $data['public_key'] : null;
        $this->container['port'] = isset($data['port']) ? $data['port'] : null;
        $this->container['network_identifier'] = isset($data['network_identifier']) ? $data['network_identifier'] : null;
        $this->container['version'] = isset($data['version']) ? $data['version'] : null;
        $this->container['roles'] = isset($data['roles']) ? $data['roles'] : null;
        $this->container['host'] = isset($data['host']) ? $data['host'] : null;
        $this->container['friendly_name'] = isset($data['friendly_name']) ? $data['friendly_name'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['public_key'] === null) {
            $invalidProperties[] = "'public_key' can't be null";
        }
        if ($this->container['port'] === null) {
            $invalidProperties[] = "'port' can't be null";
        }
        if ($this->container['network_identifier'] === null) {
            $invalidProperties[] = "'network_identifier' can't be null";
        }
        if ($this->container['version'] === null) {
            $invalidProperties[] = "'version' can't be null";
        }
        if ($this->container['roles'] === null) {
            $invalidProperties[] = "'roles' can't be null";
        }
        if ($this->container['host'] === null) {
            $invalidProperties[] = "'host' can't be null";
        }
        if ($this->container['friendly_name'] === null) {
            $invalidProperties[] = "'friendly_name' can't be null";
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
     * Gets public_key
     *
     * @return string
     */
    public function getPublicKey()
    {
        return $this->container['public_key'];
    }

    /**
     * Sets public_key
     *
     * @param string $public_key public_key
     *
     * @return $this
     */
    public function setPublicKey($public_key)
    {
        $this->container['public_key'] = $public_key;

        return $this;
    }

    /**
     * Gets port
     *
     * @return int
     */
    public function getPort()
    {
        return $this->container['port'];
    }

    /**
     * Sets port
     *
     * @param int $port port
     *
     * @return $this
     */
    public function setPort($port)
    {
        $this->container['port'] = $port;

        return $this;
    }

    /**
     * Gets network_identifier
     *
     * @return int
     */
    public function getNetworkIdentifier()
    {
        return $this->container['network_identifier'];
    }

    /**
     * Sets network_identifier
     *
     * @param int $network_identifier network_identifier
     *
     * @return $this
     */
    public function setNetworkIdentifier($network_identifier)
    {
        $this->container['network_identifier'] = $network_identifier;

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
     * @param int $version version
     *
     * @return $this
     */
    public function setVersion($version)
    {
        $this->container['version'] = $version;

        return $this;
    }

    /**
     * Gets roles
     *
     * @return int
     */
    public function getRoles()
    {
        return $this->container['roles'];
    }

    /**
     * Sets roles
     *
     * @param int $roles roles
     *
     * @return $this
     */
    public function setRoles($roles)
    {
        $this->container['roles'] = $roles;

        return $this;
    }

    /**
     * Gets host
     *
     * @return string
     */
    public function getHost()
    {
        return $this->container['host'];
    }

    /**
     * Sets host
     *
     * @param string $host host
     *
     * @return $this
     */
    public function setHost($host)
    {
        $this->container['host'] = $host;

        return $this;
    }

    /**
     * Gets friendly_name
     *
     * @return string
     */
    public function getFriendlyName()
    {
        return $this->container['friendly_name'];
    }

    /**
     * Sets friendly_name
     *
     * @param string $friendly_name friendly_name
     *
     * @return $this
     */
    public function setFriendlyName($friendly_name)
    {
        $this->container['friendly_name'] = $friendly_name;

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
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


