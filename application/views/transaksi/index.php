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

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Obat</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok Awal</th>
                        <th scope="col">Stok Awal</th>
                        <th scope="col">Barang Masuk</th>
                        <th scope="col">Total</th>
                        <th scope="col">Barang Keluar</th>
                        <th scope="col">Total</th>
                        <th scope="col">Sisa Stok</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($transaksi as $t) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $t['kode_obat']; ?></td>
                            <td><?= $t['nama_obat']; ?></td>
                            <td><?= $t['harga']; ?></td>
                            <td><?= $t['jumlah_awal']; ?></td>
                            <td><?= $t['total_awal']; ?></td>
                            <td><?= $t['jumlah_masuk']; ?></td>
                            <td><?= $t['total_inbox']; ?></td>
                            <td><?= $t['jumlah_keluar']; ?></td>
                            <td><?= $t['total_outbox']; ?></td>
                            <td><?= $t['sisa_stok']; ?></td>
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