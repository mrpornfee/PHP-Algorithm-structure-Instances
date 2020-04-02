<?php
use queen8\Queen8;
use bubbleSort\BubbleSort;
use selectionSort\SelectionSort;
use insertSort\InsertSort;
use shellSort\ShellSort;
use quickSort\QuickSort;
use mergeSort\MergeSort;
use radixSort\RadixSort;
function test_autoload($ClassName){
    require_once __DIR__.DIRECTORY_SEPARATOR .$ClassName.".php";
}
spl_autoload_register('test_autoload',true,true);
//↓↓↓↓操作区↓↓↓↓
for($i=0;$i<100;$i++){
    $arr[$i]=rand(0,9999);
}
$button=0;
//↑↑↑↑操作区↑↑↑↑

/*$class=new ReflectionClass('queen8\Queen8');
$instance=$class->newInstanceArgs([8]);
$instance->main();
$method=$class->getMethod('main');
$method->invoke($instance);*/


$test1=new BubbleSort($arr);
$test1->run($button);
$test2=new SelectionSort($arr);
$test2->run($button);
$test3=new InsertSort($arr);
$test3->run($button);
$test4=new ShellSort($arr);
$test4->run($button);
$test5=new QuickSort($arr);
$test5->run($button);
$test5=new MergeSort($arr);
$test5->run($button);
$test6=new RadixSort($arr);
$test6->run($button);
