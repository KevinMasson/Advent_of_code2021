<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
while(!feof($data)){
	$Line = fgets($data);
	array_push($DataArray, trim($Line));
}


$Balise=array('('=>')','['=>']','{'=>'}','<'=>'>');
$ClosingScore=array(')'=>1,']'=>2,'}'=>3,'>'=>4);

$Scores =array();
foreach($DataArray as $Line){
	$ToClose=TestLine($Line);
	$Score=0;
	foreach(array_reverse($ToClose) as $Char){
		$Score= ($Score*5)+$ClosingScore[$Balise[$Char]];
	}
	if($Score>0){
		array_push($Scores,$Score);
	}
}
sort($Scores);
var_dump ($Scores);
var_dump($Scores[intval(count($Scores)/2)]);



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
				return array();				
			}
			array_pop($Work);
		}		
	}
	return $Work;
}




?>



