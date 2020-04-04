<?php
use driver\Tester;
require_once 'autoload.php';
//=======================================================================
/*$class=new ReflectionClass('queen8\Queen8');
$instance=$class->newInstanceArgs([8]);
$instance->main();
$method=$class->getMethod('main');
$method->invoke($instance);*/
//========================================================================

for($i=0;$i<7;$i++){
    $arr[$i]=rand(0,9);
}
$button=1;     //1：显示过程 0：否

Tester::bind('radixSort\RadixSort',$arr);
$a=Tester::sort('radixSort\RadixSort',$button);
Tester::bind('binarySearch\BinarySearch',$a);
$res=Tester::find('binarySearch\BinarySearch',5);
var_dump($res);

