<?php

namespace shellSort;

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