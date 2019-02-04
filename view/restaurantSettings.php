<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/23/2018
 * Time: 12:41 AM
 */


/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/21/2018
 * Time: 4:15 PM
 */

include('userHead.php');
include('userHeader.php');
include('userSidebar.php');

?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Settings</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Settings</a></li>
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
                                <h3 class="card-title">Change Settings</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="../controllers/ManageUser.php" method="post"
                                  enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputResId">Restaurent ID</label>
                                        <input type="text" class="form-control" id="exampleInputResId" name="resId"
                                               placeholder="Enter Restaurent ID"
                                               value="<?php echo $_SESSION['restaurantId']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputResName">Restaurent Name</label>
                                        <input type="text" class="form-control" id="exampleInputResName" name="resName"
                                               placeholder="Enter Restaurant Name" value="<?php echo $_SESSION['restaurantName']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputuserid">User ID</label>
                                        <input type="text" class="form-control" id="exampleInputuserid" name="id"
                                               placeholder="Enter User ID" value="<?php echo $_SESSION['user_id']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputfname">Name</label>
                                        <input type="text" class="form-control" id="exampleInputfname" name="name"
                                               placeholder="Enter Full Name" value="<?php echo $_SESSION['full_name']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputuname">User Name</label>
                                        <input type="text" class="form-control" id="exampleInputuname" name="uname"
                                               placeholder="Enter User Name" value="<?php echo $_SESSION['user_name']?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword"
                                               name="password" placeholder="Enter password">
                                    </div>
                                    <input type="text" name="action" value="updateMe" id="action" hidden>
                                    <div class="card-footer">
                                        <button type="submit" id="btn-save" name="btn_update" class="btn btn-primary">Update
                                            Me
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
include('userFooter.php');
?>