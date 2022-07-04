<div class="col-md grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Data Transaksi</h4>
            <form class="forms-sample" method="POST" action="">
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nama Barang</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" class="form-control" id="exampleInputUsername2" placeholder="Nama barang...">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Jumlah</label>
                    <div class="col-sm-9">
                        <input type="number" name="jumlah" class="form-control" id="exampleInputEmail2" placeholder="Jumlah...">
                        <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                        <input type="text" name="deskripsi" class="form-control" id="exampleInputMobile" placeholder="Deskripsi...">
                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Kepada</label>
                    <div class="col-sm-9">
                        <input type="text" name="kepada" class="form-control" id="exampleInputMobile" placeholder="Kepada...">
                        <?= form_error('kepada', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Waktu Transaksi</label>
                    <div class="col-sm-9">
                        <input type="date" name="waktu_transaksi" value="<?= Date('Y-m-d') ?>" class="form-control" id="exampleInputMobile" placeholder="">
                        <?= form_error('waktu_transaksi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a class="btn btn-danger" href="<?= base_url('transaksi') ?>">Batal</a>
            </form>
        </div>
    </div>
</div>

