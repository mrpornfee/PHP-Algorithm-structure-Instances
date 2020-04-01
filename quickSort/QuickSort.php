<?php

namespace quickSort;
//快速排序
class QuickSort
{
    use \tools\microtimeToFloat;

    private static  $arr;
    public function __construct($arr)
    {
        if(is_array($arr)) {
            self::$arr = $arr;
        }
        else {
            echo '需用数组初始化';
            exit;
        }
    }

    private function sort($low,$high,$show){
        if($low<$high){
            $index=$this->getIndex($low,$high,$show);
            $this->sort($low,$index-1,$show);
            $this->sort($index+1,$high,$show);
        }
    }

    private function getIndex($low,$high,$show){
        $tmp=self::$arr[$low];
        while($low<$high){
            while($low<$high&&self::$arr[$high]>=$tmp){
                    $high--;
            }
            self::$arr[$low]=self::$arr[$high];
            while($low<$high&&self::$arr[$low]<=$tmp){
                $low++;
            }
            self::$arr[$high]=self::$arr[$low];
        }
        self::$arr[$low]=$tmp;
        $this->show($show);
        return $low;
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
        $this->sort(0,sizeof(self::$arr)-1,$show);
        $timeAfter=$this->getTime();
        echo '快速排序执行时间为'.($timeAfter-$timeBefore).'秒'.PHP_EOL;
    }

}