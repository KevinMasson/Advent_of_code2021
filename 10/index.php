<?php

$data = fopen('data.txt', 'r');
$DataArray=array();
while(!feof($data)){
	$Line = trim(fgets($data));
	array_push($DataArray, new Lines($Line));
}

$Map=array();
$NbDanger=0;

foreach($DataArray as $Vent){
	$incx=1;
	if($Vent->x1>$Vent->x2){ $incx=-1;}
	$incy=1;
	if($Vent->y1>$Vent->y2){ $incy=-1;}
	
	if($Vent->hori==1 || $Vent->verti==1 )	{
		for($i=$Vent->x1;$i!=$Vent->x2+$incx;$i+=$incx){
			for($j=$Vent->y1;$j!=$Vent->y2+$incy;$j+=$incy){				
				if(isset($Map[$i][$j])){
					$Map[$i][$j]++;
				}else{
					$Map[$i][$j]=1;
				}
			}
		}	
	}else{
		$j=$Vent->y1;	
		for($i=$Vent->x1;$i!=$Vent->x2+$incx;$i+=$incx){
			if(isset($Map[$i][$j])){
				$Map[$i][$j]++;
			}else{
				$Map[$i][$j]=1;
			}
			$j+=$incy;
		}		
	}
}


foreach($Map as $Row){
	foreach($Row as $Col){
		if($Col>1){
			$NbDanger++;
		}
	}
}
echo $NbDanger;


class Lines{
	
	public $x1=0;
	public $y1=0;
	public $x2=0;
	public $y2=0;
	public $hori=0;
	public $verti=0;
	
	public function __construct($Line){
		$Line = explode('->',$Line);
		$this->x1=trim(explode(',',$Line[0])[0]);
		$this->y1=trim(explode(',',$Line[0])[1]);
		$this->x2=trim(explode(',',$Line[1])[0]);
		$this->y2=trim(explode(',',$Line[1])[1]);
		if($this->x1==$this->x2){$this->verti=1;}
		if($this->y1==$this->y2){$this->hori=1;}
	}
	
	
}


?>