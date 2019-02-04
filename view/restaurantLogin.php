<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/21/2018
 * Time: 10:08 AM
 */
session_start();
include_once('../Db/DbConfig.php');
$connection = getConnection();
$resList = '';
$query = "SELECT * FROM restaurant WHERE availability='Enable' ORDER BY res_id ASC";
$restaurants = mysqli_query($connection, $query);
while ($restaurant = mysqli_fetch_assoc($restaurants)) {

    $resList .= "<option value='{$restaurant['res_name']}'>{$restaurant['res_name']}</option>";
}
$_SESSION['res_List'] = $resList;

?>

<?php

if(isset($_POST['restaurant'])){
    $selectedRes=$_POST['restaurant'];
    $userList = '';
    $resId = '';
    $queryRes = "SELECT res_id FROM restaurant WHERE res_name='{$_POST['restaurant']}'";
    $restaurants = mysqli_query($connection, $queryRes);
    if ($restaurant = mysqli_fetch_assoc($restaurants)) {
        $resId .= $restaurant['res_id'];
        $query = "SELECT * FROM users WHERE res_id='{$resId}' ORDER BY res_id ASC";
        $users = mysqli_query($connection, $query);

        while ($user = mysqli_fetch_assoc($users)) {

            $userList .= "<option value='{$user['user_name']}'>{$user['user_name']}</option>";
        }
        if(null==$userList){
            echo "<script type='text/javascript'>alert('No Users defined under this restaurant !');</script>";
        }
        $_SESSION['restaurantId']=$restaurant['res_id'];
        $_SESSION['restaurantName']=$_POST['restaurant'];
        $_SESSION['user_List'] = $userList;
    }

}
if(isset($_POST['user_login'])){
    $errors= array();
    if(!isset($_POST['name']) || strlen(trim($_POST['name'])) < 1){
        $errors[] = "Name is Missing / Invalid";
    }

    if(!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1){
        $errors[] = "Password is Missing / Invalid";
    }

    if(empty($errors)){
        $name=mysqli_real_escape_string($connection,$_POST['name']);
        $password=mysqli_real_escape_string($connection,$_POST['password']);
        $hashedPass=sha1($password);

        $query="SELECT * FROM  users WHERE user_name='{$name}' AND password='{$hashedPass}' LIMIT 1";

        $result_set=mysqli_query($connection,$query);

        if($result_set){
            //Query Succesfull
            if(mysqli_num_rows($result_set)==1){
                //valid user

                $user=mysqli_fetch_assoc($result_set);

                //set Session
                $_SESSION['user_id']=$user['user_Id'];
                $_SESSION['user_name']=$user['user_name'];
                $_SESSION['full_name']=$user['Full_name'];

//                header('Location: ../userIndex.php');
            }else{
                //invalid user name/password
                $errors[]="invalid Username/Password";
            }
        }else{
            //error in query
            $errors[]='Database Query Failed';
        }
    }

}
?>
<?php

if(isset($_SESSION['user_id'])){

    header('Location: ../userIndex.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="register-box">
    <div class="register-logo">
        <a href="../../index2.html"><b>Taste</b>Factory</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <div class="text-center" style="padding-bottom: 10px">
                <img class="profile-user-img img-fluid img-circle"
                     src="../dist/img/boy-1.png"
                     alt="User profile picture">
            </div>
            <p class="login-box-msg">Restaurant Login</p>

            <form action="restaurantLogin.php" method="post">
                <div class="form-group has-feedback" >
                    <label>Select Restaurant</label>
                    <select class="form-control" name="restaurant" onchange="this.form.submit()">
                        <option>Select Restaurant</option>
                        <?php echo $_SESSION['res_List']?>
                    </select>
                </div>
                <div class="form-group has-feedback" >
                    <label>Select User</label>
                    <select class="form-control" name="name" >
                    <option>Select User</option>
                    <?php echo $_SESSION['user_List']?>
                    </select>
                </div>
                <div class="form-group has-feedback">
                    <label>Enter Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>
                <?php
                if(isset($errors) && !empty($errors)){
                    echo '<P><i class="fa fa-warning text-danger"></i> Invalid User Name / Password</P>';
                }

                ?>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" name="user_login" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
</body>
</html>
