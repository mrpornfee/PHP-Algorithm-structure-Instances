<?php

namespace algorithm\shellSort;
//希尔排序
class ShellSort
{
    use \tools\microtimeToFloat;

    private static  $arr;

    public function __construct($arr)
    {
        if(is_array($arr)) self::$arr=$arr;
        else {
            echo '需用数组初始化';
            exit;
        }
    }

    private function sort($show){
            for($gap=(int)(sizeof(self::$arr)/2);$gap>0;$gap=(int)($gap/2)){
                echo "步长为{$gap}的排序过程：".PHP_EOL;
                for($i=$gap;$i<sizeof(self::$arr);$i++){
                    $temp=self::$arr[$i];
                    $index=$i-$gap;
                    while($index>=0&&$temp<self::$arr[$index]){
                        self::$arr[$index+$gap]=self::$arr[$index];
                        $index -=$gap;
                    }
                    self::$arr[$index+$gap]=$temp;
                    $this->show($show);
                }

            }

    }

    private function show($show=true){
        if($show==true) {
            for ($i = 0; $i < sizeof(self::$arr); $i++) {
                echo self::$arr[$i] . '  ';
            }
            echo PHP_EOL;
            echo PHP_EOL;
        }
    }

    public function run($show=true){
        $this->show($show);
        $timeBefore=$this->getTime();
        $this->sort($show);
        $timeAfter=$this->getTime();
        echo '希尔排序执行时间为'.($timeAfter-$timeBefore).'秒'.PHP_EOL;
    }

}