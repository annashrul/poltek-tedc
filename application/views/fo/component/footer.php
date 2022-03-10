    <!--footer section start-->
    <footer class="footer-1 ptb-60 gradient-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-3 mb-4 mb-md-4 mb-sm-4 mb-lg-0">
                    <a href="#" class="navbar-brand mb-2">
                        <img src="<?= base_url() . 'assets/fo' ?>/images/Logo Poltek.png" alt="logo" class="img-fluid" width="80">
                    </a>
                    <br>
                    <p><b><?=$f1['title']?></b></p>
                    <?=$f1['desc']?>
                    <ul class="list-inline social-list-default background-color social-hover-2 mt-2">
                        <li class="list-inline-item"><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a class="youtube" href="#"><i class="fab fa-youtube"></i></a></li>
                        <li class="list-inline-item"><a class="linkedin" href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li class="list-inline-item"><a class="dribbble" href="#"><i class="fab fa-dribbble"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-12 col-lg-3 mb-4 mb-md-4 mb-sm-4 mb-lg-0">
                    <h5 class="text-white"><?=$f2['title']?></h5>
                    <?=$f2['desc']?>
                </div>
                <div class="col-md-12 col-lg-3 mb-4 mb-md-4 mb-sm-4 mb-lg-0">
                    <h5 class="text-white"><?=$f3['title']?></h5>
                    <?=$f3['desc']?>
                </div>
                <div class="col-md-12 col-lg-3 mb-4 mb-md-4 mb-sm-4 mb-lg-0">
                    <h5 class="text-white">Sistem Kami</h5>
                        <ul>
                            <li>
                                <a href="#">PMB Online</a>
                            </li>
                            <li>
                                <a href="#">Beasiswa</a>
                            </li>
                            <li>
                                <a href="#">Sistem Informasi Akademik</a>
                            </li>
                            <li>
                                <a href="#">Sister Dikti</a>
                            </li>
                            <li>
                                <a href="#">Pusat Karir</a>
                            </li>
                            <li>
                                <a href="#">Perpustakaan</a>
                            </li>
                            <li>
                                <a href="#">Tracer Study</a>
                            </li>
                    </ul>
                </div>
                
            </div>
        </div>
        <!--end of container-->
    </footer>

    <!--footer bottom copyright start-->
    <div class="footer-bottom py-3 gray-light-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7">
                    <div class="copyright-wrap small-text">
                        <p class="mb-0">&copy; <?=$site['name']?></p>
                    </div>
                </div>
                <!-- <div class="col-md-6 col-lg-5">
                    <div class="terms-policy-wrap text-lg-right text-md-right text-left">
                        <ul class="list-inline">
                            <li class="list-inline-item"><a class="small-text" href="terms-condition.html">Terms & Condition</a></li>
                            <li class="list-inline-item"><a class="small-text" href="privacy-policy.html">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!--footer bottom copyright end-->
    <!--footer section end-->
    <!--scroll bottom to top button start-->
    <div class="scroll-top scroll-to-target primary-bg text-white" data-target="html">
        <span class="fas fa-hand-point-up"></span>
    </div>
    <!--scroll bottom to top button end-->
    <!--build:js-->
    <script src="<?= base_url() . 'assets/fo' ?>/js/vendors/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() . 'assets/fo' ?>/js/vendors/popper.min.js"></script>
    <script src="<?= base_url() . 'assets/fo' ?>/js/vendors/bootstrap.min.js"></script>
    <script src="<?= base_url() . 'assets/fo' ?>/js/vendors/bootstrap-slider.min.js"></script>
    <script src="<?= base_url() . 'assets/fo' ?>/js/vendors/jquery.easing.min.js"></script>
    <script src="<?= base_url() . 'assets/fo' ?>/js/vendors/owl.carousel.min.js"></script>
    <script src="<?= base_url() . 'assets/fo' ?>/js/vendors/countdown.min.js"></script>
    <script src="<?= base_url() . 'assets/fo' ?>/js/vendors/jquery.waypoints.min.js"></script>
    <script src="<?= base_url() . 'assets/fo' ?>/js/vendors/jquery.rcounterup.js"></script>
    <script src="<?= base_url() . 'assets/fo' ?>/js/vendors/magnific-popup.min.js"></script>
    <script src="<?= base_url() . 'assets/fo' ?>/js/vendors/validator.min.js"></script>
    <script src="<?= base_url() . 'assets/fo' ?>/js/vendors/hs.megamenu.js"></script>
    <script src="<?= base_url() . 'assets/fo' ?>/js/app.js"></script>
    <!--endbuild-->
</body>

</html>