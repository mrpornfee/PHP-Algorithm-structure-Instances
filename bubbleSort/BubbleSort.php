<?php
/**
 * Created by PhpStorm.
 * User: 93709
 * Date: 2020/3/31
 * Time: 10:16
 */

class BubbleSort
{
    private  static  $arr;

    public function __construct($arr)
    {
        if(is_array($arr)) self::$arr=$arr;
        else {
            echo '请初始化一个数组';
            exit;
        }
    }
    private function sort(){
        $temp=0;
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
            $this->show();
        }
    }

    private function show(){
        for($i=0;$i<sizeof(self::$arr);$i++){
            echo self::$arr[$i].'  ';
        }
        echo PHP_EOL;
        echo PHP_EOL;
    }

    public function run(){
        $this->show();
        $timeBefore=time();
        $this->sort();
        $timeAfter=time();
        echo '执行时间为'.($timeAfter-$timeBefore).'秒'.PHP_EOL;
    }

}
for($i=0;$i<1000;$i++){
    $arr[$i]=rand(0,999999);
}

$a=new BubbleSort($arr);
$a->run();