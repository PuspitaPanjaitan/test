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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRekanModal"> Tambah Data Obat</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Rekanan</th>
                        <th scope="col">No. Kontrak</th>
                        <th scope="col">Tanggal Kontrak</th>
                        <th scope="col">No. BAS</th>
                        <th scope="col">Tanggal BAS</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Status</th>
                        <th scope="col" width="17%">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($rekan as $rkn) : ?>

                        <tr>
                            <th><?= ++$start; ?></th>
                            <td><?= $rkn['nama_supplier']; ?></td>
                            <td><?= $rkn['no_kontrak']; ?></td>
                            <td><?= $rkn['tgl_kontrak']; ?></td>
                            <td><?= $rkn['no_bas']; ?></td>
                            <td><?= $rkn['tgl_bas']; ?></td>
                            <td><?= $rkn['keterangan']; ?></td>
                            <td><?= $rkn['status_keterangan']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>rekan/editRekanModal/<?= $rkn['id_supplier']; ?>" class="badge badge-success float-left" data-toggle="modal" data-target="#editRekanModal<?= $rkn['id_supplier']; ?>">Ubah</a>
                                <a href="<?= base_url(); ?>rekan/hapus/<?= $rkn['id_supplier']; ?>" class="badge badge-danger float-left" onclick="return confirm('Apakah anda yakin?');"> Hapus</a>
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
<div class="modal fade" id="newRekanModal" tabindex="-1" role="dialog" aria-labelledby="newRekanModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRekanModal">Tambah Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('rekan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Nama Supplier">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="petugas" name="petugas" value="<?= $nama['name']; ?>">
                    </div>
                    <div class=" form-group">
                        <input type="text" class="form-control" id="no_kontrak" name="no_kontrak" placeholder="No Kontrak">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tanggal1" name="tanggal1" placeholder="Tanggal Kontrak">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="no_bas" name="no_bas" placeholder="No BAS">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tanggal2" name="tanggal2" placeholder="Tanggal BAS">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="status_keterangan" id="status_keterangan" checked>
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
<?php foreach ($rekan as $rkn) : ?>
    <div class="modal fade" id="editRekanModal<?= $rkn['id_supplier']; ?>" tabindex="-1" role="dialog" aria-labelledby="editRekanModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRekanModal">Ubah Rekanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('rekan/ubah'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id" value="<?= $rkn['id_supplier']; ?>" />
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="<?= $rkn['nama_supplier']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="no_kontrak" name="no_kontrak" value="<?= $rkn['no_kontrak']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="no_bas" name="no_bas" value="<?= $rkn['no_bas']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $rkn['keterangan']; ?>">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="status_keterangan" id="status_keterangan" checked>
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
        var date_input = $('input[name="tanggal1"]'); //our date input has the name "date"
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

<script>
    $(document).ready(function() {
        var date_input = $('input[name="tanggal2"]'); //our date input has the name "date"
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