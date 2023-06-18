<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("location: customer_homepage.php");
}
?>
<?php include('AdminLTE/admin-header.php') ?>
    <div class="customer-dashboard">
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
            <a href="customer_homepage.php" class="brand-link">
                <img src="images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text ">GreenFly</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> <?= $_SESSION['login_user'] ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="customer_homepage.php" class="nav-link ">

                                <i class=" nav-icon fas fa-tachometer-alt"></i>

                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="view_all_flight.php" class="nav-link ">
                                <i class="nav-icon fas fa-tags "></i>
                                <p>
                                    View Flight Schedules

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="book_tickets.php" class="nav-link ">
                                <i class="nav-icon fas fa-search "></i>
                                <p>
                                    Search Flight

                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="view_booked_tickets.php" class="nav-link ">
                                <i class="nav-icon fas  fa-tags"></i>
                                <p>
                                    View Booked Tickets
                                </p>
                            </a>

                        </li>

                        <li class="nav-item has-treeview">
                            <a href="cancel_booked_tickets.php" class="nav-link active">
                                <i class="nav-icon fas  fa-times-circle"></i>
                                <p>
                                    Cancel Booked Tickets
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
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
                            <h1 class="m-0 text-dark">Enter PNR To Cancel Ticket</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="customer_homepage.php">Customer</a></li>
                                <li class="breadcrumb-item active">Cancel Ticket</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <section class="content">

                <?php
                echo "<div class=\"content-header\">";
                echo "<div class=\"container-fluid\">";
                if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
                    echo " 
            <div class=\"alert alert-danger alert-dismissible\">
           
                  <h5><i class=\"icon fas fa-ban\"></i> Alert!</h5>Invalid PNR /or/ You have Entered Completed Trips PNR, Please Try Again..!
                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                </div>
            ";
                } elseif (isset($_GET['msg']) && $_GET['msg'] == 'success') {
                    echo "
            <div class=\"alert alert-success alert-dismissible\">
                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                  <h5><i class=\"icon fas fa-check\"></i>Your ticket has been successfully cancelled.</h5>
                  Your amount will be refunded to your bank account.(Cancellation charge on 15% of your ticket amount has been deducted).
                </div>
            ";
                }
                echo "</div>";
                echo "</div>";
                ?>

                <!-- Main content -->
                <div class="content">

                    <div class=" col-md-6 col-sm-6 offset-md-3 ">

                        <!-- /.login-logo -->
                        <div class="card">
                            <div class="card-body login-card-body  ">
                                <div class="row">
                                    <div class="offset-2">
                                        <p>
                                        <h3><b>CANCEL BOOKED TICKET</b></h3></p>
                                    </div>
                                </div>

                                <form action="cancel_booked_tickets_form_handler.php" method="post">
                                    <div class="input-group mb-3">
                                        <input type="number" name="pnr" required class="form-control"
                                               placeholder="Enter PNR">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user-check "></span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">

                                        <div class="col-6">
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="remember">
                                                <label for="remember">
                                                    Are You Sure
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-6">
                                            <button type="submit" value="Cancel Ticket" name="Cancel_Ticket"
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
                    <!--			Cancel Booked Tickets-->

                    <!--Following data fields were empty!
                        ...
                        ADD VIEW FLIGHT DETAILS AND VIEW JETS/ASSETS DETAILS for ADMIN
                        PREDEFINED LOCATION WHEN BOOKING TICKETS
                    -->

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
<?php include('AdminLTE/admin-footer.php') ?>