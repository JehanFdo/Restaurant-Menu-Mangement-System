<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/20/2018
 * Time: 9:50 PM
 */
session_start();
include_once('../Db/DbConfig.php');

//check action if method is get
if (isset($_GET['action'])) {
    //if action equals to load
    if ("load" === $_GET['action']) {
        $connection = getConnection();
        $resList = '';
        $query = "SELECT * FROM restaurant ORDER BY res_id ASC";
        $restaurants = mysqli_query($connection, $query);
        while ($restaurant = mysqli_fetch_assoc($restaurants)) {
            $resList .= "<tr>";
            $resList .= "<td>{$restaurant['res_id']}</td>";
            $resList .= "<td>{$restaurant['res_name']}</td>";
            $resList .= "<td>{$restaurant['address']}</td>";
            $resList .= "<td>{$restaurant['email']}</td>";
            $resList .= "<td>{$restaurant['tel_no']}</td>";
            $resList .= "<td>{$restaurant['days']}</td>";
            $resList .= "<td>{$restaurant['fromTime']}</td>";
            $resList .= "<td>{$restaurant['toTime']}</td>";
            $resList .= "<td>{$restaurant['availability']}</td>";
            $resList .= "<td><a href='../controllers/ManageUser.php?action=search&resId={$restaurant['res_id']}'><i class=\"fa fa-edit\"></i></a></td>";
            $resList .= "</tr>";

        }
        $_SESSION['r_List'] = $resList;
        echo '<script type="text/javascript">
           window.location = "../view/selectRestaurantForUser.php"
      </script>';

        //if action equals to search
    } else if ("search" === $_GET['action']) {

        if (isset($_GET['resId'])) {
            //getting restaurant from res id
            $connection = getConnection();
            $resId = mysqli_real_escape_string($connection, $_GET['resId']);
            $query = "SELECT * FROM restaurant WHERE res_id={$resId} LIMIT 1";
            $result_set = mysqli_query($connection, $query);

            if ($result_set) {
                if (mysqli_num_rows($result_set) == 1) {
                    //restaurant has found
                    $result = mysqli_fetch_assoc($result_set);
                    $_SESSION['res_id'] = $result['res_id'];
                    $_SESSION['res_name'] = $result['res_name'];

                    echo '<script type="text/javascript">
           window.location = "../view/addUser.php"</script>';

                } else {
                    //No restaturant has found
                    echo "<script type='text/javascript'>alert('No Restaurant Has found');</script>";
                    echo '<script type="text/javascript">
           window.location = "../view/select.php"
      </script>';
                }
            } else {
                //Something wrong with the query
                echo "<script type='text/javascript'>alert('Something Wrong');</script>";
                echo '<script type="text/javascript">
           window.location = "../view/selectRestaurantForUser.php"
      </script>';
            }

        }
    } else if ("loadUsers" === $_GET['action']) {
        $connection = getConnection();
        $userList = '';
        $query = "SELECT * FROM users ORDER BY user_Id ASC";
        $users = mysqli_query($connection, $query);
        while ($user = mysqli_fetch_assoc($users)) {
            $userList .= "<tr>";
            $userList .= "<td>{$user['user_Id']}</td>";
            $userList .= "<td>{$user['Full_name']}</td>";
            $userList .= "<td>{$user['user_name']}</td>";
            $userList .= "<td>{$user['res_id']}</td>";
            $query = "SELECT res_name FROM restaurant WHERE res_id={$user['res_id']} ORDER BY res_id ASC";
            $resIds = mysqli_query($connection, $query);
            if ($res = mysqli_fetch_assoc($resIds)) {
                $userList .= "<td>{$res['res_name']}</td>";
            }
            $userList .= "<td><a href='../controllers/ManageUser.php?action=searchUser&userId={$user['user_Id']}'><i class=\"fa fa-edit\"></i></a></td>";
            $userList .= "</tr>";
        }
        $_SESSION['u_List'] = $userList;
        echo '<script type="text/javascript">
           window.location = "../view/selectUser.php"
      </script>';


    }else if ("searchUser" === $_GET['action']) {

        if (isset($_GET['userId'])) {
            //getting User from user id
            $connection = getConnection();
            $userId = mysqli_real_escape_string($connection, $_GET['userId']);
            $query = "SELECT * FROM users WHERE user_Id={$userId} LIMIT 1";
            $result_set = mysqli_query($connection, $query);

            if ($result_set) {
                if (mysqli_num_rows($result_set) == 1) {
                    //User has found
                    $result = mysqli_fetch_assoc($result_set);
                    $_SESSION['user_Id'] = $result['user_Id'];
                    $_SESSION['Full_name'] = $result['Full_name'];
                    $_SESSION['user_name'] = $result['user_name'];
                    $_SESSION['resid'] = $result['res_id'];

                    $query = "SELECT res_name FROM restaurant WHERE res_id={$result['res_id']} ORDER BY res_id ASC";
                    $resIds = mysqli_query($connection, $query);
                    if ($res = mysqli_fetch_assoc($resIds)) {
                        $_SESSION['resname'] =$res['res_name'];
                    }
                    echo '<script type="text/javascript">
           window.location = "../view/modifyUser.php"</script>';

                } else {
                    //No User has found
                    echo "<script type='text/javascript'>alert('No Restaurant Has found');</script>";
                    echo '<script type="text/javascript">
           window.location = "../view/select.php"
      </script>';
                }
            } else {
                //Something wrong with the query
                echo "<script type='text/javascript'>alert('Something Wrong');</script>";
                echo '<script type="text/javascript">
           window.location = "../view/selectRestaurantForUser.php"
      </script>';
            }

        }
    }


}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = $_POST["action"];


    switch ($action) {
        case "add" :
            addUser();
            break;
        case "modify" :
            modifyUser();
            break;
        case "updateMe" :
            modifyUser();
            break;
    }
}

function addUser()
{
    $connection = getConnection();
    $resId = '';
    $name = '';
    $uname = '';
    $password = '';


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['btn_save'])) {
            $resId = $_POST['resId'];
            $name = $_POST['name'];
            $uname = $_POST['uname'];
            $p = $_POST['password'];
            $password = sha1($p);


            $result = $connection->query("INSERT INTO users (Full_name,user_name,password,res_id)VALUES('{$name}', '{$uname}', '{$password}', '{$resId}')");


            if ($result) {
                echo "<script type='text/javascript'>alert('User has been added successfully');</script>";
                echo '<script type="text/javascript">
           window.location = "../controllers/ManageUser.php?action=loadUsers";
      </script>';

            } else {
                echo "<script type='text/javascript'>alert('Failed to add User');</script>";
                echo '<script type="text/javascript">
           window.location = "../controllers/ManageUser.php?action=loadUsers";
      </script>';
            }
        }


    }
}
function modifyUser(){
    $connection = getConnection();
    $id='';
    $resId = '';
    $name = '';
    $uname = '';
    $password = '';
    global $modifyRes;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['btn_save'])) {
            $resId = $_POST['resId'];
            $id=$_POST['id'];
            $name = $_POST['name'];
            $uname = $_POST['uname'];

            if(null!=$_POST['password']){
                $password=sha1($_POST['password']);
                $modifyRes = $connection->query("UPDATE users  SET password='{$password}' WHERE user_Id='{$id}'");
            }


            $modifyRes = $connection->query("UPDATE users  SET Full_name='{$name}',user_name='{$uname}' WHERE user_Id='{$id}'");


            if ($modifyRes) {
                echo "<script type='text/javascript'>alert('User has been Modified successfully');</script>";
                echo '<script type="text/javascript">
           window.location = "../controllers/ManageUser.php?action=loadUsers";
      </script>';

            } else {
                echo "<script type='text/javascript'>alert('Failed to Modify User');</script>";
                echo '<script type="text/javascript">
           window.location = "../controllers/ManageUser.php?action=loadUsers";
      </script>';
            }
        } else if(isset($_POST['btn_update'])) {
            $resId = $_POST['resId'];
            $id=$_POST['id'];
            $name = $_POST['name'];
            $uname = $_POST['uname'];

            if(null!=$_POST['password']){
                $password=sha1($_POST['password']);
                $modifyRes = $connection->query("UPDATE users  SET password='{$password}' WHERE user_Id='{$id}'");
            }


            $modifyRes = $connection->query("UPDATE users  SET Full_name='{$name}',user_name='{$uname}' WHERE user_Id='{$id}'");


            if ($modifyRes) {
                echo "<script type='text/javascript'>alert('I Am Updated');</script>";
                echo '<script type="text/javascript">
           window.location = "../view/restaurantSettings.php";
      </script>';

            } else {
                echo "<script type='text/javascript'>alert('Failed to updated');</script>";
                echo '<script type="text/javascript">
           window.location = "../view/restaurantSettings.php";
      </script>';
            }
        }


    }
}