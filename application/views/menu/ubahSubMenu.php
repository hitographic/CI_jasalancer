<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <?php if (validation_errors()): ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
                <?php endif; ?>
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>');?>
                <div class="card-header">
                    Form Ubah Data Sub Menu
                </div>

                <div class="card-body">

                    <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $datasubmenu['id'] ; ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="title">Sub Menu</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="<?= $datasubmenu['title']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="menu">Pilih Parent Menu</label>
                                <select class="form-control" name="menu_id" id="menu">
                                    <?php foreach ($menu as $m): ?>
                                    <?php if ($m['id'] == $datasubmenu['menu_id']) :?>
                                    <option value="<?= $m['id']; ?>" selected><?= $m['menu']; ?></option>
                                    <?php else : ?>
                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="url">URL</label>
                                <input type="text" class="form-control" id="url" name="url"
                                    value="<?= $datasubmenu['url']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <input type="text" class="form-control" id="icon" name="icon"
                                    value="<?= $datasubmenu['icon']; ?>">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" name="is_active"
                                        id="is_active" checked>
                                    <label class="form-check-label" for="is_active">
                                        Aktifkan?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>

    </div>


</div>