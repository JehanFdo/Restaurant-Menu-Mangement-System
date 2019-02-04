<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/19/2018
 * Time: 7:01 PM
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
            $resList .= "<td><a href='../controllers/ManageRestaurent.php?action=search&resId={$restaurant['res_id']}'><i class=\"fa fa-edit\"></i></a></td>";
            $resList .= "</tr>";

        }
        $_SESSION['r_List'] = $resList;
        echo '<script type="text/javascript">
           window.location = "../view/editRestaurant.php"
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
                    $_SESSION['address'] = $result['address'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['tel_no'] = $result['tel_no'];
                    $_SESSION['logo'] = $result['logo'];

                    $stringDays = $result['days'];
                    $_SESSION['days'] = $stringDays;
                    $daysArray = explode(',', $stringDays);

                    $_SESSION['daysArray'] = $daysArray;


                    $_SESSION['fromTime'] = $result['fromTime'];
                    $_SESSION['toTime'] = $result['toTime'];
                    $_SESSION['availability'] = $result['availability'];

                    echo '<script type="text/javascript">
           window.location = "../view/modifyRestautant.php"</script>';

                } else {
                    //No restaturant has found
                    echo "<script type='text/javascript'>alert('No Restaurant Has found');</script>";
                    echo '<script type="text/javascript">
           window.location = "../view/modifyRestautant.php"
      </script>';
                }
            } else {
                //Something wrong with the query
                echo "<script type='text/javascript'>alert('Something Wrong');</script>";
                echo '<script type="text/javascript">
           window.location = "../view/modifyRestautant.php"
      </script>';
            }

        }
    }


}
//if method is post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = $_POST["action"];


    switch ($action) {
        case "add" :
            addRestaurant();
            break;
        case "modify" :
            modifyRestaurant();
            break;
    }
}

function addRestaurant()
{

    $connection = getConnection();
    $name = '';
    $address = '';
    $email = '';
    $tel = '';
    $days = '';
    $from = '';
    $to = '';
    $availability = '';
    $daysArray = array();
    $image = '';
    $imgName = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['btn_save'])) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];

            if (getimagesize($_FILES['image']['tmp_name']) == false) {
                echo "Please Select an Image";
            } else {
                $image = addslashes($_FILES['image']['tmp_name']);
                $imgName = addslashes($_FILES['image']['name']);
                $image = file_get_contents($image);
                $image = base64_encode($image);

            }


            $daysArray = $_POST['days'];

            $days = implode(',', $daysArray);

            $from = $_POST['from'];
            $to = $_POST['to'];
            $availability = $_POST['availability'];

            $result = $connection->query("INSERT INTO restaurant (res_name,address,email,tel_no,logo,days,fromTime,toTime,availability)VALUES('{$name}', '{$address}', '{$email}', '{$tel}','{$image}','{$days}','{$from}','{$to}','{$availability}')");


            if ($result) {
                echo "<script type='text/javascript'>alert('Restaurant has been added successfully');</script>";
                echo '<script type="text/javascript">
           window.location = "../view/addRestaurant.php"
      </script>';

            } else {
                echo "<script type='text/javascript'>alert('Failed to add Restaurant');</script>";
//            header('../view/addRestaurant.php');
                echo '<script type="text/javascript">
           window.location = "../view/addRestaurant.php"
      </script>';
            }
        }


    }

}

function modifyRestaurant()
{
    echo "running";
    $connection = getConnection();
    $id = '';
    $name = '';
    $address = '';
    $email = '';
    $tel = '';
    $days = '';
    $from = '';
    $to = '';
    $availability = '';
    $daysArray = array();
    $image = '';
    $imgName = '';
    global $result;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['btn-modify'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];


            $from = $_POST['from'];
            $to = $_POST['to'];
            $availability = $_POST['availability'];

            //If admin select days
            if (null != $_POST['days']) {
                $daysArray = $_POST['days'];
                $days = implode(',', $daysArray);
                $result = $connection->query("UPDATE restaurant SET days='{$days}' WHERE res_id='{$id}' ");
            }
            //If admin image Selected
            if (!empty($_FILES['image']['tmp_name']) || is_uploaded_file($_FILES['image']['tmp_name'])) {
                echo "image";
                $image = addslashes($_FILES['image']['tmp_name']);
                $imgName = addslashes($_FILES['image']['name']);
                $image = file_get_contents($image);
                $image = base64_encode($image);

                $result = $connection->query("UPDATE restaurant SET logo='{$image}' WHERE res_id='{$id}' ");
            }

            $result = $connection->query("UPDATE restaurant SET res_name='{$name}',address='{$address}',email='{$email}',tel_no='{$tel}',fromTime='{$from}',toTime='{$to}',availability='{$availability}' WHERE res_id='{$id}' ");




            if ($result) {
                echo "<script type='text/javascript'>alert('Restaurant has been Modified successfully');</script>";
                echo "<script type='text/javascript'>
           window.location = '../controllers/ManageRestaurent.php?action=search&resId={$id}';
      </script>";

            } else {
                echo "<script type='text/javascript'>alert('Failed to Modify Restaurant');</script>";
                echo '<script type="text/javascript">
           window.location = "../view/editRestaurant.php"
      </script>';
            }
        }


    }
}