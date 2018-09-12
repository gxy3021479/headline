<?php
if (isset($_GET['c'])){
    $className=$_GET['c'];

}else{
    $className='wechart';

}
if (isset($_GET['m'])){
    $method=$_GET['m'];
}else{
    $method='speed';
}
include "../controller/wechart/".$className.".php";
$o=new $className();
$o->$method();