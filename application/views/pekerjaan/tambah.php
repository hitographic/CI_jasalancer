<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form tambah Pekerjaan </div>
                <div class="card-body">

                    <?= form_open_multipart('pekerjaan/tambah'); ?>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $user['id']; ?>"
                            readonly>
                        <input type="hidden" class="form-control" id="email" name="email" value="<?= $user['email']; ?>"
                            readonly>
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                        <small class="form-text text-danger"><?= form_error('judul'); ?></small>

                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" ></textarea>
                        <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="email">harga</label>
                        <input type="text" class="form-control" id="harga" name="harga">
                        <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="email">Kota</label>
                        <select class="form-control" name="id_kota" id="kota">
                            <?php foreach ($kota as $m): ?>
                            <option value="<?= $m['id']; ?>"><?= $m['nama_kota']; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Skill</label>
                        <select class="form-control" name="id_skill" id="kota">
                            <?php foreach ($skill as $m): ?>
                            <option value="<?= $m['id']; ?>"><?= $m['skill']; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">kategori</label>
                        <select class="form-control" name="id_kategori" id="kota">
                            <?php foreach ($kategori as $m): ?>
                            <option value="<?= $m['id']; ?>"><?= $m['kategori']; ?></option>
                            <?php endforeach; ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Pilih file...</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 mb-2 float-right">
                    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                </div>
                  

                    </form>
                </div>
            </div>


        </div>

    </div>


</div>