

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
    <aside class="main-sidebar     elevation-4">
        <!-- Brand Logo -->
        <a href="admin_homepage.php" class="brand-link">
            <img src="images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text  ">GreenFly</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="AdminLTE/dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= $_SESSION['login_user'] ?> (Admin)</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="admin_homepage.php" class="nav-link active">

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
                    <li class="nav-item has-treeview menu-close">
                        <a href="add_jet_details.php" class="nav-link">
                            <i class="nav-icon fa fa-plane"></i>
                            <p>
                                Aircraft / Jets
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="add_jet_details.php" class="nav-link">
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
                        <h1 class="m-0 text-dark">Admin Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="admin_homepage.php">Admin</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">


                <?php
                require_once('Database Connection file/mysqli_connect.php');
                ?>
                <div class="row">

                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">

                            <div class="icon">
                                <i class="fa fa-money-bill-alt"></i>
                            </div>
                            <div class="inner">
                                <?php
                                $amount = 0;
                                $sql = "SELECT * FROM Payment_Details";
                                $result = mysqli_prepare($dbc, $sql);
                                mysqli_stmt_store_result($result);

                                if ($result = mysqli_query($dbc, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_array($result)) {

                                            $amount = $amount + $row['payment_amount'];

                                        }

                                        mysqli_free_result($result);
                                    }
                                    echo "<h3>Rs.$amount/=</h3>";
                                }

                                ?>

                                <p>Total Sales</p>
                            </div>
                            <a href="view_all_payments.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <?php
                                $count = 0;
                                $sql = "SELECT * FROM Ticket_Details WHERE booking_status='CONFIRMED'";
                                $result = mysqli_prepare($dbc, $sql);
                                mysqli_stmt_store_result($result);

                                if ($result = mysqli_query($dbc, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_array($result)) {

                                            $row['pnr'];
                                            $count = $count + 1;
                                        }

                                        mysqli_free_result($result);
                                    }
                                    echo "<h3>$count</h3>";
                                }

                                ?>

                                <p>Total Booked Tickets</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-ticket-alt "></i>
                            </div>
                            <a href="admin_view_booked_tickets.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <?php
                                $count = 0;
                                $sql = "SELECT * FROM Customer";
                                $result = mysqli_prepare($dbc, $sql);
                                mysqli_stmt_store_result($result);

                                if ($result = mysqli_query($dbc, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_array($result)) {

                                            $row['customer_id'];
                                            $count = $count + 1;
                                        }

                                        mysqli_free_result($result);
                                    }
                                    echo "<h3>$count</h3>";
                                }

                                ?>


                                <p>Total Customers</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-plus"></i>
                            </div>
                            <a href="admin_homepage.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-purple ">
                            <div class="inner">
                                <?php
                                $count = 0;
                                $sql = "SELECT * FROM Passengers";
                                $result = mysqli_prepare($dbc, $sql);
                                mysqli_stmt_store_result($result);

                                if ($result = mysqli_query($dbc, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_array($result)) {

                                            $row['passenger_id'];
                                            $count = $count + 1;
                                        }

                                        mysqli_free_result($result);
                                    }
                                    echo "<h3>$count</h3>";
                                }

                                ?>


                                <p>Total Passengers</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="admin_homepage.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-orange">
                            <div class="inner">
                                <?php
                                $count = 0;
                                $sql = "SELECT * FROM Flight_Details";
                                $result = mysqli_prepare($dbc, $sql);
                                mysqli_stmt_store_result($result);

                                if ($result = mysqli_query($dbc, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_array($result)) {

                                            $row['flight_no'];
                                            $count = $count + 1;
                                        }

                                        mysqli_free_result($result);
                                    }
                                    echo "<h3>$count</h3>";
                                }

                                ?>

                                <p>Total Flight/Ticket Schedules</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-plane-departure"></i>
                            </div>
                            <a href="view_all_flight_details.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="no-print col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-pink ">
                            <div class="inner">
                                <?php
                                $count = 0;
                                $sql = "SELECT * FROM Jet_Details";
                                $result = mysqli_prepare($dbc, $sql);
                                mysqli_stmt_store_result($result);

                                if ($result = mysqli_query($dbc, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_array($result)) {

                                            $row['jet_id'];
                                            $count = $count + 1;
                                        }

                                        mysqli_free_result($result);
                                    }
                                    echo "<h3>$count</h3>";
                                }

                                ?>

                                <p>Total Aircraft/Jets</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-plane"></i>
                            </div>
                            <a href="view_aircraft.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <!-- ./col -->

                    <div class="card col-lg-12 col-sm-12">
                        <div class="card-header ">
                            <h3>List of All Passengers
                                <a href="#" class="no-print btn btn-warning float-right" onclick="window.print();"><i
                                            class="fas fa-print"></i> Print
                                </a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class=" table table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>Passenger ID</th>
                                    <th>PNR</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Gender</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                $sql = "SELECT * FROM Passengers";
                                $result = mysqli_prepare($dbc, $sql);
                                mysqli_stmt_store_result($result);

                                if ($result = mysqli_query($dbc, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_array($result)) {

                                            echo "<tr>";
                                            echo "<td>" . $row['passenger_id'] . "</td>";
                                            echo "<td>" . $row['pnr'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['gender'] . "</td>";
                                            echo "</tr>";

                                        }

                                        mysqli_free_result($result);
                                    }
                                } else {
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbc);
                                }


                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card col-lg-12 col-sm-12">
                        <div class="card-header ">
                            <h3>List of All Customers
                                <a href="#" class="no-print btn btn-warning float-right" onclick="window.print();"><i
                                            class="fas fa-print"></i> Print
                                </a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-hover">

                                <thead>
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Phone No</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php

                                $sql = "SELECT * FROM Customer";
                                $result = mysqli_prepare($dbc, $sql);
                                mysqli_stmt_store_result($result);

                                if ($result = mysqli_query($dbc, $sql)) {
                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_array($result)) {

                                            echo "<tr>";
                                            echo "<td>" . $row['customer_id'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['gender'] . "</td>";
                                            echo "<td>" . $row['phone_no'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['address'] . "</td>";
                                            echo "</tr>";

                                        }

                                        mysqli_free_result($result);
                                    }
                                } else {
                                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbc);
                                }


                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>

                <?php
                mysqli_close($dbc);
                ?>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</div>

<?php include('AdminLTE/admin-footer.php') ?>

