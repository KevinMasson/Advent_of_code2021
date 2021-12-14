<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
while(!feof($data)){
	$Line = fgets($data);
	array_push($DataArray, trim($Line));
}
$Data=array();
foreach($DataArray as $Line){
	$Points = explode('-',$Line);
	$Data[$Points[0]][]=$Points[1];
	$Data[$Points[1]][]=$Points[0];
	
}
$Paths=[];

echo  exploreCave($Data,$Paths,'start',0);


function exploreCave($Data,&$Paths,$CurrentCave, $Tentative){
	if(isset($Paths[$Tentative])){
		$Path = $Paths[$Tentative];
	}else{
		$Path =[];
	}
    $Path[] = $CurrentCave;
    if ($CurrentCave ==='end') {
        $Paths[$Tentative] = $Path;
        return $Tentative + 1;
    }
	
    foreach ($Data[$CurrentCave] as $Cave) {
        if (ctype_lower($Cave) && in_array($Cave, $Path)) continue;
        $Paths[$Tentative] = $Path;
        $Tentative = exploreCave($Data, $Paths,$Cave, $Tentative);
    }
    unset($Paths[$Tentative]);
    return $Tentative;
	
}




?>