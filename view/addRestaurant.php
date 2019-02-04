<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/19/2018
 * Time: 10:33 AM
 */
include('head.php');
include('header.php');
include('sidebar.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Restaurant</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Restaurant</a></li>
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
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Restaurant</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="../controllers/ManageRestaurent.php" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" id="exampleInputname" name="name" placeholder="Enter name">
                            </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" class="form-control" id="exampleInputAddress" name="address" placeholder="Enter address">
                                </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Telephone</label>
                                <input type="tel" class="form-control" id="exampleInputTel" name="tel" placeholder="Enter Telephone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
<!--                                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">-->
                            </div>
                            <div class="form-group">
                                <label>Multiple</label>
                                <select class="form-control select2" multiple="multiple" name="days[]" data-placeholder="Select a State"
                                        style="width: 100%;">
                                    <option>Monday</option>
                                    <option>Tuesday</option>
                                    <option>Wednesday</option>
                                    <option>Thursday</option>
                                    <option>Friday</option>

                                </select>
                            </div>
                            <div class="row">
                                <div class="bootstrap-timepicker col-md-6">
                                    <div class="form-group">
                                        <label>From:</label>

                                        <div class="input-group">
                                            <input type="text" name="from" class="form-control timepicker">

                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                                <div class="bootstrap-timepicker col-md-6">
                                    <div class="form-group">
                                        <label>To:</label>

                                        <div class="input-group">
                                            <input type="text" name="to" class="form-control timepicker">

                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>
                            </div>
                            <!-- select -->
                            <div class="form-group">
                                <label>Select</label>
                                <select class="form-control" name="availability">
                                    <option>Enable</option>
                                    <option>Diable</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <input type="text" name="action" value="add" id="action" hidden>
                        <div class="card-footer">
                            <button type="submit" id="btn-save" name="btn_save" class="btn btn-primary">Add Restaurant</button>
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