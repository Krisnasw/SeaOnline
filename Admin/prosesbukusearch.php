<?
    include ('../config/conn.php');

	if(isset($_POST['kataKunci'])){
		$kataKunci = $db->real_escape_string($_POST['kataKunci']);
		if(strlen($kataKunci) >0){
			$perintah = $db->query("SELECT * From tbl_buku where judul RLIKE '$kataKunci' or kodebuku RLIKE '$kataKunci' LIMIT 10");
			if($perintah){
				while ($hasil = $perintah ->fetch_object()){
					
					echo '<li onClick="isiTextbox(\''.$hasil->judul.'\');"><img class="mw30 br64 mr15" src="../includes/img/'.$hasil->cover.'" ></img> - '.$hasil->kodebuku.' - '.$hasil->judul.'</li>';
				}
			}else{
				echo 'ERROR: Perintah Error.';
			}
		}else{
		}
	}elseif (isset($_POST['nama'])){
		$kataKunci = $db->real_escape_string($_POST['nama']);
		if(strlen($kataKunci) >0){
			$perintah = $db->query("SELECT * From tbl_users tu where tu.`status` = 1 and tu.username RLIKE '$kataKunci' or tu.`status` = 1 and tu.nama RLIKE '$kataKunci' LIMIT 10");

			if($perintah){
				while ($hasil = $perintah ->fetch_object()){
					
					echo '<li onClick="isiTextboxnama(\''.$hasil->nama.'\');"><img class="mw30 br64 mr15" src="../includes/img/'.$hasil->images.'" ></img> - '.$hasil->nama.' - '.$hasil->email.'</li>';
					echo '<li onClick="idisiTextboxnama(\''.$hasil->idusers.'\');"></li>';
				}	
			}else{
				echo 'ERROR: Perintah Error.';
			}
		}else{
		}
	}else{
	echo 'dilarang!';
	}
?>