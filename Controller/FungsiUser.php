<?
	
    Class Login{

        public function loginadmin($username,$password)
        {
            global $db; 
         
            # code...
            $q = "SELECT * FROM tbl_users WHERE username = '$username' and password = '$password'";
            $result = $db->query($q);

            if ($result->num_rows > 0) {
                # code...
                $data = $result->fetch_array();
                if ($password == $data['password']) {
                    if ($data['status'] == 2 || $data['status'] == 3 ) {
                        $_SESSION['sea_id']             = $data['idusers'];
                        $_SESSION['sea_username']       = $data['nama'];
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
            }else{
                 echo "<script language='JavaScript'>alert('User atau Password anda tidak cocok')</script>";
                 echo "<script language=javascript> document.location.href='logout.php'; </script>";
            }

        }

        public function loginusers($username,$password)
        {
            global $db; 
         
            # code...
            $q = "SELECT * FROM tbl_users WHERE username = '$username' and password = '$password'";
            $result = $db->query($q);

            if ($result->num_rows > 0) {
                # code...
                $data = $result->fetch_array();
                if ($password == $data['password']) {
                    if ($data['status'] == 1) {
                        $_SESSION['sea_id']             = $data['idusers'];
                        $_SESSION['sea_username']       = $data['username'];
                        $_SESSION['sea_status']         = $data['status'];
                        echo "<script language=javascript> document.location.href='users.php'; </script>";
                        // echo $_SESSION['sea_id'];
                        // echo $_SESSION['sea_username'];
                        // echo $_SESSION['sea_status'];
                    }else{
                        echo "<script language='JavaScript'>alert('Anda Bukan Member !')</script>";
                        echo "<script language=javascript> document.location.href='index.php'; </script>";
                    }
                }else{
                    echo "<script language='JavaScript'>alert('User atau Password anda tidak cocok')</script>";
                    echo "<script language=javascript> document.location.href='logout.php'; </script>";
                }
            }else{
                 echo "<script language='JavaScript'>alert('User atau Password anda tidak cocok')</script>";
                 echo "<script language=javascript> document.location.href='logout.php'; </script>";
            }

        }

       
    }

    Class Users
    {
        public function CekUser($username)
        {
            global $db;
            $q = "SELECT tu.username FROM tbl_users tu where tu.username = '$username'";
            $result = $db->query($q);

            return $result;
        }
        public function RegisterUser($username,$password,$email,$nama,$jenis_kelamin,$alamat,$no_telp)
        {
            global $db;
            $pas = md5($password);
            $q = "INSERT INTO `seaonline`.`tbl_users` (`username`, `password`, `email`, `nama`, `alamat`, `no_telp`, `jenis_kelamin`) 
            VALUES ('$username', '$pas', '$email', '$nama', '$alamat', '$no_telp', '$jenis_kelamin')";

            $result = $db->query($q);

            if($result){
                    echo "<script>alert('Data Terdaftar , Silahkan menunggu pengaktifan dari Petugas SEAMOLEC !'); document.location.href='berita.php';</script>";
                }else{
                    echo "<script>alert('Data Gagal Terdaftar !'); document.location.href='berita.php'</script>";
                }


        }
    }
	
?>