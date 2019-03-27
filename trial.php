<?php
$transno = generateTranscode();
	

	function generateTranscode(){
		$keylength = 10;
		$str = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$rand = substr(str_shuffle($str), 0, $keylength);
		return $rand;
	}

	echo $transno
?>