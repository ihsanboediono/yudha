<div class="col-md grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Data Pemasok</h4>
            <form class="forms-sample" method="POST" action="<?= base_url('pemasok/tambah_pemasok'); ?>">
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Pemasok..." value="<?= set_value('nama'); ?>">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat..." value="<?= set_value('alamat'); ?>">
                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_telp" class="col-sm-3 col-form-label">No. Telepon</label>
                    <div class="col-sm-9">
                        <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="089123456789" value="<?= set_value('no_telp'); ?>">
                        <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-9">
                        <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Deskripsi..." value="<?= set_value('deskripsi'); ?>">
                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                    </div>

                </div>

                <a class="btn btn-danger mr-2" href="<?= base_url('pemasok') ?>">Batal</a>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

        $('input[name="no_telp"]').on('keyup focusin focusout ', function(event) {
            if (event.which >= 37 && event.which <= 40 && event.which == 173) return;
            $(this).val(function(index, value) {
                return value.replace(/\D/g, "");
            });
            console.log(event.which);
        });



    });
</script>