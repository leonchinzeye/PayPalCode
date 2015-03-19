<?php

function debugPrint() {
	echo "<script>console.log('I here');</script>";
}

function debugPrintVar($string, $int) {
	echo "<script>console.log('".$string.": ".$int."');</script>";
} 

?>