<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/21/2018
 * Time: 4:23 PM
 */

include('userHead.php');
include('userHeader.php');
include('userSidebar.php');

?>
<!-- Content Wrapper. Contains page content -->
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
            <div class="col-md-12">
            <div  class="card">
                <div class="card-header">
                    <h3 class="card-title">Menu Details</h3>

                    <div class="card-tools">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <tr>
                            <th>Id</th>
                            <th>Menu Name</th>
                            <th>Description</th>
                            <th>Select</th>
                        </tr>
                        <?php

                        echo" {$_SESSION['selectM_List']}";
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
include('userFooter.php');
?>