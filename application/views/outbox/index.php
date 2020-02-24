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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newOutboxModal"> Tambah Barang Keluar</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Rekanan</th>
                        <th scope="col">No BAS</th>
                        <th scope="col">Tanggal BAS</th>
                        <th scope="col">Kepada</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Petugas</th>
                        <th scope="col">tanggal</th>
                        <th scope="col" width="17%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($outbox as $obx) : ?>
                        <tr>
                            <th><?= ++$start; ?></th>
                            <td><?= $obx['nama_obat']; ?></td>
                            <td><?= $obx['nama_supplier']; ?></td>
                            <td><?= $obx['no_bas']; ?></td>
                            <td><?= $obx['tgl_bas']; ?></td>
                            <td><?= $obx['kepada']; ?></td>
                            <td><?= $obx['ket']; ?></td>
                            <td><?= $obx['petugas']; ?></td>
                            <td><?= $obx['tanggal']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>outbox/aksiOutboxModal/<?= $obx['id_keluar']; ?>" class="badge badge-primary float-left" data-toggle="modal" data-target="#aksiOutboxModal<?= $obx['id_keluar']; ?>">Tambah</a>
                                <a href="<?= base_url(); ?>outbox/editOutboxModal/<?= $obx['id_keluar']; ?>" class="badge badge-success float-left" data-toggle="modal" data-target="#editOutboxModal<?= $obx['id_keluar']; ?>">Ubah</a>
                                <a href="<?= base_url(); ?>outbox/hapus/<?= $obx['id_keluar']; ?>" class="badge badge-danger float-left" onclick="return confirm('Apakah anda yakin?');"> Hapus</a>
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
<div class="modal fade" id="newOutboxModal" tabindex="-1" role="dialog" aria-labelledby="newOutboxModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newOutboxModal">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('outbox'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="id_obat" id="id_obat" class="form-control">
                            <?php foreach ($obat as $obt) : ?>
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
                        <select name="kepada" id="kepada" class="form-control">
                            <?php foreach ($kepada as $kpd) : ?>
                                <option value=" <?= $kpd['id']; ?>"><?= $kpd['kepada']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="tanggal">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="ket" name="ket" placeholder="keterangan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="petugas" name="petugas" value="<?= $nama['name']; ?>">
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
<?php foreach ($outbox as $obx) : ?>
    <div class="modal fade" id="editOutboxModal<?= $obx['id_keluar']; ?>" tabindex="-1" role="dialog" aria-labelledby="editOutboxModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOutboxModal">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('outbox/ubah'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id" value="<?= $obx['id_keluar']; ?>" />
                        <div class="form-group">
                            <select name="id_obat" id="id_obat" class="form-control">
                                <?php foreach ($obat as $obt) : ?>
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
                            <select name="kepada" id="kepada" class="form-control">
                                <?php foreach ($kepada as $kpd) : ?>
                                    <option value=" <?= $kpd['id']; ?>"><?= $kpd['kepada']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="ket" name="ket" value="<?= $obx['ket']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="petugas" name="petugas" value="<?= $obx['petugas']; ?>">
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
<?php foreach ($outbox as $obx) : ?>
    <div class="modal fade" id="aksiOutboxModal<?= $obx['id_keluar']; ?>" tabindex="-1" role="dialog" aria-labelledby="aksiOutboxModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aksiOutboxModal">Jumlah Obat Keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('outbox/aksi'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="id_keluar" name="id_keluar" value="<?= $obx['id_keluar']; ?>" />
                        <div class="form-group">
                            <input type="text" class="form-control" id="id_obat" name="id_obat" value="<?= $obx['id_obat']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $obx['harga']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="petugas" name="petugas" value="<?= $obx['petugas']; ?>">
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