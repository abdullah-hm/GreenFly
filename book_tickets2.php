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
                            <h1 class="m-0 text-dark">Add Passengers Details</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="customer_homepage.php">Customer</a></li>
                                <li class="breadcrumb-item active">Add Passenger info</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">


                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">

                        <!-- /.card-header -->
                        <?php
                        $no_of_pass = $_SESSION['no_of_pass'];
                        $class = $_SESSION['class'];
                        $count = $_SESSION['count'];
                        $flight_no = $_POST['select_flight'];
                        $_SESSION['flight_no'] = $flight_no;
                        //$pass_name=array();

                        echo "<form action=\"add_ticket_details_form_handler.php\" method=\"post\">";
                        while ($count <= $no_of_pass) {
                            echo "
                        <div class=\"card-header\">
                            <div class=\"row\">
                            
                                <h4 class=\"m-0 text-dark\">Passenger $count</h4>
                            </div><!-- /.col -->
                        </div>
                         
                        <div class=\"card-body\">
                            <div class=\"row\">

                                <div class=\"form-group col-sm-3 col-md-3\">
                                    <label>Name:</label>
                                    <div class=\"input-group\">
                                        <div class=\"input-group-prepend\">
                                            <div class=\"input-group-text\"><i class=\"fa fa-user\"></i></div>
                                        </div>
                                        <input type=\"text\" name=\"pass_name[]\" class=\"form-control\" required>
                                    </div>
                                </div>

                                <div class=\"form-group col-sm-2 col-md-2\">
                                    <label>Age:</label>
                                    <div class=\"input-group\">
                                        <div class=\"input-group-prepend\">
                                            <div class=\"input-group-text\"><i class=\"fa fa-user\"></i></div>
                                        </div>
                                        <input type=\"number\" min='1' max='100' name=\"pass_age[]\" class=\"form-control\" required>
                                    </div>
                                </div>

                                <div class=\"form-group col-sm-2 col-md-2\">
                                    <label>Gender</label>
                                    <select class=\"select2bs4\" type=\"text\" name=\"pass_gender[]\"
                                            data-placeholder=\"Select Gender\" style=\"width: 100%\" required>
                                            <option></option>
                                            <option value=\"male\">Male</option>
                                            <option value=\"female\">Female</option>
                                            <option value=\"other\">Other</option>
                                            
                       

                                    </select>
                                </div>

                                <div class=\"form-group col-sm-2 col-md-2\">
                                    <label>Inflight Meal?</label>
                                    <select class=\"select2\" type=\"text\" name=\"pass_meal[]\"
                                            data-placeholder=\"Meal Want?\" style=\"width: 100%\" required>
                                               
                                            <option></option>
                                            <option value=\"yes\">Yes</option>
                                            <option value=\"no\">No</option>

                                    </select>
                                </div>

                                <div class=\"form-group col-sm-3 col-md-3\">
                                    <label>Frequent Flier ID(if applicable)</label>
                                    <div class=\"input-group\">
                                    
                                        <input type=\"text\" name=\"pass_ff_id[]\" class=\"form-control\">
                                    </div>
                                    
                                ";


                            echo "
                                        
                                    
                                </div>

                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                               
";

                            $count = $count + 1;

                        }
                        echo "</div>";


                        echo "
                            <div class=\"container-fluid\">
                        <div class=\"row mb-2\">
                            <div class=\"col-sm-12 col-md-12\">
                                <h3 class=\"m-0 text-dark\">Add Travel Details</h3>
                            </div><!-- /.col -->

                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                    
                            <div class=\"card card-default\">

                        <div class=\"card-body\">
                            <div class=\"row\">


                                 <div class=\" form-group col-sm-4 col-md-4 \">
                                    <label>Do you want access to our Premium Lounge?</label>
                                    <div class=\"offset-md-3 offset-sm-3\">
                                        <div class=\"icheck-success d-inline\">
                                            <input type=\"radio\" value=\"yes\" name=\"lounge_access\" required id=\"radioSuccess1\">
                                            <label for=\"radioSuccess1\">
                                                Yes
                                            </label>
                                        </div>
                                        <div class=\"icheck-danger d-inline \">
                                            <input type=\"radio\" value=\"no\" required name=\"lounge_access\" id=\"radioDanger2\">
                                            <label for=\"radioDanger2\">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class=\" form-group col-sm-4 col-md-4 \">
                                    <label>Do you want to Option for Priority Checkin?</label>
                                    <div class=\"offset-md-3 offset-sm-3\">
                                        <div class=\"icheck-success d-inline\">
                                            <input type=\"radio\" required value=\"yes\" name=\"priority_checkin\" id=\"radioSuccess3\">
                                            <label for=\"radioSuccess3\">
                                                Yes
                                            </label>
                                        </div>
                                        <div class=\"icheck-danger d-inline \">
                                            <input type=\"radio\" required value=\"no\" name=\"priority_checkin\" id=\"radioDanger4\">
                                            <label for=\"radioDanger4\">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class=\" form-group col-sm-4 col-md-4 \">
                                    <label>Do you want to purchase Travel Insurance?</label>
                                    <div class=\"offset-md-3 offset-sm-3\">
                                        <div class=\"icheck-success d-inline\">
                                            <input type=\"radio\" value=\"yes\" name=\"insurance\" required id=\"radioSuccess5\">
                                            <label for=\"radioSuccess5\">
                                                Yes
                                            </label>
                                        </div>
                                        <div class=\"icheck-danger d-inline \">
                                            <input type=\"radio\" required value=\"no\" name=\"insurance\" id=\"radioDanger6\">
                                            <label for=\"radioDanger6\">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class=\"form-group offset-md-3  offset-sm-2 col-sm-6 col-md-6\">
                                    <div class=\"text-center\">
                                        <button type=\"submit\" value=\"Submit Travel/Ticket Details\" name=\"Submit\"
                                                class=\"btn btn-block bg-gradient-info btn-lg \">
                                            Submit Travel/Ticket Details
                                        </button>
                                    </div>
                                </div>
                                
                                ";
                        echo "</form>";
                        ?>


                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
<?php include('AdminLTE/admin-footer.php') ?>