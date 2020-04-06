<?php
/**
 * Created by PhpStorm.
 * User: 93709
 * Date: 2020/4/2
 * Time: 16:36
 */
namespace driver;
class Tester
{
    private static $classArr;

    private static $path=DIRECTORY_SEPARATOR.'algorithm'.DIRECTORY_SEPARATOR;

    private function __construct()
    {
    }

    /**绑定对象实列
     * @param $class  //数组或字符串，algorithm下的相对路径
     * @param $arr
     * @return bool
     */
    public static function bind($class,$arrORsize=[])
    {
        if (is_string($class)) {
                $class=self::$path.$class;
            if (self::$classArr == null || !array_key_exists($class, self::$classArr)) {
                self::$classArr[$class] = new $class($arrORsize);
            }
            return true;
        } else if (is_array($class)) {
            for ($i = 0; $i < sizeof($class); $i++) {
                $class[$i]=self::$path.$class[$i];
                if (self::$classArr == null || !array_key_exists($class[$i], self::$classArr)) {
                    self::$classArr[$class[$i]] = new $class[$i]($arrORsize);
                }
            }
            return true;
        }
        return false;
    }

    /**卸载对象实例
     * @param $class //数组或字符串，algorithm下的相对路径
     * @return bool
     */
    public static function unload($class)
    {
        if (is_string($class)) {
            $class=self::$path.$class;
            if (self::$classArr != null && array_key_exists($class, self::$classArr)) {
                unset(self::$classArr[$class]);
                return true;
            }
            return false;
        } else if (is_array($class)) {
            $t = sizeof($class);
            for ($i = 0; $i < $t; $i++) {
                $class[$i]=self::$path.$class[$i];
                if (self::$classArr == null || !array_key_exists($class[$i], self::$classArr))
                    return false;
            }
            for ($i = 0; $i < $t; $i++) {
                unset(self::$classArr[$class[$i]]);
            }
            return true;
        }
        return false;
    }

    /**运行对象实列
     * 对实列中的数组进行排序
     * @param $class //数组或字符串，algorithm下的相对路径
     * @param $show  //是否显示过程 1或者true 显示 0或false 不显示
     * @return bool
     */
    public static function sort($class,$show){
        if(self::$classArr==null) return false;
        if(is_string($class)){
            $class=self::$path.$class;
            if(array_key_exists($class,self::$classArr)){
                $res=self::$classArr[$class]->run($show);
                return $res;
            }
            return false;
        }
        if(is_array($class)){
            $t=sizeof($class);
            for($i=0;$i<$t;$i++){
                $class[$i]=self::$path.$class[$i];
                if(!array_key_exists($class[$i],self::$classArr))
                    return false;
            }
            for($i=0;$i<$t;$i++){
                self::$classArr[$class[$i]]->run($show);
            }
            return true;
        }
        return false;
    }

    /**运行对象实列
     * 对实列中直接运行
     * @param $class //数组或字符串，algorithm下的相对路径
     * @return bool
     */
    public static function run($class,$size=0,array $arr=[]){
        if(self::$classArr==null) return false;
        if(is_string($class)){
            $class=self::$path.$class;
            if(array_key_exists($class,self::$classArr)){
                self::$classArr[$class]->run($size,$arr);
                return true;
            }
            return false;
        }
        if(is_array($class)){
            $t=sizeof($class);
            for($i=0;$i<$t;$i++){
                $class[$i]=self::$path.$class[$i];
                if(!array_key_exists($class[$i],self::$classArr))
                    return false;
            }
            for($i=0;$i<$t;$i++){
                self::$classArr[$class[$i]]->run();
            }
            return true;
        }
        return false;
    }

    /**运行对象实列
     * 对实列中的数组进行查找
     * @param $class //数组或字符串，algorithm下的相对路径
     * @return bool
     */
    public static function find($class,$n){
        if(self::$classArr==null) return false;
        if(is_string($class)){
            $class=self::$path.$class;
            if(array_key_exists($class,self::$classArr)){
                $res=self::$classArr[$class]->run($n);
                return $res;
            }
            return false;
        }
        if(is_array($class)){
            $t=sizeof($class);
            for($i=0;$i<$t;$i++){
                $class[$i]=self::$path.$class[$i];
                if(!array_key_exists($class[$i],self::$classArr))
                    return false;
            }
            for($i=0;$i<$t;$i++){
                self::$classArr[$class[$i]]->run($n);
            }
            return true;
        }
        return false;
    }
}