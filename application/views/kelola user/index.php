<div class="container">
    <h3 class="mt-3">Kelola User</h3>
    <?php if ($this->session->flashdata('flash')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Menu <strong>berhasil!</strong><?= $this->session->flashdata('flash'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php endif; ?>

    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-5">
                    <form action="<?= base_url('kelola_user') ?>" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="'Cari user..." name="keyword"
                                autocomplete="off" autofocus>
                            <div class="input-group-append">
                                <input class="btn btn-primary" type="submit" name="submit" value="cari">
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <h6>Jumlah user : <?= $total_rows; ?></h6>
            <table class="table">
                <th>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>role_id</th>
                        <th>is_aktif</th>
                        <th>Aksi</th>
                    </tr>
                </th>
                <tbody>
                    <?php if (empty($peoples)) : ?>
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-danger" role="alert">
                                data tidak ditemukan
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php foreach ($peoples as $people) : ?>
                    <tr>
                        <th><?= ++$start; ?></th>
                        <td> <?= $people['name']; ?> </td>
                        <td><?= $people['email']; ?></td>
                        <td><?= $people['role_id']; ?></td>
                        <td><?= $people['is_active']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>kelola_user/detail/<?= $people['id']?>" class="badge badge-primary">detail</a>
                            <a href="<?= base_url(); ?>kelola_user/ubah/<?= $people['id']?>" class="badge badge-success">edit</a>
                            <a href="<?= base_url(); ?>kelola_user/hapus/<?= $people['id']?>" onclick="return confirm('yakin?')"  class="badge badge-danger">hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>


            </table>

            <?= $this->pagination->create_links(); ?>

        </div>
    </div>
</div>
</div>