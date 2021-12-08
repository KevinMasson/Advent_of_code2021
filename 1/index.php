<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
while(!feof($data)){
	$Line = fgets($data);
	array_push($DataArray, trim($Line));
}

$Inc=0;
$Dec=0;
echo $DataArray[0]."<br>";
for($i=1;$i<count($DataArray);$i++){
	echo $DataArray[$i];
	if($DataArray[$i]>$DataArray[$i-1]){
		$Inc++;
		echo " Inc <br>";
	}
	if($DataArray[$i]<$DataArray[$i-1]){
		$Dec++;
		echo " Dec <br>";
	}
}
echo "Inc : ".$Inc."<br>";
echo "Dec : ".$Dec."<br>";

?>