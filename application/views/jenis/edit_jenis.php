<div class="col-md grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data Jenis</h4>
            <form class="forms-sample" method="POST" action="<?= base_url('jenis/edit_jenis/') . $jns['id_jenis'] ?>">
                <div class=" form-group row">
                    <label for="nama" class="col-sm-3 col-form-label"><b>Nama</b></label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" value="<?= $jns['nama_jenis'] ?>" class="form-control" id="nama" placeholder="Nama jenis..." autofocus autocomplete="on">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="deskripsi" class="col-sm-3 col-form-label"><b> Deskripsi</b></label>
                    <div class="col-sm-9">
                        <textarea name="deskripsi" class="form-control" id="deskripsi" placeholder="Deskripsi Jenis" rows="5" autofocus autocomplete="on"><?= set_value('deskripsi_jenis') == null ? $jns['deskripsi_jenis'] : set_value('deskripsi_jenis') ?></textarea>
                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a class="btn btn-danger mr-2" href="<?= base_url('jenis') ?>">Batal</a>
            </form>
        </div>
    </div>
</div>