<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="container">
        <div class="row mt-10">
            <div class="row md-10">
                <div class="card">
                    <div class="card-header">
                        Detail Gudang
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $gudang['nama_gudang']; ?></h5>
                        <p class="card-text">Data Gudang ditambahkan oleh : <?= $gudang['user']; ?></p>
                        <p class="card-text">Status Gudang : <?= $gudang['status']; ?></p>
                        <a href="<?= base_url('gudang'); ?>" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->