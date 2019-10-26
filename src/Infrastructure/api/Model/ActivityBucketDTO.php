<?php
/**
 * ActivityBucketDTO
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
 * ActivityBucketDTO Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ActivityBucketDTO implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'ActivityBucketDTO';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'start_height' => 'string',
        'total_fees_paid' => 'int',
        'beneficiary_count' => 'int',
        'raw_score' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'start_height' => null,
        'total_fees_paid' => 'int64',
        'beneficiary_count' => 'int32',
        'raw_score' => 'int64'
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
        'start_height' => 'startHeight',
        'total_fees_paid' => 'totalFeesPaid',
        'beneficiary_count' => 'beneficiaryCount',
        'raw_score' => 'rawScore'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'start_height' => 'setStartHeight',
        'total_fees_paid' => 'setTotalFeesPaid',
        'beneficiary_count' => 'setBeneficiaryCount',
        'raw_score' => 'setRawScore'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'start_height' => 'getStartHeight',
        'total_fees_paid' => 'getTotalFeesPaid',
        'beneficiary_count' => 'getBeneficiaryCount',
        'raw_score' => 'getRawScore'
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
        $this->container['start_height'] = isset($data['start_height']) ? $data['start_height'] : null;
        $this->container['total_fees_paid'] = isset($data['total_fees_paid']) ? $data['total_fees_paid'] : null;
        $this->container['beneficiary_count'] = isset($data['beneficiary_count']) ? $data['beneficiary_count'] : null;
        $this->container['raw_score'] = isset($data['raw_score']) ? $data['raw_score'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['start_height'] === null) {
            $invalidProperties[] = "'start_height' can't be null";
        }
        if ($this->container['total_fees_paid'] === null) {
            $invalidProperties[] = "'total_fees_paid' can't be null";
        }
        if ($this->container['beneficiary_count'] === null) {
            $invalidProperties[] = "'beneficiary_count' can't be null";
        }
        if ($this->container['raw_score'] === null) {
            $invalidProperties[] = "'raw_score' can't be null";
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
     * Gets total_fees_paid
     *
     * @return int
     */
    public function getTotalFeesPaid()
    {
        return $this->container['total_fees_paid'];
    }

    /**
     * Sets total_fees_paid
     *
     * @param int $total_fees_paid total_fees_paid
     *
     * @return $this
     */
    public function setTotalFeesPaid($total_fees_paid)
    {
        $this->container['total_fees_paid'] = $total_fees_paid;

        return $this;
    }

    /**
     * Gets beneficiary_count
     *
     * @return int
     */
    public function getBeneficiaryCount()
    {
        return $this->container['beneficiary_count'];
    }

    /**
     * Sets beneficiary_count
     *
     * @param int $beneficiary_count beneficiary_count
     *
     * @return $this
     */
    public function setBeneficiaryCount($beneficiary_count)
    {
        $this->container['beneficiary_count'] = $beneficiary_count;

        return $this;
    }

    /**
     * Gets raw_score
     *
     * @return int
     */
    public function getRawScore()
    {
        return $this->container['raw_score'];
    }

    /**
     * Sets raw_score
     *
     * @param int $raw_score raw_score
     *
     * @return $this
     */
    public function setRawScore($raw_score)
    {
        $this->container['raw_score'] = $raw_score;

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

