<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Menu
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <!-- menyembunyikan ID -->
                        <input type="hidden" name="id" value="<?= $peoples['id'] ; ?>">
                        <div class="form-group">
                            <label for="menu">Menu</label>
                            <!-- membuat value  -->
                            <input type="text" class="form-control" id="menu" name="menu"
                                value="<?= $peoples['menu']; ?>">
                            <small class="form-text text-danger"><?= form_error('menu'); ?></small>

                        
                      
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Ubah Data</button>

                    </form>
                </div>
            </div>


        </div>

    </div>


</div>