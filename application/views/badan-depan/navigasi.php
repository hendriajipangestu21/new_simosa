 <!-- Navbar & Hero Start -->
 <div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0 navigasi">
        <a href="" class="navbar-brand p-0">
            <img src="<?= base_url() ?>assets_style/assets_depan/img/logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.html" class="nav-item nav-link active">Beranda</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Informasi Beasiswa</a>
                    <div class="dropdown-menu m-0">
                        <a href="team.html" class="dropdown-item">Dalam Negeri</a>
                        <a href="testimonial.html" class="dropdown-item">Luar Negeri</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Persiapan Beasiswa</a>
                    <div class="dropdown-menu m-0">
                        <a href="team.html" class="dropdown-item">Data Pendaftar</a>
                        <a href="testimonial.html" class="dropdown-item">Progres IELTS/TOEFL</a>
                        <a href="404.html" class="dropdown-item">Bakat Skolastik</a>
                        <a href="404.html" class="dropdown-item">Substansi</a>
                    </div>
                </div>
                <a href="#alumni" class="nav-item nav-link">Alumni Penerima Beasiswa</a>
                <a href="#tentang" class="nav-item nav-link">Tentang</a>
                <a href="#artikel" class="nav-item nav-link">Artikel</a>
                <a href="contact.html" class="nav-item nav-link">Hubungi Kami</a>
                <a href="<?= base_url() ?>login" class="nav-item nav-link">Login</a>
            </div>
            <butaton type="button" class="btn text-secondary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
        </div>
    </nav>

    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-lg-12 text-center text-lg-start">
                    <h1 class="text-white mb-4 animated zoomIn">Sistem Informasi & Monitorng Beasiswa (SIMOSA)</h1>
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