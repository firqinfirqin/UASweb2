<!DOCTYPE html>
<html>

<head>
    <title>Tambah Data Dosen</title>
</head>
<?php
include "../koneksi.php";
?>

<body>
    <h2>Tambah Pesanan</h2>    

    <center><center><h3>Menu</h3></center>
    <table border="1" cellspacing='0' cellpadding='10'>
        <tr>
            <th>Jenis Restoran</th>
            <th>Menu</th> 
            <th>Harga</th>
        </tr>
        <?php            
            $select = mysqli_query($koneksi,"select * from wt");
            while($row = mysqli_fetch_assoc($select)){
        ?>
        <tr>
            <td> Warteg Kharisma </td>
            <td> <?php echo $row["menu"]; ?> </td>
            <td> <?php echo $row["harga"]; ?> </td>            
        </tr>
        <?php
        }$select = mysqli_query($koneksi,"select * from padang");
        while($row = mysqli_fetch_assoc($select)){
        ?>
        <tr>
            <td> Restoran Padang Sederhana </td>
            <td> <?php echo $row["menu"]; ?> </td>
            <td> <?php echo $row["harga"]; ?> </td>            
        </tr>
        <?php
        }$select = mysqli_query($koneksi,"select * from soto");
        while($row = mysqli_fetch_assoc($select)){
        ?>
        <tr>
            <td> Soto Ayam Ndelik</td>
            <td> <?php echo $row["menu"]; ?> </td>
            <td> <?php echo $row["harga"]; ?> </td>            
        </tr>
        <?php
        } 
        ?>
        <td colspan="3">

        <form method="post" action="#">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Nomer HP</td>
                <td><input type="text" name="nohap"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Pilih Restoran</td>
                <td>
                    <select name="resto">
                        <option value="Warteg Kharisma">Warteg Kharisma</option>
                        <option value="Restoran Padang Sederhana">Restoran Padang Sederhana</option>
                        <option value="Soto Ayam Ndelik">Soto Ayam Ndelik</option>
                    </select>
                </td>
            </tr>            
            <td></td>
            <td><input type="submit" value="SIMPAN" name="tambah"></td>
            </tr>            
        </table>
    </form>    
    <br />
    <p style="text-align:right;"><a href="index.php">KEMBALI</a></p>
    <br />
        </td>
        
    </table>
    </center>       
</body>


<?php
if(isset($_POST['tambah'])){
$nama = $_POST["nama"];
$nohp = $_POST["nohap"];
$email = $_POST["email"];
$resto = $_POST["resto"];
switch($resto){
    case 'Warteg Kharisma' :
        $select = mysqli_query($koneksi,"select * from wt");
        while($row = mysqli_fetch_assoc($select)){
            $makanan=$row["menu"];
            $harga=$row["harga"];            
        }
        mysqli_query($koneksi,"insert into pesanan values(NULL,'$nama','$nohp','$email', '$resto', '$makanan', '$harga')");
        header("location:index.php");
    break;
    case 'Restoran Padang Sederhana' :
        $select = mysqli_query($koneksi,"select * from padang");
        while($row = mysqli_fetch_assoc($select)){
            $makanan=$row["menu"];
            $harga=$row["harga"];            
        }
        mysqli_query($koneksi,"insert into pesanan values(NULL,'$nama','$nohp','$email', '$resto', '$makanan', '$harga')");
        header("location:index.php");
    break;
    case 'Soto Ayam Ndelik' :
        $select = mysqli_query($koneksi,"select * from soto");
        while($row = mysqli_fetch_assoc($select)){
            $makanan=$row["menu"];
            $harga=$row["harga"];            
        }
        mysqli_query($koneksi,"insert into pesanan values(NULL,'$nama','$nohp','$email', '$resto', '$makanan', '$harga')");
        header("location:index.php");
    break;
}
}
?>

</html>