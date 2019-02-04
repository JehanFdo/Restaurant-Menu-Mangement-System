<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/21/2018
 * Time: 6:48 AM
 */
session_start();
include_once('../Db/DbConfig.php');

if(isset($_SESSION['admin_name'])){
    header('Location: ../index.php');
}
if(isset($_POST['btn_login'])){

    $errors= array();

    if(!isset($_POST['name']) || strlen(trim($_POST['name'])) < 1){
        $errors[] = "Name is Missing / Invalid";
    }

    if(!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1){
        $errors[] = "Password is Missing / Invalid";
    }

    if(empty($errors)){
        $connection=getConnection();
        $name=mysqli_real_escape_string($connection,$_POST['name']);
        $password=mysqli_real_escape_string($connection,$_POST['password']);

        $query="SELECT * FROM  admin WHERE name='{$name}' AND pass='{$password}' LIMIT 1";

        $result_set=mysqli_query($connection,$query);

        if($result_set){
            //Query Succesfull
            if(mysqli_num_rows($result_set)==1){
                //valid user

                $admin=mysqli_fetch_assoc($result_set);
                //set Session
                $_SESSION['admin_id']=$admin['admin_id'];
                $_SESSION['admin_name']=$admin['name'];

//                echo '<script type="text/javascript">
//           window.location = "../index.php"
//      </script>';
                header('Location: ../index.php');
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
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Taste</b>Factory</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
        <div class="text-center" style="padding-bottom: 10px">
            <img class="profile-user-img img-fluid img-circle"
                 src="../dist/img/man-1.png"
                 alt="User profile picture">
        </div>
        <p class="login-box-msg">Admin Login</p>
      <form action="adminLogin.php" method="post">
        <div class="form-group has-feedback" style="padding-bottom: 10px">
            <label>Enter User Name</label>
          <input type="text" class="form-control" placeholder="Name" name="name">
        </div>
        <div class="form-group has-feedback" style="padding-bottom: 10px">
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
            <button type="submit" name="btn_login" class="btn btn-primary btn-block btn-flat">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
</body>
</html>
