<?php

session_start();

if (!isset($_SESSION['login_user'])) {
    header('refresh:2;url=login_page.php');
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
    <aside class="main-sidebar  elevation-4">
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
                    <img src="AdminLTE/dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= $_SESSION['login_user'] ?></a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="customer_homepage.php" class="nav-link ">

                            <i class=" nav-icon fas fa-tachometer-alt"></i>

                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="view_all_flight.php" class="nav-link active">
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
                <div class="row ">
                    <div class="col-12 ">

                        <div class="card">
                            <div class="card-header ">
                                <h3>List of All Available Flights
                                    <a href="#" class="no-print btn btn-warning float-right"
                                       onclick="window.print();"><i
                                                class="fas fa-print"></i> Print
                                    </a>
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table  table-bordered table-hover">
                                    <form action="book_tickets3.php" method="post">
                                        <thead>
                                        <tr>
                                            <th>Aircraft ID</th>
                                            <th>Flight No</th>
                                            <th>Origin</th>
                                            <th>Destination</th>
                                            <th>Departure Date</th>
                                            <th>Departure Time</th>
                                            <th>Arrival Date</th>
                                            <th>Arrival Time</th>
                                            <th>Economy Class</th>
                                            <th>Business Class</th>
                                        </tr>
                                        </thead>

                                        <tbody>


                                        <?php

                                        require_once('Database Connection file/mysqli_connect.php');
                                        $sql = "SELECT * FROM Flight_Details ORDER BY  departure_date";
                                        $stmt = mysqli_prepare($dbc, $sql);
                                        mysqli_stmt_store_result($stmt);

                                        if ($stmt = mysqli_query($dbc, $sql)) {
                                            if (mysqli_num_rows($stmt) > 0) {
                                                while ($row = mysqli_fetch_array($stmt)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['jet_id'] . "</td>";
                                                    echo "<td>" . $row['flight_no'] . "</td>";
                                                    echo "<td>" . $row['from_city'] . "</td>";
                                                    echo "<td>" . $row['to_city'] . "</td>";
                                                    echo "<td>" . $row['departure_date'] . "</td>";
                                                    echo "<td>" . $row['departure_time'] . "</td>";
                                                    echo "<td>" . $row['arrival_date'] . "</td>";
                                                    echo "<td>" . $row['arrival_time'] . "</td>";
                                                    echo "<td>Rs." . $row['price_economy'] . "/=</td>";
                                                    echo "<td>Rs." . $row['price_business'] . "/=</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "
                                                   <div class=\"col-md-12 col-sm-12\">
                                                        <div class=\" no-print alert alert-warning alert-dismissible fade show\">
                                                            <strong>Not Found..!</strong> No flight schedule has been updated in the System.
                                                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
                                                        </div>
                                                    </div>
                                            ";
                                            }
                                        }

                                        mysqli_close($dbc);

                                        ?>

                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <th>Aircraft ID</th>
                                            <th>Flight No</th>
                                            <th>Origin</th>
                                            <th>Destination</th>
                                            <th>Departure Date</th>
                                            <th>Departure Time</th>
                                            <th>Arrival Date</th>
                                            <th>Arrival Time</th>
                                            <th>Economy Class</th>
                                            <th>Business Class</th>
                                        </tr>
                                        </tfoot>


                                    </form>
                                </table>
                            </div>
                        </div>

                    </div><!-- /.col -->
                </div><!-- /.col -->
            </div><!-- /.col -->

    </div><!-- /.container-fluid -->

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include('AdminLTE/admin-footer.php') ?>


