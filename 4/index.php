<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
while(!feof($data)){
	$Line = fgets($data);
	array_push($DataArray, trim($Line));
}


$Pos['forward']=0;
$Pos['depth']=0;
$AIM=0;

foreach ($DataArray as $Action){
	$Act=explode(' ',$Action)[0];
	$Nb=explode(' ',$Action)[1];
	switch ($Act){
		case 'down' :
			$AIM+=$Nb;
		break;
		case 'up' :
			$AIM-=$Nb;
		break;
		case 'forward' :
			$Pos['forward']+=$Nb;
			$Pos['depth']+=($AIM*$Nb);
		break;
	}
	
	
	
	
}
var_dump($Pos);
$P=$Pos['forward']*$Pos['depth'];
echo $P;


?>