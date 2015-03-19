<?php

function debugPrintln() {
	echo "<script>console.log('I here');</script>";
}

function debugPrintVar($string, $int) {
	echo "<script>console.log('".$string.": ".$int."');</script>";
} 

function searchCartByKey($array, $key, $val) {
	foreach ($array as $item)
        if (isset($item[$key]) && $item[$key] == $val)
            return true;
    return false;
}
?>