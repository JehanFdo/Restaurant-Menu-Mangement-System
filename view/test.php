<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/20/2018
 * Time: 6:05 PM
 */


$a=array('1,2,4');

$b=implode(',',$a);

echo $b;

echo "<br>";

$c=explode(',',$b);

print_r($c);

echo "<br>";
