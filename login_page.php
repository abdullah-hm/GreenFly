<?php

session_start();


?>

<?php include('MaterialzeCSS/header-section.php') ?>

    <div class="login-form-section ">
        <div class="container">

            <div class="row">
                <div class="col s12 l6 offset-l3">

                    <div class="card-panel z-depth-5">

                        <h4 class="center"> Login Form</h4>
                        <div class="row">
                            <form class="col s12 m12" method="post" action="login_handler.php">
                                <div class="row">
                                    <div class="input-field col s12 m12">
                                        <i class="material-icons  small prefix">account_circle</i>
                                        <input name="username" id="icon_prefix" type="text"  class="validate" required>
                                        <label for="icon_prefix">Email</label>
                                    </div>

                                    <div class="input-field col s12 m12">
                                        <i class="material-icons  small prefix">lock</i>
                                        <input name="password" id="icon_password" class="validate" type="password" required>
                                        <label for="icon_password">Password</label>
                                    </div>
                                    <div class="container">
                                        <div class="row ">
                                            <div class="center col s6 l6">
                                                <label>
                                                    <input required name="user_type" type="radio"
                                                           value="Customer"/>
                                                    <span>Customer</span>
                                                </label>
                                            </div>
                                            <div class=" center  col s6 l6">
                                                <label>
                                                    <input required  name="user_type" type="radio"
                                                           value="Administrator"/>
                                                    <span>Administrator</span>
                                                </label>
                                            </div>

                                        </div>

                                    </div>


                                    <?php
                                    if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {

                                        echo "<div class='center'>";
                                        echo "<strong class='rounded white red-text transparent'> Invalid Username/Password </strong>";
                                        echo " </div>";
                                    }
                                    ?>


                                </div>

                                <div class="center login-button">
                                    <button class="btn waves-effect waves-light  " type="submit" name="Login"
                                            value="Login">
                                        <i class="material-icons left">login</i>Login
                                    </button>
                                </div>
                            </form>
                        </div><!--row-->

                        <div class="center new-user-button">
                            <a href="new_user.php" class="btn waves-effect waves-light" type="submit" name="action">
                                <i class="material-icons left">person_add</i>Create New User Account
                            </a>
                        </div>
                    </div><!--card-->

                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!-- container -->


<?php include('MaterialzeCSS/footer-section.php') ?>