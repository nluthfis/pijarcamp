<!DOCTYPE html>
<html>
<head>
</head>
<title>Naufal Luthfi Saputra</title>
<body>
    
<?php
    include "connect.php";

    if (isset($_GET['id_produk'])) {
        $id_produk=htmlspecialchars($_GET["id_produk"]);
        $delete="DELETE FROM produk WHERE id_produk='$id_produk' ";
        $hasil=mysqli_query($connect_db,$delete);
            if ($hasil) {
                header("Location:index.php");
            }else{
                echo "Gagal dihapus";
            }
        }
?>
    <h1>DAFTAR PRODUK</h1>
    <tr>
        <thead>
        <tr>
            <table>
                <tr>           
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Keterangan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th colspan='2'>Aksi</th>
                </tr>
        </thead>

        <?php
            include "connect.php";
            $view="SELECT * FROM produk ORDER BY id_produk ASC";

            $combine=mysqli_query($connect_db,$view);
            $no=0;
            while ($data = mysqli_fetch_array($combine)) {
                $no++;
        ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama_produk"];?></td>
                <td><?php echo $data["keterangan"];?></td>
                <td><?php echo $data["harga"];?></td>
                <td><?php echo $data["jumlah"];?></td>
                <td>
                    <a href="update.php?id_produk=<?php echo htmlspecialchars($data['id_produk']); ?>">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_produk=<?php echo $data['id_produk']; ?>">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php">Tambah Data</a>
</body>
</html>
