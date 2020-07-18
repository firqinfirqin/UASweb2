# UASweb2
UAS PEMROGRAMAN WEB 2 FIRQIN FUAD 2016142143

# halaman index.php
halaman index awak akan diarahkan pada form selamat datang, dan memberikan pilihan untuk menampilkan database atau login

	<html>
	<head>
	<title>Index</title>
	</head>
	<body>
	<h2>Main Index</h2>
	<br/>
	<?php
	session_start();
	if($_SESSION["status"]!="login"){
	header("location:login.php?pesan=belum_login");
	}
	?>
	<h4>Selamat datang, <?php echo $_SESSION["username"]; ?>! anda telah login.</h4>
	<a href="pesanan/index.php"><button>CRUD Data Pesanan</button></a>
	<br/>
	<br/>
  
  # script memanggil logout php
  
	<a href="logout.php">LOGOUT</a>
	</body>
	</html>
  
  
  
  
  # halaman koneksi.php
  
  
  <?php 
class koneksi{
	public function get_koneksi()
  
  #syntax memanggil database bila koneksi gagal akan tampil teks "koneksi gagal"
	{
		$conn=mysqli_connect("localhost","id14363802_uasweb2","Kelompok5-Web2","id14363802_uasweb");//cek koneksi
		if(mysqli_connect_error()){
			echo"koneksi gagal : ".mysqli_connect_error();
		}
		return $conn;
	}
}
$konek = new koneksi();
$koneksi=$konek->get_koneksi();
?>



#halaman login php


<?php 
menginclude koneksi database dengan script 
include "koneksi.php"; 

?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <br />
    <?php
if(isset($_GET["pesan"])){
if($_GET["pesan"] == "gagal"){
echo "Login gagal! username dan password salah!";
}else if($_GET["pesan"] == "logout"){
echo "Anda telah berhasil logout";
}else if($_GET["pesan"] == "belum_login"){
echo "Anda harus login untuk mengakses halaman admin";
}
}
?>
    <br />
    <br />
    <form method="post" action="cek_login.php">
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" placeholder="Masukkan username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password" placeholder="Masukkan password"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="LOGIN"></td>
            </tr>
        </table>
    </form>
</body>

</html>


#logout

scrip berikut berfungsi untuk menutup sesi dan mengembalikan ke halaman index
<?php
session_start();
session_destroy();
header("location:login.php?pesan=logout");
?>

# halaman pesanan.cetak.php
halaman ini berisi tentang scrip settingan untuk menjadikan file pdf

<?php
require('../fpdf.php');
$pdf = new FPDF('l','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,7,'Data Pesanan',0,1,'L');


$pdf->Cell(10,7,'',0,1); //space

$pdf->SetFont('Arial','B',10);
$pdf->Cell(6,8,'ID',1,0);
$pdf->Cell(50,8,'Jenis Restoran',1,0);
$pdf->Cell(100,8,'Makanan',1,0);
$pdf->Cell(15,8,'Harga',1,0);
$pdf->Cell(33,8,'Nama',1,0);
$pdf->Cell(30,8,'No Hp',1,0);
$pdf->Cell(45,8,'Email',1,1);

$pdf->SetFont('Arial','',10);

include '../koneksi.php';
$select = mysqli_query($koneksi, "select * from pesanan");
while ($row = mysqli_fetch_array($select)){
    $pdf->Cell(6,10,$row['id'],1,0);
    $pdf->Cell(50,10,$row['jenis_resto'],1,0);
    $pdf->Cell(100,10,$row['makanan'],1,0);    
    $pdf->Cell(15,10,$row['harga'],1,0); 
    $pdf->Cell(33,10,$row['nama'],1,0); 
    $pdf->Cell(30,10,$row['no_hp'],1,0); 
    $pdf->Cell(45,10,$row['email'],1,1); 
}

$pdf->Output();
?>





# halaman pesanan/edit.php
<html>

<head>
    <title>Edit Data Pesanan</title>
</head>

<body>
    <h2>Edit Data Pesanan</h2>
    <br />
    <h3>EDIT DATA</h3>
    <?php
    include "../koneksi.php";
    $id = $_GET["id"];
    $select = mysqli_query($koneksi,"select * from pesanan where id='$id'");
    while($row = mysqli_fetch_array($select)){
?>
    <form method="post" action="#">
        <table>
        <table border="0" cellspacing='0' cellpadding='0'>
                <tr>
                    <th>ID<br>&nbsp</th>
                    <th rowspan="3">&nbsp<br>&nbsp</th>
                    <th>Jenis Restoran<br>&nbsp</th>
                    <th rowspan="3">&nbsp<br>&nbsp</th>
                    <th>Makanan<br>&nbsp</th>
                    <th rowspan="3">&nbsp</th>
                    <th>Harga<br>&nbsp</th>
                    <th rowspan="3">&nbsp</th>
                    <th>Nama Lengkap<br>&nbsp</th>
                    <th rowspan="3">&nbsp</th>
                    <th>No Hp<br>&nbsp</th>
                    <th rowspan="3">&nbsp</th>
                    <th>Email<br>&nbsp</th>
                    <th rowspan="3">&nbsp<br>&nbsp</th>
                    <th>Action<br>&nbsp</th>
                </tr>
                <tr>
                    <td rowspan="2"><?php echo $row["id"]; ?></td>
                    <input type="hidden" name="id" value="<?php echo $row['id']?>">                    
                    <td><?php echo $row["jenis_resto"]; ?></td>                    
                    <td coslspan="2" rowspan="2"><?php echo $row["makanan"]; ?></td>
                    <input type="hidden" name="makanan" value="<?php echo $row['makanan']?>">                    
                    <td coslspan="2" rowspan="2"><?php echo $row["harga"]; ?></td>                    
                    <input type="hidden" name="harga" value="<?php echo $row['harga']?>">                    
                    <td><?php echo $row["nama"];  ?></td>
                    <td><?php echo $row["no_hp"]; ?></td>
                    <td><?php echo $row["email"];  ?></td>                    
                    <td rowspan="2"><input type="submit" value="SIMPAN" name="edit"></td>
                </tr>
                <tr>                    
                    <td>
                    <select name="resto">
                        <option value="pilih">Pilih</option>
                        <option value="Warteg Kharisma">Warteg Kharisma</option>
                        <option value="Restoran Padang Sederhana">Restoran Padang Sederhana</option>
                        <option value="Soto Ayam Ndelik">Soto Ayam Ndelik</option>
                    </select>
                    </td>                                        
                    <td><input type="text" name="nama" value="<?php echo $row["nama"]; ?>"></td>
                    <td><input type="text" name="no_hp" value="<?php echo $row["no_hp"]; ?>"></td>
                    <td><input type="text" name="email" value="<?php echo $row["email"]; ?>"></td>                                        
                </tr>
            </table><br />
    </form>
    <?php
}
?>
    <br />
    <a href="index.php">KEMBALI</a>
    <br />
</body>

</html>

<?php 
if(isset($_POST['edit'])){
$id=$_POST["id"];
$nama=$_POST["nama"];
$nohap=$_POST["no_hp"];
$email=$_POST["email"];
$resto=$_POST['resto'];
$makanan=$_POST['makanan'];
$harga=$_POST['harga'];
if($resto=='pilih'){    
    $select = mysqli_query($koneksi,"select * from pesanan");
    while($row = mysqli_fetch_assoc($select)){
        $makanan=$row["makanan"];
        $harga=$row["harga"];
        $resto=$row["jenis_resto"];
    }                
}elseif($resto=='Restoran Padang Sederhana'){
    $select = mysqli_query($koneksi,"select * from padang");
        while($row = mysqli_fetch_assoc($select)){
            $makanan=$row["menu"];
            $harga=$row["harga"];            
        }        
}elseif($resto=='Warteg Kharisma'){
    $select = mysqli_query($koneksi,"select * from wt");
        while($row = mysqli_fetch_assoc($select)){
            $makanan=$row["menu"];
            $harga=$row["harga"];            
        }        
}elseif($resto=='Soto Ayam Ndelik'){
    $select = mysqli_query($koneksi,"select * from soto");
        while($row = mysqli_fetch_assoc($select)){
            $makanan=$row["menu"];
            $harga=$row["harga"];            
        }        
}
#script untuk update database

$a=mysqli_query($koneksi, "update pesanan set `nama`='$nama', `no_hp`='$nohap', `email`='$email', `jenis_resto`='$resto', `makanan`='$makanan', `harga`='$harga' where `id`='$id'");
    if($koneksi->query($a) === TRUE){
    header("location:index.php");
    }else{
        echo "$id<br>$nama<br>$nohap<br>$email<br>$resto<br>$makanan<br>$harga<br>";        
        echo "Error updating record: " . $koneksi->error;
        header("location:index.php");
    }        
}
?>


# halaman pesanan/hapus.php

memastikan koneksi
<?php
include "../koneksi.php";

mendeklarasikan id/primary key yang mau di hapus kemudian di kembalikan lagi ke database

$id = $_GET["id"];
mysqli_query($koneksi,"delete from pesanan where id='$id'");
header("location:index.php");
?>


#halaman pesanan/index.php

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
   
 membuat tabel  
 
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
        
  menampilkan database dari tabel pesanan      
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



# halaman pesanan/tambah.php

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

