<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="container">
        <div class="row mt-3">
            <div class="row md-6">
                <div class="card">
                    <div class="card-header">
                        Detail Obat
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $obat['nama_obat']; ?></h5>
                        <p class="card-text">Data Obat ditambahkan Oleh : <?= $obat['modified_by']; ?></p>
                        <p class="card-text">Tanggal Penambahan data Master Obat : <?= $obat['modified_on']; ?></p>
                        <p class="card-text">Satuan Obat: <?= $obat['satuan']; ?></p>
                        <p class="card-text">Status Obat : <?= $obat['status']; ?></p>
                        <a href="<?= base_url(); ?>obat" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->