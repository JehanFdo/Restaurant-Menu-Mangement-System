
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: jehan-->
<!-- * Date: 9/19/2018-->
<!-- * Time: 12:40 AM-->
<!-- */-->
<!-- Main Sidebar Container -->
<?php
if (session_status() == PHP_SESSION_NONE) {
session_start();
}
if(!isset($_SESSION['admin_name'])){
//echo '<script type="text/javascript">
    //    window.location = "adminLogin.php"
    //</script>';
header('Location: adminLogin.php');
}
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Taste Factory</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Jehan Fernando</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="/index.php" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-utensils"></i>
                        <p>
                            Restaurant
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../view/addRestaurant.php" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Create Restaurant</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../controllers/ManageRestaurent.php?action=load"" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Edit Restaurant</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user"></i>
                        <p>
                            Users
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../controllers/ManageUser.php?action=load" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Create User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../controllers/ManageUser.php?action=loadUsers" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Edit User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fab fa-elementor"></i>
                        <p>
                            Menu
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>View Menu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog"></i>
                        <p>
                            Settings
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview">
                    <a href="../controllers/logout.php?action=adminlogout" class="nav-link">
                        <i class="nav-icon fa fa-table"></i>
                        <p>
                            Log Out
                        </p>
                    </a>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

