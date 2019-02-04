<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/21/2018
 * Time: 5:34 PM
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
                        <h1 class="m-0 text-dark">Food</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Food</a></li>
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
                                <h3 class="card-title">Modify Food</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="../controllers/FoodManage.php" method="post" enctype="multipart/form-data">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInputMenuID">Menu ID</label>
                                        <input readonly="readonly" type="text" class="form-control"
                                               id="exampleInputMenuID"
                                               name="mid" value="<?php echo $_SESSION['md'] ?>"
                                               placeholder="Menu ID">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFoodId">Food ID</label>
                                        <input readonly="readonly" type="text" class="form-control"
                                               id="exampleInputFoodId"
                                               name="fid"
                                               value="<?php echo $_SESSION['foodId'] ?>"
                                               placeholder="FoodID">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFoodName"">Food Name</label>
                                        <input  type="text" class="form-control"
                                                id="exampleInputFoodName"
                                                value="<?php echo $_SESSION['foodName'] ?>"
                                                name="fName" placeholder="FoodName">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="3" name="description"
                                                  placeholder="Enter Description..."><?php echo $_SESSION['des'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Add Food Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input"
                                                       id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" name="action" value="modifyFood" id="action" hidden>
                                    <div class="card-footer">
                                        <button type="submit" id="btn-modify" name="btn_modify" class="btn btn-primary">
                                            Modify
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
                                 src="data:image;base64,'."{$_SESSION['img']}".'"
                                 alt="User profile picture">';
                                    ?>
                                </div>

                                <h3 class="profile-username text-center"><?php echo "{$_SESSION['foodName']}" ?></h3>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Description</b> <a class="float-right"><?php echo "{$_SESSION['des']}" ?></a>
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