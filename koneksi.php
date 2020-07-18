<?php 
class koneksi{
	public function get_koneksi()
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