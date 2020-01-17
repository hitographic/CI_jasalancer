<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <!-- untuk upload photo -->
            <!-- <form action="" method="" enctype="multipart/form-data"> -->

            <?= form_open_multipart('freelancer/edit'); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $user['id']; ?>"
                        readonly>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>"
                        readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $profil['alamat']; ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <select class="form-control" name="kota" id="kota">
                            <?php foreach ($kota as $m): ?>
                            <?php if ($m['id'] == $profil['id_kota']) :?>
                            <option value="<?= $m['id']; ?>" selected><?= $m['nama_kota']; ?></option>
                            <?php else : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['nama_kota']; ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>

                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="kontak" class="col-sm-2 col-form-label">Kontak</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kontak" name="kontak" value="<?= $profil['kontak']; ?>">
                    <?= form_error('kontak', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                <div class="form-group">
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">

                            
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                            
                        </select>
                    </div>
                    <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="tipe_freelancer" class="col-sm-2 col-form-label">Tipe Freelancer</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <select name="tipe" id="tipe" class="form-control">

                            <?php foreach ($tipe as $tp) :?>
                            <option value="<?= $tp['tipe']; ?>"><?= $tp['tipe']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="prof_skill" class="col-sm-2 col-form-label">Skill Profesional</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="prof_skill" name="prof_skill"
                        value="<?= $profil['prof_skill']; ?>">
                    <?= form_error('prof_skill', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="prof_sum" class="col-sm-2 col-form-label">Penjelasan Skill</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="prof_sum" name="prof_sum" rows="5"><?= $profil['prof_sum']; ?></textarea>
                            </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2">Foto</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/').$user['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Pilih file...</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
            </form>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->