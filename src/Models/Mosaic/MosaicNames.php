<?php

namespace NEM\Models\Mosiac;

use NEM\Models\Mosiac\MosaicId;
use NEM\Models\NEMnamespace\NamespaceId;

/**
 * Mosaic with linked names
 */

class MosaicNames{
	public $mosaicId;
	public $names;


	function __construct(MosaicId $mosaicId, Array $names){
        $this->mosaicId = $mosaicId;
        $this->names = $names;   
	}

}