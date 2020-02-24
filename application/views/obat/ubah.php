<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->


  <div class="container">
    <div class="row mt-3">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Form Ubah Data Master
          </div>
          <div class="card-body">
            <form action="" method="post">
              <input type="hidden" name="id" value="<?= $obat['id']; ?>" />
              <div class="form-group">
                <label for="nama_obat">Nama</label>
                <input type="text" name="nama_obat" class="form-control" id="nama_obat" value="<?= $obat['nama_obat']; ?>">
                <small class="form-text text-danger"><?= form_error('nama_obat'); ?></small>
              </div>

              <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" name="satuan" class="form-control" id="satuan" value="<?= $obat['satuan']; ?>">
                <small class="form-text text-danger"><?= form_error('satuan'); ?></small>
              </div>
              <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" class="form-control" id="status" value="<?= $obat['status']; ?>">
                <small class="form-text text-danger"><?= form_error('status'); ?></small>
              </div>
              <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->