<?php
$arr=file('https://github.com/wemsx/imgapi/raw/master/api/wl.txt');
$n=count($arr)-1;
for ($i=1;$i<=1;$i++){
  $x=rand(0,$n);
  header("Location:".$arr[$x],"\n");
}
?> 
