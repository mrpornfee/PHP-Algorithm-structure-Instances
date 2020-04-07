<?php
/**
 * Created by PhpStorm.
 * User: 马鹏飞
 * Date: 2020/4/6
 * Time: 20:49
 */
namespace algorithm\tree;

class BinaryTreeDemo
{   private static $binarytree;
    public function run($arr,$type=1){
        if($arr==null){ echo '数组不能为空'; exit;}
        self::$binarytree=new BinaryTree();
        for($i=0;$i<sizeof($arr);$i++) {
            $no=$arr[$i][0];

            $name=$arr[$i][1];
            $heronode[$i] = new HeroNode($no, $name);
        }
        $i=0;$cur=1;
        self::$binarytree->setRoot($heronode[$i]);
        while($cur+1<sizeof($heronode)){
            $heronode[$i]->setLeft($heronode[$cur]);
            if($i+2<sizeof($heronode)) {
                $heronode[$i]->setRight($heronode[$cur + 1]);
            }
            $i+=1;
            $cur+=2;
        }
        switch ($type){
            case 1:$typeInfo='先序遍历';
            break;
            case 2:$typeInfo='中序遍历';
            break;
            case 3:$typeInfo='后序遍历';
            break;
        }
        echo "↓↓↓↓↓↓↓↓↓所有节点的{$typeInfo}：↓↓↓↓↓↓↓↓" . PHP_EOL;
        switch ($type){
            case 1:{
                self::$binarytree->preOrder();
                break;
            }
            case 2:{
                self::$binarytree->midOrder();
                break;
            }
            case 3:{
                self::$binarytree->postOrder();
                break;
            }
        }
    }
//查找,默认先序
    public function find(array $id,$type=1){
        switch ($type){
            case 1:$typeInfo='先序遍历';
                break;
            case 2:$typeInfo='中序遍历';
                break;
            case 3:$typeInfo='后序遍历';
                break;
        }
        switch ($type){
            case 1:{
                for($i=0;$i<sizeof($id);$i++) {
                    $res[] = self::$binarytree->preOrderSearch($id[$i]);
                }
                break;
            }
            case 2:{
                for($i=0;$i<sizeof($id);$i++) {
                    $res[] = self::$binarytree->midOrderSearch($id[$i]);
                }
                break;
            }
            case 3:{
                for($i=0;$i<sizeof($id);$i++) {
                    $res[] = self::$binarytree->postOrderSearch($id[$i]);
                }
                break;
            }
        }
        if($res!=null) {
            echo "↓↓↓↓↓↓↓↓↓您要查找的节点的{$typeInfo}：↓↓↓↓↓↓↓↓" . PHP_EOL;
            for ($i = 0; $i < sizeof($res); $i++) {
                echo $res[$i]->toString() . PHP_EOL;
            }
        }
        else echo '未查找到相应节点/(ㄒoㄒ)/~~'.PHP_EOL;
    }
}
//定义二叉树
class BinaryTree{
    private $root;
    public function setRoot(HeroNode $root){
        $this->root=$root;
    }
    public function getRoot(){
        return $this->root;
    }

    public function preOrder(){
        if($this->root!=null){
            $this->root->preOrder();
        }else{
            echo '二叉树为空，无法遍历'.PHP_EOL;
        }
    }

    public function midOrder(){
        if($this->root!=null){
            $this->root->midOrder();
        }else{
            echo '二叉树为空，无法遍历'.PHP_EOL;
        }
    }

    public function postOrder(){
        if($this->root!=null){
            $this->root->postOrder();
        }else{
            echo '二叉树为空，无法遍历'.PHP_EOL;
        }
    }

    public function preOrderSearch($no){
        if($this->root!=null){
            return $this->root->preOrderSearch($no);
        }
        else{
            return null;
        }
    }
    public function midOrderSearch($no){
        if($this->root!=null){
            return $this->root->midOrderSearch($no);
        }
        else{
            return null;
        }
    }
    public function postOrderSearch($no){
        if($this->root!=null){
            return $this->root->postOrderSearch($no);
        }
        else{
            return null;
        }
    }
}


//树节点
class HeroNode{
    private $no;
    private $name;
    private $left;
    private $right;
    public function __construct($no,$name)
    {
        $this->no=$no;
        $this->name=$name;
    }

    public function getNO(){
        return $this->no;
    }

    public function setNO($no){
        $this->no=$no;
    }
    public function getName(){
        return $this->name;
    }

    public function setName($name){
       $this->name=$name;
    }
    public function getLeft(){
        return $this->left;
    }

    public function setLeft(HeroNode $left){
        $this->left=$left;
    }
    public function getRight(){
        return $this->right;
    }

    public function setRight(HeroNode $right){
        $this->right=$right;
    }

    public function toString(){
        return "HeroNode [no={$this->no},name={$this->name}]";
    }
//前序遍历--递归
    public function preOrder(){
        echo $this->toString().PHP_EOL;
        if($this->left!=null){
            $this->left->preOrder();
        }
        if($this->right!=null){
            $this->right->preOrder();
        }
    }
//中序遍历
    public function midOrder(){
        if($this->left!=null){
            $this->left->midOrder();
        }
        echo $this->toString().PHP_EOL;
        if($this->right!=null){
            $this->right->midOrder();
        }
    }

    //后序遍历
    public function postOrder(){
        if($this->left!=null){
            $this->left->postOrder();
        }
        if($this->right!=null){
            $this->right->postOrder();
        }
        echo $this->toString().PHP_EOL;
    }

    /**先序查找
     * @param $no
     * @return $this
     */
    public function preOrderSearch($no){
        $resnode=null;
        if($this->no==$no){
            return $this;
        }
        if($this->left!=null){
            $resnode=$this->left->preOrderSearch($no);
        }
        if($resnode!=null){
            return $resnode;
        }
        if($this->right!=null){
            $resnode=$this->right->preOrderSearch($no);
        }
        return $resnode;
    }
    /**中序查找
     * @param $no
     * @return $this
     */
    public function midOrderSearch($no){
        $resnode=null;
        if($this->left!=null){
            $resnode=$this->left->midOrderSearch($no);
        }
        if($resnode!=null){
            return $resnode;
        }
        if($this->no==$no){
            return $this;
        }
        if($this->right!=null){
            $resnode=$this->right->midOrderSearch($no);
        }
        return $resnode;

    }
    /**后续查找
     * @param $no
     * @return $this
     */
    public function postOrderSearch($no){
        $resnode=null;
        if($this->left!=null){
            $resnode=$this->left->postOrderSearch($no);
        }
        if($resnode!=null){
            return $resnode;
        }
        if($this->right!=null){
            $resnode=$this->right->postOrderSearch($no);
        }
        if($resnode!=null){
            return $resnode;
        }
        if($this->no==$no){
            return $this;
        }
        return $resnode;
    }
}