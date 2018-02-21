		<!-- footer row -->
        <?php if(!isset($_SESSION['userId'])){ ?>
    <section class="row footer-row">
        <section class="row">
            <h6 class="center-align item-title">Hear From Us Regularly By Joining Our Mailing List</h6><br/>
            <section class="col m3 l3"></section>
            <section class="col m6 l6">
                <form method="post" class="col s12">
                    <section class="row">
                        <section class="input-field col s9 m9">
                            <input type="email" class="validate"  placeholder="Your Email Address" required>
                        </section>
                        <section class="input-field col s3 m3">
                            <button type="submit" class="btn1 custom-btn1">Join&nbspUs</button>
                        </section>
                    </section>
                </form>
            </section>
            <section class="col m3 l3"></section>
        </section><br/>

        <section class="row">
            <section class="col s12 m3 l3">
                <section class="footer-item">
                    <section class="footer-header">
                        <h6 class="footer-header-title">Students Hub</h6>
                    </section>

                    <section class="footer-list">
                            <address>
                              Model Town Link Road Lahore<br/>
                              60 Street. Accra Ghana 54770<br/>
                              info@studentshubafrica.com <br/>
                              <strong>Tel:</strong><a href="tel:+233 20 586 5858" class="hide-on-large-only"> +233 20 586 5858</a>
                              <a class="hide-on-med-and-down" style="color: #120909"> +233 20 586 5858</a>
                            </address>
                    </section>
                </section>

            </section>

            <section class="col s4 m3 l3">
                <section class="footer-item">
                    <section class="footer-header">
                        <h6 class="footer-header-title">Company</h6>
                    </section>

                    <section class="footer-list">
                        <li><a href="about">About Us</a></li>
                        <li><a href="contact">Contact Us</a></li>
                        <li><a href="">Policies</a></li>
                        <li><a href="">Privacy</a></li>
                    </section>
                </section>

            </section>

            <section class="col s4 m3 l3">
                <section class="footer-item">
                    <section class="footer-header">
                        <h6 class="footer-header-title">Info</h6>
                    </section>

                    <section class="footer-list">
                        <li><a href="faq">FAQ</a></li>
                        <li><a href="">Buying</a></li>
                        <li><a href="">Selling</a></li>
                        <li><a href="">Customer Service</a></li>
                    </section>
                </section>

            </section>

            <section class="col s4 m3 l3">
                <section class="footer-item">
                    <section class="footer-header">
                        <h6 class="footer-header-title">Follow Us</h6>
                    </section>

                    <section class="footer-list">
                        <li><a href="https://www.facebook.com/info.studenthub/"><i class="fa fa-facebook"></i> Facebook</a></li>
                        <li><a href="https://twitter.com/studenthub_%20"><i class="fa fa-twitter"></i>  Twitter</a></li>
                        <li><a href="https://www.instagram.com/studenthub_/"><i class="fa fa-instagram"></i>  Instagram</a></li>
                        <li><a href="#!"><i class="fa fa-linkedin"></i>  LinkedIn</a></li>
                    </section>
                </section>

            </section>
        </section>
        <hr>

        <p class="center-align footer-cr">Students Hub &copy; <?php echo date('Y'); ?>. All Rights Reserved.</p>

    </section>
    <?php } ?>

		<!--Import js libraries -->
        <script type="text/javascript" src="./assets/js/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="./assets/js/modernizr.js"></script>
        <script type="text/javascript" src="./assets/js/materialize.min.js"></script>
        <script type="text/javascript" src="./assets/js/chart.min.js"></script>
        <script type="text/javascript" src="./assets/js/init.js"></script>
        <script type="text/javascript" src="./assets/js/controller.js"></script>
        <script type="text/javascript" src="./assets/js/imagecontroller.js"></script>
      </body>
</html>
