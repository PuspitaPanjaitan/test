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
                        <th scope="col">Barang Masuk</th>
                        <th scope="col">Barang Keluar</th>
                        <th scope="col">Sisa Stok</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($gudang as $gdg) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $ibx['nama_obat']; ?></td>
                            <td><?= $ibx['inbox']; ?></td>
                            <td><?= $ibx['outbox']; ?></td>
                            <td><?= $ibx['sisa']; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End of Main Content -->
</div>