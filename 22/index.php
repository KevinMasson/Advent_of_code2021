<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
while(!feof($data)){
	$Line = fgets($data);
	array_push($DataArray, trim($Line));
}

$Data=array();
$i=0;
foreach($DataArray as $Line){
	for($j=0;$j<strlen($Line);$j++){
		$Data[$i][$j]=$Line[$j];
	}	
	$i++;
}


$NbFlash=0;

//for($Step=1;$Step<=$NbSteps;$Step++){
$Step=0;
while ($NbFlash<100){
	$NbFlash=0;
	$Step++;
	$FlashOcto=array();	
	foreach($Data as $R => $Line){
		foreach($Line as $C => $Value){
			$Data[$R][$C]++;
			if($Data[$R][$C]>9){
				$FlashOcto[$R][$C]=1;				
			}
		}
	}
	foreach($FlashOcto as $R => $Line){
		foreach($Line as $C => $Value){
			Flash($Data,$FlashOcto,$R,$C);
		}
	}
	foreach($FlashOcto as $R => $Line){
		foreach($Line as $C => $Value){
			$Data[$R][$C]=0;
			$NbFlash++;
		}
	}
	var_dump($NbFlash);
}

echo $Step;

function Flash(&$Data, &$FlashOcto, $x,$y){
	for($i=max(0,$x-1);$i<=min(9,$x+1);$i++){
		for($j=max(0,$y-1);$j<=min(9,$y+1);$j++){
			if($x!==$i || $y!==$j){
				$Data[$i][$j]++;
				if($Data[$i][$j]>9 && !isset($FlashOcto[$i][$j])){
					$FlashOcto[$i][$j]=1;
					Flash($Data,$FlashOcto,$i,$j);
				}
			}
		}
	}
}

?>