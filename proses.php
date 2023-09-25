<?php
include 'koneksi.php'; 

    if  (isset($_POST['aksi'])){
        if ($_POST['aksi']=="tambah"){
            //untuk menampilkan databse ke dalam form
            $nisn=$_POST['nisn'];
            $nama_siswa=$_POST['nama_siswa'];
            $jenis_kelamin=$_POST['jenis_kelamin'];
            $foto_siswa=$_FILES['foto_siswa']['name'];
            $alamat=$_POST['alamat'];

            $query="INSERT INTO tb_siswa VALUES(null,'$nisn','$nama_siswa', '$jenis_kelamin', '$foto_siswa', '$alamat')";
            $sql = mysqli_query($conn, $query);

            //tempat simpan file foto
            $directory = "assets/img/";
            $tmpfile = $_FILES['foto_siswa']['tmp_name'];
            move_uploaded_file($tmpfile, $directory . $foto_siswa);
            // die();
            if  ($sql){
                header("location:index.php");
                //echo "Data berhasil ditambhakan <a href='index.php'>[Home]</a>";
            }else{
                echo $query;
            }

 
        }else if ($_POST['aksi']=="edit"){
        //untuk mempost kehalaman   data yg udah kita edit
        $id_siswa=$_POST['id_siswa'];
        $nisn = $_POST['nisn'];
        $nama_siswa = $_POST['nama_siswa'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $foto_siswa = $_FILES['foto_siswa']['name'];
        $alamat = $_POST['alamat'];

        $query = "UPDATE tb_siswa SET nisn='$nisn', nama_siswa='$nama_siswa', jenis_kelamin='$jenis_kelamin', foto_siswa='$foto_siswa', alamat='$alamat' WHERE id_siswa='$id_siswa'; ";
        $sql= mysqli_query($conn,$query);
        $queryshow = "SELECT * FROM tb_siswa WHERE id_siswa='$id_siswa'";
        $sqlshow = mysqli_query($conn, $queryshow);
        $result = mysqli_fetch_assoc($sqlshow);
         if($_FILES['foto_siswa']['name'] == ""){
            $foto_siswa = $result['foto_siswa'];
        }else{
            $foto_siswa=  $_FILES['foto_siswa']['name'];
            unlink("assets/img/".$result['foto_siswa']);
            move_uploaded_file($_FILES['foto_siswa']['tmp_name'], 'assets/img/'.$_FILES['foto_siswa']['name']);
        }

        //untuk kembali ke halaman admin kelola
        if ($sql) {
            header("location:index.php");
            //echo "Data berhasil ditambhakan <a href='index.php'>[Home]</a>";
        } else {
            echo $query;
        }
        }
    }

    if(isset($_GET['hapus'])){
        $id_siswa=$_GET['hapus'];

        //untuk menghapus file foto dalam directory img
        $queryshow = "SELECT * FROM tb_siswa WHERE id_siswa='$id_siswa'";
        $sqlshow = mysqli_query($conn, $queryshow);
        $result = mysqli_fetch_assoc($sqlshow);
        unlink("assets/img/".$result['foto_siswa']);

        
        $query="DELETE FROM tb_siswa  WHERE id_siswa ='$id_siswa'";
         $sql=mysqli_query($conn, $query);
        if ($sql) {
            header("location:admin_kelola.php");
            //echo "Data berhasil ditambhakan <a href='index.php'>[Home]</a>";
        } else {
            echo $query;
        }
    
    }


        
       
    
?>