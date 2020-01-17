<div class="jumbotron halaman2">
    <h1 class="display-4">Temukan<span style="color:#ffc857;"> Freelancer </span><br>Terbaikmu</h1>
</div>
<section class="card-freelancer2">
    <div class="container js-confree">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-right">
                <div class="row filter_data">
              
                    <?php foreach ($profil as $free) : ?>
                    <div class="card mb-3">
                        <div class="js-bayangan">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="<?= base_url('assets/img/profile/').$free['image']; ?>" class="card-img"
                                        alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="js-card">
                                        <div class="card-body">
                                            <a class="text-decoration-none font-weight-bold" style="color:black;"
                                                href="<?= base_url('')?>carifreelancer/detail/<?= $free['id_user'];?>"><i class="fas fa-check-circle" style="color:#00c40d;"></i>  <?=$free['name'] ?></a>

                                            <h1 class="card-title" style="color:black;"><?=$free['prof_skill'] ?></h1>
                                            <hr>
                                            <div class="potong">
                                                <p class="card-text mb-2">
                                                    <span style="-webkit-line-clamp: 3;
                                                                overflow : hidden;
                                                                text-overflow: ellipsis;
                                                                display: -webkit-box;
                                                                -webkit-box-orient: vertical;">
                                                        <?=$free['prof_sum'] ?>
                                                    </span>
                                                </p>
                                            </div>
                                            <p class="card-text"><small class="text-muted text-capitalize"><i class="fas fa-map-marker-alt" style="color:#edba00;"></i> 
                                                    <?=$free['nama_kota'] ?></small>
                                            </p>
                                            <div class="badge badge-pill badge-light border border-primary">
                                                <?=$free['skill'] ?></div>
                                            <a class="float-right" href="<?= base_url('')?>carifreelancer/detail/<?= $free['id_user'];?>"><small>Menuju Profil <i class='fas fa-long-arrow-alt-right'></small></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                <div class="row">
                    <div class="col">
                        <!--Tampilkan pagination-->
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
                <form action="<?= base_url('cariFreelancer') ?>" method="post">
                    <div class="card bg-dark mb-3">
                        <div class="card-body">
                            <div class="container">
                                <h5 style="color: white">Cari Freelancer</h5>
                                <hr style="color: white">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cari Freelancer. . ."
                                        name="keyword" autocomplete="off" autofocus>
                                    <div class="input-group-append">
                                        <input class="btn btn-primary" type="submit" name="submit" value="cari">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- mulai card -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="container">
                                <h5>Skill</h5>
                                <hr style="color: white">
                                <div class="input-group">
                                    <div class="wt-verticalscrollbar mb-3">
                                        <?php foreach ($skill  as $sk):?>
                                        <!-- <span class="wt-checkbox"> -->
                                        <input id="<?= $sk['skill']; ?>" type="radio" name="keyword"
                                            value="<?= $sk['skill']; ?>">
                                        <label for="<?= $sk['skill']; ?>"> <?= $sk['skill']; ?></label><br>
                                        <!-- </span> -->
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="input-group-append float-right">
                                    <input class="btn btn-primary" type="submit" name="submit" value="cari">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- akhir card -->

                    <!-- mulai card -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="container">
                                <h5>Kota</h5>
                                <hr style="color: white">
                                <div class="input-group">
                                    <div class="wt-verticalscrollbar mb-3">
                                        <?php foreach ($kota  as $kt):?>
                                        <!-- <span class="wt-checkbox"> -->
                                        <input id="<?= $kt['nama_kota']; ?>" type="radio" name="keyword"
                                            value="<?= $kt['nama_kota']; ?>">
                                        <label for="<?= $kt['nama_kota']; ?>"> <?= $kt['nama_kota']; ?></label><br>
                                        <!-- </span> -->
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="input-group-append float-right">
                                    <input class="btn btn-primary" type="submit" name="submit" value="cari">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- akhir card -->

                    <!-- mulai card -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="container">
                                <h5>Tipe Freelancer</h5>
                                <hr style="color: white">
                                <div class="input-group">
                                    <div class="wt-verticalscrollbar">

                                        <!-- <span class="wt-checkbox"> -->
                                        <input id="Freelancer independen" type="radio" name="keyword"
                                            value="Freelancer independen">
                                        <label for="Freelancer independen"> Freelancer independen</label><br>
                                        <input id="Agensi freelancer" type="radio" name="keyword"
                                            value="Agensi freelancer">
                                        <label for="Agensi freelancer"> Agensi freelancer</label><br>
                                        <!-- </span> -->

                                    </div>
                                </div>
                                <div class="input-group-append float-right">
                                    <input class="btn btn-primary" type="submit" name="submit" value="cari">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- akhir card -->

                    <!-- mulai card -->
                    <!-- <div class="card mb-3">
                        <div class="card-body">
                            <div class="container">
                                <span>Klik "Simpan" untuk mendapatkan<br> perubahan pada
                                    pencarian</span>
                                <hr style="color: white">
                                <input class="btn btn-primary tombol" type="submit" value="Simpan" name="submit">
                            </div>
                        </div>
                    </div> -->
                    <!-- akhir card -->
                </form>




                </aside>
            </div>
        </div>
    </div>

</section>