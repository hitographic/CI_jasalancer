<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- My font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- my CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
    <link href="<?= base_url(); ?>assets/css/rotating-card.css" rel="stylesheet" />
    <link href="<?= base_url('assets'); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />







    <title><?= $judul; ?></title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url(); ?>assets/img/logo.png"
                    alt="JasaLancer.com" width="200px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="<?= base_url() ?>CariFreelancer">Freelancer<span
                            class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link active" href="<?= base_url() ?>CariJasa">Jasa</a>
                    <a class="nav-item nav-link active" href="<?= base_url() ?>CariPekerjaan">Pekerjaan</a>

                </div>
            </div>

            <!-- DISINI BUAT EDIT SESSION -->
            <?php if ($this->session->userdata('email')) { ?>

            <li class="nav-item dropdown no-arrow">
                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                        style="color:white; text-decoration:none;"><?= $user['name']; ?></span>
                    <img style="height: 2rem; width: 2rem;" class="img-profile rounded-circle"
                        src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item"
                        href="<?= base_url(); ?><?php  if ($user['role_id'] == 1) {?>admin<?php } elseif ($user['role_id'] == 2) {?>freelancer<?php } else { ?>client<?php }; ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profil
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal"
                        data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

            <?php } else { ?>

            <a class="nav-item btn btn-outline-warning tombol" href="<?= base_url() ?>auth/index">Masuk</a>
            <a class="nav-item btn btn-primary tombol" href="<?= base_url() ?>auth/registration">Gabung</a>

            <?php }; ?>
        </div>


    </nav>
    <!-- Akhir navbar -->