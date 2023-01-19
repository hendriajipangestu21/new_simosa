<!-- Service Start -->
<div class="container-xxl py-5" id="artikel">
    <div class="container px-lg-5">
        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="position-relative d-inline text-primary ps-4">Artikel</h6>
            <h2 class="mt-2">Artikel Sistem Informasi & Monitoring Beasiswa</h2>
        </div>
        <div class="row g-12">


            <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                <div class="container">
                    <!--
                    <div class="card">
                        <div class="card-body">
                            <!-- Posts List -->
                            <!--
                            <table class="table table-borderd" id='postsList'>
                                <tbody></tbody>
                            </table>
                            -->

                            <!-- Paginate -->
                            <!-- <div id='pagination'></div> -->
                    <!--
                        </div>
                    </div>
                    -->
                   <div class="row justify-content-center align-items-center">
                         <?php foreach($artikel_limit as $a): ?>
                            <div class="card col-md-3 m-1">
                                <img class="card-img-top" src="<?= base_url('assets_style/image/artikel/'.$a['img']) ?>" alt="Title">
                                <div class="card-body">
                                    <h4 class="card-title fs-6"><?= $a['judul'] ?></h4>
                                    <p class="card-text"><?= $a['nama_kategori'] ?></p>
                                    <a class="btn btn-primary" href="#" role="button">Selengkapnya</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                   </div>

                    <br>
                    <center>
                        <a class="btn btn-danger btn-lg mt-2" href="#">Telusuri Artikel Lebih Banyak Lagi</a>
                    </center>
                </div>



            </div>

        </div>
    </div>
</div>