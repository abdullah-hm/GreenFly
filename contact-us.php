<?php

session_start();

?>

<?php include('MaterialzeCSS/header-section.php') ?>



<!-- Section: Contact -->
<section id="contact" class="section section-contact scrollspy">
    <div class="container">
        <div class="row">
            <div class="col s12 m6">
                <div class=" card-panel teal white-text center">
                    <i class="material-icons medium">email</i>
                    <h4>Contact Us</h4>
                </div>
                <div class=white-text center">

                    <div id="test1" class="teal col s12 m12">

                        <p>

                            <iframe class="map-responsive"
                                    src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street%2C%20Dublin%2C%20Ireland+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=18&amp;iwloc=B&amp;output=embed">
                                <a href="http://www.gps.ie/">Google Maps GPS</a>
                            </iframe>

                            <br/>
                        </p>

                    </div>

                </div>
            </div>
            <div class="col s12 m6">
                <form method="post">
                    <div class="card-panel grey lighten-3">
                        <h5>Please fill out this form</h5>
                        <div class="input-field">
                            <input type="text" placeholder="Name" id="name">
                            <label for="name">Name</label>
                        </div>
                        <div class="input-field">
                            <input type="email" placeholder="Email" id="email">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field">
                            <input type="text" placeholder="Phone" id="phone">
                            <label for="phone">Phone</label>
                        </div>
                        <div class="input-field">
                            <textarea class="materialize-textarea" placeholder="Enter Message" id="message"></textarea>
                            <label for="message">Message</label>
                        </div>
                        <div class="center">
                            <input type="submit" value="Submit" class="btn ">
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php include('MaterialzeCSS/footer-section.php') ?>

