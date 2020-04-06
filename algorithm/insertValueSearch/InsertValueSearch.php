<?php
/**
 * Created by PhpStorm.
 * User: 马鹏飞
 * Date: 2020/4/5
 * Time: 16:01
 */
namespace algorithm\insertValueSearch;
class InsertValueSearch
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

    private function work($low,$high,$n){
        $mid=(int)(($n-self::$arr[$low])/(self::$arr[$high]-self::$arr[$low])*($high-$low)+$low);

        if($low>$high){
            echo '未找到相应数据'.PHP_EOL;
            return -1;
        }
        if(self::$arr[$mid]==$n){
            $temp=$mid;
            $res[]=$mid;
            while($temp>=$low&&$temp<=$high&&self::$arr[$temp-1]===self::$arr[$mid]){
                $res[]=$temp-1;
                $temp--;
            }
            $temp=$mid;
            while($temp>=$low&&$temp<=$high&&self::$arr[$temp+1]===self::$arr[$mid]){
                $res[]=$temp+1;
                $temp++;
            }
            self::$arr=[];
            self::$arr=$res;
            return 1;
        }
        if(self::$arr[$mid]<$n){
            $this->work($mid+1,$high,$n);
        }
        if(self::$arr[$mid]>$n){
            $this->work($low,$mid-1,$n);
        }
    }

    private function show(){

        for ($i = 0; $i < sizeof(self::$arr); $i++) {
            echo self::$arr[$i] . '  ';
        }
        echo PHP_EOL;
        echo PHP_EOL;

    }

    public function find($n){
        $this->show();
        if(!$this->judge()) return '非有序数组无法查找---二分查找';
        $timeBefore=$this->getTime();
        $this->work(0,sizeof(self::$arr)-1,$n);
        $timeAfter=$this->getTime();
        echo '插值查找执行时间为'.($timeAfter-$timeBefore).'秒'.PHP_EOL;
        return self::$arr;
    }
}