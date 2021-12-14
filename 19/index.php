<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
while(!feof($data)){
	$Line = fgets($data);
	array_push($DataArray, trim($Line));
}


$Balise=array('('=>')','['=>']','{'=>'}','<'=>'>');
$ErrorPoints=array(')'=>3,']'=>57,'}'=>1197,'>'=>25137);

var_dump($DataArray);
$TotalError=0;
foreach($DataArray as $Line){
	$TotalError+=TestLine($Line);
	
}
echo $TotalError;

function TestLine($Line){
	global $Balise;
	global $ErrorPoints;
	$Work=array();
	for($i=0;$i<strlen($Line);$i++){
		if(isset($Balise[$Line[$i]])){
			array_push($Work,$Line[$i]);
		}else{
			$Last=$Balise[$Work[array_key_last($Work)]];
			$Actual=$Line[$i];
			if($Last!=$Actual){
				return $ErrorPoints[$Line[$i]];				
			}
			array_pop($Work);
		}		
	}
}




?>



