<div class="col-lg-12 mb-3">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('/laporan/keluar') ?>" method="post" enctype="multipart/form-data">
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
                <div>
                    <a href="<?= base_url('laporan') ?>" class="btn btn-primary purchase-button btn-sm my-1 my-sm-0 ml-auto">Laporan Transaksi</a>
                    <a href=" <?= base_url('laporan/masuk') ?>" class="btn btn-primary purchase-button btn-sm my-1 my-sm-0 ml-auto">Laporan Barang Masuk</a>
                    <a href="<?= base_url('laporan/keluar') ?>" class="btn btn-primary purchase-button btn-sm my-1 my-sm-0 ml-auto" style="float: right" ;>Segarkan</a>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <?= $this->session->flashdata('pesan'); ?>
            <h4 class="card-title">Laporan Data Barang Keluar </a></h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width='5%'>No.</th>
                        <th>Nama Barang</th>
                        <th>Konsumen</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Tanggal Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1;
                    foreach ($brgklr as $keluar) : ?>
                        <tr>
                            <td><?= $a++ ?></td>
                            <td><?= $keluar['nama_jenis'] . " " . $keluar['nama_kayu'] ?></td>
                            <td><?= $keluar['nama_pengguna'] ?></td>
                            <td><?= $keluar['jumlah'] ?></td>
                            <td><?= $keluar['total'] ?></td>
                            <td><?= format_indo2($keluar['waktu_transaksi'])  ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>