<?
	$host	= 'localhost';
	$user 	= 'root';
	$pass 	= '';
	$db 	= 'SeaOnline';
	$conn 	= mysql_connect($host,$user,$pass);

	if ($conn) {
		$db = mysql_select_db($db);
		if ($db) {
		}else{
			echo "DATABASE TIDAK ADA ! .....";
		}
	}else{
		echo "KONEKSI ANDA SALAH , CEK USER DAN PASSWORD ! ......";
	}
	

?>