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

Tester::bind('tree\BinaryTreeDemo');
Tester::run('tree\BinaryTreeDemo',[[1,'张三'],[11,'叮当'],[21,'蔡'],[15,'敖灿'],[17,'阿达']],2);
Tester::find('tree\BinaryTreeDemo',[11,21],1);


