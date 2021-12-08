<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
while(!feof($data)){
	$Line = fgets($data);
	array_push($DataArray, trim($Line));
}
 var_dump($DataArray);
for($i=0;$i<12;$i++){
	$Res[$i][0]=0;
	$Res[$i][1]=0;
}
foreach($DataArray as $Line){
		for($i=0;$i<strlen($Line);$i++){
			$Res[$i][$Line[$i]]++;
	}
}

var_dump($Res);
$Gamma="";
$Epsilon="";
for($i=0;$i<12;$i++){
	if($Res[$i][0]>$Res[$i][1]){
		$Gamma.="0";
		$Epsilon.="1";
	}else{
		$Gamma.="1";
		$Epsilon.="0";
	}
}

$Power = bindec($Gamma)*bindec($Epsilon);
echo $Power;

?>
