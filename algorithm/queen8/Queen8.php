<?php
namespace algorithm\queen8;
//八皇后递归
class Queen8{


    //棋盘大小
    private static $max;
    //存放排列结果
    private  static  $arr;
    //计数器
    private static $clock;

  public function __construct($n=8)
  {
      if(is_numeric($n)&&is_int($n)&&$n>0)
      self::$max=$n;
      else {
            echo '参数错误,需为正整数';
            exit;
      }
  }
    //入口
    public function run($show=true){
        $this->check(0);
        echo '共计:'.self::$clock.'个结果'.PHP_EOL;
        return 0;
    }

//放置第n个时，检测该皇后是否已经和前面的皇后冲突
  private function judge($n){
      for($i=0;$i<$n;$i++){
          //判断是否同一列或同一斜线
          if(self::$arr[$i]==self::$arr[$n]||abs($n-$i)==abs(self::$arr[$n]-self::$arr[$i])){
              return false;
          }
      }
      return true;
  }
    //放置第n个
  private function check($n){
      if($n == self::$max){
          $this->printAll();
          return;
      }
      //依次放入并判断是否冲突
      for($i=0;$i<self::$max;$i++){
          self::$arr[$n]=$i;
          if($this->judge($n)){
              //不冲突,放下一个
              $this->check($n+1);
          }
      }

  }

  //输出排序结果
  private function printAll(){
      for($i=0;$i<self::$max;$i++){
          echo self::$arr[$i].' ';
      }
      self::$clock+=1;
      echo PHP_EOL;
  }
}
