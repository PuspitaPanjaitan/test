<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="container">
        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="div row mt-3">
                <div class="row md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data obat<strong> berhasil </strong> ditambahkan <?= $this->session->flashdata('flash'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row mt-3">
            <div class="col-md-6">
                <a href="<?= base_url() ?>obat/tambah" class="btn btn-primary">Tambah Data Obat </a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Obat" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <h3>Daftar Obat</h3>
                <?php if (empty($obat)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data tidak ada!
                    </div>
                <?php endif; ?>
                <ul class="list-group">
                    <?php foreach ($obat as $obt) : ?>
                        <li class="list-group-item"><?= $obt['nama_obat']; ?>
                            <a href="<?= base_url(); ?>obat/hapus/<?= $obt['id']; ?>" class="badge badge-danger float-right" onclick="return confirm('Apakah anda yakin?');"> Hapus</a>
                            <a href="<?= base_url(); ?>obat/ubah/<?= $obt['id']; ?>" class="badge badge-success float-right">Ubah</a>
                            <a href="<?= base_url(); ?>obat/detail/<?= $obt['id']; ?>" class="badge badge-primary float-right">Detail</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->