<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/19/2018
 * Time: 1:19 PM
 */

function getConnection(){

    return mysqli_connect("localhost", "root", "016610", "foodmanagement", "3306");

}
