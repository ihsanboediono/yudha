<div class="col-lg-12 mb-3">
    <div class="card">
        <div class="card-body">
            <h3>Transaksi Barang Masuk</h3>
            <button class="btn btn-success my-1 my-sm-0 ml-auto" style="float: right;" data-toggle="modal" data-target="#exampleModal"> Selesai </button>
        </div>
    </div>
</div>
<div class="col-lg-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= site_url('transaksi/masuk'); ?>">
                <div class="form-group">
                    <label>Pilih Barang</label>
                    <select class="js-example-basic-single" style="width:100%" name="barang">
                        <option value=""> - Pilih - </option>
                        <?php foreach ($barangnya as $barang) : ?>
                            <option value="<?= $barang['id_barang']; ?>"><?= $barang['nama_jenis'] . " " . $barang['nama_kayu'] . " stok " . $barang['stok']; ?> </option>
                        <?php endforeach ?>
                    </select>
                    <?= form_error('barang', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="text" name="jumlah" class="form-control" value="">
                    <?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                </div>
                <button type="submit" name="tambahbarang" class="btn btn-sm btn-success" style="float: right;">Tambah</button>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-9 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Barang </h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width='5%'>No.</th>
                        <th>Nama Kayu</th>
                        <th>Jenis Kayu</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th colspan="2" width='10%'>
                            <center>Aksi</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1;
                    foreach ($details as $detail) : ?>
                        <tr>
                            <td><?= $a++; ?></td>
                            <td><?= $detail['nama_kayu']; ?></td>
                            <td><?= $detail['nama_jenis']; ?></td>
                            <td><?= $detail['jumlah']; ?></td>
                            <td><?= rupiah($detail['total']); ?></td>
                            <td onclick="javascript: return confirm('Anda yakin hapus?')"><a href="<?= base_url('transaksi/barang_hapus/') . $detail['id_detail'] . '/masuk' ?>"><i class="icon-trash menu-icon"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: white;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Selesaikan Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= site_url('transaksi/selesai/masuk'); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <?php
                        $id = $this->session->flashdata('old_kepada');
                        ?>
                        <label>Pilih Pemasok</label>
                        <select class="js-example-basic-single" style="width:100%" name="kepada" id='kepada'>
                            <option value=""> - Pilih - </option>
                            <?php foreach ($pemasoknya as $pemasok) : ?>
                                <option value="<?= $pemasok['id_pengguna']; ?>" data-ket="pemasok">Pemasok <?= $pemasok['nama_pengguna']; ?> </option>
                            <?php endforeach ?>
                        </select>
                        <?= $this->session->flashdata('kepada'); ?>
                    </div>
                    <div class="form-group">
                        <label>Nominal</label>
                        <input type="text" name="pembayaran" class="form-control" value="<?= rupiah($total['total']); ?>" disabled>

                    </div>
                    <div class="form-group">
                        <label>Pembayaran</label>
                        <input type="hidden" name="total" value="<?= $total['total']; ?>">
                        <input type="hidden" name="jumlah" value="<?= $total['jumlah']; ?>">
                        <input type="text" name="nominal" class="form-control" value="<?= $this->session->flashdata('old_nominal'); ?>" autocomplete="off">
                        <input type="hidden" name="data1" value="">
                        <!-- <?= form_error('nominal', '<small class="text-danger">', '</small>'); ?> -->
                        <?= $this->session->flashdata('nominal'); ?>
                    </div>
                    <div class="form-group">
                        <label>Kembalian</label>
                        <input type="text" name="kembalian" class="form-control" value="<?= $this->session->flashdata('old_kembalian'); ?>" autocomplete="off">
                        <input type="hidden" name="data2" value="">
                        <!-- <?= form_error('kembalian', '<small class="text-danger">', '</small>'); ?> -->
                        <?= $this->session->flashdata('kembalian'); ?>
                    </div>
                    <div class="form-group" style="margin-top: -20px;">
                        <label class="col-form-label">Keterangan</label>
                        <div class="row" style="margin-top: -20px;">
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="ket" id="lunas" value="lunas"> Lunas </label>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="ket" id="belum" value="belum" checked> Belum Lunas
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
                <div class="modal-footer">
                    <!-- <a href="<?= base_url('transaksi/cancel/masuk'); ?>" class="btn btn-danger mr-2" style="float: right;">Cencel</a> -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="transaksi" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var total = <?= $total['total'] != null ? $total['total'] : 0; ?>;
    $('input[name="nominal"]').on('keyup', function(event) {
        if (event.which >= 37 && event.which <= 40) return;
        // format number
        var data = $(this).val().replace("Rp. ", "");
        data = $(this).val().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, "");
        var hasil = Math.abs(total - data);
        if (data < total) {
            $('#belum').attr('checked', true);
            $('#lunas').attr('checked', false);
            $('#keterangan').text('Kekurangan');
        } else {
            $('#lunas').attr('checked', true);
            $('#belum').attr('checked', false);
            $('#keterangan').text('Kembalian');
        }
        $('input[name="data1"]').val(data);
        $('input[name="data2"]').val(hasil);
        $('input[name="kembalian"]').val("Rp. " + hasil.toString().replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, "."));
        $(this).val(function(index, value) {
            console.log(data);
            return "Rp. " + value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        });
    });

    $('input[name="jumlah"]').on('keyup focusin focusout ', function(event) {
        if (event.which >= 37 && event.which <= 40) return;
        $(this).val(function(index, value) {
            return value.replace(/\D/g, "");
        });
    });
    $('input[name="kepada"]').on('change', function(event) {
        var key = $(this).data('ket');
        console.log(key);
    });
    <?php
    $kepada = !empty($this->session->flashdata('kepada')) ? $this->session->flashdata('kepada') : null;
    $nominal = !empty($this->session->flashdata('nominal')) ? $this->session->flashdata('nominal') : null;
    $kembalian = !empty($this->session->flashdata('kembalian')) ? $this->session->flashdata('kembalian') : null;
    ?>
    <?php if ($kepada != null || $nominal != null || $kembalian != null) : ?>
        $('#exampleModal').modal('show');
    <?php endif ?>
    // $('#kepada').select2('val', $id);
    $('select[name=kepada]').val($id);
    $('#kepada').select2('refresh')
</script>