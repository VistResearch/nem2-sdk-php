<?php

function innerLoader($className) {
	if($className == "UInt64"){
		require __DIR__ ."/model/UInt64.php";
	}

	if($className == "Id"){
		require __DIR__ ."/model/Id.php";
	}
	else{
		$dirs = ["/util","/core","/core/crypto"];

		foreach ($dirs as $key => $value) {
		    $filename = __DIR__ . $value . "/" . $className . ".php";
		    if (is_readable($filename)) {
		        require $filename;
		    }
		}		
	}


}

spl_autoload_register("innerLoader");