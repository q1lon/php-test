<?php
$ss=[['num'=>1,'id'=>1],['num'=>3,'id'=>2]];
$aa=array_column($ss,'num');
$count=array_sum($aa);
var_dump($count);