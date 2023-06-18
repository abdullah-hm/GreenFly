<?php

session_start();

if (!isset($_SESSION['login_user'])) {
    header('Location: login_page.php');
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
                            <a href="book_tickets.php" class="nav-link">
                                <i class="nav-icon fas fa-search "></i>
                                <p>
                                    Search Flight

                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="view_booked_tickets.php" class="nav-link active">
                                <i class="nav-icon fas  fa-tags"></i>
                                <p>
                                    View Booked Tickets
                                </p>
                            </a>

                        </li>

                        <li class="nav-item has-treeview">
                            <a href="cancel_booked_tickets.php" class="nav-link ">
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
                            <h1 class="m-0 text-dark">VIEW BOOKED FLIGHT TICKETS</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Customer</a></li>
                                <li class="breadcrumb-item active">View Tickets</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">


                    <div class="card">

                        <div class="card-header ">
                            <h3 class="card-title">Upcoming Trips</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>PNR</th>
                                    <th>Flight No</th>
                                    <th>Booked Date</th>
                                    <th>Journey Date</th>
                                    <th>Class</th>
                                    <th>Booking Status</th>
                                    <th>Payment ID</th>
                                    <th>Passenger(s)</th>

                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $todays_date = date('Y-m-d');
                                $thirty_days_before_date = date_create(date('Y-m-d'));
                                date_sub($thirty_days_before_date, date_interval_create_from_date_string("30 days"));
                                $thirty_days_before_date = date_format($thirty_days_before_date, "Y-m-d");

                                $customer_id = $_SESSION['login_user'];
                                require_once('Database Connection file/mysqli_connect.php');
                                $query = "SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id FROM Ticket_Details where customer_id=? AND journey_date>=? AND booking_status='CONFIRMED' ORDER BY  journey_date";
                                $stmt = mysqli_prepare($dbc, $query);
                                mysqli_stmt_bind_param($stmt, "ss", $customer_id, $todays_date);
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_bind_result($stmt, $pnr, $date_of_reservation, $flight_no, $journey_date, $class, $booking_status, $no_of_passengers, $payment_id);
                                mysqli_stmt_store_result($stmt);
                                if (mysqli_stmt_num_rows($stmt) == 0) {
                                    echo " <div class=\"alert alert-warning alert-dismissible fade show\">
                                            <strong>Not Found..!</strong> No Upcoming Trips were booked.
                                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                                        </div>";

                                } else {

                                    while (mysqli_stmt_fetch($stmt)) {
                                        echo "
                                                <tr>
                                                <td>" . $pnr . "</td>
                                                <td>" . $flight_no . "</td>
                                                <td>" . $date_of_reservation . "</td>
                                                <td>" . $journey_date . "</td>
                                                <td>" . $class . "</td>
                                                <td>" . $booking_status . "</td>
                                                <td>" . $payment_id . "</td>
                                                <td>" . $no_of_passengers . "</td>
                                                
                                                </tr>
                                                ";
                                    }


                                }
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                                echo "</div>";


                                echo "<div class=\"card\">
                            <div class=\"card-header \">
                                <h3 class=\"card-title\">Completed Trips</h3>
                            </div>
                            
                            ";
                                //completed trips apper here

                                echo " 
 
                                <div class=\"card-body\">
                                    <table id=\"example3\" class=\"table table-bordered table-hover\">";

                                echo "    <thead>
                                                <tr>
                                                    <th>PNR</th>
                                                    <th>Flight No</th>
                                                    <th>Booked Date</th>
                                                    <th>Journey Date</th>
                                                    <th>Class</th>
                                                    <th>Booking Status</th>
                                                    <th>Payment ID</th>
                                                    <th>Passenger(s)</th>
                                                    
                                                </tr>
                                             </thead>
                                            <tbody>";

                                $query = "SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id FROM Ticket_Details where customer_id=? and journey_date<? and journey_date>=? ORDER BY  journey_date";
                                $stmt = mysqli_prepare($dbc, $query);
                                mysqli_stmt_bind_param($stmt, "sss", $customer_id, $todays_date, $thirty_days_before_date);
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_bind_result($stmt, $pnr, $date_of_reservation, $flight_no, $journey_date, $class, $booking_status, $no_of_passengers, $payment_id);
                                mysqli_stmt_store_result($stmt);
                                if (mysqli_stmt_num_rows($stmt) == 0) {

                                    echo " <div class=\"alert alert-warning alert-dismissible fade show\">
                                            <strong>Not Found..!</strong> No trips completed in the past 30 days!
                                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
                                        </div>";

                                } else {

                                    while (mysqli_stmt_fetch($stmt)) {
                                        echo "
                    <tr>
        			<td>" . $pnr . "</td>
        			<td>" . $flight_no . "</td>
        			<td>" . $date_of_reservation . "</td> 
					<td>" . $journey_date . "</td>
					<td>" . $class . "</td>
					<td>" . $booking_status . "</td>
					<td>" . $payment_id . "</td>
					<td>" . $no_of_passengers . "</td>
					
        			</tr>
        			";
                                    }


                                }
                                mysqli_stmt_close($stmt);
                                mysqli_close($dbc);
                                ?>

                                </tbody>
                            </table>
                        </div>

                        <!-- /.card-body -->
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>

<?php include('AdminLTE/admin-footer.php') ?>