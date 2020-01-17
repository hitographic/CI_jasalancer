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
                            <label for="name">Nama Lengkap</label>
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
                            <label for="password2">Ulangi Password</label>
                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-label-group">
                            <div class="form-check form-check-inline selected">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="2" >
                                <label class="form-check-label" for="inlineRadio1">Freelancer</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="3">
                                <label class="form-check-label" for="inlineRadio2">Client</label>
                            </div>
                            <?= form_error('inlineRadioOptions', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                        <a class="d-block text-center mt-2 small" href="<?= base_url('auth/forgotpassword'); ?>">Lupa
                            Password?</a>
                        <a class="d-block text-center mt-2 small" href="<?= base_url('auth'); ?>">Sign In</a>
                        <hr class="my-4">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>