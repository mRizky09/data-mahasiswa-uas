<!DOCTYPE html>
<?php
include 'koneksi.php';
$nisn = '';
$nama_siswa = '';
$jenis_kelamin = '';
$alamat = '';

////untuk ketika klik edit data YG SEBELUMNYA sudah ada untuk diedit
if (isset($_GET['ubah'])) {
    $id_siswa = $_GET['ubah'];
    $query = "SELECT *FROM tb_siswa WHERE id_siswa='$id_siswa' ;";
    $sql = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($sql);

    $nisn = $result['nisn'];
    $foto_siswa = $result['foto_siswa'];
    $nama_siswa = $result['nama_siswa'];
    $jenis_kelamin = $result['jenis_kelamin'];
    $alamat = $result['alamat'];


    // var_dump($result);
    // die();
}
?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/kelola.css">
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
            <li><a href="index.php">Home</a></li>
            <li>|</li>
            <li><a href="profile.php">Profile Kelompok</a></li>

        </ul>

        <label for="check" class="mobile-menu"><i class="fa-solid fa-bars fa-2x"></i></i></label>
    </div>

    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_siswa; ?>" name="id_siswa">
            <div class="mb-3 row">
                <label for="nisn" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input required type="text" name="nisn" class="form-control" id="nisn" placeholder="Masukan Nisn Dengan Benar" value="<?php echo $nisn ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_siswa" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input required type="text" name="nama_siswa" class="form-control" id="nama_siswa" placeholder="Masukan Nama Dengan Benar" value="<?php echo $nama_siswa ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select required id="jenis_kelamin" name="jenis_kelamin" class="form-select" aria-label="Default select example">
                        <option <?php if ($jenis_kelamin == 'Laki-laki') {
                                    echo "selected";
                                } ?> value="Laki-laki">Laki-laki</option>
                        <option <?php if ($jenis_kelamin == 'Perempuan') {
                                    echo "selected";
                                } ?> value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="foto_siswa" class="col-sm-2 col-form-label">Foto Siswa</label>
                <div class="col-sm-10">
                        <input required <?php if (!isset($_GET['ubah'])) {
                                            echo 'required';
                                        } ?> class="form-control" type="file" name="foto_siswa" id="foto_siswa" accept="image/*">
                
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                        <textarea required class="form-control" name="alamat" id="alamat" rows="3"><?php echo $alamat ?></textarea>
                </div>
            </div>

            <div class="mb-3 row mL-4">
                <div class="col">

                    <?php
                    if (isset($_GET['ubah'])) {

                    ?>


                        <button type="submit" name="aksi" value="edit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan</button>
                    <?php
                    } else {
                    ?>
                        <button type="submit" name="aksi" value="tambah" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Tambahkan</button>
                    <?php
                    }
                    ?>
                    <a href="admin_kelola.php" type="button" class="btn btn-danger"> <i class="fa-solid fa-reply"></i> Batal </a>
                </div>
            </div>
        </form>
    </div>


</body>

</html>