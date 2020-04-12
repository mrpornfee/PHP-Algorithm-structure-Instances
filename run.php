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

for($i=0;$i<100;$i++){
    $arr[$i]=rand(0,999);
}
$button=0;     //1：显示过程 0：否
Tester::bind('heapSort\HeapSort',$arr);
Tester::sort('heapSort\HeapSort',$button);



