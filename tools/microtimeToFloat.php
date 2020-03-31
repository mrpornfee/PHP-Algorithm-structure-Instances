<?php
/**
 * Created by PhpStorm.
 * User: 93709
 * Date: 2020/3/31
 * Time: 14:37
 */
namespace tools;

trait microtimeToFloat{
   private function getTime(){
    $arr=explode(" ",microtime());
    return ((float)$arr[0]+(float)$arr[1]);
    }
}