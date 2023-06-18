<?php

session_start();

if (!isset($_SESSION['login_user'])) {
    header('refresh:2;url=login_page.php');
}

?>

<?php include('AdminLTE/admin-header.php') ?>
    <div class="customer-dashboard">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" xmlns="http://www.w3.org/1999/html">
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
            <a href="customer_homepage.php" class="brand-link">
                <img src="images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text  ">GreenFly</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="AdminLTE/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> <?php $user = $_SESSION['login_user'];
                            echo $user;
                            ?></a>
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
                            <a href="book_tickets.php" class="nav-link active">
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
                            <h1 class="m-0 text-dark">Available Flights</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="customer_homepage.php">Customer</a></li>
                                <li class="breadcrumb-item active">Available Flights</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Particular Date Available all Flights</h3>
                                </div>


                                <div class="card-body">

                                    <form action="book_tickets2.php" method="post">
                                        <table id="example1" class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>Book</th>
                                                <th>Flight No</th>
                                                <th>Origin</th>
                                                <th>Destination</th>
                                                <th>Departure Date</th>
                                                <th>Departure Time</th>
                                                <th>Arrival Date</th>
                                                <th>Arrival Time</th>
                                                <th>Price[Bs/Ec]</th>
                                            </tr>
                                            </thead>

                                            <tbody>


                                            <?php
                                            if (isset($_POST['Search'])) {
                                                $data_missing = array();
                                                if (empty($_POST['origin'])) {
                                                    $data_missing[] = 'Origin';
                                                } else {
                                                    $origin = $_POST['origin'];
                                                }
                                                if (empty($_POST['destination'])) {
                                                    $data_missing[] = 'Destination';
                                                } else {
                                                    $destination = $_POST['destination'];
                                                }

                                                if (empty($_POST['dep_date'])) {
                                                    $data_missing[] = 'Departure Date';
                                                } else {
                                                    $dep_date = trim($_POST['dep_date']);
                                                }
                                                if (empty($_POST['no_of_pass'])) {
                                                    $data_missing[] = 'No. of Passengers';
                                                } else {
                                                    $no_of_pass = trim($_POST['no_of_pass']);
                                                }

                                                if (empty($_POST['class'])) {
                                                    $data_missing[] = 'Class';
                                                } else {
                                                    $class = trim($_POST['class']);
                                                }

                                                if (empty($data_missing)) {
                                                    $_SESSION['no_of_pass'] = $no_of_pass;
                                                    $_SESSION['class'] = $class;
                                                    $count = 1;
                                                    $_SESSION['count'] = $count;
                                                    $_SESSION['journey_date'] = $dep_date;
                                                    require_once('Database Connection file/mysqli_connect.php');
                                                    if ($class == "economy") {
                                                        $query = "SELECT flight_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,price_economy FROM Flight_Details where from_city=? and to_city=? and departure_date=? and seats_economy>=? ORDER BY  departure_time";
                                                        $stmt = mysqli_prepare($dbc, $query);
                                                        mysqli_stmt_bind_param($stmt, "sssi", $origin, $destination, $dep_date, $no_of_pass);
                                                        mysqli_stmt_execute($stmt);
                                                        mysqli_stmt_bind_result($stmt, $flight_no, $from_city, $to_city, $departure_date, $departure_time, $arrival_date, $arrival_time, $price_economy);
                                                        mysqli_stmt_store_result($stmt);
                                                        if (mysqli_stmt_num_rows($stmt) == 0) {
                                                            echo " <div class=\"alert alert-danger alert-dismissible fade show\">
                                                                    <strong>Upcoming Flight Schedules are not Available ..!</strong>Flight Schedules not Found, Please try again...!
                                                                    <button type=\"button\" class=\"close white-text\" data-dismiss=\"alert\">&times;</button>
                                                                </div>";
                                                        } else {

                                                            while (mysqli_stmt_fetch($stmt)) {

                                                                echo "<tr>
                                 
                                                
                                                                    <td>
                                                                        <div class=\"icheck-success d-inline\">
                                                                        <input required type=\"radio\" name=\"select_flight\" id=\"radioSuccess2\" value=\"" . $flight_no . "\">
                                                                        <label class=\" offset-4 \" for=\"radioSuccess2\">   
                                                                        </label>
                                                                        </div>  
                                                                    </td>                                                 
                                            
                                                                    <td>" . $flight_no . "</td>
                                                                    <td>" . $from_city . "</td>
                                                                    <td>" . $to_city . "</td>
                                                                    <td>" . $departure_date . "</td>
                                                                    <td>" . $departure_time . "</td>
                                                                    <td>" . $arrival_date . "</td>
                                                                    <td>" . $arrival_time . "</td>
                                                                    <td>[Ec]Rs." . $price_economy . "</td>
								 
        						                                </tr>";
                                                            }


                                                        }
                                                    } else if ($class = "business") {
                                                        $query = "SELECT flight_no,from_city,to_city,departure_date,departure_time,arrival_date,arrival_time,price_business FROM Flight_Details where from_city=? and to_city=? and departure_date=? and seats_business>=? ORDER BY  departure_time";
                                                        $stmt = mysqli_prepare($dbc, $query);
                                                        mysqli_stmt_bind_param($stmt, "sssi", $origin, $destination, $dep_date, $no_of_pass);
                                                        mysqli_stmt_execute($stmt);
                                                        mysqli_stmt_bind_result($stmt, $flight_no, $from_city, $to_city, $departure_date, $departure_time, $arrival_date, $arrival_time, $price_business);
                                                        mysqli_stmt_store_result($stmt);
                                                        if (mysqli_stmt_num_rows($stmt) == 0) {
                                                            echo " <div class=\"alert alert-danger alert-dismissible fade show\">
                                                                    <strong>Upcoming Flight Schedules are not Available ..!</strong>Flight Schedules not Found, Please try again...!
                                                                    <button type=\"button\" class=\"close white-text\" data-dismiss=\"alert\">&times;</button>
                                                                </div>";
                                                        } else {

                                                            while (mysqli_stmt_fetch($stmt)) {
                                                                echo "
                               
                                                         <tr>
                                                            <td> 
                                                                <div class=\"icheck-success d-inline\">
                                                                    <input required type=\"radio\" name=\"select_flight\" id=\"radioSuccess2\" value=\"" . $flight_no . "\">
                                                                    <label class=\"offset-4\" for=\"radioSuccess2\"> 
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>" . $flight_no . "</td>
                                                            <td>" . $from_city . "</td>
                                                            <td>" . $to_city . "</td>
                                                            <td>" . $departure_date . "</td>
                                                            <td>" . $departure_time . "</td>
                                                            <td>" . $arrival_date . "</td>
                                                            <td>" . $arrival_time . "</td>
                                                            <td>[Bc]Rs. " . $price_business . "</td>
								                        
								                        </tr>";

                                                            }


                                                        }
                                                    }
                                                    mysqli_stmt_close($stmt);
                                                    mysqli_close($dbc);
                                                    // else
                                                    // {
                                                    // 	echo "Submit Error";
                                                    // 	echo mysqli_error();
                                                    // }
                                                } else {
                                                    echo "The following data fields were empty! <br>";
                                                    foreach ($data_missing as $missing) {
                                                        echo $missing . "<br>";
                                                    }
                                                }
                                            } else {
                                                echo "Search request not received";
                                            }
                                            ?>
                                            </tbody>

                                        </table>

                                        <div class="form-group offset-md-4  offset-sm-2 col-sm-3 col-md-4">
                                            <div class="text-center">
                                                <button type="submit" value="Select Flight" name="Select"
                                                        class="btn btn-block bg-gradient-info btn-lg ">Book Flight
                                                </button>
                                            </div>
                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
<?php include('AdminLTE/admin-footer.php') ?>