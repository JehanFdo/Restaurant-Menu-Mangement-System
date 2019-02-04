<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/21/2018
 * Time: 10:31 PM
 */


session_start();

if (isset($_GET['action'])){
    if ("adminlogout" === $_GET['action']){
        $_SESSION=array();

        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),'',time()-86400,'/');
        }
        session_destroy();

        header('Location: ../start.php');


    }else if ("userlogout" === $_GET['action']){
        $_SESSION=array();

        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),'',time()-86400,'/');
        }
        session_destroy();

        header('Location: ../start.php');

    }

}
