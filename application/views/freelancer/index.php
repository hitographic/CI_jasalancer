<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->




    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<div class="jumbotron-fluid halaman2">

</div>

<!--main body-->
<div class="container">
    <div style="padding:1% 3% 1% 3%;">
        <div class="row">

            <!--Column 1-->
            <div class="col-lg-4">

                <!--awal profil-->
                <div class="card">
                    <img src="<?= base_url('assets/img/profile/').$user['image']; ?>"
                        class="card-img-top justify-content-center utama" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center font-weight-bold text-capitalize"><?= $user['name']; ?></h5>
                        <h6 class="card-title text-center" style="color:#a8a8a8;"><?= $profil['prof_skill']; ?></h6>
                     

                        <p class="card-text text-center"><small class="text-muted">Tipe : 
                                <span
                                    class="font-weight-bold"><?= $profil['tipe_freelancer']; ?></span></small>
                        </p>
                        <p class="card-text text-center"><small class="text-muted">Member Sejak
                                <span
                                    class="font-weight-bold"><?= date('d F Y', $user['date_created']); ?></span></small>
                        </p>
                        <!-- <ul class="list-group">
                            <a href="editFreelancer.php" class="list-group-item list-group-item-info">Edit Profil</a>
                            <a href="message.php" class="list-group-item list-group-item-info">Pesan</a>
                            <a href="logout.php" class="list-group-item list-group-item-info">Logout</a>
                        </ul> -->
                    </div>
                </div>
                <!--akhir profil-->

                <!-- Kontak-->
                <!-- <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4>Kontak</h4>
                        </div>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">Email</div>
                        <div class="panel-body">email</div>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">No.tlp</div>
                        <div class="panel-body">kontak</div>
                    </div>
                    <div class="panel panel-success">
                        <div class="panel-heading">Address</div>
                        <div class="panel-body">alamat</div>
                    </div>
                </div> -->
                <!--akhir kontak -->

                <!--Social Network Profiles-->
                <!-- <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3>Sosial Media</h3>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item" style="font-size:20px;color:#3B579D;"><i
                                class="fab fa-facebook-square">
                                Facebook</i></li>
                        <li class="list-group-item" style="font-size:20px;color:#D34438;"><i
                                class="fab fa-google-plus-square"> Google</i></li>
                        <li class="list-group-item" style="font-size:20px;color:#2CAAE1;"><i
                                class="fab fa-twitter-square">
                                Twitter</i></li>
                        <li class="list-group-item" style="font-size:20px;color:#0274B3;"><i class="fab fa-linkedin">
                                Linkedin</i></li>
                    </ul>
                </div> -->
                <!--End Social Network Profiles-->

            </div>
            <!--End Column 1-->

            <!--Column 2-->
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header bg-white">
                        <h5>Profil</h5>
                    </div>
                    <div class="card-body bg-light">
                        <div class="row">
                            <div class="container">
                                <p class="card-title" style="color:#a8a8a8;">INFORMASI USER</p>
                                <br>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="container">
                                    <p class="card-text font-weight-bold">Nama</p>
                                    
                                        <div class="shadow-sm p-3 mb-3 bg-white rounded"><?= $user['name']; ?></div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="container">
                                    <p class="card-text font-weight-bold">Email</p>
                                    <div class="shadow-sm p-3 mb-3 bg-white rounded"><?= $user['email']; ?></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="container">
                                <p class="card-title" style="color:#a8a8a8;">INFORMASI KONTAK</p>
                                <br>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="container">
                                    <p class="card-text font-weight-bold">Alamat</p>
                                    <div class="shadow-sm p-3 mb-3 bg-white rounded"><?= $profil['alamat']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="container">
                                    <p class="card-text font-weight-bold">Kota</p>
                                    <div class="text-capitalize shadow-sm p-3 mb-3 bg-white rounded "><?= $kota['nama_kota']; ?></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="container">
                                <p class="card-text font-weight-bold">Negara</p>
                                    <div class="shadow-sm p-3 mb-3 bg-white rounded">Indonesia</div>
                                </div>
                            </div>
                            
                        </div>
                        <hr>
                        <div class="row">
                            <div class="container">
                                <p class="card-title" style="color:#a8a8a8;">TENTANG</p>
                                <br>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="container">
                                    <p class="card-text font-weight-bold">Bio</p>
                                    <div class="shadow-sm p-3 mb-3 bg-white rounded"><?= $profil['prof_sum']; ?></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    <!--Freelancer Profile Details-->
                    <!-- <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3>Detail Profil</h3>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">Keahlian</div>
                            <div class="panel-body">
                                <h4></h4>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">Skill</div>
                            <div class="panel-body">
                                <h4>PHP </h4>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">Profile Summery</div>
                            <div class="panel-body">
                                <h4>deskripsi</h4>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">Sekolah</div>
                            <div class="panel-body">
                                <h4>Mercubuana University</h4>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">Pengalaman</div>
                            <div class="panel-body">
                                <h4>Analis Kimia di PT Harapan Ayah</h4>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">Pekerjaan saat ini</div>
                            <div class="panel-body">
                                <h4>
                                    <table style="width:100%">
                                        <tr>
                                            <td>Job Id</td>
                                            <td>Title</td>
                                            <td>Employer</td>
                                        </tr>
                                    </table>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">Previous Works</div>
                            <div class="panel-body">
                                <h4>
                                    <table style="width:100%">
                                        <tr>
                                            <td>Job Id</td>
                                            <td>Title</td>
                                            <td>Employer</td>
                                        </tr>
                                    </table>
                                </h4>
                            </div>
                        </div>
                    </div> -->
                    <!--End Freelancer Profile Details-->

                </div>
                <!--End Column 2-->


                <!-- Column 3
            <div class="col-lg-2">
                My Wallet
                <div class="card" style="padding:20px 20px 5px 20px;margin-top:20px">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3>My Wallet</h3>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Balance: $0.0</li>
                        <li class="list-group-item">Hourly Rate: $3.0</li>
                        <li class="list-group-item">Payment Method: </li>
                        <li class="list-group-item">Withdraw</li>
                    </ul>
                </div>
                End My Wallet -->



                <!-- </div> -->
                <!--End Column 3-->

            </div>
        </div>
    </div>
</div>

<!--End main body-->