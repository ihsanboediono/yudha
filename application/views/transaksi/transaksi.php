<div class="col-lg-4 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<form method="post" action="<?= site_url('transaksi'); ?>">

				<div class="form-group">
					<label>Tanggal</label>
					<input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d'); ?>" disabled>
				</div>
				<?php if ($transaksi == null) : ?>
					<div class="form-group">
						<label>Pilih Pemasok atau Konsumen</label>
						<select class="js-example-basic-single" style="width:100%" name="kepada">
							<option value=""> - Pilih - </option>
							<?php foreach ($pemasoknya as $pemasok) : ?>
								<option value="<?= $pemasok['id_pengguna']; ?>" data-ket="pemasok">Pemasok <?= $pemasok['nama_pengguna']; ?> </option>
							<?php endforeach ?>
							<?php foreach ($konsumennya as $konsumen) : ?>
								<option value="<?= $konsumen['id_pengguna']; ?>" data-ket="konsumen">Konsumen <?= $konsumen['nama_pengguna']; ?> </option>
							<?php endforeach ?>
						</select>
						<?= form_error('kepada', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label>Pilih Tipe </label>
						<select class="js-example-basic-single" style="width:100%" name="type">
							<option value="masuk">Masuk</option>
							<option value="keluar">Keluar</option>

						</select>
						<?= form_error('type', '<small class="text-danger">', '</small>'); ?>
					</div>
				<?php else : ?>
					<div class="form-group">
						<label>Pilih Pemasok atau Konsumen</label>
						<select class="js-example-basic-single" style="width:100%" name="kepada" id="kepada" disabled>
							<option value=""> - Pilih - </option>
							<?php foreach ($pemasoknya as $pemasok) : ?>
								<option value="<?= $pemasok['id_pengguna']; ?>" <?= $transaksi['kepada'] == $pemasok['id_pengguna'] ? "selected" : ""; ?>>Pemasok <?= $pemasok['nama_pengguna']; ?> </option>
							<?php endforeach ?>
							<?php foreach ($konsumennya as $konsumen) : ?>
								<option value="<?= $konsumen['id_pengguna']; ?>" <?= $transaksi['kepada'] == $konsumen['id_pengguna'] ? "selected" : ""; ?>>Konsumen <?= $konsumen['nama_pengguna']; ?> </option>
							<?php endforeach ?>
						</select>
						<?= form_error('kepada', '<small class="text-danger">', '</small>'); ?>
					</div>
					<div class="form-group">
						<label>Pilih Tipe </label>
						<select class="js-example-basic-single" style="width:100%" name="type" disabled>
							<option value="masuk" <?= $transaksi['type'] == "masuk" ? "selected" : ""; ?>>Masuk</option>
							<option value="keluar" <?= $transaksi['type'] == "keluar" ? "selected" : ""; ?>>Keluar</option>

						</select>
						<?= form_error('type', '<small class="text-danger">', '</small>'); ?>
					</div>
				<?php endif ?>
				<button type="submit" name="transaksi" class="btn btn-sm btn-success" style="float: right;">Tambah</button>
				<a href="<?= base_url('transaksi/cancel'); ?>" class="btn btn-sm btn-danger mr-2" style="float: right;">Cencel</a>
			</form>
		</div>
	</div>

</div>
<div class="col-lg-4 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<form method="post" action="<?= site_url('transaksi'); ?>">
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
<div class="col-lg-4 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h2 class="total" style="float: right;"><?= rupiah($total['total']); ?></h2>
			<form method="post" action="<?= site_url('transaksi/selesai'); ?>">

				<div class="form-group" style="margin-top: 70px;">
					<label>Nominal</label>
					<input type="hidden" name="total" value="<?= $total['total']; ?>">
					<input type="hidden" name="jumlah" value="<?= $total['jumlah']; ?>">
					<input type="text" name="nominal" class="form-control" value="<?= !empty($this->session->flashdata('old_nominal')) ? $this->session->flashdata('old_nominal') : ''; ?>" autocomplete="off">
					<input type="hidden" name="data1" value="">
					<!-- <?= form_error('nominal', '<small class="text-danger">', '</small>'); ?> -->
					<?= $this->session->flashdata('nominal'); ?>
				</div>
				<div class="form-group">
					<label id="keterangan">Kembalian</label>
					<input type="text" name="kembalian" class="form-control" value="<?= !empty($this->session->flashdata('old_kembalian')) ? $this->session->flashdata('old_kembalian') : ''; ?>">
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
				<button type="submit" name="selesai" class="btn btn-success" style="float: right;">Selesai</button>
			</form>
		</div>
	</div>
</div>


<div class="col-lg-12 grid-margin stretch-card">
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
							<td onclick="javascript: return confirm('Anda yakin hapus?')"><a href="<?= base_url('transaksi/barang_hapus/') . $detail['id_detail'] ?>"><i class="icon-trash menu-icon"></i></a></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
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
</script>