<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sistem Informasi & Monitoring Beasiswa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= base_url() ?>assets_style/assets_depan/img/favicon.ico" rel="icon">
    <link rel="shortcut icon" href="<?= base_url('assets_style/image/logo/logo-ipdn.png') ?>" />
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url() ?>assets_style/assets_depan/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets_style/assets_depan/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets_style/assets_depan/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url() ?>assets_style/assets_depan/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url() ?>assets_style/assets_depan/css/style.css" rel="stylesheet">

    <style>
        @media screen and (min-width: 450px) {
            #pagination {
                display: block;
                margin-left: 100%;
            }
        }

        /*untuk layar device berukuran sedang*/
        @media screen and (min-width: 550px) {
            #pagination {
                display: block;
                margin-left: 100%;
            }
        }

        /*untuk layar device berukuran besar*/
        @media screen and (min-width: 800px) {
            #pagination {
                display: block;
                margin-left: 35%;
            }
        }
    </style>

</head>


<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <img style="margin-right: 20px;" src="<?= base_url() ?>assets_style/assets_depan/img/logokemen.png" alt="Logo">
                    <img src="<?= base_url() ?>assets_style/assets_depan/img/logo.png" alt="Logo">
                </a>
                <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="<?= base_url() ?>" class="nav-item nav-link active">Beranda</a>
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Informasi Beasiswa</a>
                            <div class="dropdown-menu m-0">
                                <a href="team.html" class="dropdown-item">Dalam Negeri</a>
                                <a href="testimonial.html" class="dropdown-item">Luar Negeri</a>
                            </div>
                        </div> -->
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Perispan Beasiswa</a>
                            <div class="dropdown-menu m-0">
                                <a href="team.html" class="dropdown-item">Data Pendaftar</a>
                                <a href="testimonial.html" class="dropdown-item">Progres IELTS/TOEFL</a>
                                <a href="404.html" class="dropdown-item">Bakat Skolastik</a>
                                <a href="404.html" class="dropdown-item">Substansi</a>
                            </div>
                        </div> -->
                        <!-- <a href="about.html" class="nav-item nav-link">Template</a>
                        <a href="about.html" class="nav-item nav-link">Alumni Penerima Beasiswa</a>
                        <a href="about.html" class="nav-item nav-link">Tentang</a>
                        <a href="contact.html" class="nav-item nav-link">Hubungi Kami</a> -->
                        <a href="<?= base_url() ?>login" class="nav-item nav-link">Login</a>
                    </div>
                    <!-- <butaton type="button" class="btn text-secondary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton> -->
                </div>
            </nav>

            <div class="container-xxl py-5 bg-primary hero-header mb-1">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-lg-12 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated zoomIn">Sistem Informasi & Monitoring Beasiswa (SIMOSA)</h1>
                            <p class="text-white pb-3 animated zoomIn">Selamat datang di aplikasi Sistem Informasi & Monitoring Beasiswa (SIMOSA)</p>

                        </div>
                        <div class="col-lg-6 text-center text-lg-start">
                            <!-- <img style="height: auto; width:70%;" class="img-fluid" src="img/logo.png" alt=""> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Full Screen Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content" style="background: rgba(29, 29, 39, 0.7);">
                    <div class="modal-header border-0">
                        <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center">
                        <div class="input-group" style="max-width: 600px;">
                            <input type="text" class="form-control bg-transparent border-light p-3" placeholder="Type search keyword">
                            <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Screen Search End -->

        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="section-title position-relative mb-1 pb-2">
                            <!--<h6 class="position-relative text-primary ps-4">Tentang Kami</h6>-->
                            <h2 class="mt-2">Sistem Informasi & Monitoring Beasiswa (SIMOSA)</h2>
                        </div>
                        <p class="mb-1"><?= $tentang_kami->keterangan; ?></p>
                        <!-- <div class="row g-3">
                            <div class="col-sm-6">
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Award Winning</h6>
                                <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Professional Staff</h6>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>24/7 Support</h6>
                                <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Fair Prices</h6>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="<?= base_url() ?>assets_style/assets_depan/img/about.jpg">
                    </div>
                </div>
            </div>
        </div>


        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer mt-1 pt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Informasi</h5>
                        <p><i class="fa fa-map-marker-alt me-3"></i>Jl. Raya Bandung - Sumedang No.Km.20, Cibeusi, Kec. Jatinangor, Kabupaten Sumedang, Jawa Barat 45363</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p><i class="fa fa-envelope me-3"></i>labsakom@ipdn.ac.id</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>


                </div>
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-1 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Sistem Informasi & Monitoring Beasiswa</a>, All Right Reserved.

                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a class="border-bottom" href="https://htmlcodex.com">Labsakom IPDN</a>

                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets_style/assets_depan/lib/wow/wow.min.js"></script>
    <script src="<?= base_url() ?>assets_style/assets_depan/lib/easing/easing.min.js"></script>
    <script src="<?= base_url() ?>assets_style/assets_depan/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url() ?>assets_style/assets_depan/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>assets_style/assets_depan/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>assets_style/assets_depan/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url() ?>assets_style/assets_depan/js/main.js"></script>
</body>

</html>