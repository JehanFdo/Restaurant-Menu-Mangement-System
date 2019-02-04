<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/20/2018
 * Time: 10:00 PM
 */

session_start();
include('head.php');
include('header.php');
include('sidebar.php');
?>
<!-- Content Wrapper. Contains page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Users</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action="../controllers/ManageUser.php" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputResId">Restaurent ID</label>
                                    <input type="text" class="form-control" id="exampleInputResId" name="resId"
                                           placeholder="Enter Restaurent ID"
                                           value="<?php echo "{$_SESSION['res_id']}" ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputResName">Restaurent Name</label>
                                    <input type="text" class="form-control" id="exampleInputResName" name="resName"
                                           placeholder="Enter Restaurant Name"
                                           value="<?php echo "{$_SESSION['res_name']}" ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputname" name="name"
                                           placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputuname">User Name</label>
                                    <input type="text" class="form-control" id="exampleInputuname" name="uname"
                                           placeholder="Enter User Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword"
                                           name="password" placeholder="Enter password">
                                </div>
                                <input type="text" name="action" value="add" id="action" hidden>
                                <div class="card-footer">
                                    <button type="submit" id="btn-save" name="btn_save" class="btn btn-primary">Add
                                        User
                                    </button>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
</div>
<?php
include('footer.php');
?>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })

    })
</script>