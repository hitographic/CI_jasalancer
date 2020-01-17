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
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/register.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/fontawesome.css">




    <title><?= $judul; ?></title>

</head>

<body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url(); ?>assets/img/logo-hitam.png"
                    alt="JasaLancer.com" width="200px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- Akhir navbar -->


    <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card card-signin flex-row my-5">
                        <div class="card-img-left d-none d-md-flex">
                            <!-- Background image for card set in CSS! -->
                        </div>

                        <div class="card-body">
                            <h5 class="card-title text-center">Register</h5>
                            <form class="form-signin" method='post' action="<?= base_url('auth/registration'); ?>">
                                <div class="form-label-group">
                                    <input type="text" id="name" class="form-control" placeholder="Nama" name="name"
                                        value="<?= set_value('name'); ?>">
                                    <label for="name">Nama</label>
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" id="email" class="form-control" placeholder="Email" name="email"
                                        value="<?= set_value('email'); ?>">
                                    <label for="email">Email</label>
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <hr>

                                <div class="form-label-group">
                                    <input type="password" id="password1" name="password1" class="form-control"
                                        placeholder="Password">
                                    <label for="password1">Password</label>
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="password2" name="password2" class="form-control"
                                        placeholder="Password">
                                    <label for="password2">Password</label>
                                    <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <button class="btn btn-lg btn-primary btn-block text-uppercase"
                                    type="submit">Register</button>
                                <a class="d-block text-center mt-2 small" href="<?= base_url('auth/forgotpassword'); ?>">Lupa Password?</a>
                                <a class="d-block text-center mt-2 small" href="<?= base_url('auth'); ?>">Sign In</a>
                                <hr class="my-4">
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>