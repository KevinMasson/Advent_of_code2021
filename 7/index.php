<?php

$data = fopen('data.txt', 'r');
$DataArray=array();

$Tirage=explode(',',trim(fgets($data)));

$Grids=array();
$Line = trim(fgets($data));
$IdG=1;
while(!feof($data)){
	$Grid = new Grid();
	$Grid->Id=$IdG;
	for($i=0;$i<5;$i++){
		$Line = trim(fgets($data));
		$Grid->addRow($Line);
	}
	$Grid->calculateCol();
	array_push($Grids,$Grid);
	$Line = trim(fgets($data));
	$IdG++;
}

$Stop=0;
foreach($Tirage as $T){
	foreach ($Grids as $G){
		if($Stop==0){
			$G->checkNumber($T);
			if($G->Win==1){
				$Stop=1;
				echo $T." ---".$G->Id ."<br>";
				echo $G->getTotal()."<br>";
				echo $T*$G->getTotal()."<br>";
			}
		}
	}	
}


class Grid{
	
	public $Columns=array();
	public $Rows=array();
	public $Win=0;
	public $Id=0;
	
	public function addRow($Line){
		$R=explode(' ',str_replace('  ',' ',$Line));
		array_push($this->Rows,$R);
		
	}
	public function calculateCol(){
		for($i=0;$i<5;$i++){
			$C=array();
			foreach($this->Rows as $R){
				array_push($C,$R[$i]);
			}
			array_push($this->Columns,$C);
		}
	}
	
	public function checkNumber($Number){
		foreach($this->Rows as $Key => $Row){
			foreach($Row as $Key2 => $Value){
				if($Value==$Number){
					unset($this->Rows[$Key][$Key2]);
				}
				if(count($this->Rows[$Key])==0){
					$this->Win=1;
				}
			}
		}
		foreach($this->Columns as $Key => $Row){
			foreach($Row as $Key2 => $Value){
				if($Value==$Number){
					unset($this->Columns[$Key][$Key2]);
				}
				if(count($this->Columns[$Key])==0){
					$this->Win=1;
				}
			}
		}
	}
	
	public function getTotal(){
		$Total=0;
		foreach($this->Rows as $Key => $Row){
			foreach($Row as $Key2 => $Value){
				$Total+=$Value;
			}
		}
		return $Total;
	}
	
	

}

?>