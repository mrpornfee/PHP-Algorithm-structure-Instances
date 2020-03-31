<?php
/**
 * Created by PhpStorm.
 * User: 93709
 * Date: 2020/3/31
 * Time: 13:16
 */
namespace selectionSort;

class SelectionSort
{
    private static  $arr;

    public function __construct($arr)
    {
        if(is_array($arr)) self::$arr=$arr;
        else {
            echo '需用数组初始化';
            exit;
        }
    }

    public function run($show=true){
        $this->show($show);
        $timeBefore=microtime();
        $this->sort($show);
        $timeAfter=microtime();
        echo '执行时间为'.($timeAfter-$timeBefore).'秒'.PHP_EOL;
    }

    private function sort($show)
    {
        for ($i = 0; $i < sizeof(self::$arr)-1; $i++) {
            $minIndex = $i;
            $min = self::$arr[$i];
            for ($j = $i + 1; $j < sizeof(self::$arr); $j++) {
                if ($min > self::$arr[$j]) {
                    $min = self::$arr[$j];
                    $minIndex = $j;
                }
            }
            self::$arr[$minIndex] = self::$arr[$i];
            self::$arr[$i] = $min;
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
}