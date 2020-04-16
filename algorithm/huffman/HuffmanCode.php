<?php
/**
 * Created by PhpStorm.
 * User: 93709
 * Date: 2020/4/16
 * Time: 16:40
 */
namespace algorithm\huffman;
class HuffmanCode
{
    private function getCharNum(String $str){
        $ss=str_split($str);
        $acv=array_count_values($ss);
        return $acv;
    }

    private function createNodes(){

    }
}

class TreeNode{
    private static $code; //哈夫曼编码
    private static $data; //字符
    private static $count; //权值
    private static $lChild;//左结点
    private static $rChild;//左结点
    public function __construct($data,$count)
    {
        self::$data=$data;
        self::$count=$count;
    }
}