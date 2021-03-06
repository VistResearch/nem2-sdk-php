<?php
/**
 * ReceiptTypeEnum
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
 * ReceiptTypeEnum Class Doc Comment
 *
 * @category Class
 * @description Type of receipt: * 0x124D (4685 decimal) - Mosaic_Rental_Fee. * 0x134E (4942 decimal) - Namespace_Rental_Fee. * 0x2143 (8515 decimal) - Harvest_Fee. * 0x2248 (8776 decimal) - LockHash_Completed. * 0x2348 (9032 decimal) - LockHash_Expired. * 0x2252 (8786 decimal) - LockSecret_Completed. * 0x2352 (9042 decimal) - LockSecret_Expired. * 0x3148 (12616 decimal) - LockHash_Created. * 0x3152 (12626 decimal) - LockSecret_Created. * 0x414D (16717 decimal) - Mosaic_Expired. * 0x414E (16718 decimal) - Namespace_Expired. * 0x424E (16974 decimal) - Namespace_Deleted. * 0x5143 (20803 decimal) - Inflation. * 0xE143 (57667 decimal) - Transaction_Group. * 0xF143 (61763 decimal) - Address_Alias_Resolution. * 0xF243 (62019 decimal) - Mosaic_Alias_Resolution.
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ReceiptTypeEnum
{
    /**
     * Possible values of this enum
     */
    const 4685 = 4685;
    const 4942 = 4942;
    const 8515 = 8515;
    const 8776 = 8776;
    const 9032 = 9032;
    const 8786 = 8786;
    const 9042 = 9042;
    const 12616 = 12616;
    const 12626 = 12626;
    const 16717 = 16717;
    const 16718 = 16718;
    const 16974 = 16974;
    const 20803 = 20803;
    const 57667 = 57667;
    const 61763 = 61763;
    const 62019 = 62019;
    
    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::4685,
            self::4942,
            self::8515,
            self::8776,
            self::9032,
            self::8786,
            self::9042,
            self::12616,
            self::12626,
            self::16717,
            self::16718,
            self::16974,
            self::20803,
            self::57667,
            self::61763,
            self::62019,
        ];
    }
}


