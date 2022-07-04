<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <?= $this->session->flashdata('pesan'); ?>
            <h4 class="card-title">Manage Data Barang Masuk <a href="<?= base_url('barangmasuk/tambah_barangmasuk') ?>" class="btn btn-primary purchase-button btn-sm my-1 my-sm-0 ml-auto" style="float: right;">Tambah</a></h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width='5%'>No.</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Deskripsi</th>
                        <th>Kepada</th>
                        <th>Waktu Masuk</th>
                        <th colspan="2" width='10%'>
                            <center>Aksi</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1;
                    foreach ($brgmsk as $barang_masuk) : ?>
                        <tr>
                            <td><?= $a++ ?></td>
                            <td><?= $barang_masuk['nama'] ?></td>
                            <td><?= $barang_masuk['jumlah'] ?></td>
                            <td><?= $barang_masuk['deskripsi'] ?></td>
                            <td><?= $barang_masuk['tanggal_masuk'] ?></td>
                            <td><?= $barang_masuk['waktu_masuk'] ?></td>
                            <td><a href="<?= base_url('barangmasuk/edit_barangmasuk/') . $barang_masuk['idbarang_masuk'] ?>"><i class="icon-note menu-icon"></i></a>
                            </td>
                            <td onclick="javascript: return confirm('Anda yakin hapus?')"><a href="<?= base_url('barangmasuk/hapus_barangmasuk/') . $barang_masuk['idbarang_masuk'] ?>"><i class="icon-trash menu-icon"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>