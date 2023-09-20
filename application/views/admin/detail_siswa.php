<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>
    
  <h1 style="text-align:center">DETAIL SISWA </h1>
<div class="row ">
                    <div class="col-12 card p-2">
                        <div class="card-body min-vh-100  align-items-center">
                            <div class="card w-100 m-auto p-5">
                                <?php echo $this->session->set_flashdata('message'); ?>

                             


                                <br>
                                <br>
                                <table class="table  table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No </th>
                                            <th scope="col">Nama </th>
                                            <th scope="col">NISN </th>
                                            <th scope="col"> Gender </th>
                                            <th scope="col"> Kelas </th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($siswa as $row) : $no++
                                        ?>
                                        <tr>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $no ?></td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                <?php echo $row->nama_siswa ?></td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                <?php echo $row->nisn ?></td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                <?php echo $row->gender ?>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                <?php echo tampil_full_kelas_byid($row->id_kelas) ?>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                                                <a href="<?php echo base_url('ADMIN/update_siswa/') . $row->id_siswa ?>"
                                                    class="btn btn-sm btn-primary">Ubah</a>

                                                <button onclick="hapus(<?php echo $row->id_siswa ?>)"
                                                    class="btn btn-sm btn-danger">Hapus</button>
                                            </td>

                                        </tr><?php endforeach ?>

                                    </tbody>
                                </table>

                                <a href="<?php echo base_url('project/tambah_siswa') ?>"
                                    class="inline-block rounded bg-sky-600 px-4 py-2 text-xs font-medium text-white hover:bg-sky-700 text-center btn btn-primary">Tambah</a>
                            </div>
                            </form>



                        </div>
                    </div>

                </div>
                <br>
</body>
</html>