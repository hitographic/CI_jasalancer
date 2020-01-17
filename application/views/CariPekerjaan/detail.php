<div class="jumbotron halaman2">
    <h1 class="display-4">Jasa :</h1><br>
    <h3><span style="color:#ffc857;"> <?= $pekerjaan['judul']; ?> </span></h3>
</div>
<!--main body-->
<div class="container">
    <div style="padding:1% 3% 1% 3%;">
        <div class="row">


            <!--Column 2-->
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header bg-white">
                        <span><h5>Detail<span class="float-lg-right">Kategori : 
                        <span class="badge badge-pill badge-light border border-warning "> <?=$pekerjaan['n_kategori'] ?></span></span></h5></span>
                    </div>
                    <div class="card-body bg-light">
                        <div class="row">
                            <img src="<?= base_url('assets/img/pekerjaan/').$pekerjaan['foto_pekerjaan']; ?>"
                                class="card-img-top justify-content-center utama" alt="...">
                            <div class="container">

                                <br>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="container">
                                    <p class="card-text font-weight-bold">Pekerjaan</p>
                                    <div class="shadow-sm p-3 mb-3 bg-white rounded"><?= $pekerjaan['judul']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="container">
                                    <p class="card-text font-weight-bold">Deskripsi</p>
                                    <div class="shadow-sm p-3 mb-3 bg-white rounded"><?= $pekerjaan['deskripsi']; ?></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                      
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="container">
                                    <p class="card-text font-weight-bold">Kota</p>
                                    <div class="text-capitalize shadow-sm p-3 mb-3 bg-white rounded ">
                                        <?= $pekerjaan['nama_kota']; ?></div>
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
                    <h6>Harga Mulai Dari</h6>
                        <h1 class="font-weight-bold">Rp. <?= $pekerjaan['harga']; ?></h1>
                    </div>
                </div>
                <div class="card">
                    <img src="<?= base_url('assets/img/profile/').$pekerjaan['image']; ?>"
                        class="card-img-top justify-content-center utama" alt="...">
                    <div class="card-body text-center">
                    <h6 class="font-weight-bold justify-content-center">Client</h6>
                    <a class="text-decoration-none font-weight-bold" style="color:black;"
                                                href="#"><i class="fas fa-check-circle" style="color:#00c40d;"></i>  <?=$pekerjaan['name'] ?></a>

                        <p class="card-text text-center"><small class="text-muted">Member Sejak
                                <span
                                    class="font-weight-bold"><?= date('d F Y', $pekerjaan['date_created']); ?></span></small>
                        </p>

                    </div>
                </div>


            </div>
            <!--End Column 1-->

        </div>
    </div>
</div>

<!--End main body-->