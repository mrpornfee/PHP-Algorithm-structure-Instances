<?php
/**
 * Created by PhpStorm.
 * User: 93709
 * Date: 2020/4/3
 * Time: 13:12
 */
namespace algorithm\binarySearch;

//二分查找算法
class BinarySearch
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
    //判断是否有序
    private function judge(){
        $t=sizeof(self::$arr);
        for($i=0;$i<$t-1;$i++){
            if(self::$arr[$i]>self::$arr[$i+1])
                return false;
        }
        return true;
    }

    private function find(){

    }

    private function show(){

            for ($i = 0; $i < sizeof(self::$arr); $i++) {
                echo self::$arr[$i] . '  ';
            }
            echo PHP_EOL;
            echo PHP_EOL;

    }

    public function run(){
        $this->show();
        if(!$this->judge()) return '非有序数组无法查找---二分查找';
        $timeBefore=$this->getTime();
        $this->find();
        $timeAfter=$this->getTime();
        echo '二分查找执行时间为'.($timeAfter-$timeBefore).'秒'.PHP_EOL;
        return self::$arr;
    }

}