<?php

function modelLoader($className) {
	$dirs = ["Account","Blockchain","Transaction","Mosaic","Namespace"];

	foreach ($dirs as $key => $value) {
	    $filename = __DIR__ . "/src/model/". $value . "/" . $className . ".php";
	    if (is_readable($filename)) {
	        require $filename;
	    }
	}

}

spl_autoload_register("modelLoader");