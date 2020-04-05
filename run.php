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

for($i=0;$i<999;$i++){
    $arr[$i]=$i;
}
$button=1;     //1：显示过程 0：否

Tester::bind(['insertValueSearch\InsertValueSearch','binarySearch\BinarySearch'],$arr);
$res1=Tester::find('binarySearch\BinarySearch',0);
var_dump($res1);
$res2=Tester::find('insertValueSearch\InsertValueSearch',0);
var_dump($res2);

