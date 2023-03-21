<!DOCTYPE html>
<html>
<head>
    <title>Tambah Produk</title>
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama_produk=input($_POST["nama_produk"]);
        $keterangan=input($_POST["keterangan"]);
        $harga=input($_POST["harga"]);
        $jumlah=input($_POST["jumlah"]);

        $add="INSERT INTO produk (nama_produk,keterangan,harga,jumlah) values
		('$nama_produk','$keterangan','$harga','$jumlah')";

        $hasil=mysqli_query($connect_db,$add);

        if ($hasil) {
            header("Location:index.php");
        }else{
            echo "Gagal disimpan";
        }
    }
?>

    <h1>Tambah Produk</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
        <label>Nama Produk:</label>
        <input type="text" name="nama_produk" required />
    
        <label>keterangan:</label>
        <input type="text" name="keterangan"  required/>
    
        <label>harga :</label>
        <input type="text" name="harga" required/>
    
        <label>jumlah:</label>
        <input type="text" name="jumlah" required/>
        <button type="submit" name="submit">Submit</button>
    </form>

</body>
</html>