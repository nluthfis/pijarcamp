<!DOCTYPE html>
<html>
<head>
<title>Ubah Produk</title>
</head>
<body>
    <?php
    include "connect.php";

    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if (isset($_GET['id_produk'])) {
        $id_produk=input($_GET["id_produk"]);

        $update="SELECT * FROM produk WHERE id_produk=$id_produk";
        $hasil=mysqli_query($connect_db,$update);
        $data = mysqli_fetch_assoc($hasil);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_produk=htmlspecialchars($_POST["id_produk"]);
        $nama_produk=input($_POST["nama_produk"]);
        $keterangan=input($_POST["keterangan"]);
        $harga=input($_POST["harga"]);
        $jumlah=input($_POST["jumlah"]);
        
        $update="UPDATE produk SET nama_produk='$nama_produk',keterangan='$keterangan',harga='$harga',jumlah='$jumlah' WHERE id_produk='$id_produk'";

        $hasil=mysqli_query($connect_db,$update);

        if ($hasil) {
            header("Location:index.php");
        }else {
            echo "Gagal disimpan";
        }
    }
    ?>
    <h2>Update Data</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <label>Nama Produk:</label>
        <input type="text" value="<?php echo $data['nama_produk']; ?>" name="nama_produk" required />

        <label>Keterangan:</label>
        <input type="text" value="<?php echo $data['keterangan']; ?>" name="keterangan" required/>
    
        <label>Harga :</label>
        <input type="text" value="<?php echo $data['harga']; ?>" name="harga" required/>
    
        <label>Jumlah:</label>
        <input type="text" value="<?php echo $data['jumlah']; ?>" name="jumlah"  required/>
       
        <input type="hidden" name="id_produk" value="<?php echo $data['id_produk']; ?>" />

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>