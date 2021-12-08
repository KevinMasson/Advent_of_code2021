<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
while(!feof($data)){
	$Line = fgets($data);
	array_push($DataArray, trim($Line));
}


$Pos['forward']=0;
$Pos['down']=0;
$Pos['up']=0;

foreach ($DataArray as $Action){
	$Pos[explode(' ',$Action)[0]]+=explode(' ',$Action)[1];
	
}
	
$depth=$Pos['down']-$Pos['up'];
$P=$Pos['forward']*$depth;
echo $P;


?>