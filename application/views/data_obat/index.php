<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

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
                        <th scope="col">Rekanan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Satuan</th>
                        <th scope="col" width="13%">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($stok as $s) : ?>

                        <tr>
                            <th><?= ++$start; ?></th>
                            <td><?= $s['kode_obat']; ?></td>
                            <td><?= $s['nama_obat']; ?></td>
                            <td><?= $s['nama_supplier']; ?></td>
                            <td><?= $s['harga']; ?></td>
                            <td><?= $s['status']; ?></td>
                            <td><?= $s['satuan']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>dataObat/editObatModal/<?= $s['id_obat']; ?>" class="badge badge-success float-left" data-toggle="modal" data-target="#editObatModal<?= $s['id_obat']; ?>">Ubah</a>
                                <a href="<?= base_url(); ?>dataObat/hapus/<?= $s['id_obat']; ?>" class="badge badge-danger float-left" onclick="return confirm('Apakah anda yakin?');"> Hapus</a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<!-- End of Main Content -->
</div>
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

            <form action="<?= base_url('dataObat'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="kode_obat" name="kode_obat" placeholder="Kode Obat">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="Nama Obat">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="petugas" name="petugas" value="<?= $nama['name']; ?>">
                    </div>
                    <div class="form-group">
                        <select name="id_supplier" id="id_supplier" class="form-control">
                            <?php foreach ($rekan as $rkn) : ?>
                                <option value=" <?= $rkn['id']; ?>"><?= $rkn['nama_supplier']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
                    </div>
                    <div class="form-group">
                        <select name="id_satuan" id="id_satuan" class="form-control">
                            <?php foreach ($satuan as $satu) : ?>
                                <option value=" <?= $satu['id']; ?>"><?= $satu['satuan']; ?></option>
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

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<?php foreach ($stok as $s) : ?>
    <div class="modal fade" id="editObatModal<?= $s['id_obat']; ?>" tabindex="-1" role="dialog" aria-labelledby="editObatModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editObatModal">Edit Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('dataObat/ubah'); ?>" method="post">

                    <div class="modal-body">
                        <input type="hidden" id="id" name="id" value="<?= $s['id_obat']; ?>" />
                        <div class="form-group">
                            <input type="text" class="form-control" id="kode_obat" name="kode_obat" value="<?= $s['kode_obat']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?= $s['nama_obat']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="petugas" class="form-control" id="petugas" value="<?= $s['petugas']; ?>">
                        </div>
                        <div class="form-group">
                            <select name="id_supplier" id="id_supplier" class="form-control">
                                <?php foreach ($rekan as $rkn) : ?>
                                    <option value=" <?= $rkn['id']; ?>"><?= $rkn['nama_supplier']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $s['harga']; ?>">
                        </div>
                        <div class="form-group">
                            <select name="id_satuan" id="id_satuan" class="form-control">
                                <?php foreach ($satuan as $satu) : ?>
                                    <option value=" <?= $satu['id']; ?>"><?= $satu['satuan']; ?></option>
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
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script>
    $(document).ready(function() {
        var date_input = $('input[name="tanggal"]'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        var options = {
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
    })
</script>