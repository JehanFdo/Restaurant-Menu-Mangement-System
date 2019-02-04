<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/21/2018
 * Time: 1:52 PM
 */

session_start();
include_once('../Db/DbConfig.php');

if (isset($_GET['action'])) {
    //if action equals to load
    if ("loadMenu" === $_GET['action']) {
        $connection = getConnection();
        $menuList = '';
        $query = "SELECT * FROM menu WHERE res_id='{$_SESSION['restaurantId']}' ORDER BY mid ASC";
        $menus = mysqli_query($connection, $query);
        while ($menu = mysqli_fetch_assoc($menus)) {
            $menuList .= "<tr>";
            $menuList .= "<td>{$menu['mid']}</td>";
            $menuList .= "<td>{$menu['menu_name']}</td>";
            $menuList .= "<td>{$menu['description']}</td>";
            $menuList .= "<td><a href='../controllers/ManageMenu.php?action=search&mId={$menu['mid']}'><i class=\"fa fa-edit\"></i></a></td>";
            $menuList .= "<td><a href='../controllers/ManageMenu.php?action=delete&mId={$menu['mid']}'><i class=\"fa fa-trash\"></i></a></td>";
            $menuList .= "</tr>";

        }
        $_SESSION['m_List'] = $menuList;
        echo '<script type="text/javascript">
           window.location = "../view/SelectMenu.php"
      </script>';

        //if action equals to search
    } else if ("search" === $_GET['action']) {

        if (isset($_GET['mId'])) {
            //getting Menu from res id
            $connection = getConnection();
            $menuId = mysqli_real_escape_string($connection, $_GET['mId']);
            $query = "SELECT * FROM menu WHERE mid={$menuId} LIMIT 1";
            $result_set = mysqli_query($connection, $query);

            if ($result_set) {
                if (mysqli_num_rows($result_set) == 1) {
                    //Menu has found
                    $result = mysqli_fetch_assoc($result_set);
                    $_SESSION['menu_id'] = $result['mid'];
                    $_SESSION['menu_name'] = $result['menu_name'];
                    $_SESSION['menu_description'] = $result['description'];
                    $_SESSION['restaurant_id'] = $result['res_id'];
                    $_SESSION['restaurantUser_id'] = $result['user_id'];
                    $_SESSION['menu_image'] = $result['image'];


                    echo '<script type="text/javascript">
           window.location = "../view/modifyMenu.php"</script>';

                } else {
                    //No restaturant has found
                    echo "<script type='text/javascript'>alert('No Menu Has found');</script>";
                    echo '<script type="text/javascript">
           window.location = "../view/SelectMenu.php"</script>';
                }
            } else {
                //Something wrong with the query
                echo "<script type='text/javascript'>alert('Something Wrong');</script>";
                echo '<script type="text/javascript">
           window.location = "../view/SelectMenu.php"
      </script>';
            }

        }
    } else if ("delete" === $_GET['action']) {

        if (isset($_GET['mId'])) {
            //getting Menu from res id
            $connection = getConnection();
            $menuId = mysqli_real_escape_string($connection, $_GET['mId']);
            $isDeleted = $connection->query("DELETE FROM menu WHERE mid='{$menuId}'");

            if ($isDeleted) {
                echo "<script type='text/javascript'>alert('Menu has been Deleted successfully');</script>";
                echo '<script type="text/javascript">
           window.location = "../controllers/ManageMenu.php?action=loadMenu"
      </script>';

            } else {
                echo "<script type='text/javascript'>alert('Failed to Delete Menu');</script>";
                echo '<script type="text/javascript">
           window.location = "../controllers/ManageMenu.php?action=loadMenu"
      </script>';
            }
        }


    }


}


//if method is post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = $_POST["action"];


    switch ($action) {
        case "addMenu" :
            addMenu();
            break;
        case "modifyMenu":
            modifyMenu();
            break;
    }
}

function addMenu()
{
    $connection = getConnection();
    $resId = '';
    $resUserID = '';
    $MenuName = '';
    $description = '';
    $image = '';
    $imgName = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['btn_save'])) {
            $resId = $_POST['resId'];
            $resUserID = $_POST['resUserID'];
            $MenuName = $_POST['MenuName'];
            $description = $_POST['description'];

            if (getimagesize($_FILES['image']['tmp_name']) == false) {
                echo "Please Select an Image";
            } else {
                $image = addslashes($_FILES['image']['tmp_name']);
                $imgName = addslashes($_FILES['image']['name']);
                $image = file_get_contents($image);
                $image = base64_encode($image);

            }


            $result = $connection->query("INSERT INTO menu (menu_name,description,res_id,user_id,image)VALUES('{$MenuName}', '{$description}', '{$resId}', '{$resUserID}','{$image}')");


            if ($result) {
                echo "<script type='text/javascript'>alert('Menu has been created successfully');</script>";
                echo '<script type="text/javascript">
           window.location = "../view/createMenu.php"
      </script>';

            } else {
                echo "<script type='text/javascript'>alert('Failed to Create Menu');</script>";
                echo '<script type="text/javascript">
           window.location = "../view/createMenu.php"
      </script>';
            }
        }


    }
}

function modifyMenu()
{

    $connection = getConnection();
    $resId = '';
    $resUserID = '';
    $MenuName = '';
    $description = '';
    $image = '';
    $imgName = '';
    $MenuId = '';
    global $resultMenu;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['btn_modify'])) {
            $resId = $_POST['resId'];
            $resUserID = $_POST['resUserID'];
            $MenuName = $_POST['MenuName'];
            $description = $_POST['description'];
            $MenuId = $_POST['MenuId'];

            //If admin image Selected
            if (!empty($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
                echo "image";
                $image = addslashes($_FILES['image']['tmp_name']);
                $imgName = addslashes($_FILES['image']['name']);
                $image = file_get_contents($image);
                $image = base64_encode($image);

                $resultMenu = $connection->query("UPDATE menu SET image='{$image}' WHERE mid='{$MenuId}' ");
            }

            $resultMenu = $connection->query("UPDATE menu SET menu_name='{$MenuName}',description='{$description}' WHERE mid='{$MenuId}' ");


            if ($resultMenu) {
                echo "<script type='text/javascript'>alert('Menu has been Modified successfully');</script>";
                echo "<script type='text/javascript'>
           window.location = '../controllers/ManageMenu.php?action=search&mId={$MenuId}';
      </script>";

            } else {
                echo "<script type='text/javascript'>alert('Failed to Modify Menu');</script>";
                echo '<script type="text/javascript">
           window.location = "../view/SelectMenu.php"
      </script>';
            }
        }


    }
}