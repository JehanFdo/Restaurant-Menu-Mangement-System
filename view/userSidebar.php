<?php
/**
 * Created by PhpStorm.
 * User: jehan
 * Date: 9/21/2018
 * Time: 12:12 PM
 */

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['user_id'])){

    header('Location: restaurantLogin.php');
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
                <a href="#" class="d-block"><?php echo $_SESSION['user_name']?></a>
</div>
</div>

<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
            <a href="/userindex.php" class="nav-link active">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fab fa-elementor"></i>
                <p>
                    Menu
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="createMenu.php" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Create Menu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../controllers/ManageMenu.php?action=loadMenu"  class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Edit Menu</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fas fa-cookie-bite"></i>
                <p>
                    Food
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="../controllers/FoodManage.php?action=loadMenu" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Create Food</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../controllers/FoodManage.php?action=loadMenuForModifyFood" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Edit Food</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="restaurantSettings.php" class="nav-link">
                <i class="fas fa-cog"></i>
                <p>
                    Settings
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="../controllers/logout.php?action=userlogout" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
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