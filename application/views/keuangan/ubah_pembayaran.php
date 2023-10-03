<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9' crossorigin='anonymous'>
</head>

<body class='min-vh-100 d-flex align-items-center'>
    <div class='card w-50 m-auto p-3 text-center'>
        <h3 class="text-center">Update Data</h3>
        <?php foreach ($pembayaran as $data_pembayaran) : ?>
            <form method="post" action="<?php echo base_url('keuangan/aksi_update_pembayaran') ?>" enctype="multipart/form_data">
                <input name="id" type="hidden" value="<?php echo $data_pembayaran->id ?>">
                <div class="row">
                    <div class="col-6">
                        <label for="kelas" class="form-label">Siswa</label>
                        <select name="id_siswa" class="form-select">
                            <option selected value="<?php echo $data_pembayaran->id_siswa ?>">
                                <?php echo $data_pembayaran->id_siswa ?></option>
                            <?php foreach ($siswa as $row) : ?>
                                <option value="<?php echo $row->id_siswa ?>">
                                    <?php echo $row->nama_siswa ?>
                                </option>
                            <?php endforeach ?>
                        </select>

                    </div>
                    <div class="col-6">
                        <label for="kelas" class="form-label">Jenis Pembayaran</label>
                        <select name="jenis_pembayaran" class="form-select">
                            <option selected value="<?php echo $data_pembayaran->jenis_pembayaran ?>">
                                <?php echo $data_pembayaran->jenis_pembayaran ?></option>
                            <option value="Uang SPP ">Uang SPP</option>
                            <option value="Pembayaran Uang Gedung ">Pembayaran Uang Gedung</option>
                            <option value="Pembayaran Uang Sragam ">Pembayaran Sragam</option>
                        </select>

                    </div>
                    <div class="col-6" style="margin-left: 25%;">
                        <label for="total_pembayaran" class="form-label">Total Pembayaran</label>
                        <input type="number" class="form-control" id="total_pembayaran" name="total_pembayaran" value="<?php echo $data_pembayaran->total_pembayaran ?>">
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary w-100" name="submit">Ubah</button>
            </form>
    </div>
<?php endforeach ?>
</div>
</body>

</html>