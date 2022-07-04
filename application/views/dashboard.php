<div class="col-md-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="d-sm-flex align-items-baseline report-summary-header">
            <h5 class="font-weight-semibold">Laporan Singkat</h5>
            <!-- <span class="ml-auto">Updated Report</span>  -->
            <!-- <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button> -->
          </div>
        </div>
      </div>
      <div class="row report-inner-cards-wrapper">
        <a href="<?= base_url('/Laporan'); ?>" class="col-md-6 col-xl report-inner-card text-decoration-none">
          <div class="inner-card-text">
            <span class="report-title">Riwayat Transaksi</span>
            <h4 class="text-dark"><?= $brg; ?></h4>
            <!-- <span class="report-count"> 9 Reports</span> -->
          </div>
          <div class="inner-card-icon bg-primary">
            <i class="icon-layers"></i>
          </div>
        </a>
        <a href="<?= base_url('/barang'); ?>" class="col-md-6 col-xl report-inner-card text-decoration-none">
          <div class="inner-card-text">
            <span class="report-title">Tambah Data</span>
            <h4 class="text-dark"><?= $pms; ?></h4>
            <!-- <span class="report-count"> 3 Reports</span> -->
          </div>
          <div class="inner-card-icon bg-danger">
            <i class="icon-people"></i>
          </div>
        </a>
        <a href="<?= base_url('/konsumen'); ?>" class="col-md-6 col-xl report-inner-card text-decoration-none">
          <div class="inner-card-text">
            <span class="report-title">Analisa</span>
            <h4 class="text-dark"><?= $ksm; ?></h4>
            <!-- <span class="report-count"> 5 Reports</span> -->
          </div>
          <div class="inner-card-icon bg-warning">
            <i class="icon-people"></i>
          </div>
        </a>
        <a href="<?= base_url('/Backup'); ?>" class=" col-md-6 col-xl report-inner-card text-decoration-none">
          <div class="inner-card-text">
            <span class="report-title">Backup</span>
            <h4 class="text-dark"><?= $trs; ?></h4>
            <!-- <span class="report-count"> 2 Reports</span> -->
          </div>
          <div class="inner-card-icon bg-success">
            <i class="icon-basket-loaded"></i>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>