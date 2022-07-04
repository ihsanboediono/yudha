<div class="col-md grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Data Barang keluar</h4>
            <form class="forms-sample" method="POST" action="<?= base_url('barangkeluar/edit_barangkeluar/') . $brgklr['idbarang_keluar'] ?>">
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" value="<?= $brgklr['nama'] ?>" class="form-control" id="exampleInputEmail2" placeholder="">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                        <input type="text" name="deskrispi" value="<?= $brgklr['deskripsi'] ?>" class="form-control" id="exampleInputEmail2" placeholder="">
                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Jumlah</label>
                    <div class="col-sm-9">
                        <input type="number" name="jumlah" value="<?= $brgklr['jumlah'] ?>" class="form-control" id="exampleInputEmail2" placeholder="">
                        <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Tanggal keluar</label>
                    <div class="col-sm-9">
                        <input type="date" name="tanggal_keluar" value="<?= date('Y-m-d') ?>" class="form-control" id="exampleInputMobile" placeholder="">
                        <?= form_error('tanggal_keluar', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Waktu keluar</label>
                    <div class="col-sm-9">
                        <input type="time" name="waktu_keluar" value="<?= $brgklr['waktu_keluar'] ?>" class="form-control" id="exampleInputMobile" placeholder="">
                        <?= form_error('waktu_keluar', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary mr-2" href="<?= base_url('barangkeluar/edit_barangkeluar/') ?>">Submit</button>
                <a class="btn btn-danger" href="<?= base_url('barangkeluar') ?>">Batal</a>
            </form>
        </div>
    </div>
</div>