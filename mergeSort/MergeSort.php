<?php

namespace mergeSort;
//归并排序
class MergeSort
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

    private function sort($left,$right,$show){
        if($left<$right){
            $mid=(int)(($left+$right)/2);
            $this->sort($left,$mid,$show);
            $this->sort($mid+1,$right,$show);
           $this->merge($left,$right, $mid,$show);
            $this->show($show);
        }

    }


    private function merge($left,$right, $mid,$show){
        $i=$left;
        $j=$mid+1;
        while ($i<=$mid&&$j<=$right){
            if(self::$arr[$i]>self::$arr[$j]){
                $temp[]=self::$arr[$j];
                $j++;
            }else{
                $temp[]=self::$arr[$i];
                $i++;
            }
        }
        while($i<=$mid){
            $temp[]=self::$arr[$i];
            $i++;
        }
        while($j<=$right){
            $temp[]=self::$arr[$j];
            $j++;
        }
        $t=0;
        $tmpleft=$left;
        while($tmpleft<=$right){
            self::$arr[$tmpleft]=$temp[$t];
            $tmpleft++;
            $t++;
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
        $this->sort(0,sizeof(self::$arr)-1,$show);
        $timeAfter=$this->getTime();
        echo '归并排序执行时间为'.($timeAfter-$timeBefore).'秒'.PHP_EOL;
    }

}