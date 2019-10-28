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
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />





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
                    <a class="nav-item nav-link active" href="<?= base_url() ?>freelancer">CARI FREELANCER<span
                            class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="<?= base_url() ?>jasa">CARI JASA</a>
                    <a class="nav-item btn btn-outline-warning tombol" href="<?= base_url() ?>gate/login" >Masuk</a>
                    
                    <a class="nav-item btn btn-primary tombol" href="<?= base_url() ?>gate/register">Gabung</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir navbar -->