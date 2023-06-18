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
    <aside class="main-sidebar   elevation-4">
        <!-- Brand Logo -->
        <a href="customer_homepage.php" class="brand-link navbar-navy">
            <img src="images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text">GreenFly</span>
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
                        <a href="customer_homepage.php" class="nav-link active">

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
                        <h1 class="m-0 text-dark">Customer Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="customer_homepage.php">Customer</a></li>
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

                <!--Following data fields were empty!

                    ADD VIEW FLIGHT DETAILS for CUSTOMER PREDEFINED LOCATION WHEN BOOKING TICKETS

                -->

                <?php
                require_once('Database Connection file/mysqli_connect.php');
                ?>
                <div class="row">

                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gray-dark">
                            <?php

                            $_SESSION['login_user'];
                            $query = "SELECT count(*),frequent_flier_no,mileage FROM Frequent_Flier_Details WHERE customer_id=?";
                            $stmt = mysqli_prepare($dbc, $query);
                            mysqli_stmt_bind_param($stmt, "s", $_SESSION['login_user']);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_bind_result($stmt, $cnt, $frequent_flier_no, $mileage);
                            mysqli_stmt_fetch($stmt);
                            if ($cnt == 1) {
                                echo "
                                <div class=\"inner\">
                                    <h3>$mileage</h3>
                                    <p>Points</p>
                                </div>
                                <div class=\"icon\">
                                    <i class=\"fa  fa-cubes\"></i>
                                </div>
                                <a href=\"#\" class=\"small-box-footer\">Frequent Flier No:$frequent_flier_no</a>
                        ";
                            } else {
                                echo "
                                <div class=\"inner\">
                                    <h3>00</h3>
                                    <p>Points</p>
                                </div>
                                <div class=\"icon\">
                                    <i class=\"fa  fa-cubes\"></i>
                                </div>
                                <a href=\"#\" class=\"small-box-footer\">Frequent Flier No:(Not Added)</a>
                        ";
                            }
                            mysqli_stmt_close($stmt);

                            ?>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">
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
                                <i class="fa fa-fighter-jet "></i>
                            </div>
                            <a href="view_all_flight.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-purple ">
                            <?php
                            $todays_date = date('Y-m-d');
                            $thirty_days_before_date = date_create(date('Y-m-d'));
                            date_sub($thirty_days_before_date, date_interval_create_from_date_string("30 days"));
                            $thirty_days_before_date = date_format($thirty_days_before_date, "Y-m-d");

                            $customer_id = $_SESSION['login_user'];
                            $query = "SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id FROM Ticket_Details where customer_id=? AND journey_date>=? AND booking_status='CONFIRMED' ORDER BY  journey_date";
                            $stmt = mysqli_prepare($dbc, $query);
                            mysqli_stmt_bind_param($stmt, "ss", $customer_id, $todays_date);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_bind_result($stmt, $pnr, $date_of_reservation, $flight_no, $journey_date, $class, $booking_status, $no_of_passengers, $payment_id);
                            mysqli_stmt_store_result($stmt);
                            $upcoming_trips_count = 0;
                            $passengers_count = 0;
                            if (mysqli_stmt_num_rows($stmt) == 0) {
                                echo "
                                <div class=\"inner\">
                                    <h3>$passengers_count</h3>
                                    <p>Total Passengers Trips</p>
                                </div>
                                ";

                            } else {

                                while (mysqli_stmt_fetch($stmt)) {
                                    $passengers_count = $passengers_count + $no_of_passengers;
                                    $pnr;
                                    $upcoming_trips_count = $upcoming_trips_count + 1;
                                }
                                echo "
                                <div class=\"inner\">
                                    <h3>$passengers_count</h3>
                                    <p>Total Passengers</p>
                                </div>
                                ";
                            }

                            ?>

                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="view_booked_tickets.php" class="small-box-footer">Upcoming Trips<i
                                        class="fas fa-arrow-alt-circle-up"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <?php
                            $upcoming_trips_count = $upcoming_trips_count + 0;
                            if (mysqli_stmt_num_rows($stmt) == 0) {
                                echo "
                                <div class=\"inner\">
                                    <h3>$upcoming_trips_count</h3>
                                    <p>Upcoming Trips</p>
                                </div>
                                ";

                            } else {

                                while (mysqli_stmt_fetch($stmt)) {

                                    $pnr;
                                    $upcoming_trips_count = $upcoming_trips_count + 1;

                                }
                                echo "
                                <div class=\"inner\">
                                    <h3>$upcoming_trips_count</h3>
                                    <p>Upcoming Trips</p>
                                </div>
                                ";
                            }

                            ?>
                            <div class="icon">
                                <i class="fa fa-plane-departure"></i>
                            </div>
                            <a href="view_booked_tickets.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <?php
                            $query = "SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id FROM Ticket_Details where customer_id=? and journey_date<? and journey_date>=? ORDER BY  journey_date";
                            $stmt = mysqli_prepare($dbc, $query);
                            mysqli_stmt_bind_param($stmt, "sss", $customer_id, $todays_date, $thirty_days_before_date);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_bind_result($stmt, $pnr, $date_of_reservation, $flight_no, $journey_date, $class, $booking_status, $no_of_passengers, $payment_id);
                            mysqli_stmt_store_result($stmt);
                            $completed_trips_count = 0;
                            if (mysqli_stmt_num_rows($stmt) == 0) {
                                echo "
                            <div class=\"inner\">
                                    <h3>$completed_trips_count</h3>
                                    <p>Completed Trips</p>
                                </div>
                            ";

                            } else {

                                while (mysqli_stmt_fetch($stmt)) {

                                    $pnr;
                                    $completed_trips_count = $completed_trips_count + 1;

                                }
                                echo "
                            <div class=\"inner\">
                                    <h3>$completed_trips_count</h3>
                                    <p>Completed Trips</p>
                                </div>
                            ";

                            }
                            mysqli_stmt_close($stmt);

                            ?>


                            <div class="icon">
                                <i class="fa fa-plane-arrival"></i>
                            </div>
                            <a href="view_booked_tickets.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">

                            <div class="inner">
                                <?php
                                $total_tickets = $upcoming_trips_count + $completed_trips_count;
                                echo "<h3>$total_tickets</h3>";
                                ?>
                                <p>Total Booked Tickets</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-ticket-alt "></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                        </div>
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

