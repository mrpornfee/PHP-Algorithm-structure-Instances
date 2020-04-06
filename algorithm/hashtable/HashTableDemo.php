<?php
/**
 * Created by PhpStorm.
 * User: 马鹏飞
 * Date: 2020/4/5
 * Time: 18:11
 */
namespace algorithm\hashtable;

class HashTableDemo
{
    private static $size;

    private static  $hashtable;

    public function __construct($size)
    {
        if($size<=0||!is_int($size)){
            echo '初始化参数非法'.PHP_EOL;
            exit;
        }
        self::$size=$size;
    }

    public function run(array $arr){
        if(!is_array($arr)) {echo '参数必须为数组';exit;}
        self::$hashtable=new HashTable(self::$size);
        for($i=0;$i<sizeof($arr);$i++){
            if(sizeof($arr[$i])!=2){
                echo '参数异常,需为二维数组,[[$id,$name],[$id2,$name2]......]'.PHP_EOL;
                exit;
            }
            $obj=new Emp($arr[$i][0],$arr[$i][1]);
            self::$hashtable->add($obj);
        }
        self::$hashtable->select();
    }

    public function find(array $id){
        for($i=0;$i<sizeof($id);$i++) {
            self::$hashtable->findEmpById($id[$i]);
        }
    }

}
//创建hashtable 管理多个链表
class HashTable{
    private $EmpLinkListArr;
    private  $size;
    public  function __construct($size)
    {
        $this->size=$size;
       // $this->EmpLinkListArr=array_fill(0,$size-1,new EmpLinkedList()); 这么做相当于拷贝对象了！！
        for($i=0;$i<$size-1;$i++){
            $this->EmpLinkListArr[$i]=new EmpLinkedList();
        }
    }

    public function  add(Emp $emp){
            //根据id判断添加到哪个链表
        $empLinkedListNO=$this->hashFun($emp->id);
            $this->EmpLinkListArr[$empLinkedListNO]->add($emp);
    }

    public function select(){
        for($i=0;$i<$this->size-1;$i++){
            echo "当前为{$i}号链表：".PHP_EOL;
            $this->EmpLinkListArr[$i]->select();
        }
    }

    public function findEmpById($id){
        $empLinkedListNO=$this->hashFun($id);
        $emp=$this->EmpLinkListArr[$empLinkedListNO]->findEmpById($id);
        if($emp!=null){
            echo "在第{$empLinkedListNO}条链表找到id为{$id}的雇员,雇员名字为{$emp->name}。".PHP_EOL;
        }else{
            echo "未找到id为{$id}的雇员".PHP_EOL;
        }

    }

    //编写一个函数，使用一个简单取模法
    public function hashFun($id){
        return $id%$this->size;
    }
}


//表示链表
class EmpLinkedList{
    private $head;

    public function add(Emp $emp){
        if($this->head==null){
            $this->head=$emp;
            return;
        }
        $cur=$this->head;
        while(1){
            if($cur->next==null){
                break;
            }
            $cur=$cur->next;
        }
        $cur->next=$emp;
    }

    public function select(){
        if($this->head==null){
            echo '当前链表为空'.PHP_EOL;
            return;
        }
        echo '当前链表的信息为:'.PHP_EOL;
        $cur=$this->head;
        while(1){
            echo '当前人物id='.$cur->id.',name='.$cur->name.'。'.PHP_EOL;
            if($cur->next==null){
                break;
            }
            $cur=$cur->next;
        }
    }

    public function findEmpById($id){
        if($this->head==null){
            return null;
        }
        $cur=$this->head;
        while (1){
            if($cur->id==$id){
                return $cur;
            }
            if($cur->next!=null){
                $cur=$cur->next;
            }else{
                return null;
            }

        }
    }

}
//表示一个雇员
class Emp{
    public  $id;
    public $name;
    public  $next;
    public function __construct($id,$name)
    {
        $this->id=$id;
        $this->name=$name;
    }
}