<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
</head>

<body>
    <h1>DATA PEMBAYARAN</h1>
    <table style="font-size: 14px; font-weight: bold;">
        <tr>
            <td>Email</td>
            <td>:</td>
            <td><?php echo $this->session->userdata('email') ?></td>
        </tr>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td><?php echo $this->session->userdata('username') ?></td>
        </tr>
    </table>
    <hr>
    <br>
    <table border="1">
        <tr style="font-weight: bold;">
            <td>No</td>
            <td>Id</td>
            <td>Nama Guru</td>
            <td>NIK</td>
            <td>Gender</td>
            <td>Mapel</td>
            <td>Kelas</td>
        </tr>
        <?php $no= 1; 
		foreach ($data_pembayaran as $key) { ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $key->id ?></td>
            <td><?php echo $key->nama_guru ?></td>
            <td><?php echo $key->nik ?></td>
            <td><?php echo $key->gender ?></td>
            <td><?php echo $key->mapel ?></td>
            <td><?php echo tampil_walikelas_byid($key->id_walikelas) ?></td>
        </tr>
        <?php } ?>
    </table>


</body>

</html>