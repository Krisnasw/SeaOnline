<?
	function loginadmin($username,$password){
		$query = mysql_query("SELECT * FROM tbl_users WHERE username = '$username' and password = '$password'");
        $data = mysql_fetch_array($query);
           # code...
        if ($password == $data['password']) {
            if ($data['status'] == 2 || $data['status'] == 3 ) {
                $_SESSION['sea_id']             = $data['idusers'];
                $_SESSION['sea_username']       = $data['username'];
                $_SESSION['sea_status']         = $data['status'];

                 echo "<script language=javascript> document.location.href='index.php'; </script>";
            }else{
                echo "<script language='JavaScript'>alert('Anda Bukan Admin !')</script>";
                echo "<script language=javascript> document.location.href='../index.php'; </script>";
            }
        }else{
            echo "<script language='JavaScript'>alert('User atau Password anda tidak cocok')</script>";
            echo "<script language=javascript> document.location.href='logout.php'; </script>";
        }
	}



	
?>