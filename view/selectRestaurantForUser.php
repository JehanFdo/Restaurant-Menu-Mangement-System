<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/20/2018
 * Time: 9:50 PM
 */

session_start();
$_SESSION['hello']='Jehan';
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
            <div  class="card">
                <div class="card-header">
                    <h3 class="card-title">Restaurant Details</h3>

                    <div class="card-tools">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Tel</th>
                            <th>Days</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Availability</th>
                            <th>Edit</th>
                        </tr>
                        <?php

                        echo" {$_SESSION['r_List']}";
                        ?>

                    </table>
                </div>
            </div>
                <!-- /.card-body -->
            </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
</div>
<?php
include('footer.php');
?>