<?
    include 'header.php';

    $classloginUser = new Login();
    $classuser = new Users();

    if (isset($_POST['tambah_user'])) {
        # code...
        $username 	= mysql_escape_string($_POST['username']);
        $password 	= mysql_escape_string($_POST['password']);
        $email 		= mysql_escape_string($_POST['email']);
        $nama 		= mysql_escape_string($_POST['nama']);
        $jenis_kelamin = mysql_escape_string($_POST['gender']);
        $alamat 	= mysql_escape_string($_POST['alamat']);
        $no_telp 	= mysql_escape_string($_POST['no_telp']);
       
        $cek_user = $classuser->CekUser($username);
		$data = $cek_user->fetch_array();

        if ($data >= 1) {
            echo "<script language='JavaScript'>alert('User Name Sudah di pakai')</script>";
			echo "<script language=javascript> document.location.href='login.php?action=daftar'; </script>";
        }else{
        	$classuser->RegisterUser($username,$password,$email,$nama,$jenis_kelamin,$alamat,$no_telp);
        }
    }

      if (isset($_SESSION['sea_id']) && isset($_SESSION['sea_username']) && isset($_SESSION['sea_status'])) {
            header("Location:logout.php");
            exit();
        }
         
    if (isset($_POST['login'])) {
    	# code...
        $username 	= mysql_escape_string($_POST['username']);
        $password 	= md5($_POST['password']);

        $classloginUser->loginusers($username,$password);

    }

    if (isset($_GET['action'])=='daftar') {
    	# code...
    	?>
    	<!--end right search-->
		<section class="header-page fade-up">
			<div class="bounce-in animate4"><h2 class="header-pagetitle">Login SeaOnline</h2></div>
		</section>
		<section id="internalpage">
			<!--start container-->
		    <div class="container clearfix">
				<div class="grid_12">
		            <div class="titlesection">
		                <h1>Daftar SeaOnline</h1>
		                <div class="grid_8 centersinglegrid">
		                <h4> Silahkan Mendaftar menjadi members SeaOnline untuk memantau peminjaman buku anda di Perpustakaan SEAMEO SEAMOLEC  </h4>
		                </div> 
		            </div>  
		        </div>
		        <!--start content-->
		        <div class="grid_4 centersinglegrid">
		            <!--start post-->	
		            <div class="singlepost orange">
		                <div class="comment-respond">
		                    <form action="#" method="POST" role="form"  enctype="multipart/form-data" class="comment-form">
		                        <input type="text" name="username" 		placeholder="User Name" required />
		                        <input type="password" name="password" 	placeholder="Password" required />
		                        <input type="text" name="email" placeholder="Email Anda" required />
		                        <input type="text" name="nama" 			placeholder="Nama Lengkap" required />
		                        <p >Jenis Kelamin:
		                        <input type="radio" name="gender" value="Pria">Pria
								<input type="radio" name="gender" value="Perempuan">Perempuan  </p>
		                        <textarea 		   name="alamat"  placeholder="Alamat Anda" required></textarea>
		                        <input type="text" name="no_telp" placeholder="Nomor Telpone" required />
		                       	<input type="submit"  name="tambah_user" value="Login " />
		                    </form>
		                </div>
		            </div>
		            <!--end post-->
		        </div>
		        <!--end content-->
		    </div>
		    <!--end container--> 
		</section>

    	<?
    }else{


?>
		<!--end right search-->
		<section class="header-page fade-up">
			<div class="bounce-in animate4"><h2 class="header-pagetitle">Login SeaOnline</h2></div>
		</section>
		<section id="internalpage">
			<!--start container-->
		    <div class="container clearfix">
				<div class="grid_12">
		            <div class="titlesection">
		                <h1>Login SeaOnline</h1>
		                <div class="grid_8 centersinglegrid">
		                <h4> Silahkan Login di SeaOnline untuk memantau peminjaman buku anda di Perpustakaan SEAMEO SEAMOLEC  </h4>
		                </div> 
		            </div>  
		        </div>
		        <!--start content-->
		        <div class="grid_4 centersinglegrid">
		            <!--start post-->	
		            <div class="singlepost orange">

		                <div class="comment-respond">
		                    
		                    <form action="#" method="POST" role="form"  enctype="multipart/form-data" class="comment-form">
		                        <input type="text" name="username" placeholder="User Name" required />
		                        <input type="password" name="password" placeholder="Password" required />
		                       	<input type="submit"  name="login" value="Login " />
		                    </form>
		                </div>
		            </div>
		            <!--end post-->
		            
		        </div>
		        <!--end content-->
		         
		    </div>
		    <!--end container--> 
		</section>
<?
	}
    include 'footer.php';
?>