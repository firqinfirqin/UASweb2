<!DOCTYPE html>
<html>

<head>
    <title>Data Pesanan</title>
</head>

<body>
    <h2>List Pesanan</h2>    
    <a href="tambah.php">+ Tambah Pesanan</a>
    <br />
    <br />
    <table border="1" cellspacing='0' cellpadding='6'>
        <tr>
            <th>ID</th>
            <th>Jenis Restoran</th>
            <th>Makanan</th>
            <th>Harga</th>
            <th>Nama Lengkap</th>
            <th>No Hp</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
include "../koneksi.php";
$select = mysqli_query($koneksi,"select * from pesanan");
while($row = mysqli_fetch_assoc($select)){
?>
        <tr>
            <td> <?php echo $row["id"]; ?> </td>
            <td> <?php echo $row["jenis_resto"]; ?> </td>
            <td> <?php echo $row["makanan"]; ?> </td>
            <td> <?php echo $row["harga"]; ?> </td>
            <td> <?php echo $row["nama"]; ?> </td>
            <td> <?php echo $row["no_hp"]; ?> </td>
            <td> <?php echo $row["email"]; ?> </td>
            <td>
                <a href="edit.php?id=<?php echo $row["id"]; ?>">EDIT</a> | <a
                    href="hapus.php?id=<?php echo $row["id"]; ?>">HAPUS</a>
            </td>
        </tr>
        <?php
}
?>
    </table>
    <br />    
    <a href="cetakpdf.php">cetak pdf</a>&nbsp|&nbsp|&nbsp<a href="../index.php">Back to main menu</a><br>
</body>

</html>