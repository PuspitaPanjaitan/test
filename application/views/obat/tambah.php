<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="container">
    <div class="row mt-3">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Form Tambah Data Master
          </div>
          <div class="card-body">
            <form action="" method="post">
              <div class="form-group">
                <label for="nama_obat">Nama</label>
                <input type="text" name="nama_obat" class="form-control" id="nama_obat">
                <small class="form-text text-danger"><?= form_error('nama_obat'); ?></small>
              </div>
              <div class="form-group">
                <label for="satuan_beli">Satuan</label>
                <input type="text" name="satuan" class="form-control" id="satuan">
                <small class="form-text text-danger"><?= form_error('satuan'); ?></small>
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" class="form-control" id="status">
                <small class="form-text text-danger"><?= form_error('status'); ?></small>
              </div>
              <div class="form-group">
                <label for="modified_by">Petugas</label>
                <input type="text" name="modified_by" class="form-control" id="modified_by" value="<?= $nama['name']; ?>">
                <small class="form-text text-danger"><?= form_error('modified_by'); ?></small>
              </div>
              <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->