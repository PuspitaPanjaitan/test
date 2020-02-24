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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newAwalModal"> Tambah Stok Awal</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Rekanan</th>
                        <th scope="col">Anggaran</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Harga</th>
                        <th scope="col" width="17%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($stok as $awal) : ?>
                        <tr>
                            <th><?= ++$start; ?></th>
                            <td><?= $awal['nama_obat']; ?></td>
                            <td><?= $awal['nama_supplier']; ?></td>
                            <td><?= $awal['anggaran']; ?></td>
                            <td><?= $awal['tanggal']; ?></td>
                            <td><?= $awal['harga1']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>awal/aksiAwalModal/<?= $awal['id_stok']; ?>" class="badge badge-primary float-left" data-toggle="modal" data-target="#aksiAwalModal<?= $awal['id_stok']; ?>">Tambah</a>
                                <a href="<?= base_url(); ?>awal/editAwalModal/<?= $awal['id_stok']; ?>" class="badge badge-success float-left" data-toggle="modal" data-target="#editAwalModal<?= $awal['id_stok']; ?>">Ubah</a>
                                <a href="<?= base_url(); ?>awal/hapus/<?= $awal['id_stok']; ?>" class="badge badge-danger float-left" onclick="return confirm('Apakah anda yakin?');"> Hapus</a>
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
<div class="modal fade" id="newAwalModal" tabindex="-1" role="dialog" aria-labelledby="newAwalModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newAwalModal">Tambah Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('awal'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="id_obat" id="id_obat" class="form-control">
                            <?php foreach ($detail as $obt) : ?>
                                <option value=" <?= $obt['id']; ?>"><?= $obt['nama_obat']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_supplier" id="id_supplier" class="form-control">
                            <?php foreach ($rekan as $rkn) : ?>
                                <option value=" <?= $rkn['id']; ?>"><?= $rkn['nama_supplier']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="anggaran" name="anggaran" placeholder="Anggaran">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="petugas" name="petugas" value="<?= $nama['name']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga">
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
<?php foreach ($stok as $awal) : ?>
    <div class="modal fade" id="editAwalModal<?= $awal['id_stok']; ?>" tabindex="-1" role="dialog" aria-labelledby="editAwalModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAwalModal">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('awal/ubah'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id" value="<?= $awal['id_stok']; ?>" />
                        <div class="form-group">
                            <select name="id_obat" id="id_obat" class="form-control">
                                <?php foreach ($detail as $obt) : ?>
                                    <option value=" <?= $obt['id']; ?>"><?= $obt['nama_obat']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="id_supplier" id="id_supplier" class="form-control">
                                <?php foreach ($rekan as $rkn) : ?>
                                    <option value=" <?= $rkn['id']; ?>"><?= $rkn['nama_supplier']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="anggaran" name="anggaran" value="<?= $awal['anggaran']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="petugas" name="petugas" value="<?= $nama['name']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $awal['harga1']; ?>">
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


<!-- Aksi Modal -->
<?php foreach ($stok as $awal) : ?>
    <div class="modal fade" id="aksiAwalModal<?= $awal['id_stok']; ?>" tabindex="-1" role="dialog" aria-labelledby="aksiAwalModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aksiAwalModal">Jumlah Obat Keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('awal/aksi'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="id_stok" name="id_stok" value="<?= $awal['id_stok']; ?>" />
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_obat" name="id_obat" value="<?= $awal['nama_obat']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $awal['harga']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="petugas" name="petugas" value="<?= $awal['petugas']; ?>">
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