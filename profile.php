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
    <link rel="stylesheet" href="./assets/css/profile1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Crud</title>
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

        <div class="profile-box">
            <img class="profile-img" src="./assets/img/fotoikihitam.jpg" alt="Profile Image">
            <h2>M.Rizky</h2>
            <p>210170124</p>
            <div class="btn">
                <a href="https://wa.link/vmdrh8" type="button"><i class="bi bi-whatsapp"></i></a>
            </div>
        </div>

        <div class="profile-box">
            <img class="profile-img" src="./assets/img/pp3.jpg" alt="Profile Image">
            <h2>M.Sultan Yordania</h2>
            <p>210170143</p>
            <div class="btn">
                <a href="https://wa.link/aovet0" type="button"><i class="bi bi-whatsapp"></i></a>
            </div>
        </div>

        <div class="profile-box">
            <img class="profile-img" src="./assets/img/pp2.jpg" alt="Profile Image">
            <h2>Fathul Hadi</h2>
            <p>210170288</p>
            <div class="btn">
                <a href="https://wa.link/6sqtup" type="button"><i class="bi bi-whatsapp"></i></a>
            </div>
        </div>
    </div>


</body>

</html>