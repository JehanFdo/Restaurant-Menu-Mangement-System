<?php
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
                        <h1 class="m-0 text-dark">Food</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Food</a></li>
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
                                <h3 class="card-title">Add Food</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="../controllers/FoodManage.php" method="post"
                                  enctype="multipart/form-data">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInputMenuID">Menu ID</label>
                                        <input readonly="readonly" type="text" class="form-control"
                                               id="exampleInputMenuID"
                                               name="mid" value="<?php echo $_SESSION['menuID'] ?>"
                                               placeholder="Menu ID">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputMenuName">Menu Name</label>
                                        <input readonly="readonly" type="text" class="form-control"
                                               id="exampleInputMenuName"
                                               name="mName" value="<?php echo $_SESSION['menuNa'] ?>"
                                               placeholder="Menu Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFoodName"">Food Name</label>
                                        <input  type="text" class="form-control"
                                               id="exampleInputFoodName"
                                               name="fName" placeholder="FoodName">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" rows="3" name="description"
                                                  placeholder="Enter Description..."></textarea>
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
                                    <input type="text" name="action" value="addFood" id="action" hidden>
                                    <div class="card-footer">
                                        <button type="submit" id="btn-save" name="btn_save" class="btn btn-primary">
                                            Add
                                            Food
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