<?php
	session_start();

if (!isset($_SESSION['login_user'])) {
    header( "refresh:2;url=admin_homepage.php" );
}

?>


		<h3>Oops! You need to login with a Customer Account to Book Tickets</h3>
