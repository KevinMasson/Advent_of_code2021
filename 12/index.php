<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
while(!feof($data)){
	$Line = fgets($data);
	$DataArray=explode(",",$Line);
}


$NbJours=256;

$fishes = array_fill(0, 9, 0);
foreach ($DataArray as $age) {
	$fishes[$age]++;
}

for ($i=0; $i< $NbJours; $i++) {
	$NewFishes=array_shift($fishes);
	$fishes[6]+=$NewFishes;
	$fishes[]=$NewFishes;

}
echo array_sum($fishes);
	
?>