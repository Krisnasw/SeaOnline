<?
	// Penulis
	function tambahpenulis($nama, $namalain, $biografi,$gambar){
		if ($gambar) {
			# code...
			$q = mysql_query("INSERT INTO `seaonline`.`tbl_penulis` (`nama`, `nama_lain`, `biografi`,`images`)
		 				  VALUES ('$nama', '$namalain', '$biografi','$gambar')");
			if($q){
				$lokasi_file = $_FILES['gambar']['tmp_name'];
				$nama_file   = $_FILES['gambar']['name'];
				$direktori   = "../includes/img/$nama_file"; 
			    move_uploaded_file($lokasi_file,$direktori);
				echo "<script>alert('Data Berhasil Di Tambah !'); document.location.href='opsipenulis.php';</script>";
			}else{
				echo "<script>alert('Data Gagal Di Tambah !'); document.location.href='opsipenulis.php'</script>";
			}
		}else{
			$q = mysql_query("INSERT INTO `seaonline`.`tbl_penulis` (`nama`, `nama_lain`, `biografi`)
		 				  VALUES ('$nama', '$namalain', '$biografi')");
			if($q){
				echo "<script>alert('Data Berhasil Di Tambah !'); document.location.href='opsipenulis.php';</script>";
			}else{
				echo "<script>alert('Data Gagal Di Tambah !'); document.location.href='opsipenulis.php'</script>";
			}
		}
		return $q;
	}

	function datapenulis(){
		$q = mysql_query("SELECT * From tbl_penulis");
		return $q;
	}

	function dataprofilpenulis($id){
		$q = mysql_query("SELECT * From tbl_penulis where idpenulis = '$id'");
		return $q;
	}

	function datadeletepenulis($id){
		$q = mysql_query("DELETE FROM tbl_penulis WHERE idpenulis='$id'");

		if ($q) {
			echo "<script>alert('Data Berhasil DiHapus !'); document.location.href='opsipenulis.php';</script>";
		}else{
			echo "<script>alert('Data Gagal DiHapus !'); document.location.href='opsipenulis.php';</script>";
		}
		return $q;
	}

	function dataubahpenulis($id,$nama, $namalain, $biografi,$gambar){
		if (file_exists($gambar)) {
			# code...
			$q = mysql_query("UPDATE tbl_penulis SET nama='$nama', `nama_lain`='$namalain', `biografi`='$biografi',images= '$gambar' WHERE  `idpenulis`=$id");
			if($q){
				$lokasi_file = $_FILES['gambar']['tmp_name'];
				$nama_file   = $_FILES['gambar']['name'];
				$direktori   = "../includes/img/$nama_file";
			    move_uploaded_file($lokasi_file,$direktori);
				// echo "UPDATE tbl_penulis SET nama='$nama', `nama_lain`='$namalain', `biografi`='$biografi','images'= '$gambar' WHERE  `idpenulis`=$id";
				echo "<script>alert('Data Berhasil Di Tambah !'); document.location.href='opsipenulis.php';</script>";
			}else{
				// echo "UPDATE tbl_penulis SET nama='$nama', `nama_lain`='$namalain', `biografi`='$biografi',images= '$gambar' WHERE  `idpenulis`=$id";
				echo "<script>alert('Data Gagal Di Tambah !'); document.location.href='opsipenulis.php'</script>";
			}
		}else{
			$q = mysql_query("UPDATE tbl_penulis SET nama='$nama', `nama_lain`='$namalain', `biografi`='$biografi' WHERE  `idpenulis`=$id");
			if($q){
				// echo "UPDATE tbl_penulis SET nama='$nama', `nama_lain`='$namalain', `biografi`='$biografi' WHERE  `idpenulis`=$id";
				echo "<script>alert('Data Berhasil Di Tambah !'); document.location.href='opsipenulis.php';</script>";
			}else{
				// echo "UPDATE tbl_penulis SET nama='$nama', `nama_lain`='$namalain', `biografi`='$biografi' WHERE  `idpenulis`=$id";
				echo "<script>alert('Data Gagal Di Tambah !'); document.location.href='opsipenulis.php'</script>";
			}
		}
	}
	// Penerbit
	function datapenerbit(){
		$q = mysql_query("SELECT * FROM tbl_penerbit");
		return $q;
	}

	function datapenerbitby($id){
		$q = mysql_query("SELECT * FROM tbl_penerbit where idpenerbit = '$id'");
		return $q;
	}

	function tambahpenerbit($nama){
		$q = mysql_query("INSERT INTO `seaonline`.`tbl_penerbit` (`nama`)
		 				  VALUES ('$nama')");
			if($q){
				echo "<script>alert('Penerbit Berhasil Di Tambah !'); document.location.href='opsipenerbit.php';</script>";
			}else{
				echo "<script>alert('Penerbit Gagal Di Tambah !'); document.location.href='opsipenerbit.php'</script>";
			}
		return $q;
	}

	function dataubahpenerbit($id,$nama){
		$q = mysql_query("UPDATE tbl_penerbit SET nama='$nama' WHERE `idpenerbit`=$id");
			if($q){
				// echo "UPDATE tbl_penulis SET nama='$nama', `nama_lain`='$namalain', `biografi`='$biografi' WHERE  `idpenulis`=$id";
				echo "<script>alert('Nama Penerbit Berhasil di ubah!'); document.location.href='opsipenerbit.php';</script>";
			}else{
				// echo "UPDATE tbl_penulis SET nama='$nama', `nama_lain`='$namalain', `biografi`='$biografi' WHERE  `idpenulis`=$id";
				echo "<script>alert('Nama Penerbit Gagal di ubah!'); document.location.href='opsipenerbit.php'</script>";
			}
	}

	function datadeletepenerbit($id){
		$q = mysql_query("DELETE FROM tbl_penerbit WHERE idpenerbit='$id'");

		if ($q) {
			echo "<script>alert('Penerbit Berhasil DiHapus !'); document.location.href='opsipenerbit.php';</script>";
		}else{
			echo "<script>alert('Penerbit Gagal DiHapus !'); document.location.href='opsipenerbit.php';</script>";
		}
		return $q;
	}


// Kategori
	function datakategori(){
		$q = mysql_query("SELECT * FROM tbl_kategori");
		return $q;
	}

	function datakategoriby($id){
		$q = mysql_query("SELECT * FROM tbl_kategori where idkategori = '$id'");
		return $q;
	}

	function datadeletekategori($id){
	 	$q = mysql_query("DELETE FROM tbl_kategori WHERE idkategori='$id'");

		if ($q) {
			echo "<script>alert('Kategori Berhasil DiHapus !'); document.location.href='opsikategori.php';</script>";
		}else{
			echo "<script>alert('Kategori Gagal DiHapus !'); document.location.href='opsikategori.php';</script>";
		}
		return $q;
	}

	function tambahkategori($nama){
		$q = mysql_query("INSERT INTO `seaonline`.`tbl_kategori` (`nama`)
		 				  VALUES ('$nama')");
			if($q){
				echo "<script>alert('Kategori Berhasil Di Tambah !'); document.location.href='opsikategori.php';</script>";
			}else{
				echo "<script>alert('Kategori Gagal Di Tambah !'); document.location.href='opsikategori.php'</script>";
			}
		return $q;
	}

	function dataubahkategori($id,$nama){
		$q = mysql_query("UPDATE tbl_kategori SET nama='$nama' WHERE `idkategori`=$id");
			if($q){
				// echo "UPDATE tbl_penulis SET nama='$nama', `nama_lain`='$namalain', `biografi`='$biografi' WHERE  `idpenulis`=$id";
				echo "<script>alert('Nama Kategori Berhasil di ubah!'); document.location.href='opsikategori.php';</script>";
			}else{
				// echo "UPDATE tbl_penulis SET nama='$nama', `nama_lain`='$namalain', `biografi`='$biografi' WHERE  `idpenulis`=$id";
				echo "<script>alert('Nama Kategori Gagal di ubah!'); document.location.href='opsikategori.php'</script>";
			}
	}

	// MEMBER

	function datamember(){
		$q = mysql_query("SELECT * FROM tbl_users order by status asc");
		return $q;
	}

	function tambahmember($username,$password,$email,$nama,$alamat,$tglahir,$notelp,$status,$gambar){
		if (isset($gambar)) {
			# code...
			$q = mysql_query("INSERT INTO `tbl_users` (`idusers`, `username`, `password`, `email`, `nama`, `alamat`, `tgl_lahir`, `no_telp`, `images`, `actived`, `status`) 
				VALUES (NULL, '$username', '$password', '$email', '$nama', '$alamat', '$tglahir', '$notelp', '$gambar', '1', '$status')");
			if($q){
				$lokasi_file = $_FILES['gambar']['tmp_name'];
				$nama_file   = $_FILES['gambar']['name'];
				$direktori   = "../includes/img/$nama_file";
			    move_uploaded_file($lokasi_file,$direktori);
				echo "<script>alert('Data Berhasil Di Tambah !'); document.location.href='pagemember.php';</script>";
			}else{
				echo "<script>alert('Data Gagal Di Tambah !'); document.location.href='pagemember.php'</script>";
			}
		}else{
			# code...
			$q = mysql_query("INSERT INTO `tbl_users` (`idusers`, `username`, `password`, `email`, `nama`, `alamat`, `tgl_lahir`, `no_telp`, `actived`, `status`) 
				VALUES (NULL, '$username', '$password', '$email', '$nama', '$alamat', '$tglahir', '$notelp',  '1', '$status')");
			if($q){
				echo "<script>alert('Data Berhasil Di Tambah !'); document.location.href='pagemember.php';</script>";
			}else{
				echo "<script>alert('Data Gagal Di Tambah !'); document.location.href='pagemember.php'</script>";
			}
		}

	}

	function deletemember($id){
		$q = mysql_query("DELETE FROM tbl_users where idusers = $id");

		if($q){
			echo "<script>alert('Data Berhasil Di Delete !'); document.location.href='pagemember.php';</script>";
		}else{
			 echo "<script>alert('Data Gagal Di Delete !'); document.location.href='pagemember.php'</script>";
		}
	}
	function datamemberiby($id){
		$q = mysql_query("SELECT * FROM tbl_users where idusers = $id");
		return $q;
	}

	function editmember($id,$username,$password,$email,$nama,$alamat,$tglahir,$notelp,$status,$gambar){
		if (isset($gambar)) {
			$lokasi_file = $_FILES['gambar']['tmp_name'];
				$nama_file   = $_FILES['gambar']['name'];
				$direktori   = "../includes/img/$nama_file";
			    move_uploaded_file($lokasi_file,$direktori);
			$q = mysql_query("UPDATE tbl_users SET `username` = '$username', `password` = '$password', `email` = '$email', 
				`nama` = '$nama', `alamat` = '$alamat', `tgl_lahir` = '$tglahir', 
				`no_telp` = '$notelp', `images` = '$gambar', `status` = '$status' WHERE `tbl_users`.`idusers` = $id");
			if($q){
				echo "<script>alert('Data Berhasil Di Ubah !'); document.location.href='pagemember.php';</script>";
			}else{
				echo "<script>alert('Data Gagal Di Delete !'); document.location.href='pagemember.php'</script>";
			}
		}else{
			$q = mysql_query("UPDATE tbl_users SET `username` = '$username', `password` = '$password', `email` = '$email', 
				`nama` = '$nama', `alamat` = '$alamat', `tgl_lahir` = '$tglahir', 
				`no_telp` = '$notelp', `status` = '$status' WHERE `tbl_users`.`idusers` = $id");
			if($q){
				echo "<script>alert('Data Berhasil Di Ubah !'); document.location.href='pagemember.php';</script>";
			}else{
				echo "<script>alert('Data Gagal Di Delete !'); document.location.href='pagemember.php'</script>";
			}
		}
	}
?>