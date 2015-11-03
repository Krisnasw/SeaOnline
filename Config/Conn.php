<?
	
	$db = new mysqli("localhost","root","","seaonline");

	if ($db->connect_errno) {
		# code...
		echo "Database Tidak Terkoneksi".$db->connect_error;
	}

?>