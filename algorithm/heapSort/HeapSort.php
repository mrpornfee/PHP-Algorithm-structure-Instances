<?php
/**
 * Created by PhpStorm.
 * User: 马鹏飞
 * Date: 2020/4/12
 * Time: 17:41
 */
namespace algorithm\heapSort;
//堆排序 自下往上 自右往左
class HeapSort
{
    use \tools\microtimeToFloat;
    private static  $arr;

    public  function __construct(array $arr)
    {
        self::$arr=$arr;
    }

    public function run($show){
        $timeBefore=$this->getTime();
        $this->heapSort($show);
        $timeAfter=$this->getTime();
        echo '堆排序执行时间为'.($timeAfter-$timeBefore).'秒'.PHP_EOL;
    }

    private function heapSort($show){
        $arr=self::$arr;
        $n=sizeof(self::$arr);
        if($n<=1) {echo '数组大小必须大于1'.PHP_EOL;exit;}
        for($i=(int)(($n-2)/2);$i>=0;$i--){
            $this->shiftdown($arr,$n,$i);
        }
        for($i=$n-1;$i>=0;$i--){
            $this->swap($arr,0,$i);
            $this->shiftdown($arr,$i,0);
            $this->show($arr,$show);
        }
        echo "堆排序结果为：";
        for($i=0;$i<sizeof($arr);$i++)
         {
           echo $arr[$i].',';
         }
        echo PHP_EOL;
        self::$arr=$arr;
    }
//大顶堆 下沉操作
    private function shiftdown(array $arr,$n,$index){
        while($index*2+1<$n){
            $i=$index*2+1;
            if($i+1<$n){
                if($arr[$i]<$arr[$i+1]){
                    $i++;
                }
            }
            if($arr[$index]>=$arr[$i]) return;
            $this->swap($arr,$index,$i);
            $index=$i;
        }
    }

    private function swap(array $arr,$p1,$p2){
        $temp=$arr[$p2];
        $arr[$p2]=$arr[$p1];
        $arr[$p1]=$temp;
    }

    private function show(array $arr,$show=1){
        if($show){
            echo "当前数组次序为:";
            for($i=0;$i<sizeof($arr);$i++){
                echo $arr[$i].',';
            }
            echo PHP_EOL;
        }
    }
}