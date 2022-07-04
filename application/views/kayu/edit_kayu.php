<div class="col-md grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data kayu</h4>
            <form class="forms-sample" method="POST" action="<?= base_url('kayu/edit_kayu/') . $ky['id_kayu'] ?>">
                <div class=" form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label text"><b>Nama</b></label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" value="<?= set_value('nama') == null ? $ky['nama_kayu'] : set_value('nama') ?>" class="form-control" id="exampleInputUsername2" placeholder="Nama kayu...">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"><b> Deskripsi</b></label>
                    <div class="col-sm-9">
                        <textarea name="deskripsi" class="form-control" id="exampleInputUsername2" placeholder="Deskripsi Kayu" rows="5" autofocus autocomplete="on"><?= set_value('deskripsi_kayu') == null ? $ky['deskripsi_kayu'] : set_value('deskripsi_kayu') ?></textarea>
                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2" href="<?= base_url('kayu/edit_kayu/') ?>">Submit</button>
                <a class="btn btn-danger mr-2" href="<?= base_url('kayu') ?>">Batal</a>
            </form>
        </div>
    </div>
</div>