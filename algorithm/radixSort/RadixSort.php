<?php
/**
 * Created by PhpStorm.
 * User: 93709
 * Date: 2020/4/2
 * Time: 14:50
 */
namespace algorithm\radixSort;
//基数排序
class RadixSort
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
        $bucket=array_fill(0,10,null);
        $max=max(self::$arr);
        for($i=1;$i<=$max;$i*=10) {
            for ($j = 0; $j < sizeof(self::$arr); $j++) {
                $digit = ((int)(self::$arr[$j] / $i)) % 10;
                $bucket[$digit][] = self::$arr[$j];
            }
            for ($j = 0; $j < 10; $j++) {
                while ($bucket[$j] != null) {
                    $tmp[]=$bucket[$j][0];
                     array_shift($bucket[$j]);
                }
            }
            self::$arr = $tmp;
            $tmp=[];
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
        echo '基数排序执行时间为'.($timeAfter-$timeBefore).'秒'.PHP_EOL;
        return self::$arr;
    }

}