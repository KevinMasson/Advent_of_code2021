<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
while(!feof($data)){
	$Line = fgets($data);
	$Data=explode('|',trim($Line))[1];
	array_push($DataArray, $Data);
}

var_dump($DataArray);

$Digits=array();
$Digits[0]=strOrder("cagedb");
$Digits[1]=strOrder("ab");
$Digits[2]=strOrder("gcdfa");
$Digits[3]=strOrder("fbcad");
$Digits[4]=strOrder("eafb");
$Digits[5]=strOrder("cdfbe");
$Digits[6]=strOrder("cdfgeb");
$Digits[7]=strOrder("dab");
$Digits[8]=strOrder("acedgfb");
$Digits[9]=strOrder("cefabd");

$DigitsW=array();

foreach ($Digits as $Key => $Val){
	$DigitsW[$Val]=$Key;
}
var_dump($DigitsW);

//$UnikLenth = array(2,3,4,7);

foreach ($DataArray as $Line){
	$Nb="";
	$Number=explode(" ",trim($Line));
	
	foreach(explode(" ",$Line) as $N){
		$N=strOrder($N);
		var_dump($N);
		$DigitLenth=strlen($N);
		//if(!in_array( $DigitLenth,$UnikLenth)){
			if(isset($DigitsW[$N])){
				$Nb.=$DigitsW[$N];
				var_dump($DigitsW[$N]);
			}
		//}
	}

	echo $Nb."<br>";
}




function strOrder($Str){
	$Chars = preg_split('//u', $Str);
    sort($Chars);
    return implode('', $Chars);
	
}


?>