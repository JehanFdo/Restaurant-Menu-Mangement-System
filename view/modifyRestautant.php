<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/20/2018
 * Time: 2:50 PM
 */
session_start();
include('Head.php');
include('Header.php');
include('Sidebar.php');
?>
<!-- Content Wrapper. Contains page content -->
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
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Modify Restaurant</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="../controllers/ManageRestaurent.php" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputId">Id</label>
                                <input readonly="readonly" type="text" class="form-control" id="exampleInputid" name="id" placeholder="Enter Id" value="<?php echo "{$_SESSION['res_id']}" ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" id="exampleInputname" name="name" placeholder="Enter name" value="<?php echo "{$_SESSION['res_name']}" ?>">
                            </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" class="form-control" id="exampleInputAddress" name="address" placeholder="Enter address" value="<?php echo "{$_SESSION['address']}" ?>">
                                </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Enter email" value="<?php echo "{$_SESSION['email']}" ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Telephone</label>
                                <input type="tel" class="form-control" id="exampleInputTel" name="tel" placeholder="Enter Telephone" value="<?php echo "{$_SESSION['tel_no']}" ?>">
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
                                <select class="form-control select2" multiple="multiple" name="days[]"  valid="daysSelect" data-placeholder="Select a State"
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
                                            <input type="text" name="from" class="form-control timepicker" value="<?php echo "{$_SESSION['fromTime']}" ?>">

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
                                            <input type="text" name="to" class="form-control timepicker" value="<?php echo "{$_SESSION['toTime']}" ?>">

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
                                <select class="form-control" name="availability" >
                                    <option <?php echo "{$_SESSION['availability']}"=='Enable'? ' selected="selected"':';'?>>Enable</option>
                                    <option <?php echo "{$_SESSION['availability']}"=='Disable'? ' selected="selected"':';'?>>Disable</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <input type="text" name="action" value="modify" id="action" hidden>
                        <div class="card-footer">
                            <button type="submit" id="btn-modify" name="btn-modify" class="btn btn-primary">Modify Restaurant</button>
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
                                 src="data:image;base64,'."{$_SESSION['logo']}".'"
                                 alt="User profile picture">';
                            ?>
                        </div>

                        <h3 class="profile-username text-center"><?php echo "{$_SESSION['res_name']}" ?></h3>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Address</b> <a class="float-right"><?php echo "{$_SESSION['address']}" ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Tel No</b> <a class="float-right"><?php echo "{$_SESSION['tel_no']}" ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right"><?php echo "{$_SESSION['email']}" ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Open Days</b> <a class="float-right"><?php echo "{$_SESSION['days']}" ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Open Hours</b> <a class="float-right"><?php echo "{$_SESSION['fromTime']}"."-"."{$_SESSION['toTime']}" ?></a>
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
include('footer.php');
?>
<script>
    $(function () {
        let select=$('.select2').select2();
        // //Initialize Select2 Elements
        //select.val("<?php //print_r( $_SESSION['days'])?>//").trigger("change");

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })

    })


</script>