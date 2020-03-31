<?php
use bubbleSort\BubbleSort;
use queen8\Queen8;
function test_autoload($ClassName){
    require_once __DIR__.DIRECTORY_SEPARATOR .$ClassName.".php";
}
spl_autoload_register('test_autoload',true,true);

for($i=0;$i<8;$i++){
    $arr[$i]=rand(0,999999);
}
$test=new BubbleSort($arr);
$test->run(true);
