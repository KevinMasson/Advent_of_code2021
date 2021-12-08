<?php

$data = fopen('data.txt', 'r');

$Line = fgets($data);

$DataArray=explode(',',$Line);
$Max=max($DataArray);
$Min=min($DataArray);

$PosMin=0;
$CostMin=999999;
for($i=$Min;$i<=$Max;$i++){
	$CCost=0;
	foreach($DataArray as $Val){
		$CCost+=abs(($Val-$i));
	}
	if($CCost<$CostMin){
		$CostMin=$CCost;
		$PosMin=$i;
	}
}

echo "Pos : ".$PosMin." - Cost :" .$CostMin;

?>