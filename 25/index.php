<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
$Instructions=array();
$Stop=false;


while(!feof($data) && !$Stop){
	$Line = trim(fgets($data));
	if($Line==""){$Stop=true;}else{
		$Coord=explode(',',trim($Line));
		$DataArray[$Coord[0]][$Coord[1]]=true;

	}
}

//while(!feof($data)){
	$Line = trim(fgets($data));
	array_push($Instructions, str_replace('fold along ','',trim($Line)));
//}


foreach($Instructions as $Instruction){
	$I=explode('=',$Instruction);
	$Sens=$I[0];
	$NB=$I[1];
	foreach($DataArray as $Key=>$Col){
		foreach($Col as $Key2=>$Value){
			if($Sens=="y"){
				if($Key2>=$NB){
					if($Key2>$NB){
						$NewKey2=$NB-($Key2-$NB);
						$DataArray[$Key][$NewKey2]=true;
					}
					unset($DataArray[$Key][$Key2]);
				}
			}
			if($Sens=="x"){
				if($Key>=$NB){
					if($Key>$NB){
						$NewKey=$NB-($Key-$NB);
						$DataArray[$NewKey][$Key2]=true;
					}
					unset($DataArray[$Key][$Key2]);
					if(count($DataArray[$Key])==0){
						unset($DataArray[$Key]);
					}
				}
			}
		}
	}
}
$NbDot=0;
foreach($DataArray as $Key=>$Col){
	foreach($Col as $Key2=>$Value){
		if($Value){
			$NbDot++;
		}
	}
}

echo $NbDot;
?>