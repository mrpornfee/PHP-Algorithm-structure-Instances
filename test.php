<?php
use queen8\Queen8;
use bubbleSort\BubbleSort;
use selectionSort\SelectionSort;
use insertSort\InsertSort;
function test_autoload($ClassName){
    require_once __DIR__.DIRECTORY_SEPARATOR .$ClassName.".php";
}
spl_autoload_register('test_autoload',true,true);
//↓↓↓↓操作区↓↓↓↓
for($i=0;$i<8000;$i++){
    $arr[$i]=rand(0,999999);
}
$button=false;
//↑↑↑↑操作区↑↑↑↑
$test1=new BubbleSort($arr);
$test1->run($button);
$test2=new SelectionSort($arr);
$test2->run($button);
$test2=new InsertSort($arr);
$test2->run($button);
