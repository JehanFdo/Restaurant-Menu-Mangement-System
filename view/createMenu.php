<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/21/2018
 * Time: 12:10 PM
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
                        <h1 class="m-0 text-dark">Menu</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
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
                                <h3 class="card-title">Create Menu</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="../controllers/ManageMenu.php" method="post"
                                  enctype="multipart/form-data">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInputRestaurantID">Restaurant ID</label>
                                        <input readonly="readonly" type="text" class="form-control" id="exampleInputRestaurantID"
                                               name="resId" value="<?php echo $_SESSION['restaurantId']?>" placeholder="Restaurant ID">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputRestaurantName"">Restaurant Name</label>
                                        <input readonly="readonly" type="text" class="form-control" id="exampleInputRestaurantName"
                                               name="resName" value="<?php echo $_SESSION['restaurantName']?>" placeholder="Restaurant Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUserId">User ID</label>
                                        <input readonly="readonly" type="text" class="form-control" id="exampleInputUserId"
                                               name="resUserID" value="<?php echo $_SESSION['user_id']?>" placeholder="Enter User ID">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputMenueName">Name</label>
                                        <input type="text" class="form-control" id="exampleInputMenuName"
                                               name="MenuName" placeholder="Enter Menu Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="3" name="description" placeholder="Enter Description..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Add Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input"
                                                       id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                <input type="text" name="action" value="addMenu" id="action" hidden>
                                <div class="card-footer">
                                    <button type="submit" id="btn-save" name="btn_save" class="btn btn-primary">Create
                                        Menu
                                    </button>
                                </div>
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