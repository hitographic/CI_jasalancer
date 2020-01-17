<div class="jumbotron halaman2">
    <h1 class="display-4">Jasa :</h1><br>
    <h3><span style="color:#ffc857;"> <?= $jasaku['judul']; ?> </span></h3>
</div>
<!--main body-->
<div class="container">
    <div style="padding:1% 3% 1% 3%;">
        <div class="row">


            <!--Column 2-->
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header bg-white">
                        <h5>Detail</h5>
                    </div>
                    <div class="card-body bg-light">
                        <div class="row">
                            <img src="<?= base_url('assets/img/jasa/').$jasaku['foto_jasa']; ?>"
                                class="card-img-top justify-content-center utama" alt="...">
                            <div class="container">

                                <br>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="container">
                                    <p class="card-text font-weight-bold">Jasa</p>
                                    <div class="shadow-sm p-3 mb-3 bg-white rounded"><?= $jasaku['judul']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="container">
                                    <p class="card-text font-weight-bold">Deskripsi</p>
                                    <div class="shadow-sm p-3 mb-3 bg-white rounded"><?= $jasaku['deskripsi']; ?></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                      
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="container">
                                    <p class="card-text font-weight-bold">Kota</p>
                                    <div class="text-capitalize shadow-sm p-3 mb-3 bg-white rounded ">
                                        <?= $jasaku['nama_kota']; ?></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="container">
                                    <p class="card-text font-weight-bold">Negara</p>
                                    <div class="shadow-sm p-3 mb-3 bg-white rounded">Indonesia</div>
                                </div>
                            </div>

                        </div>
                        

                    </div>




                </div>


            </div>

            <!--Column 1-->
            <div class="col-lg-4">
                <!--awal profil-->
                <div class="card mb-3 justify-content-center">
                    <div class="card-body ">
                        <h1 class="font-weight-bold">Rp. <?= $jasaku['harga']; ?></h1>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('assets/img/profile/').$jasaku['image']; ?>"
                        class="card-img-top justify-content-center utama" alt="...">
                    <div class="card-body text-center">
                    <a class="text-decoration-none font-weight-bold" style="color:black;"
                                                href="<?= base_url('')?>carifreelancer/detail/<?= $jasaku['id_user'];?>"><i class="fas fa-check-circle" style="color:#00c40d;"></i>  <?=$jasaku['name'] ?></a>

                        <p class="card-text text-center"><small class="text-muted">Member Sejak
                                <span
                                    class="font-weight-bold"><?= date('d F Y', $jasaku['date_created']); ?></span></small>
                        </p>

                    </div>
                </div>


            </div>
            <!--End Column 1-->

        </div>
    </div>
</div>

<!--End main body-->