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