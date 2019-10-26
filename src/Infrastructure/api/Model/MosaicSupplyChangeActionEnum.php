<?php
/**
 * MosaicSupplyChangeActionEnum
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
use \OpenAPI\Client\ObjectSerializer;

/**
 * MosaicSupplyChangeActionEnum Class Doc Comment
 *
 * @category Class
 * @description Direction of the supply change: * 0  - Decrease. * 1  - Increase.
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class MosaicSupplyChangeActionEnum
{
    /**
     * Possible values of this enum
     */
    const 0 = 0;
    const 1 = 1;
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::0,
            self::1,
        ];
    }
}


