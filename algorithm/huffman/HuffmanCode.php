<?php
/**
 * Created by PhpStorm.
 * User: 93709
 * Date: 2020/4/16
 * Time: 16:40
 */
namespace algorithm\huffman;
class HuffmanCode
{   //分割统计后的字符对象的存储数组
    private static $nodesArr=[];

    //经过哈夫曼编码后的字符存储数组
    private static $huffmanNodes=[];

    //用户输入字符串
    private static $str;
    //01形式字符串
    private static $strcode;


    public function __construct(String $str)
    {
        self::$str=$str;
    }

    private function getCharNum(){
        $ss=str_split(self::$str);
        $acv=array_count_values($ss);
        return $acv;
    }

    private function createNodes(array $acv){
            foreach ($acv as $k => $v){
                array_push(self::$nodesArr,new TreeNode($k,$v,1));
            }
    }

    private function makeHuffmanNodes(array $codes){
        for($i=0;$i<sizeof($codes);$i++){
            self::$huffmanNodes[$codes[$i]->data]=$codes[$i]->code;
        }
    }

    private function explainString(){
            $arr=str_split(self::$str);
            $codes=self::$huffmanNodes;
            for($i=0;$i<sizeof($arr);$i++){
                    foreach ($codes as $k => $v){
                    if($arr[$i]==$k){
                        $arr[$i]=$v;
                    }
                }
            }
            self::$strcode=implode('',$arr);
    }

    public function getHuffmanNodes(){
        return self::$huffmanNodes;
    }

    public function run($show=1){
        $res=$this->getCharNum();
        $this->createNodes($res);
        $HT= new HuffmanTree(self::$nodesArr);
        $HT->makeTree();
        $codes=$HT->setAndGetCodes();
        $this->makeHuffmanNodes($codes);
        if($show) var_dump($this->getHuffmanNodes());
        return 0;
    }
 //压缩
    public function compress(){
        if(!self::$huffmanNodes)
            $this->run(0);
        $this->explainString();
        echo '压缩成功'.PHP_EOL;
        return json_encode(['huffmanCodes'=>self::$huffmanNodes,'data'=>self::$strcode]);
    }



 //解压缩
    public function decompress(string $str){
            $arr=json_decode($str,true);
            $huffmanCodes=$arr['huffmanCodes'];
            $data=$arr['data'];
            foreach ($huffmanCodes as $k=>$v){
                $sizeCodes[$k]=strlen($v);
            }
            arsort($sizeCodes);
            $arrTmp=array_values($sizeCodes);
            $maxlength=$arrTmp[0];
            $s=0;//截取位
            $i=1; //长度
            $resultString='';
            while($s<strlen($data)){
                if($i>$maxlength) {echo '解压失败'.PHP_EOL; exit;}
                $tmpstr=substr($data,$s,$i);
                foreach ($huffmanCodes as $k =>$v){
                    if($tmpstr===$v){
                        $resultString.=$k;
                        $s+=$i;
                        $i=1;
                        break;
                    }
                }
                $i++;
            }
            echo '解压成功'.PHP_EOL;
            return $resultString;
    }
}

class HuffmanTree{
    public $root;
    public static  $arr;
    public function __construct(array $arr)
    {
        self::$arr=$arr;
    }
    //返回huffman编码后的Codes数组
    public function makeTree(){
        while(sizeof(self::$arr)>1) {
            usort(self::$arr, function (TreeNode $a, TreeNode $b) {
                if ($a->weight == $b->weight) return 0;
                return ($a->weight < $b->weight) ? -1 : 1;
            });
            $tmp = new TreeNode(self::$arr[0]->data . "+" . self::$arr[1]->data, self::$arr[0]->weight + self::$arr[1]->weight,0);
            $tmp->left=self::$arr[0];
            $tmp->right=self::$arr[1];
            array_shift(self::$arr);
            array_shift(self::$arr);
            array_push(self::$arr, $tmp);
        }
        $this->root=self::$arr[0];
    }

   public function setAndGetCodes(){
      return $this->root->SetAndGetCodes('',[]);
    }

}

class TreeNode{
    public  $code=''; //哈夫曼编码
    public  $data; //字符
    public  $weight; //权值
    public  $left;//左结点
    public  $right;//左结点
    public  $isLeaf;
    public function __construct($data,$weight,$isLeaf)
    {
        $this->data=$data;
        $this->weight=$weight;
        $this->isLeaf=$isLeaf;
    }

    public function toString(){
        $data=$this->data;
        $weight=$this->weight;
        return "Node[data={$data},weight={$weight}]";
    }
    //设置huffman编码并获取
    public function  SetAndGetCodes(string $c='',array $arr){
    // echo $this->toString().PHP_EOL;
        $this->code=$c;
        if($this->isLeaf){
            array_push($arr,$this);
        }
        if($this->left!=null){
            $res=$this->left->SetAndGetCodes($this->code.'0',$arr);
            $arr=$res;
        }
        if($this->right!=null){
            $res=$this->right->SetAndGetCodes($this->code.'1',$arr);
            $arr=$res;
        }
         return $arr;
    }

}
