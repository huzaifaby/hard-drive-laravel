</div>
<!-- main layout end  -->


<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted mt-5">
    <!-- Section: Social media -->
    <div class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="{{ $settings[0]->facebook}}" class="me-4 text-reset">
                <i class="bx bxl-facebook"></i>
            </a>
            <a href="{{ $settings[0]->twitter}}" class="me-4 text-reset">
                <i class="bx bxl-twitter"></i>
            </a>

            <a href="{{ $settings[0]->instagram}}" class="me-4 text-reset">
                <i class="bx bxl-instagram"></i>
            </a>
            <a href="{{ $settings[0]->linkedin}}" class="text-reset">
                <i class="bx bxl-linkedin"></i>
            </a>
        </div>
        <!-- Right -->
    </div>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <div>
        <div class="container text-start text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <img src="{{ asset('image/logo/'.$settings[0]->logo) }}" class="img-fluid" loading="lazy"
                            width="150" alt="">
                    </h6>
                    <p>
                        {{ $settings[0]->footer_description}}
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Products
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Angular</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">React</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Vue</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Laravel</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Pricing</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Settings</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Orders</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Help</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="bx bx-home me-3"></i> {{ $settings[0]->Address}}</p>
                    <p>
                        <i class="bx bx-envelope me-3"></i>
                        {{ $settings[0]->email}}
                    </p>
                    <p><i class="bx bx-phone me-3"></i> {{ $settings[0]->phone_no_1}}</p>
                    <p><i class="bx bx-printer me-3"></i> {{ $settings[0]->phone_no_2}}</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </div>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        COPYRIGHT ?? <?php echo date("Y"); ?>. All Rights Reserved By
        <a class="text-reset fw-bold" href="#">harddisk.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->


<!-- script js links  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- custom js  -->
<script src="/frontend_assets/js/slider.js"></script>
<script src="/frontend_assets/js/script.js"></script>

<!-- <script src="../frontend_assets/js/toast.js"></script> -->




<!-- MDB -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>

</body>

</html>