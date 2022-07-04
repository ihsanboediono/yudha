<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <?= $this->session->flashdata('pesan'); ?>
            <h4 class="card-title">Manage Data Barang Keluar <a href="<?= base_url('barangkeluar/tambah_barangkeluar') ?>" class="btn btn-primary purchase-button btn-sm my-1 my-sm-0 ml-auto" style="float: right;">Tambah</a></h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width='5%'>No.</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Deskripsi</th>
                        <th>Kepada</th>
                        <th>Waktu Keluar</th>
                        <th colspan="2" width='10%'>
                            <center>Aksi</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1;
                    foreach ($brgklr as $barang_keluar) : ?>
                        <tr>
                            <td><?= $a++ ?></td>
                            <td><?= $barang_keluar['nama'] ?></td>
                            <td><?= $barang_keluar['jumlah'] ?></td>
                            <td><?= $barang_keluar['deskripsi'] ?></td>
                            <td><?= $barang_keluar['tanggal_keluar'] ?></td>
                            <td><a href="<?= base_url('barangkeluar/edit_barangkeluar/') . $barang_keluar['idbarang_keluar'] ?>"><i class="icon-note menu-icon"></i></a>
                            </td>
                            <td onclick="javascript: return confirm('Anda yakin hapus?')"><a href="<?= base_url('barangkeluar/hapus_barangkeluar/') . $barang_keluar['idbarang_keluar'] ?>"><i class="icon-trash menu-icon"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>