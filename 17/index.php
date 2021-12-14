<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
while(!feof($data)){
	$Line = fgets($data);
	array_push($DataArray, trim($Line));
}

$Danger=0;

$Data=array();
$Row=0;
$Col=strlen($Line);
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
			$Danger+=$Data[$i][$j]+1;
		}
	}
	
}


echo $Danger;



?>

