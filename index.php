<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nama Barang</title>
</head>
<body>
    <table border="1">
        <caption>Data Penjualan</caption>
        <tr>
            <th>No</th>
            <th>Tanggal Penjualan</th>
            <th>Nama_Produk</th>
            <th>Harga</th>
            <th>Jumlah Terjual</th>
            <th>Total_Penjualan</th>
            <th>Aksi</th>
        </tr>
        <?php
        if(isset($_GET['filter'])){
            $query = "SELECT * FROM penjualan WHERE harga='$_GET[filter]'";
        }else{
            $query = "SELECT * FROM penjualan";
        }
        $result = $mysqli->query($query);
        $no=0;
        while($row = $result->fetch_assoc()){
            $no++;
        ?>
            <tr>
                <td><?= $no;?></td>
                <td><?= $row['tanggal_penjualan'];?></td>
                <td><?= $row['nama_produk'];?></td>
                <td><?= $row['harga'];?></td>
                <td><?= $row['jumlah_terjual'];?></td>
                <td><?= $row['total_penjualan'];?></td>
                <td>
                    <a href="<?= 'form-edit.php?id='.$row['id'];?>">Edit</a>
                    <a href="<?= 'hapus-data.php?id='.$row['id'];?>">Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <!-- Filter Button Below the Table -->
    <form action="" method="get" style="margin-top: 10px;">
        <select name="filter">
            <?php
            $q_harga = "SELECT harga FROM penjualan GROUP BY harga";
            $r_harga = $mysqli->query($q_harga);
            ?>
        </select>
    </form>

    <a href="form-data.php">Tambah Data</a>
</body>
</html>