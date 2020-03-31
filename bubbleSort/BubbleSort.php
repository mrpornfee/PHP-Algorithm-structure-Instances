<?php
/**
 * Created by PhpStorm.
 * User: 93709
 * Date: 2020/3/31
 * Time: 10:16
 */
namespace bubbleSort;

class BubbleSort
{
    use \tools\microtimeToFloat;

    private  static  $arr;

    public function __construct($arr)
    {
        if(is_array($arr)) self::$arr=$arr;
        else {
            echo '请初始化一个数组';
            exit;
        }
    }
    private function sort($show=true){
        $sym=0;
        for($i=0;$i<sizeof(self::$arr)-1;$i++){
            for($j=0;$j<sizeof(self::$arr)-$i-1;$j++){
                if(self::$arr[$j]>self::$arr[$j+1]){
                    $sym=1;
                    $temp=self::$arr[$j];
                    self::$arr[$j]= self::$arr[$j+1];
                    self::$arr[$j+1]=$temp;
                }
            }
            if($sym==0) break;
            else $sym=0;
            $this->show($show);
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
        echo '冒泡执行时间为'.($timeAfter-$timeBefore).'秒'.PHP_EOL;
    }

}

