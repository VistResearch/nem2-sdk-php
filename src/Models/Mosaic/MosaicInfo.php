<?php 

namespace NEM\Models\Mosiac;

use NEM\Models\UInt64;
use NEM\Models\Mosiac\MosaicId;
use NEM\Models\Mosiac\MosaicProperties;
use NEM\Models\Account\PublicAccount;


class MosaicInfo{
	public $metaId; // string
	public $mosaicId; //MosaicId
	public $supply; // UInt64
	public $height; //UInt64, height where mosaic was created.
	public $owner; // PublicAccount
	public $revision; // int
	public $properties; //MosaicProperties

	function __construct(string $metaId, MosaicId $mosaicId, UInt64 $supply, UInt64 $height, PublicAccount $owner,
						int $revision, MosaicProperties $properties){
		$this->metaId = $metaId;
		$this->mosaicId = $mosaicId;
		$this->supply = $supply;
		$this->height = $height;
		$this->owner = $owner;
		$this->revision = $revision
		$this->properties = $properties;
	}

	/**
     * Mosaic divisibility
     * @returns {number}
     */
	public function divisibility(): int{
		return $this->properties->divisibility;
	}

	 /**
     * Mosaic duration
     * @returns {UInt64}
     */
 	public function duration(): UInt64{
        return $this->properties->duration;
    }

    /**
     * Is mosaic supply mutable
     * @returns {boolean}
     */
    public function isSupplyMutable(): bool {
        return $this->properties->supplyMutable;
    }

    /**
     * Is mosaic transferable
     * @returns {boolean}
     */
    public function isTransferable(): bool {
        return $this->properties->transferable;
    }

    /**
     * Is levy mutable
     * @returns {boolean}
     */
    public function isLevyMutable(): bool {
        return $this->properties->levyMutable;
    }


}