<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
while(!feof($data)){
	$Line = fgets($data);
	array_push($DataArray, trim($Line));
}

var_dump($DataArray);

$UnikLenth = array(2,3,4,7);
$NbDigitAppear=0;

foreach ($DataArray as $Line) {
    $Digits = explode('|', $Line);
    $Digits = explode(' ', $Digits[1]);
	foreach($Digits as $Digit){
		$DigitLenth=strlen($Digit);
		if(in_array( $DigitLenth,$UnikLenth)){
			$NbDigitAppear++;
		}
	}
}

echo "Nb Digits ".$NbDigitAppear;







?>