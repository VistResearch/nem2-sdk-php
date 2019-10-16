<?php
namespace NEM\Tests\Models\Mosaic;

// Test Target
use NEM\Models\Mosaic\Mosaic;

// input source
use NEM\Models\UInt64;
use NEM\Models\Mosaic\MosaicId;
use NEM\Models\NEMnamespace\NamespaceId;


// Exception
use Exception;

class MosaicTest{
	public function test(){

		$testMosaicId = new MosaicId([0,0]);

		$amount = UInt64::fromUint(100000000000);

		$testTarget = new Mosaic($testMosaicId, $amount);

		if(!($testTarget instanceof Mosaic)){
			throw new Exception("Build failed\n");		
		}
		return True;

	}

}