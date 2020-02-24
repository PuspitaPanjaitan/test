<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Form Ubah Data Gudang
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $gudang['id']; ?>" />
                            <div class="form-group">
                                <label for="nama_gudang">Nama</label>
                                <input type="text" name="nama_gudang" class="form-control" id="nama_gudang" value="<?= $gudang['nama_gudang']; ?>">
                                <small class="form-text text-danger"><?= form_error('nama_gudang'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="satuan_beli">User</label>
                                <input type="text" name="user" class="form-control" id="user" value="<?= $gudang['user']; ?>">
                                <small class="form-text text-danger"><?= form_error('user'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" name="status" class="form-control" id="status" value="<?= $gudang['status']; ?>">
                                <small class="form-text text-danger"><?= form_error('status'); ?></small>
                            </div>
                            <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="row mb-3"></div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->