<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/21/2018
 * Time: 4:15 PM
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
            $menuList .= "<td><a href='../controllers/FoodManage.php?action=search&mId={$menu['mid']}'><i class=\"fa fa-edit\"></i></a></td>";
            $menuList .= "</tr>";

        }
        $_SESSION['selectM_List'] = $menuList;
        echo '<script type="text/javascript">
           window.location = "../view/selectMenuForFood.php"
      </script>';
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
                    $_SESSION['menuID'] = $result['mid'];
                    $_SESSION['menuNa'] = $result['menu_name'];


                    echo '<script type="text/javascript">
           window.location = "../view/addFood.php"</script>';

                } else {
                    //No Menu has found
                    echo "<script type='text/javascript'>alert('No Menu Has found');</script>";
                    echo '<script type="text/javascript">
           window.location = "../view/selectMenuForFood.php"</script>';
                }
            } else {
                //Something wrong with the query
                echo "<script type='text/javascript'>alert('Something Wrong');</script>";
                echo '<script type="text/javascript">
           window.location = "../view/selectMenuForFood.php"
      </script>';
            }

        }
    }else if ("loadMenuForModifyFood" === $_GET['action']) {
        $connection = getConnection();
        $menuList = '';
        $query = "SELECT * FROM menu WHERE res_id='{$_SESSION['restaurantId']}' ORDER BY mid ASC";
        $menus = mysqli_query($connection, $query);
        while ($menu = mysqli_fetch_assoc($menus)) {
            $menuList .= "<tr>";
            $menuList .= "<td>{$menu['mid']}</td>";
            $menuList .= "<td>{$menu['menu_name']}</td>";
            $menuList .= "<td>{$menu['description']}</td>";
            $menuList .= "<td><a href='../controllers/FoodManage.php?action=searchFood&mId={$menu['mid']}'><i class=\"fa fa-edit\"></i></a></td>";
            $menuList .= "</tr>";

        }
        $_SESSION['selectM_List'] = $menuList;
        echo '<script type="text/javascript">
           window.location = "../view/selectMenuForModifyFood.php"
      </script>';
    }else if ("searchFood" === $_GET['action']) {

        if (isset($_GET['mId'])) {
            //getting Menu from res id
            $connection = getConnection();
            $foodList='';
            $menuId = mysqli_real_escape_string($connection, $_GET['mId']);
            $query = "SELECT * FROM food WHERE mid={$menuId}";
            $foodItems = mysqli_query($connection, $query);

            while ($foodItem = mysqli_fetch_assoc($foodItems)) {
                $foodList .= "<tr>";
                $foodList .= "<td>{$foodItem['food_id']}</td>";
                $foodList .= "<td>{$foodItem['food_name']}</td>";
                $foodList .= "<td>{$foodItem['description']}</td>";
                $foodList .= "<td>{$foodItem['mid']}</td>";
                $foodList .= "<td><a href='../controllers/FoodManage.php?action=searchFoodForEdit&foodID={$foodItem['food_id']}'><i class=\"fa fa-edit\"></i></a></td>";
                $foodList .= "<td><a href='../controllers/FoodManage.php?action=deleteFood&foodId={$foodItem['food_id']}'><i class=\"fa fa-trash\"></i></a></td>";
                $foodList .= "</tr>";

            }
            $_SESSION['f_List'] = $foodList;
            echo '<script type="text/javascript">
           window.location = "../view/selectFood.php"
      </script>';

        }
    }else if ("searchFoodForEdit" === $_GET['action']) {

        if (isset($_GET['foodID'])) {
            //getting Menu from res id
            $connection = getConnection();
            $foodId = mysqli_real_escape_string($connection, $_GET['foodID']);
            $query = "SELECT * FROM food WHERE food_id={$foodId} LIMIT 1";
            $foodResult = mysqli_query($connection, $query);

            if ($foodResult) {
                if (mysqli_num_rows($foodResult) == 1) {
                    //Menu has found
                    $res=mysqli_fetch_assoc($foodResult);
                    $_SESSION['foodId']=$res['food_id'];
                    $_SESSION['foodName']=$res['food_name'];
                    $_SESSION['des']=$res['description'];
                    $_SESSION['img']=$res['main_image'];
                    $_SESSION['md']=$res['mid'];


                    echo '<script type="text/javascript">
           window.location = "../view/modifyFood.php"</script>';

                } else {
                    //No Food has found
                    echo "<script type='text/javascript'>alert('No Food Has found');</script>";
                    echo '<script type="text/javascript">
           window.location = "../view/selectMenuForModifyFood.php"</script>';
                }
            } else {
                //Something wrong with the query
                echo "<script type='text/javascript'>alert('Something Wrong');</script>";
                echo '<script type="text/javascript">
           window.location = "../view/selectMenuForModifyFood.php"
      </script>';
            }

        }
    }else if ("deleteFood" === $_GET['action']) {

        if (isset($_GET['foodId'])) {
            //getting Menu from res id
            $connection = getConnection();
            $fdId = mysqli_real_escape_string($connection, $_GET['foodId']);
            $isDeleted = $connection->query("DELETE FROM food WHERE food_id='{$fdId}'");

            if ($isDeleted) {
                echo "<script type='text/javascript'>alert('Food Item has been Deleted successfully');</script>";
                echo '<script type="text/javascript">
           window.location = "../controllers/FoodManage.php?action=loadMenuForModifyFood"
      </script>';

            } else {
                echo "<script type='text/javascript'>alert('Failed to Delete Menu');</script>";
                echo '<script type="text/javascript">
           window.location = "../controllers/FoodManage.php?action=loadMenuForModifyFood"
      </script>';
            }
        }


    }


}
//if method is post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = $_POST["action"];


    switch ($action) {
        case "addFood" :
            addFood();
            break;
        case "modifyFood":
            modifyFood();
            break;
    }
}
function addFood(){
    $connection = getConnection();
    $mid='';
    $foodName='';
    $description = '';
    $image = '';
    $imgName = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['btn_save'])) {
            $mid = $_POST['mid'];
            $foodName = $_POST['fName'];
            $description = $_POST['description'];

            if (getimagesize($_FILES['image']['tmp_name']) == false) {
                echo "Please Select an Image";
            } else {
                $image = addslashes($_FILES['image']['tmp_name']);
                $imgName = addslashes($_FILES['image']['name']);
                $image = file_get_contents($image);
                $image = base64_encode($image);

            }


            $result = $connection->query("INSERT INTO food (food_name,description,main_image,mid)VALUES('{$foodName}', '{$description}', '{$image}', '{$mid}')");


            if ($result) {
                echo "<script type='text/javascript'>alert('Food Item has been added successfully');</script>";
                echo '<script type="text/javascript">
           window.location = "../view/selectMenuForFood.php"
      </script>';

            } else {
                echo "<script type='text/javascript'>alert('Failed to Add Food');</script>";
                echo '<script type="text/javascript">
           window.location = "../view/selectMenuForFood.php"
      </script>';
            }
        }


    }
}
function modifyFood()
{

    $connection = getConnection();
    $fid= '';
    $fname = '';
    $description = '';
    $image = '';
    $imgName = '';
    global $resultFood;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['btn_modify'])) {
            $fid = $_POST['fid'];
            $fname = $_POST['fName'];
            $description = $_POST['description'];

            //If admin image Selected
            if (!empty($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
                echo "image";
                $image = addslashes($_FILES['image']['tmp_name']);
                $imgName = addslashes($_FILES['image']['name']);
                $image = file_get_contents($image);
                $image = base64_encode($image);

                $resultFood = $connection->query("UPDATE food SET main_image='{$image}' WHERE food_id='{$fid}' ");
            }

            $resultFood = $connection->query("UPDATE food SET food_name='{$fname}',description='{$description}' WHERE food_id='{$fid}' ");


            if ($resultFood) {
                echo "<script type='text/javascript'>alert('Food has been Modified successfully');</script>";
                echo "<script type='text/javascript'>
           window.location = '../controllers/FoodManage.php?action=loadMenuForModifyFood';
      </script>";

            } else {
                echo "<script type='text/javascript'>alert('Failed to Modify Menu');</script>";
                echo '<script type="text/javascript">
           window.location = "../controllers/FoodManage.php?action=loadMenuForModifyFood"
      </script>';
            }
        }


    }
}