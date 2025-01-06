<footer class="footer-area">
    <div class="container">
        <div class="row justify-content-between">
            <!-- First Section: General Information -->
            <div class="col-sm-6 col-md-4 col-xl-3">
                <div class="single-footer-widget footer_1">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('user_side/img/logo.png') }}" alt="Logo" class="img-fluid">
                    </a>
                    <p>
                        We are here to help you achieve your educational goals. Explore our premium courses and start your journey towards success.
                    </p>
                    <p>
                        "Learning is the beginning, and creativity is the end."
                    </p>
                </div>
            </div>

            <!-- Second Section: Newsletter and Social Links -->
            <div class="col-sm-6 col-md-4 col-xl-4">
                <div class="single-footer-widget footer_2">
                    <h4>My Account</h4>
                    <p>
                        Follow me on Linkedin and Github
                    </p>
                    <div class="social_icon mt-4">
                        <a href="https://www.linkedin.com/in/ahmad-al-shammas" target="_blank" class="mr-3">
                            <i class="ti-linkedin"></i>
                        </a>
                        <a href="https://github.com/ahmad-alshammas" target="_blank">
                            <i class="ti-github"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Third Section: Contact Information -->
            <div class="col-xl-3 col-sm-6 col-md-4">
                <div class="single-footer-widget footer_2">
                    <h4>Contact Us</h4>
                    <div class="contact_info">
                        <p>
                            <span>Address:</span>
                            Jordan, Zarqa
                        </p>
                        <p>
                            <span>Phone:</span>
                            <a href="tel:+962788076258">+962 788076258</a>
                        </p>
                        <p>
                            <span>Email:</span>
                            <a href="mailto:ahmad.a.alshammas@gmail.com">ahmad.a.alshammas@gmail.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright_part_text text-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="footer-text m-0">
                                &copy; {{ date('Y') }} All rights reserved | Designed by 
                               <span style="color: #3085d6">Ahmad Al-Shammas</span> 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>