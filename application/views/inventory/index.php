<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newObat"> Tambah Data Obat</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Obat</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Petugas</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Gudang</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($stok as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $s['kode_obat']; ?></td>
                            <td><?= $s['nama_obat']; ?></td>
                            <td><?= $s['modified_by']; ?></td>
                            <td><?= $s['modified_on']; ?></td>
                            <td><?= $s['nama_supplier']; ?></td>
                            <td><?= $s['harga']; ?></td>
                            <td><?= $s['nama_gudang']; ?></td>
                            <td><?= $s['status_obat']; ?></td>
                            <td>
                                <?php foreach ($detail as $dtl) : ?>
                                    <a href="<?= base_url(); ?>dataObat/ubah/<?= $dtl['id']; ?>" class="badge badge-success float-right" data-toggle="modal" data-target="#ubahObatModal">Ubah</a>
                                    <a href="<?= base_url(); ?>dataObat/hapus/<?= $dtl['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Apakah anda yakin?');"> Hapus</a>
                            </td>
                        <?php endforeach; ?>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newObat" tabindex="-1" role="dialog" aria-labelledby="newObat" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newObat">Tambah Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('DataObat'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="kode_obat" name="kode_obat" placeholder="Kode Obat">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="Nama Obat">
                    </div>
                    <div class="form-group">
                        <input type="text" name="modified_by" class="form-control" id="modified_by" value="<?= $nama['name']; ?>">
                    </div>
                    <div class="form-group">
                        <select name="id_supplier" id="id_supplier" class="form-control">
                            <?php foreach ($rekan as $rkn) : ?>
                                <option value=" <?= $rkn['id']; ?>"><?= $rkn['nama_supplier']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
                    </div>
                    <div class="form-group">
                        <select name="id_gudang" id="id_gudang" class="form-control">
                            <?php foreach ($gudang as $gdg) : ?>
                                <option value=" <?= $gdg['id']; ?>"><?= $gdg['nama_gudang']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="status" id="status" checked>
                            <label class="form-check-label" for="status">
                                Aktif?
                            </label>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>