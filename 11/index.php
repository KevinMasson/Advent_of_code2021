<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
while(!feof($data)){
	$Line = fgets($data);
	$DataArray=explode(",",$Line);
}


$NbJours=80;
for($i=1;$i<=$NbJours;$i++){
	$NewFish=0;
	foreach($DataArray as $Key=>$Fish){
		if($Fish==0){
			$NewFish++;
			$DataArray[$Key]=6;
		}else{
			$DataArray[$Key]--;
		}
	}
	for($j=1;$j<=$NewFish;$j++){
		array_push($DataArray,8);
	}
}
echo count($DataArray);
	
?>