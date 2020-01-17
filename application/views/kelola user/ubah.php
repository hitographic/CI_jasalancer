<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data User
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <!-- menyembunyikan ID -->
                        <input type="hidden" name="id" value="<?= $peoples['id'] ; ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <!-- membuat value  -->
                            <input type="text" class="form-control" id="nama" name="name"
                                value="<?= $peoples['name']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?= $peoples['email']; ?>">
                            <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <!-- form pilihan bootstrap -->
                        
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Ubah Data</button>

                    </form>
                </div>
            </div>


        </div>

    </div>


</div>