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
                        <h1 class="m-0 text-dark">Ticket Payment Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="customer_homepage.php">Customer</a></li>
                            <li class="breadcrumb-item active">Payment Details</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <?php

        echo "<div class='col-md-12 col-sm-12'>";
        if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
            echo "
<div class=\"alert alert-success alert-dismissible fade show\">
    <strong>Booking Successful..!  </strong>  Your payment of Rs. <b>";
            echo $_SESSION['final_grand_total_amount'];
            echo "</b> has been received.   Your PNR: <b>";
            echo $_SESSION['pnr'];
            echo " </b> tickets have been booked successfully
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    
</div>
";
        } else if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
            echo " <div class=\"alert alert-danger alert-dismissible fade show\">
    <strong>Booking Failed..!</strong> <br>
    Invalid Payment Details, please try again.<br>
    Your tickets status is pending. Make the Payment before journey date, and Enjoy.
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
</div>";
        }

        echo "</div>";
        ?>
        <!-- Main content -->
        <section class="content">

            <div class="container card">
                <div class="card-body" id="invoice">
                    <form action="payment_details_form_handler.php" method="post">
                        <?php
                        $flight_no = $_SESSION['flight_no'];
                        $journey_date = $_SESSION['journey_date'];
                        $no_of_pass = $_SESSION['no_of_pass'];
                        $total_no_of_meals = $_SESSION['total_no_of_meals'];
                        $payment_id = rand(100000000, 999999999);
                        $pnr = $_SESSION['pnr'];
                        $_SESSION['payment_id'] = $payment_id;
                        $payment_date = date('Y-m-d');
                        $_SESSION['payment_date'] = $payment_date;


                        require_once('Database Connection file/mysqli_connect.php');
                        if ($_SESSION['class'] == 'economy') {
                            $query = "SELECT price_economy FROM Flight_Details where flight_no=? and departure_date=?";
                            $stmt = mysqli_prepare($dbc, $query);
                            mysqli_stmt_bind_param($stmt, "ss", $flight_no, $journey_date);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_bind_result($stmt, $ticket_price);
                            mysqli_stmt_fetch($stmt);

                        } else if ($_SESSION['class'] == 'business') {
                            $query = "SELECT price_business FROM Flight_Details where flight_no=? and departure_date=?";
                            $stmt = mysqli_prepare($dbc, $query);
                            mysqli_stmt_bind_param($stmt, "ss", $flight_no, $journey_date);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_bind_result($stmt, $ticket_price);
                            mysqli_stmt_fetch($stmt);

                        }
                        mysqli_stmt_close($stmt);
                        mysqli_close($dbc);
                        $total_ticket_price = $no_of_pass * $ticket_price;
                        $total_meal_price = 1250 * $total_no_of_meals;
                        if ($_SESSION['insurance'] == 'yes') {
                            $total_insurance_fee = 1000 * $no_of_pass;
                        } else {
                            $total_insurance_fee = 0;
                        }
                        if ($_SESSION['priority_checkin'] == 'yes') {
                            $total_priority_checkin_fee = 500 * $no_of_pass;
                        } else {
                            $total_priority_checkin_fee = 0;
                        }
                        if ($_SESSION['lounge_access'] == 'yes') {
                            $total_lounge_access_fee = 750 * $no_of_pass;
                        } else {
                            $total_lounge_access_fee = 0;
                        }
                        $total_discount = 5;
                        $total_amount = $total_ticket_price + $total_meal_price + $total_insurance_fee + $total_priority_checkin_fee + $total_lounge_access_fee + $total_discount;
                        $grand_total_amount = $total_amount - ($total_amount * ($total_discount / 100));
                        $total_discount_amount = $total_amount - $grand_total_amount;
                        $final_grand_total_amount = $grand_total_amount;
                        $_SESSION['final_grand_total_amount'] = $final_grand_total_amount;

                        echo " 
                     
                    <!-- title row -->
                    <div class=\"row\">
                            <div class=\"col-12\">
                                <h3>
                                    <i class=\"fas fa-plane-departure \"></i> GreenFly Airlines
                                    <small class=\"float-right\">Date:  $payment_date </small>
                                </h3>
                            </div>
                            <!-- /.col -->
                    </div>
                    ";

                        echo "
                    <!-- info row -->
            <div class=\"row invoice-info\">        
                    <div class=\"col-sm-4 col-md-4 invoice-col\">
                        <div>
                            <strong>Journey Date: </strong>$journey_date<br> 
                            <strong>Flight No: </strong>$flight_no<br>
          
                        </div>
                    </div>
      
                    <div class=\" col-sm-4 col-md-4 invoice-col \">
                        <div>
                          <strong>No Of Passengers: </strong>$no_of_pass<br>
                          <strong>PNR: </strong>$pnr<br>   
                        </div>
                    </div>
      
                  <!-- /.col -->
                  <div class=\"col-sm-4 col-md-4 invoice-col\">
                   
                    <div>Your Payment/Transaction ID is: <strong>$payment_id</strong> <br>
                    (Please note it down for future reference)</div>
                  </div>
      
            </div>
                        <!-- /.row -->
                    
                    ";

                        echo "<div class=\"row\"> ";
                        echo "<div class=\"col-12 table-responsive\">";
                        echo "<br><table class=\"table table-striped\">";
                        echo "<thead>";
                        echo "<tr> 
                                            <th>No</th>
                                            <th>Description</th>
                                            <th>Total</th>";
                        echo "</tr>";
                        echo "</thead>";

                        echo "<tbody>";
                        echo "
                                    <tr>
                                            <td>1</td>
                                            <td>Base Fare, Fuel and Transaction Charges (Fees & Taxes included):</td>
                                            <td>Rs.$total_ticket_price</td>
                                                    
                                    </tr>
                                    ";
                        echo "
                                    <tr>
                                           <td>2</td>
                                           <td>Inflight Meal Combo Charges:</td>
                                           <td>Rs.$total_meal_price</td>
                                                    
                                    </tr>
                                    ";
                        echo "
                                    <tr>
                                          <td>3</td>
                                          <td>Priority Checkin Fees:</td>
                                          <td>Rs.$total_priority_checkin_fee</td>
                                                    
                                    </tr>
                                    ";

                        echo "
                                    <tr>
                                          <td>4</td>
                                          <td>Lounge Access Fees:</td>
                                          <td>Rs.$total_lounge_access_fee</td>
                                                    
                                    </tr>
                                    ";

                        echo "
                                    <tr>
                                           <td>5</td>
                                           <td>Insurance Fees:</td>
                                           <td>Rs.$total_insurance_fee</td>
                                                    
                                    </tr>
                                    ";


                        echo "</tbody>";
                        echo "</table>";
                        echo "</div>";
                        echo "</div>";

                        echo "
                        <div class=\"row\">
                                <div class=\"col-md-5 col-sm-12\">
                                    <div class=\"table-responsive\">
                                        <p class=\"lead col-sm-12 col-md-12\">Payment Summary:</p> 
                              ";

                        echo "<table class=\"table table-bordered\">";

                        echo "
                                        <tr>
                                              <th style=\"width:50%\"> Subtotal:</th>
                                              <td>Rs.$total_amount</td>
                                        </tr>
                                        <tr>
                                              <th>Discount($total_discount%):</th>
                                              <td>Rs. -$total_discount_amount</td>
                                        </tr>
                                        <tr>
                                              <th>Grand Total:</th>
                                              <th>Rs.$grand_total_amount</th>
                                        </tr>
                                        ";

                        echo " </table>";
                        echo " </div>";
                        echo " </div>";


                        ?>

                        <!-- accepted payments column -->
                        <div class="col-md-7 col-sm-12 no-print">

                            <p class="lead col-sm-12 col-md-12">Select Payment Method:</p>
                            <p>
                            <div class="icheck-success offset-md-2 offset-sm-0 col-md-3 col-sm-6 d-inline">
                                <input type="radio"
                                       name="payment_mode"
                                       value="Visa Card"
                                       id="radioSuccess1" required>
                                <label for="radioSuccess1">
                                    <img src="AdminLTE/dist/img/credit/visa.png" alt="Visa">
                                </label>
                            </div>
                            <div class="icheck-success col-md-3 col-sm-6 d-inline">
                                <input type="radio"
                                       name="payment_mode"
                                       value="Master Card"
                                       id="radioSuccess2" required>

                                <label for="radioSuccess2">
                                    <img src="AdminLTE/dist/img/credit/mastercard.png" alt="Mastercard">
                                </label>
                            </div>
                            <div class="icheck-success col-md-3 col-sm-6 d-inline">
                                <input type="radio"
                                       name="payment_mode"
                                       value="American Express"
                                       id="radioSuccess3" required>
                                <label for="radioSuccess3">
                                    <img src="AdminLTE/dist/img/credit/american-express.png" alt="American Express">

                                </label>
                            </div>
                            <div class="icheck-success col-md-3 col-sm-6 d-inline">
                                <input
                                        type="radio"
                                        value="Paypal"
                                        id="radioSuccess4"
                                        name="payment_mode"
                                        required>
                                <label for="radioSuccess4">
                                    <img src="AdminLTE/dist/img/credit/paypal2.png">
                                </label>
                            </div>
                            </p>

                            <p>
                            <div class="no-print col-sm-12 col-md-12">

                                <div class="offset-2 offset-md-4 col-md-4 col-sm-6">
                                    <button type="submit" value="Pay Now" name="Pay_Now" class="btn btn-success"><i
                                                class="far fa-credit-card"></i> Submit
                                        Payment
                                    </button>
                                </div>


                            </div>
                            </p>

                            <p>
                            <div class="no-print col-sm-12 col-md-12">
                                <div class="row ">
                                    <div class="col-5">
                                        <a href="#" class="btn btn-warning" onclick="window.print();"><i
                                                    class="fas fa-print"></i> Print
                                        </a>
                                    </div>
                                    <!--                                    <div class="col-7">-->
                                    <!--                                        <a href="" download  type="button" value="pdf" name="pdf" class="btn btn-primary float-right">-->
                                    <!--                                            <i class="fas fa-download"></i> Generate PDF-->
                                    <!--                                        </a>-->
                                    <!--                                    </div>-->

                                </div>
                            </div>
                            </p>


                        </div>
                        <!-- /.col -->


                    </form>

                </div>


                <!-- /.row -->
            </div>
            <div class="card-footer no-print">
                <h3 class="card-title"><b>Note:</b> To start journey visit the airport, 3 hours before the journey
                    starting
                    time. Bring the hard Copy of the ticket along with passport.</h3>
            </div>
            <!-- /.content-wrapper -->
            <!-- /.row -->
        </section>
    </div>
    <!-- /.invoice -->
</div>
<!-- /.content-wrapper -->

<!--
            •	Booking_Status
            •	Payment_ID -->

<!--Following data fields were empty!
    ...
    ADD VIEW FLIGHT DETAILS AND VIEW JETS/ASSETS DETAILS for ADMIN
    PREDEFINED LOCATION WHEN BOOKING TICKETS
-->


<?php include('AdminLTE/admin-footer.php') ?>
