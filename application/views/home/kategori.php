<!-- Container -->
<div class="container">

    <!-- Header -->
    <div class="kategori">
        <h2>Kategori</h2>
        <p>Temukan pekerjaan yang sesuai untukmu</p>
    </div>

    <div class="row mt-4">
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="icon" src="<?= base_url(); ?>assets/img/icon/website_pengembangan.png" alt=""
                        style="text-decoration:none"></a>
                <div class="card-body">
                    <h4 class="card-title js-card2">
                        <a href="<?= base_url('cariPekerjaan')?>" name="submit" value="Website dan Pengembangan">Website
                            dan Pengembangan</a>
                    </h4>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="icon" src="<?= base_url(); ?>assets/img/icon/pemasaran.png" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title js-card2">
                        <a href="<?= base_url('cariPekerjaan')?>">Penjualan dan Pemasaran Online</a>
                    </h4>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="icon" src="<?= base_url(); ?>assets/img/icon/penulisan.png" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title js-card2">
                        <a href="<?= base_url('cariPekerjaan')?>">Penulisan</a>
                    </h4>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="icon" src="<?= base_url(); ?>assets/img/icon/mobiles.png" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title js-card2">
                        <a href="<?= base_url('cariPekerjaan')?>">Music dan Audio</a>
                    </h4>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="icon" src="<?= base_url(); ?>assets/img/icon/desain.png" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title js-card2">
                        <a href="<?= base_url('cariPekerjaan')?>">Desain dan Multimedia</a>
                    </h4>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="icon" src="<?= base_url(); ?>assets/img/icon/aplikasi.png" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title js-card2">
                        <a href="<?= base_url('cariPekerjaan')?>">Pengembangan Aplikasi Mobile</a>
                    </h4>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="icon" src="<?= base_url(); ?>assets/img/icon/admin.png" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title js-card2">
                        <a href="<?= base_url('cariPekerjaan')?>">Administrasi dan Support</a>
                    </h4>

                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="icon" src="<?= base_url(); ?>assets/img/icon/gayahidup.png" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title js-card2">
                        <a href="<?= base_url('cariPekerjaan')?>">Gaya Hidup dan Kesehatan</a>
                    </h4>

                </div>
            </div>
        </div>
    </div>
    <!-- akhir row -->

</div>
<!-- /.container -->

<!-- memunculkan freelancer -->

<div class="kategori">
    <h2>Freelancer Terfavorit</h2>
    <p>Temukan yang sesuai untukmu</p>
</div>
<section class="card-freelancer">
    <div class="container">
        <div class="row pt-5 pb-5">

            <?php
            $i = 1;
            foreach ($freelancer as $free): ?>

            <div class="col-md-4 mb-5">
                <div class="card" style="width: 18rem;">
                    <img src="<?= base_url('assets/img/profile/').$free['image']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font-weight-bold"><i class="fas fa-check-square"
                                style="color:#00c40d;"></i> <?= $free['name']; ?></h5>
                        <hr>
                        <h6 class="card-text"><?= $free['prof_skill']; ?></h6>
                        <a class="nav-item btn btn-outline-primary tombol font-weight-bold"
                            href="<?= base_url('')?>carifreelancer/detail/<?= $free['id_user'];?>">Menuju Profil <i
                                class="fas fa-angle-right"></i></a>

                    </div>
                </div>
            </div>

            <?php
        if ($i++ == 6) {
            break;
        }
        endforeach; ?>

        </div>
    </div>
</section>

<!-- akhir freelancer -->
<section>
    <div class="kategori2">
        <h2>Gabung Bersama Kami</h2>
        <div class="container">
            <div class="row pt-5 justify-content-center">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sebagai Client/Freelancer</h5>
                            <a href="<?= base_url('auth/registration'); ?>"
                                class="btn btn-success btn-lg tombol baru">Gabung Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>