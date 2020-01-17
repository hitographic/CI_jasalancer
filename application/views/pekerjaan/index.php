<div class="container">
    <h3 class="mt-3">Kelola Jasa</h3>
    <?php if ($this->session->flashdata('message')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $this->session->flashdata('message'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-5">
                    <form action="<?= base_url('pekerjaan') ?>" method="post">
                        <div class="input-group mb-3">

                            <input type="text" class="form-control" placeholder="'Cari jasa..." name="keyword"
                                autocomplete="off" autofocus>
                            <div class="input-group-append">
                                <input class="btn btn-primary" type="submit" name="submit" value="cari">
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <table class="table">
                <th>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Harga</th>

                    </tr>
                </th>
                <tbody>
                    <?php if (empty($pekerjaan)) : ?>
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-danger" role="alert">
                                data tidak ditemukan
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                    <?php
                      $start = 1;
                    foreach ($pekerjaan as $ja) : ?>
                    <tr>
                        <th><?= $start++; ?></th>
                        <td> <?= $ja['judul']; ?> </td>
                        <td><?= $ja['harga']; ?></td>

                        <td>
                            <a href="<?= base_url(); ?>pekerjaan/detail/<?= $ja['id']?>"
                                class="badge badge-primary">detail</a>
                            <a href="<?= base_url(); ?>pekerjaan/ubah/<?= $ja['id']?>"
                                class="badge badge-success">edit</a>
                            <a href="<?= base_url(); ?>pekerjaan/hapus/<?= $ja['id']?>"
                                onclick="return confirm('yakin?')" class="badge badge-danger">hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>


            </table>



        </div>
    </div>
</div>
</div>