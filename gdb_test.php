<?php
for($i = 0; $i < 10; $i++){
echo $i."\n";
sleep(3);
if(in_array($i,[1,9,20])){
print_r($i*$i);
var_dump($i*$i); 
print $i*$i;
} 
}
