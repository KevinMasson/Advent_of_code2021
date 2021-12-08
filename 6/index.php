<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
while(!feof($data)){
	$Line = fgets($data);
	array_push($DataArray, trim($Line));
}


$Len= strlen($DataArray[0]);
$Data=$DataArray;

for($i=0;$i<$Len;$i++){
	if(count($DataArray)>1){
		$Critera=analyseOxygen($DataArray,$i);
		$DataArray=filtreData($DataArray,$i,$Critera);
	}else{
		break;
	}
	
}

$Oxygen=bindec($DataArray[0]);
echo "o : ".$Oxygen."<br>";

$DataArray=$Data;
for($i=0;$i<$Len;$i++){
	if(count($DataArray)>1){
		$Critera=analyseCO2($DataArray,$i);
		$DataArray=filtreData($DataArray,$i,$Critera);
	}else{
		break;
	}
}

$CO2=bindec($DataArray[0]);
echo "co2 : ".$CO2."<br>";

$Total=$CO2*$Oxygen;
echo "Total : ".$Total."<br>";


Function analyseOxygen($Array,$Col){
	$Res[0]=0;
	$Res[1]=0;
	foreach($Array as $Line){
		$Res[$Line[$Col]]++;
	}
	if($Res[0]>$Res[1]){
		return 0;
	}else{
		return 1;
	}
}

Function analyseCO2($Array,$Col){
	$Res[0]=0;
	$Res[1]=0;
	foreach($Array as $Line){
		$Res[$Line[$Col]]++;
	}
	if($Res[0]>$Res[1]){
		return 1;
	}else{
		return 0;
	}
}

function filtreData($Array,$Col,$Value){
	$Res=array();
	foreach($Array as $Line){
		if($Line[$Col]==$Value){
			array_push($Res,$Line);
		}
	}
	return $Res;
}



?>
