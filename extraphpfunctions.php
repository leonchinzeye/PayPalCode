<?php

function debugPrintln() {
	echo "<script>console.log('I here');</script>";
}

function debugPrintVar($string, $int) {
	echo "<script>console.log('".$string.": ".$int."');</script>";
} 

function checkCartHasKey($array, $key, $val) {
	foreach ($array as $item)
        if (isset($item[$key]) && $item[$key] == $val)
            return true;
    return false;
}

function getRowOfValue($array, $key, $val) {
	for($i = 0; $i < count($array); $i++) {
		if(isset($array[$i]) && $array[$i][$key] == $val) {
			return $i;
		}
	}

	return -1;
} 
?>