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
$button=1;     //1：显示过程 0：否
Tester::bind('huffman\HuffmanCode','askjidhasidhasiufhiuweicwenifhgweiufhweoifjoasifoasihfsauigfsaiufhgasuifgasifgfsiaufgasxoa');
Tester::sort('huffman\HuffmanCode',$button);
$a=Tester::compress('huffman\HuffmanCode');
print_r($a.PHP_EOL);
$b=Tester::decompress('huffman\HuffmanCode',$a);
print_r($b.PHP_EOL);
