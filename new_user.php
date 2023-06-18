<?php include('MaterialzeCSS/header-section.php') ?>

<div class="new-user-form-section">


    <div class="container">

        <div class="row">
            <form id="reg-form" action="new_user_form_handler.php" method="post">
                <?php


                if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
                    echo "
                    <div class='col s12 m12 center card-panel transparent'> 
                    <h5 class='red-text'><i class='material-icons red-text'>warning</i>Failed..! The User Account Already Exist, Please Try Again</h5>
                    </div>
                ";
                    header("refresh:4;url=login_page.php");
                } elseif (isset($_GET['msg']) && $_GET['msg'] == 'success') {
                    echo "
                    <div class='col s12 m12 center card-panel transparent'> 
                    <h5 class='green-text'> <i class='material-icons green-text'>check_circle</i>Success..! New User Account Has Been Added.</h5>
                    </div>
                ";
                    header("refresh:4;url=login_page.php");
                }

                ?>
                <div class="center col s12 m12">
                    <h5>REGISTER NEW USER ACCOUNT</h5>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person</i>
                    <input id="name" type="text" name="name" class="validate" required>
                    <label for="name">Enter Your Full Name</label>
                </div>

                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">phone</i>
                    <input id="number" type="number" min="111111111" max="999999999" name="phone_no" data-length="10"
                           class="validate" required>
                    <label for="number">Enter Your Phone No</label>
                </div>

                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">location_city</i>
                    <input id="address" type="text" name="address" class="validate" required>
                    <label for="address">Enter Your Address</label>
                </div>

                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">person_add</i>
                    <select name="gender" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>

                </div>

                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">attach_email</i>
                    <input id="email" type="email" name="email" class="validate" required>
                    <label for="email">Enter Your Email ID</label>
                </div>

                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="username" type="text" name="username" class="validate" required>
                    <label for="username">Enter Valid User-Name</label>
                </div>

                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">lock_open</i>
                    <input id="password" type="password" name="password" class="validate" required>
                    <label for="password">Enter Your Password</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">lock</i>
                    <input id="confirm_password" type="password" class="validate" required>
                    <label for="confirm_password">Confirm Your Password</label>
                </div>

                <div class=" col s12 m12 center">
                    <button data-target="modal1" href="#modal1"
                            class="modal-trigger waves-effect btn btn-large btn-register waves-effect waves-light validate"
                            type="submit"
                            name="Submit" value="Submit">Register
                        <i class="material-icons right">done</i>
                    </button>
                </div>

            </form>
        </div>

    </div>


</div>

<?php include('MaterialzeCSS/footer-section.php') ?>


