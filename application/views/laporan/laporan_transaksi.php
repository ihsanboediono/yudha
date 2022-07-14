<div class="col-lg-12 mb-3">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('/laporan') ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <input type="date" class="form-control form-inline" id="nama" name="awal" placeholder="Gamis Muslim" autofocus autocomplete="off">
                    </div>
                    <div class="form-group col-lg-4">
                        <input type="date" class="form-control form-inline" id="harga" name="akhir" autofocus autocomplete="off">
                    </div>
                    <div class="form-group col-lg-4">
                        <button class="btn btn-primary" name="cek" type="submit">cari</button>
                    </div>
                </div>
            </form>
            <div class="form-group col-lg-4">
                <button class="btn btn-primary" name="cek" type="submit"  data-toggle="modal" data-target="#exampleModal">Input Data</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="examplemodalLabel">Input Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('laporan/laporan_input') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body" style="background-color: white;">
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="excel" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                    <div class="text-small">hanya dapat berupa file excel</div>
                </div>
            </div>
            <div class="modal-footer" style="float: right;">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal" style="float: right;">Close</button> -->
                <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-12 ">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Laporan Transaksi </h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width='5%'>No.</th>
                        <th>Nama Obat</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1;
                    foreach ($transaksinya as $transaksi) : ?>
                        <tr>
                            <td><?= $a++ ?></td>
                            <td><?= $transaksi['nama_obat'] ?></td>
                            <td><?= $transaksi['jumlah'] ?></td>
                            <td><?= $transaksi['harga'] ?></td>
                            <td><?= $transaksi['waktu_transaksi'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>