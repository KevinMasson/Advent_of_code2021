<?php

$data = fopen('data.txt', 'r');

$Line = fgets($data);
$DataArray=explode(' ',trim($Line));

var_dump($DataArray);


?>