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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newInboxModal"> Tambah Barang Masuk</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Rekanan</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Anggaran</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Petugas</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col" width="17%">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($inbox as $ibx) : ?>
                        <tr>
                            <th><?= ++$start; ?></th>
                            <td><?= $ibx['nama_obat']; ?></td>
                            <td><?= $ibx['nama_supplier']; ?></td>
                            <td><?= $ibx['tahun_pembuatan']; ?></td>
                            <td><?= $ibx['anggaran']; ?></td>
                            <td><?= $ibx['tanggal']; ?></td>
                            <td><?= $ibx['petugas']; ?></td>
                            <td><?= $ibx['ket']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>inbox/aksiInboxModal/<?= $ibx['id_masuk']; ?>" class="badge badge-primary float-left" data-toggle="modal" data-target="#aksiInboxModal<?= $ibx['id_masuk']; ?>">Tambah</a>
                                <a href="<?= base_url(); ?>inbox/editInboxModal/<?= $ibx['id_masuk']; ?>" class="badge badge-success float-left" data-toggle="modal" data-target="#editInboxModal<?= $ibx['id_masuk']; ?>">Ubah</a>
                                <a href="<?= base_url(); ?>inbox/hapus/<?= $ibx['id_masuk']; ?>" class="badge badge-danger float-left" onclick="return confirm('Apakah anda yakin?');"> Hapus</a>
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
<div class="modal fade" id="newInboxModal" tabindex="-1" role="dialog" aria-labelledby="newInboxModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newInboxModal">Tambah Obat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('inbox'); ?>" method="post">
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
                        <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="tahun_pembuatan" name="tahun_pembuatan" placeholder="Tahun Pembuatan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="anggaran" name="anggaran" placeholder="Anggaran">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="petugas" name="petugas" value="<?= $nama['name']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
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
<?php foreach ($inbox as $ibx) : ?>
    <div class="modal fade" id="editInboxModal<?= $ibx['id_masuk']; ?>" tabindex="-1" role="dialog" aria-labelledby="editInboxModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editInboxModal">Ubah Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('inbox/ubah'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id" value="<?= $ibx['id_masuk']; ?>" />
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
                            <input type="text" class="form-control" id="tahun_pembuatan" name="tahun_pembuatan" value="<?= $ibx['tahun_pembuatan']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="anggaran" name="anggaran" value="<?= $ibx['anggaran']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="petugas" name="petugas" value="<?= $ibx['petugas']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $ibx['ket']; ?>">
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
<?php foreach ($inbox as $ibx) : ?>
    <div class="modal fade" id="aksiInboxModal<?= $ibx['id_masuk']; ?>" tabindex="-1" role="dialog" aria-labelledby="aksiInboxModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aksiInboxModal">Jumlah Obat Masuk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('inbox/aksi'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" id="id_masuk" name="id_masuk" value="<?= $ibx['id_masuk']; ?>" />
                        <div class="form-group">
                            <select name="id_obat" id="id_obat" class="form-control">
                                <?php foreach ($obat as $obt) : ?>
                                    <option value=" <?= $obt['id']; ?>"><?= $obt['nama_obat']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="petugas" name="petugas" value="<?= $ibx['petugas']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $ibx['harga']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah">
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