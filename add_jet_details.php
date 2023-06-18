

<?php

session_start();

if (!isset($_SESSION['login_user'])) {
    header('Location: login_page.php');
}

?>
<?php include('AdminLTE/admin-header.php') ?>
<div class="admin-dashboard">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

        </ul>


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4">
        <!-- Brand Logo -->
        <a href="admin_homepage.php" class="brand-link">
            <img src="images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text">GreenFly</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="admin_homepage.php" class="nav-link ">

                            <i class=" nav-icon fas fa-tachometer-alt"></i>

                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="admin_view_booked_tickets.php" class="nav-link ">
                            <i class="nav-icon fas  fa-tags"></i>
                            <p>
                                View Tickets
                            </p>
                        </a>

                    </li>
                    <li class="nav-item ">
                        <a href="view_all_payments.php" class="nav-link">
                            <i class="nav-icon fas  fa-money-check"></i>
                            <p>
                                View Payments
                            </p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="add_flight_details.php" class="nav-link ">
                            <i class="nav-icon fas fa-plus-circle "></i>
                            <p>
                                Add Flight Schedule

                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="view_all_flight_details.php" class="nav-link ">
                            <i class="nav-icon fas fa-plane-departure "></i>
                            <p>
                                View Flight Schedule
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="delete_flight_details.php" class="nav-link ">
                            <i class="nav-icon fas  fa-trash"></i>
                            <p>
                                Delete Flight Schedule
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="view_aircraft.php" class="nav-link ">
                            <i class="nav-icon fas fa-clone "></i>
                            <p>
                                View Aircraft Details

                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <a href="add_jet_details.php" class="nav-link active">
                            <i class="nav-icon fa fa-plane"></i>
                            <p>
                                Aircraft / Jets
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add_jet_details.php" class="nav-link active">
                                    <i class="nav-icon fas fa-plus-square "></i>
                                    <p>Add Aircraft Details</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="activate_jet_details.php" class="nav-link">
                                    <i class="nav-icon fas fa-check-circle "></i>
                                    <p>Activate Aircraft</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="deactivate_jet_details.php" class="nav-link">
                                    <i class="fas  fa-times-circle  nav-icon"></i>
                                    <p>Deactivate Aircraft</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="logout_handler.php" class="nav-link ">
                            <i class="nav-icon  fas fa-sign-out-alt "></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Enter New Aircraft/Jet Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="admin_homepage.php">Admin</a></li>
                            <li class="breadcrumb-item active">Add Aircraft</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">

            <?php


            if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
                echo " 
            <div class=\"alert alert-danger alert-dismissible\">
           
                  <h5><i class=\"icon fas fa-ban\"></i> Alert.!</h5>The Aircraft/Jet ID already exists, Please Enter a new ID...!
                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                </div>
            ";
            } elseif (isset($_GET['msg']) && $_GET['msg'] == 'success') {
                echo "
            <div class=\"alert alert-success alert-dismissible\">
                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                  <h5><i class=\"icon fas fa-check\"></i>Success.!</h5> 
                  The Aircraft/Jet Details has been successfully added. 
                </div>
            ";
            }

            ?>

            <div class="container-fluid">


                <div class=" col-md-6 col-sm-12 offset-md-3  ">


                    <!-- /.login-logo -->
                    <div class="card">
                        <div class="card-body login-card-body  ">


                            <form action="add_jet_details_form_handler.php" method="post">
                                <div class="input-group mb-3">
                                    <label>Aircraft/Jet ID:</label>
                                    <div class="input-group" data-target-input="nearest">
                                        <input type="text" name="jet_id" required class="form-control"
                                               placeholder="Enter Valid Aircraft/Jet ID">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-plane-departure "></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label>Aircraft/Jet - Model/Type:</label>
                                    <div class="input-group" data-target-input="nearest">
                                        <input type="text" name="jet_type" required class="form-control"
                                               placeholder="Enter Valid Aircraft/Jet - Model/Type">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-plane "></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label>Aircraft/Jet Total Capacity:</label>
                                    <div class="input-group" data-target-input="nearest">
                                        <input type="number" min="50" max="200" name="jet_capacity" required
                                               class="validate form-control"
                                               placeholder="Enter Aircraft/Jet Total Capacity">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-braille  "></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-12">
                                        <button type="submit" value="Submit" name="Submit"
                                                class="btn btn-primary btn-block">Submit
                                        </button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>

                        </div>
                        <!-- /.login-card-body -->
                    </div>
                </div>


            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</div>


<?php include('AdminLTE/admin-footer.php') ?>






