<div class="container-fluid">

</div>
<div class="container-fluid">
	<div class="row d-flex justify-content-center">
		<div class="col-lg-12">
			<div class="card mb-4">
				<div class="card-header">
					Backup data
				</div>
				<div class="card-body">
					<ul>
						<li>File yang akan dibackup berupa file berformat .zip</li>
						<li>File berformat .zip berisi database dari data sistem yang sekarang</li>
						<li>Pastikan Anda mengetahui lokasi folder/file yang akan Anda backup</li>
						<li>Setelah semua OK, silakan lakukan backup file. Terimakasih</li>
					</ul>
					<div class="text-left ml-2">
						<a href="<?= base_url('/backup/backup'); ?>"><button class="btn btn-success">Backup</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>