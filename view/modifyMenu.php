<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/21/2018
 * Time: 2:51 PM
 */

include('userHead.php');
include('userHeader.php');
include('userSidebar.php');
?>
<!-- Content Wrapper. Contains page content -->
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
                        <li class="breadcrumb-item active">Dashboard </li>
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
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Modify Menu</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="../controllers/ManageMenu.php" method="post" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="exampleInputRestaurantID">Restaurant ID</label>
                                <input readonly="readonly" type="text" class="form-control" id="exampleInputRestaurantID"
                                       name="resId" value="<?php echo $_SESSION['restaurant_id']?>" placeholder="Restaurant ID">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUserId">User ID</label>
                                <input readonly="readonly" type="text" class="form-control" id="exampleInputUserId"
                                       name="resUserID" value="<?php echo $_SESSION['restaurantUser_id']?>" placeholder="Enter User ID">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMenueID">Menu ID</label>
                                <input type="text" class="form-control" id="exampleInputMenuId"
                                       name="MenuId" placeholder="Enter Menu ID" value="<?php echo $_SESSION['menu_id']?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMenueName">Name</label>
                                <input type="text" class="form-control" id="exampleInputMenuName"
                                       name="MenuName" placeholder="Enter Menu Name" value="<?php echo $_SESSION['menu_name']?>">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description" placeholder="Enter Description..."
                                ><?php echo $_SESSION['menu_description'] ?></textarea>
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
                            <input type="text" name="action" value="modifyMenu" id="action" hidden>
                            <div class="card-footer">
                                <button type="submit" id="btn-modify" name="btn_modify" class="btn btn-primary">Modify
                                    Menu
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- /.card -->
            <!--/.col (right) -->
        </div>
            <div class="col-md-4">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">

                            <?php
                            echo '<img class="profile-user-img img-fluid img-circle"
                                 src="data:image;base64,'."{$_SESSION['menu_image']}".'"
                                 alt="User profile picture">';
                            ?>
                        </div>

                        <h3 class="profile-username text-center"><?php echo "{$_SESSION['menu_name']}" ?></h3>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Description</b> <a class="float-right"><?php echo "{$_SESSION['menu_description']}" ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
</div>

<?php
include('userFooter.php');
?>