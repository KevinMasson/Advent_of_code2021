<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
while(!feof($data)){
	$Line = fgets($data);
	array_push($DataArray, trim($Line));
}

$Inc=0;
$Dec=0;

$DataArrayW=array();

for($i=2;$i<count($DataArray);$i++){
	$Sum=$DataArray[$i]+$DataArray[$i-1]+$DataArray[$i-2];
	array_push($DataArrayW,$Sum);
}

for($i=1;$i<count($DataArrayW);$i++){

	if($DataArrayW[$i]>$DataArrayW[$i-1]){
		$Inc++;
		echo " Inc <br>";
	}
	if($DataArrayW[$i]<$DataArrayW[$i-1]){
		$Dec++;
		echo " Dec <br>";
	}
}

echo "Inc : ".$Inc."<br>";
echo "Dec : ".$Dec."<br>";

?>