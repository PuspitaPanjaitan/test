<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Form Laporan
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('laporan/tambah'); ?>" method="post">
                            <div class="form-group">
                                <label for="nama_gudang">Tanggal 1</label>
                                <input type="text" name="tanggal1" class="form-control" id="tanggal1">
                                <small class="form-text text-danger"><?= form_error('tanggal1'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="user">Tanggal 2</label>
                                <input type="text" name="tanggal2" class="form-control" id="tanggal2">
                                <small class="form-text text-danger"><?= form_error('tanggal2'); ?></small>
                            </div>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
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