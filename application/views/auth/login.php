<div class="jumbotron jumbotron-fluid jumboheader">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="d-none d-md-flex col-md-4 col-lg-6"></div>
                <div class="col-md-8 col-lg-6">
                    <div class="login d-flex align-items-center py-5">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-lg-8 mx-auto kotak">
                                    <h3 class="login-heading mb-4" style="color:white;">Selamat Datang!</h3>

                                    <!-- membuat flash tampil -->
                                    <?= $this->session->flashdata('message'); ?>

                                    <form class="user" method="post" action="<?= base_url('auth') ?>">
                                        <div class="form-label-group">
                                            <input type="text" id="email" class="form-control"
                                                placeholder="Email address" name="email" value="<?= set_value('email'); ?>">
                                            <label for="email">Email</label>
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>

                                        <div class="form-label-group">
                                            <input type="password" id="password" class="form-control"
                                                placeholder="Password" name="password">
                                            <label for="password">Password</label>
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button
                                            class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                            type="submit" style="color:#323232;">login</button>
                                        <div class="text-center">
                                            <a class="small" href="<?= base_url('auth/forgotpassword'); ?>" style="color:white;">Lupa Password?</a><br>
                                            <a class="small" href="<?= base_url('auth/registration'); ?>" style="color:white;">Buat Akun Baru</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>