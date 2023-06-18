
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>GreenFly - Airlines</title>


    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="MaterialzeCSS/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="MaterialzeCSS/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="MaterialzeCSS/css/homepage.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>

<body>

<section class="navigation-section">

    <nav class="navigation-body" role="navigation">
        <div class="nav-wrapper  container  ">
            <a id="logo-container" href="index.php" class="brand-logo"> <img src="images/logo.png"> <span class="teal-text">GreenFly</span> </a>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php"> <i class="material-icons">home</i>Home</a></li>
                <li>
                    <?php

                    if (isset($_SESSION['login_user']) && $_SESSION['user_type'] == 'Customer') {
                        echo "<a href=\"customer_homepage.php\"><i class=\"material-icons\">dashboard</i>Customer Dashboard</a>";
                    } else if (isset($_SESSION['login_user']) && $_SESSION['user_type'] == 'Administrator') {
                        echo "<a href=\"admin_homepage.php\"><i class=\"material-icons\">dashboard</i>Admin Dashboard</a>";
                    } else {
                        echo "<a href=\"login_page.php\"><i class=\"material-icons\">bookmark_border</i>Book Ticket</a>";
                    }
                    ?>

                </li>
                <li><a href="gallery.php"><i class="material-icons">airplanemode_active</i>Gallery</a></li>
                <li><a href="contact-us.php"><i class="material-icons">contacts</i>Contact Us</a></li>
                <li>
                    <?php

                    if (isset($_SESSION['login_user']) && $_SESSION['user_type'] == 'Customer') {
                        echo "<a href=\"customer_homepage.php\"><i class=\"material-icons\">person_outline</i>View Activity</a>";
                    } else if (isset($_SESSION['login_user']) && $_SESSION['user_type'] == 'Administrator') {
                        echo "<a href=\"admin_homepage.php\"><i class=\"material-icons\">person</i>View Activity</a>";
                    } else {
                        echo "<a href=\"login_page.php\"><i class=\"material-icons\">flight_takeoff</i>Login</a>";
                    }
                    ?>
                </li>

            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="index.php"> <i class="material-icons">home</i>Home</a></li>
                <li>
                    <?php
                    if (isset($_SESSION['login_user']) && $_SESSION['user_type'] == 'Customer') {
                        echo "<a href=\"customer_homepage.php\"><i class=\"material-icons\">dashboard</i>Customer Dashboard</a>";
                    } else if (isset($_SESSION['login_user']) && $_SESSION['user_type'] == 'Administrator') {
                        echo "<a href=\"admin_homepage.php\"><i class=\"material-icons\">dashboard</i>Admin Dashboard</a>";
                    } else {
                        echo "<a href=\"login_page.php\"><i class=\"material-icons\">bookmark_border</i>Book Ticket</a>";
                    }
                    ?>
                </li>
                <li><a href="gallery.php"><i class="material-icons">airplanemode_active</i>Gallery</a></li>
                <li><a href="contact-us.php"><i class="material-icons">contacts</i>Contact Us</a></li>
                <li>
                    <?php

                    if (isset($_SESSION['login_user']) && $_SESSION['user_type'] == 'Customer') {
                        echo "<a href=\"customer_homepage.php\"><i class=\"material-icons\">person_outline</i>View Activity</a>";
                    } else if (isset($_SESSION['login_user']) && $_SESSION['user_type'] == 'Administrator') {
                        echo "<a href=\"admin_homepage.php\"><i class=\"material-icons\">person</i>View Activity</a>";
                    } else {
                        echo "<a href=\"login_page.php\"><i class=\"material-icons\">flight_takeoff</i> Login</a>";
                    }
                    ?>
                </li>

            </ul>

        </div>
    </nav>

</section>
