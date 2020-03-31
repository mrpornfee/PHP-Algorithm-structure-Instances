<?php
use \bubbleSort\BubbleSort;
use \queen8\Queen8;
use \selectionSort\SelectionSort;
function test_autoload($ClassName){
    require_once __DIR__.DIRECTORY_SEPARATOR .$ClassName.".php";
}
spl_autoload_register('test_autoload',true,true);

for($i=0;$i<5000;$i++){
    $arr[$i]=rand(0,999999);
}
$test1=new BubbleSort($arr);
$test1->run(false);
$test2=new SelectionSort($arr);
$test2->run(false);
