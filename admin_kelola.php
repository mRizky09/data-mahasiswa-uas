<?php
include 'koneksi.php';
$query = "SELECT * FROM tb_siswa;";
$sql = mysqli_query($conn, $query);
$no = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/admin.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>

<body>
    <input type="checkbox" id="check">
    <div class="sidebar">
        <ul>
            <li><a href="index.php">Home</a></li>

            <li><a href="profile.php">Profile Kelompok</a></li>
        </ul>
    </div>

    <div class="navbar">
        <div class="logo">
            <a href="#">
                <h2>Data Mahasiswa</h2>
            </a>
        </div>

        <ul class="navigation">
            <li><a href="#">Home</a></li>
            <li>|</li>
            <li><a href="profile.php">Profile Kelompok</a></li>

        </ul>

        <label for="check" class="mobile-menu"><i class="fa-solid fa-bars fa-2x"></i></i></label>
    </div>


    <div class="container">
        <figure>
            <blockquote class="blockquote">
                <p>Tambahkan Data Baru</p>
            </blockquote>

        </figure>

        <a href="kelola.php" type="button" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah Data </a>

        <div class="table-responsive ">

            <table class="table align-middle table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                            <center>No.</center>
                        </th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa/Mahasiswi</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto Siswa</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($result = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                            <td>
                                <center><?php echo ++$no ?>.</center>
                            </td>

                            <td><?php echo $result['nisn']; ?></td>
                            <td><?php echo $result['nama_siswa']; ?></td>
                            <td><?php echo $result['jenis_kelamin']; ?></td>
                            <td>
                                <img src="assets/img/<?php echo $result['foto_siswa'];  ?> " style="width: 100px;" height="100px">
                            </td>
                            <td><?php echo $result['alamat']; ?></td>
                            <td>
                                <a href="kelola.php?ubah=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-danger btn-sm" onclick="return confirm ('Apakah anda yakin ingin menghapus data tersebut?')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>


</body>

</html>