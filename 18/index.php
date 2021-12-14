<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
while(!feof($data)){
	$Line = fgets($data);
	array_push($DataArray, trim($Line));
}



$Data=array();
$Row=0;
$Col=strlen($Line);

$LowerPoints=array();

foreach($DataArray as $Line){
	for($i=0;$i<$Col;$i++){
		$Data[$Row][$i]=$Line[$i];
	}
	$Row++;
}
for($i=0;$i<$Row;$i++){
	for($j=0;$j<$Col;$j++){
		$NbInf=0;
		if(!isset($Data[$i][$j-1]) || $Data[$i][$j]<$Data[$i][$j-1]){
			$NbInf++;
		}
		if(!isset($Data[$i-1][$j]) || $Data[$i][$j]<$Data[$i-1][$j]){
			$NbInf++;
		}
		if(!isset($Data[$i][$j+1]) || $Data[$i][$j]<$Data[$i][$j+1]){
			$NbInf++;
		}
		if(!isset($Data[$i+1][$j]) || $Data[$i][$j]<$Data[$i+1][$j]){
			$NbInf++;
		}
		if($NbInf>=4){
			array_push($LowerPoints,[$i,$j]);
		}
	}
}


$BasinValue = [];
function ChNeighbour($Neighbours,$NbNeighbours = 0, $CheckedNeighbour = []) {
	global $Data;
	$Level = 0;
	$NewNeighbours = [];
	foreach ($Neighbours as $Key => $Value) {
		if(isset($Data[$Value[0]][$Value[1]-1]) && $Data[$Value[0]][$Value[1]-1]!=9 && !in_array([$Value[0],$Value[1]-1], $CheckedNeighbour)) {
			array_push($CheckedNeighbour, [$Value[0],$Value[1]-1]);
			array_push($NewNeighbours, [$Value[0],$Value[1]-1]);
			$Level++;
			$NbNeighbours++;
		}
		if(isset($Data[$Value[0]][$Value[1]+1]) && $Data[$Value[0]][$Value[1]+1]!=9 && !in_array([$Value[0],$Value[1]+1], $CheckedNeighbour)) {
			array_push($CheckedNeighbour, [$Value[0],$Value[1]+1]);
			array_push($NewNeighbours, [$Value[0],$Value[1]+1]);
			$Level++;
			$NbNeighbours++;
		}
		if(isset($Data[$Value[0]-1][$Value[1]]) && $Data[$Value[0]-1][$Value[1]]!=9 && !in_array([$Value[0]-1,$Value[1]], $CheckedNeighbour)) {
			array_push($CheckedNeighbour, [$Value[0]-1,$Value[1]]);
			array_push($NewNeighbours, [$Value[0]-1,$Value[1]]);
			$Level++;
			$NbNeighbours++;
		}
		if(isset($Data[$Value[0]+1][$Value[1]]) && $Data[$Value[0]+1][$Value[1]]!=9 && !in_array([$Value[0]+1,$Value[1]], $CheckedNeighbour)) {
			array_push($CheckedNeighbour, [$Value[0]+1,$Value[1]]);
			array_push($NewNeighbours, [$Value[0]+1,$Value[1]]);
			$Level++;
			$NbNeighbours++;
		}
	}
	if($Level != 0) {
		return ChNeighbour($NewNeighbours,$NbNeighbours,$CheckedNeighbour,1);
	} else {
		return $NbNeighbours+1;
	}
}

foreach ($LowerPoints as $Key => $Value) {
	$BasinValue[$Key] = ChNeighbour([$Value],0,[$Value]);
}

rsort($BasinValue);
echo $BasinValue[0]." / ".$BasinValue[1]." / ".$BasinValue[2]."<br>";
echo $BasinValue[0]*$BasinValue[1]*$BasinValue[2];




?>

