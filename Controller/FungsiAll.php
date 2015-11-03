<?

	class Penulis
	{ 
		 
		public function View(){
			global $db;	

			$q = "SELECT * FROM tbl_penulis";
			$result = $db->query($q);

			return $result;

		} 
		
		public function ViewbyId($id){
			global $db;

			$q = "SELECT * From tbl_penulis where idpenulis = '$id'";
			$result = $db->query($q);
			return $result;
		}


		public function ViewCheckPenulis($id){
			global $db;

			$q = "SELECT * from rel_bukupenulis rbn where rbn.idbuku = '$id'";
			$result = $db->query($q);
			return $result;
		}


		public function Create($nama, $namalain, $biografi,$gambar){
			global $db;	

			if ($gambar) {
				# code...
			
				$q = "INSERT INTO `seaonline`.`tbl_penulis` (`nama`, `nama_lain`, `biografi`,`images`)
			 				  VALUES ('$nama', '$namalain', '$biografi','$gambar')";
			 	$result = $db->query($q);
				if($result){
					$lokasi_file = $_FILES['gambar']['tmp_name'];
					$nama_file   = $_FILES['gambar']['name'];
					$direktori   = "../includes/img/$nama_file"; 
				    move_uploaded_file($lokasi_file,$direktori);
					echo "<script>alert('Data Berhasil Di Tambah !'); document.location.href='opsipenulis.php';</script>";
				}else{
					echo "<script>alert('Data Gagal Di Tambah !'); document.location.href='opsipenulis.php'</script>";
				}
			}else{
				$q = "INSERT INTO `seaonline`.`tbl_penulis` (`nama`, `nama_lain`, `biografi`)
			 				  VALUES ('$nama', '$namalain', '$biografi')";
				$result = $db->query($q);
				if($q){
					echo "<script>alert('Data Berhasil Di Tambah !'); document.location.href='opsipenulis.php';</script>";
				}else{
					echo "<script>alert('Data Gagal Di Tambah !'); document.location.href='opsipenulis.php'</script>";
				}
			}

		}
		
		public function Edit($id,$nama, $namalain, $biografi,$gambar){
			global $db;	

			if ($gambar) {
				# code...
				$q = "UPDATE tbl_penulis SET nama='$nama', `nama_lain`='$namalain', `biografi`='$biografi',images= '$gambar' WHERE  `idpenulis`=$id";
				$result = $db->query($q);
				if($result){
					$lokasi_file = $_FILES['gambar']['tmp_name'];
					$nama_file   = $_FILES['gambar']['name'];
					$direktori   = "../includes/img/$nama_file";
				    move_uploaded_file($lokasi_file,$direktori);
					echo "<script>alert('Data Berhasil Di Tambah !'); document.location.href='opsipenulis.php';</script>";
				}else{
					echo "<script>alert('Data Gagal Di Tambah !'); document.location.href='opsipenulis.php'</script>";
				}
			}else{
				$q = "UPDATE tbl_penulis SET nama='$nama', `nama_lain`='$namalain', `biografi`='$biografi' WHERE  `idpenulis`=$id";
				$result = $db->query($q);
				if($result){
					 echo "<script>alert('Data Berhasil Di Tambah !'); document.location.href='opsipenulis.php';</script>";
				}else{
					echo "<script>alert('Data Gagal Di Tambah !'); document.location.href='opsipenulis.php'</script>";
				}
			}

		}
		
		public function Delete($id){
			global $db;	

			$q = "DELETE FROM tbl_penulis WHERE idpenulis='$id'";
			$result = $db->query($q);

			if ($result) {
				echo "<script>alert('Data Berhasil DiHapus !'); document.location.href='opsipenulis.php';</script>";
			}else{
				echo "<script>alert('Data Gagal DiHapus !'); document.location.href='opsipenulis.php';</script>";
			}

		}

	}

	Class RakBuku
	{
		public function View(){
			global $db;

			$q = "SELECT * FROM tbl_rakbuku";

			$result = $db->query($q);

			return $result;
		}

		public function ViewbyId($id){
			global $db;

			$q = "SELECT * FROM tbl_rakbuku WHERE idrak = '$id'";
			$result = $db->query($q);

			return $result;
		}


		public function Create($nama){
			global $db;

			$q = "INSERT INTO `seaonline`.`tbl_rakbuku` (`nama`) VALUES ('$nama')";

			$result = $db -> query($q);

			if($result){
				echo "<script>alert('Rak Buku Berhasil Di Tambah !'); document.location.href='opsirakbuku.php';</script>";
			}else{
				echo "<script>alert('Rak Buku Gagal Di Tambah !'); document.location.href='opsirakbuku.php'</script>";
			}


		}

		public function Edit($id,$nama){
			global $db;

			$q = "UPDATE tbl_rakbuku SET nama='$nama' WHERE `idrak`=$id";
			$result = $db->query($q);

			if($result){
				echo "<script>alert('Nama Rak Buku Berhasil di ubah!'); document.location.href='opsirakbuku.php';</script>";
			}else{
				echo "<script>alert('Nama Rak Buku Gagal di ubah!'); document.location.href='opsirakbuku.php'</script>";
			}
			
		}

		public function Delete($id){
			global $db;

			$q = "DELETE FROM tbl_rakbuku WHERE idrak='$id'";

			$result = $db->query($q);

			if ($result) {
				echo "<script>alert('Rak Buku Berhasil DiHapus !'); document.location.href='opsirakbuku.php';</script>";
			}else{
				echo "<script>alert('Rak Buku Gagal DiHapus !'); document.location.href='opsirakbuku.php';</script>";
			}
			
		}

	}

	Class Penerbit
	{
		public function View(){
			global $db;

			$q = "SELECT * FROM tbl_penerbit";

			$result = $db->query($q);

			return $result;
			
		}

		public function ViewbyId($id){
			global $db;

			$q = "SELECT * FROM tbl_penerbit WHERE idpenerbit = '$id'";
			$result = $db->query($q);

			return $result;
		}

		public function Create($nama){
			global $db;

			$q = "INSERT INTO `seaonline`.`tbl_penerbit` (`nama`) VALUES ('$nama')";

			$result = $db -> query($q);

			if($result){
				echo "<script>alert('Penerbit Berhasil Di Tambah !'); document.location.href='opsipenerbit.php';</script>";
			}else{
				echo "<script>alert('Penerbit Gagal Di Tambah !'); document.location.href='opsipenerbit.php'</script>";
			}


		}

		public function Edit($id,$nama){
			global $db;

			$q = "UPDATE tbl_penerbit SET nama='$nama' WHERE `idpenerbit`=$id";
			$result = $db->query($q);

			if($result){
				echo "<script>alert('Nama Penerbit Berhasil di ubah!'); document.location.href='opsipenerbit.php';</script>";
			}else{
				echo "<script>alert('Nama Penerbit Gagal di ubah!'); document.location.href='opsipenerbit.php'</script>";
			}
			
		}

		public function Delete($id){
			global $db;

			$q = "DELETE FROM tbl_penerbit WHERE idpenerbit='$id'";

			$result = $db->query($q);

			if ($result) {
				echo "<script>alert('Penerbit Berhasil DiHapus !'); document.location.href='opsipenerbit.php';</script>";
			}else{
				echo "<script>alert('Penerbit Gagal DiHapus !'); document.location.href='opsipenerbit.php';</script>";
			}
			
		}
	}

	class Kategori
	{
		
		public function View(){
			global $db;

			$q = ("SELECT * FROM tbl_kategori WHERE idsubkategori = 0");
			$result = $db->query($q);

			return $result;
		}

		public function ViewbyId($id){
			global $db;

			$q = ("SELECT * FROM tbl_kategori WHERE idkategori=$id");
			$result = $db->query($q);

			return $result;
		}

		public function ViewCheckKategori($id){
			global $db;

			$q = "SELECT * from rel_bukukategori rbk where rbk.idbuku = '$id'";
			$result = $db->query($q);
			return $result;
		}
		// public function ViewCheckKategori($id){
		// 	global $db;
		// 	$q = "SELECT * from rel_bukukategori rbk
		// 			where rbk.idbuku = $id";
		// 	$result = $db->query($q);
			
		// 	return $result;
		// }

		public function Create($nama){
			global $db;

			$q = "INSERT INTO `seaonline`.`tbl_kategori` (`nama`) VALUES ('$nama')";

			$result = $db -> query($q);

			if($result){
				echo "<script>alert('Penerbit Berhasil Di Tambah !'); document.location.href='opsikategori.php';</script>";
			}else{
				echo "<script>alert('Penerbit Gagal Di Tambah !'); document.location.href='opsikategori.php'</script>";
			}

		}

		public function Edit($id,$nama){
			global $db;


			$q = "UPDATE tbl_kategori SET nama='$nama' WHERE `idkategori`=$id";
			$result = $db->query($q);

			if($result){
				echo "<script>alert('Nama Penerbit Berhasil di ubah!'); document.location.href='opsikategori.php';</script>";
			}else{
				echo "<script>alert('Nama Penerbit Gagal di ubah!'); document.location.href='opsikategori.php'</script>";
			}
		}

		public function Delete($id){
			global $db;

			$q = "DELETE FROM tbl_kategori WHERE idkategori = '$id' OR idsubkategori = '$id'";
			$result = $db->query($q);

			if($result){
				echo "<script>alert('Nama Penerbit Berhasil di Hapus!'); document.location.href='opsikategori.php';</script>";
			}else{
				echo "<script>alert('Nama Penerbit Gagal di Hapus!'); document.location.href='opsikategori.php'</script>";
			}

		}

	}


	class SubKategori extends Kategori
	{

		public function ViewbyId($id){
			global $db;

			$q = ("SELECT * FROM tbl_kategori WHERE idsubkategori=$id");
			$result = $db->query($q);

			return $result;
		} 

		public function Delete($id){
			global $db;
			$q = "DELETE FROM tbl_kategori WHERE idkategori = '$id'";
			$result = $db->query($q);

			if($result){
				echo "<script>alert('Sub Kategori Berhasil di Hapus!'); document.location.href='opsikategori.php';</script>";
			}else{
				echo "<script>alert('Sub Kategori Gagal di Hapus!'); document.location.href='opsikategori.php'</script>";
			}
		}
		public function Create($id,$nama){
			global $db;

			$q = "INSERT INTO `seaonline`.`tbl_kategori` (`idsubkategori`,`nama`) VALUES ('$id','$nama')";

			$result = $db -> query($q);

			if($result){
				echo "<script>alert('Penerbit Berhasil Di Tambah !'); document.location.href='opsikategori.php';</script>";
			}else{
				echo "<script>alert('Penerbit Gagal Di Tambah !'); document.location.href='opsikategori.php'</script>";
			}
		} 
	}

	
	class Member
	{
		public function View(){
			global $db;

			$q = "SELECT * FROM tbl_users order by status asc";
			$result = $db->query($q);

			return $result;
		}
		public function ViewbyId($id){
			global $db;

			$q = "SELECT * FROM tbl_users where idusers = $id";
			$result = $db->query($q);

			return $result;
		}

		public function TotalMember(){
			global $db;

			$q = "select count(*) as total from tbl_users";
			$result = $db->query($q);

			return $result;
		}
		public function Create($username,$password,$email,$nama,$alamat,$tglahir,$notelp,$status,$gambar){
			global $db;

			if ($gambar) {
			# code...
				$q = "INSERT INTO `tbl_users` (`idusers`, `username`, `password`, `email`, `nama`, `alamat`, `tgl_lahir`, `no_telp`, `images`, `actived`, `status`) 
					VALUES (NULL, '$username', '$password', '$email', '$nama', '$alamat', '$tglahir', '$notelp', '$gambar', '1', '$status')";
				
				$result = $db->query($q);

				if($result){
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
				$q = "INSERT INTO `tbl_users` (`idusers`, `username`, `password`, `email`, `nama`, `alamat`, `tgl_lahir`, `no_telp`, `actived`, `status`) 
					VALUES (NULL, '$username', '$password', '$email', '$nama', '$alamat', '$tglahir', '$notelp',  '1', '$status')";
				
				$result = $db->query($q);
				

				if($result){
					echo "<script>alert('Data Berhasil Di Tambah !'); document.location.href='pagemember.php';</script>";
				}else{
					echo "<script>alert('Data Gagal Di Tambah !'); document.location.href='pagemember.php'</script>";
				}
			}

		}

		public function Edit($id,$username,$password,$email,$nama,$alamat,$tglahir,$notelp,$status,$gambar){
			global $db;

			if ($gambar) {
				$lokasi_file = $_FILES['gambar']['tmp_name'];
					$nama_file   = $_FILES['gambar']['name'];
					$direktori   = "../includes/img/$nama_file";
				    move_uploaded_file($lokasi_file,$direktori);
				$q = "UPDATE tbl_users SET `username` = '$username', `password` = '$password', `email` = '$email', 
					`nama` = '$nama', `alamat` = '$alamat', `tgl_lahir` = '$tglahir', 
					`no_telp` = '$notelp', `images` = '$gambar', `status` = '$status' WHERE `tbl_users`.`idusers` = $id";

				$result = $db->query($q);
				
				if($result){
					echo "<script>alert('Data Berhasil Di Ubah !'); document.location.href='pagemember.php';</script>";
				}else{
					echo "<script>alert('Data Gagal Di Delete !'); document.location.href='pagemember.php'</script>";
				}
			}else{
				$q = "UPDATE tbl_users SET `username` = '$username', `password` = '$password', `email` = '$email', 
					`nama` = '$nama', `alamat` = '$alamat', `tgl_lahir` = '$tglahir', 
					`no_telp` = '$notelp', `status` = '$status' WHERE `tbl_users`.`idusers` = $id";

				$result = $db->query($q);

				if($result){
					echo "<script>alert('Data Berhasil Di Ubah !'); document.location.href='pagemember.php';</script>";
				}else{
					echo "<script>alert('Data Gagal Di Delete !'); document.location.href='pagemember.php'</script>";
				}
			}
		}

		public function Delete($id){
			global $db;

			$q = "DELETE FROM tbl_users WHERE idusers = $id";
			$result = $db->query($q);

			if($result){
				echo "<script>alert('Data Berhasil Di Delete !'); document.location.href='pagemember.php';</script>";
			}else{
				 echo "<script>alert('Data Gagal Di Delete !'); document.location.href='pagemember.php'</script>";
			}
		}

		public function AmbilDataByNama($nama){
			global $db;

			$q = "SELECT * FROM tbl_users where nama = '$nama'";
			$query = $db->query($q);
			$data = $query->fetch_array();
			$result = $data['idusers'];

			return $result;

		}
	}

	class Berita
	{
		public function View(){
			global $db;

			$q = "SELECT * FROM tbl_berita order by tanggal desc";
			$result = $db->query($q);

			return $result;

		}

		public function ViewBeritaLimit(){
			global $db;

			$q = "SELECT * FROM tbl_berita order by tanggal desc LIMIT 3";
			$result = $db->query($q);

			return $result;

		}

		public function ViewbyId($id){
			global $db;

			$q = "SELECT * FROM tbl_berita WHERE idberita = $id";
			$result = $db->query($q);

			return $result;

		}

		public function Create($judul, $artikel,$gambar){
			global $db;

			if ($gambar) {
				# code...
				$lokasi_file = $_FILES['gambar']['tmp_name'];
					$nama_file   = $_FILES['gambar']['name'];
					$direktori   = "../includes/img/$nama_file";
				    move_uploaded_file($lokasi_file,$direktori);
				    
				$q = "INSERT INTO `seaonline`.`tbl_berita` (`judul`, `berita`, `images`,`tanggal`) VALUES ('$judul', '$artikel', '$gambar',NOW())";

				$result = $db->query($q);

				if($result){
					echo "<script>alert('Data Berhasil Di Tambah !'); document.location.href='berita.php';</script>";
				}else{
					echo "<script>alert('Data Gagal Di Tambah !'); document.location.href='berita.php'</script>";
				}

			}else{

				# code...
				$q = "INSERT INTO `seaonline`.`tbl_berita` (`judul`, `berita`) VALUES ('$judul', 'artikel')";
				$result = $db->query($q);

				if($result){
					echo "<script>alert('Data Berhasil Di Tambah !'); document.location.href='berita.php';</script>";
				}else{
					echo "<script>alert('Data Gagal Di Tambah !'); document.location.href='berita.php'</script>";
				}
			}

		}
		public function Edit($id,$judul, $artikel,$gambar){
			global $db;

			if ($gambar) {
				$lokasi_file = $_FILES['gambar']['tmp_name'];
					$nama_file   = $_FILES['gambar']['name'];
					$direktori   = "../includes/img/$nama_file";
				    move_uploaded_file($lokasi_file,$direktori);
				$q = "UPDATE tbl_berita SET `judul` = '$judul', `berita` = '$artikel', `images` = '$gambar' WHERE idberita = $id";

				$result = $db->query($q);
				
				if($result){
					echo "<script>alert('Data Berhasil Di Ubah !'); document.location.href='berita.php';</script>";
				}else{
					echo "<script>alert('Data Gagal Di Delete !'); document.location.href='berita.php'</script>";
				}
			}else{
				$q = "UPDATE tbl_berita SET `judul` = '$judul', `berita` = '$artikel' WHERE idberita = $id";
				
				$result = $db->query($q);

				if($result){
					echo "<script>alert('Data Berhasil Di Ubah !'); document.location.href='berita.php';</script>";
				}else{
					echo "<script>alert('Data Gagal Di Delete !'); document.location.href='berita.php'</script>";
				}
			}
		}

		public function Delete($id){
			global $db;

			$q = "DELETE FROM tbl_berita where idberita = $id";
			$result = $db -> query($q);
			if($result){
				echo "<script>alert('Data Berhasil Di Delete !'); document.location.href='berita.php';</script>";
			}else{
				echo "<script>alert('Data Gagal Di Delete !'); document.location.href='berita.php'</script>";
			}
		}
	}

	class Buku
	{
		public function KodeBuku(){
			global $db;
			$q = "SELECT max(kodebuku) as kode from tbl_buku ";
			$result = $db->query($q);

			$data = $result->fetch_array();
			$kdMax = $data['kode'];
			$noUrut = (int) substr($kdMax, 3, 5);

			$noUrut++;
			$newKode = "SEA" . sprintf("%05s", $noUrut);

			return $newKode;
		}

		public function View(){
			global $db;
			
			$q = "SELECT tb.* ,rb.nama as namarak FROM tbl_buku tb right join tbl_rakbuku rb on tb.idrakbuku = rb.idrak order by idbuku desc";
			$result = $db->query($q);
			return $result;
		}

		public function TotalBuku(){
			global $db;

			$q = "SELECT count(*) as total from tbl_buku";
			$result = $db->query($q);

			return $result;
		}
		public function ViewbyId($id){
			global $db;
			
			$q = "SELECT sub.*, group_concat(tkategori.nama) as namakatekogri
					From
					(
					SELECT tb.*, GROUP_CONCAT(tp.nama) as penulis ,tpen.nama as namapenerbit , trak.nama as namarakbuku
					FROM tbl_buku tb

					left join tbl_penerbit tpen
					on tb.idpenerbit = tpen.idpenerbit

					left join tbl_rakbuku trak 
					on tb.idrakbuku = trak.idrak

					left join rel_bukupenulis rpenulis
					on tb.idbuku = rpenulis.idbuku

					left join tbl_penulis tp
					on rpenulis.idpenulis = tp.idpenulis

					where tb.idbuku = $id
					GROUP BY tb.idbuku) as sub

					Join  rel_bukukategori rk
					On rk.idbuku = sub.idbuku
					Join tbl_kategori tkategori
					On rk.idkategori=tkategori.idkategori
					";
			$result = $db->query($q);
			return $result;
		}

		public function Bkupinjam($id){
			global $db;
			// $q = "SELECT COUNT(*)  bkpinjam FROM rel_peminjamanbuku rp where rp.idbuku = $id";
			$q = "SELECT COUNT(*)  bkpinjam  FROM rel_peminjamanbuku rp 
left join tbl_peminjaman tp on tp.idpeminjam = rp.idpeminjaman
where rp.idbuku = $id AND tp.`status` = 1";
			$result = $db->query($q);
			return $result;

		}

		public function ViewbyKategori($id){
			global $db;
			$q = "SELECT tb.*, tp.nama ,tp.images , trak.nama as namarakbuku
					FROM tbl_buku tb

					left join tbl_penerbit tpen
					on tb.idpenerbit = tpen.idpenerbit

					left join tbl_rakbuku trak 
					on tb.idrakbuku = trak.idrak

					left join rel_bukupenulis rpenulis
					on tb.idbuku = rpenulis.idbuku

					left join tbl_penulis tp
					on rpenulis.idpenulis = tp.idpenulis
					
					left join rel_bukukategori rb
					on rb.idbuku = tb.idbuku 
					
					where rb.idkategori = $id
				
					GROUP BY tb.idbuku";

			$result = $db->query($q);
			return $result;

		}

		public function ViewByLimit(){
			global $db;
			$q = "SELECT tb.judul , tr.nama FROM tbl_buku tb
					left join tbl_rakbuku tr on tb.idrakbuku = tr.idrak
					ORDER BY tb.idbuku DESC LIMIT 6";

			$result = $db->query($q);
			return $result;

		}

		public function ViewByGroup(){
			global $db;
			
			$q = "SELECT tb.* , tp.nama  , tp.images ,tp.nama_lain FROM tbl_buku tb 
					left join rel_bukupenulis rp on tb.idbuku = rp.idbuku
					left join tbl_penulis tp on rp.idpenulis = tp.idpenulis
					GROUP by tb.idbuku 
					order by tb.idbuku DESC LIMIT 6";
			$result = $db->query($q);
			return $result;
		}
		
		public function Create($kodebu,$judul,$sinopsis,$jumlah,$tahunterbit,$isbn,$hargabuku,$penerbit,$rakbuku,$gambar){
			global $db;

			if ($gambar) {
				# code...
				$lokasi_file = $_FILES['gambar']['tmp_name'];
				$nama_file   = $_FILES['gambar']['name'];
				$direktori   = "../includes/img/$nama_file";
			    move_uploaded_file($lokasi_file,$direktori);

				// $q = "INSERT INTO `seaonline`.`tbl_buku` (`judul`, `sinopsis`, `cover`,`jumlahbuku`,`isbn`,`idpenerbit`) 
				// VALUES ('$judul', '$sinopsis', '$gambar','$jumlah','$isbn','$penerbit')";
				

				$q = "INSERT INTO `seaonline`.`tbl_buku` (`kodebuku`, `judul`, `sinopsis`, `idpenerbit`, `idrakbuku`, `tahun_terbit`, `jumlahbuku`, `isbn`, `hargabuku`,`cover`)
				 VALUES ('$kodebu', '$judul', '$sinopsis', '$penerbit', '$rakbuku', '$tahunterbit', '$jumlah', '$isbn', '$hargabuku','$gambar')";
				$result = $db->query($q);


				return $result;

				// if($result){
				// 	echo "<script>alert('Data Berhasil Di Tambah !'); document.location.href='berita.php';</script>";
				// }else{
				// 	echo "<script>alert('Data Gagal Di Tambah !'); document.location.href='berita.php'</script>";
				// }

			}else{

				# code...
				$q = "INSERT INTO `seaonline`.`tbl_buku` (`kodebuku`, `judul`, `sinopsis`, `idpenerbit`, `idrakbuku`, `tahun_terbit`, `jumlahbuku`, `isbn`, `hargabuku`)
				 VALUES ('$kodebu', '$judul', '$sinopsis', '$penerbit', '$rakbuku', '$tahunterbit', '$jumlah', '$isbn', '$hargabuku')";

				

				$result = $db->query($q);

				return $result;

				// if($result){
				// 	echo "<script>alert('Data Berhasil Di Tambah !'); document.location.href='berita.php';</script>";
				// }else{
				// 	echo "<script>alert('Data Gagal Di Tambah !'); document.location.href='berita.php'</script>";
				// }
			}			
		}

		public function Edit($id,$judul,$sinopsis,$jumlah,$tahunterbit,$isbn,$hargabuku,$bukuhilang,$bukurusak,$penerbit,$rakbuku,$gambar){
			global $db;

			if ($gambar) {
				# code...

				$lokasi_file = $_FILES['gambar']['tmp_name'];
				$nama_file   = $_FILES['gambar']['name'];
				$direktori   = "../includes/img/$nama_file";
			    move_uploaded_file($lokasi_file,$direktori);

			    $q = "UPDATE `seaonline`.`tbl_buku` SET  `judul`='$judul', `sinopsis`='$sinopsis', 
				`idpenerbit`=$penerbit, `idrakbuku`=$rakbuku, `tahun_terbit`='$tahunterbit', `jumlahbuku`='$jumlah', 
				`bukuhilang`='$bukuhilang', `bukurusak`='$bukurusak', `isbn`='$isbn' ,`hargabuku` ='$hargabuku' ,`cover` ='$gambar' WHERE  `idbuku`=$id";

				// echo "UPDATE `seaonline`.`tbl_buku` SET  `judul`='$judul', `sinopsis`='$sinopsis', 
				// `idpenerbit`=$penerbit, `idrakbuku`=$rakbuku, `tahun_terbit`='$tahunterbit', `jumlahbuku`='$jumlah', 
				// `bukuhilang`='$bukuhilang', `bukurusak`='$bukurusak', `isbn`='$isbn' ,`hargabuku` ='$hargabuku' ,`cover` ='$gambar' WHERE  `idbuku`=$id";

				$result = $db->query($q);
				return $result;

			}else{

				$q = "UPDATE `seaonline`.`tbl_buku` SET  `judul`='$judul', `sinopsis`='$sinopsis', 
				`idpenerbit`=$penerbit, `idrakbuku`=$rakbuku, `tahun_terbit`='$tahunterbit', `jumlahbuku`='$jumlah', 
				`bukuhilang`='$bukuhilang', `bukurusak`='$bukurusak', `isbn`='$isbn' ,`hargabuku` ='$hargabuku' WHERE  `idbuku`=$id";

				// echo "UPDATE `seaonline`.`tbl_buku` SET  `judul`='$judul', `sinopsis`='$sinopsis', 
				// `idpenerbit`=$penerbit, `idrakbuku`=$rakbuku, `tahun_terbit`='$tahunterbit', `jumlahbuku`='$jumlah', 
				// `bukuhilang`='$bukuhilang', `bukurusak`='$bukurusak', `isbn`='$isbn' ,`hargabuku` ='$hargabuku' WHERE  `idbuku`=$id";
			
				$result = $db->query($q);
				return $result;


			}

			
		}
		public function Delete($id){
			global $db;
			$q = "DELETE FROM tbl_buku where idbuku = $id";
			$result = $db->query($q);
			if($result){
				echo "<script>alert('Data Berhasil Di Delete !'); document.location.href='opsibuku.php';</script>";
			}else{
				echo "<script>alert('Data Gagal Di Delete !'); document.location.href='opsibuku.php'</script>";
			}
		}

		public function AmbilDataByNama($nmbuku){
			global $db;

			$q = "SELECT * from tbl_buku where judul = '$nmbuku'";
			$query = $db->query($q);
			$data = $query->fetch_array();
			$result = $data['idbuku'];

			return $result;

		}


	}

	class RelBuku extends Buku
	{
		function CreateRelKategori($id,$k){
			global $db;
			$q = "INSERT INTO rel_bukukategori(idbuku,idkategori) VALUES ('$id','$k')";
			$result = $db->query($q);

			return $result;
		}
		function CreateRelPenulis($id,$p){
			global $db;
			$q = "INSERT INTO rel_bukupenulis (idbuku,idpenulis) VALUES ('$id','$p')";
			$result = $db->query($q);

			return $result;

		}
		
		public function DeleteRelBukuKategori($id){
			global $db;
			$q = "DELETE FROM rel_bukukategori WHERE idbuku = '$id'";
			$result = $db->query($q);
			return $result;
		}

		public function DeleteRelBukuPenulis($id){
			global $db;
			$q = "DELETE FROM rel_bukupenulis WHERE idbuku = '$id'";
			$result = $db->query($q);
			return $result;
		}

		public function ViewTotKateCount(){
			global $db;
			$q = "SELECT rb.*,tk.nama , count(*) as tot FROM rel_bukukategori rb 
					left join tbl_buku tb on tb.idbuku = rb.idbuku
					left join tbl_kategori tk on tk.idkategori = rb.idkategori
					GROUP BY tk.idkategori ORDER BY tot DESC limit 3";
			$result = $db->query($q);
			return $result;
		}
	}

	class Peminjaman 
	{
		public function View(){
			global $db;
			$q = "SELECT t_pem.* , t_buku.judul , t_user.nama ,(TO_DAYS(CURRENT_DATE)-TO_DAYS(tglharuskmbl)) AS lamakembali FROM rel_peminjamanbuku r_pem 
					left join tbl_peminjaman t_pem on r_pem.idpeminjaman = t_pem.idpeminjam
					left join tbl_buku t_buku on r_pem.idbuku = t_buku.idbuku 
					left join tbl_users t_user on t_pem.idusers = t_user.idusers";
			$result = $db->query($q);
			return $result;
		}

		public function TotalPeminjaman(){
			global $db;
			$q = "SELECT COUNT(*) as total from rel_peminjamanbuku";
			$result = $db->query($q);

			return $result;
		}
		public function ViewTotPinjamCount(){
			global $db;
			$q = "SELECT tu.nama , count(*) as peminjaman FROM rel_peminjamanbuku rp
					left join tbl_peminjaman tp on tp.idpeminjam = rp.idpeminjaman
					left join tbl_users tu on tu.idusers = tp.idusers GROUP BY tu.nama ORDER BY peminjaman DESC limit 3";
			$result = $db->query($q);
			return $result;
		}

		public function ViewById($id){
			global $db;
			$q = "SELECT tp.* ,((TO_DAYS(CURRENT_DATE)-TO_DAYS(tglharuskmbl))*5000) AS lamakembali , tu.nama ,tu.images  , tb.kodebuku , tb.judul ,tu.username , tb.sinopsis , tb.cover FROM tbl_peminjaman tp 
					LEFT JOIN tbl_users tu on tp.idusers = tu.idusers
					LEFT JOIN rel_peminjamanbuku rp on tp.idpeminjam = rp.idpeminjaman
					LEFT JOIN tbl_buku tb on rp.idbuku = tb.idbuku WHERE tp.idpeminjam = $id";
			$result = $db->query($q);
			return $result;
			// 		echo "<br>";
			// 		echo "<br>";
			// 		echo "<br>";
			// 		echo "<br>";
			// echo "SELECT tp.* , tb.kodebuku , tb.judul , tb.sinopsis , tb.cover FROM tbl_peminjaman tp 
			// 		LEFT JOIN rel_peminjamanbuku rp on tp.idpeminjam = rp.idpeminjaman
			// 		LEFT JOIN tbl_buku tb on rp.idbuku = tb.idbuku
			// 		WHERE tp.idpeminjam = $id";


		}
		public function ViewByUsers($id)
		{
			global $db;
			$q = "SELECT *,(TO_DAYS(CURRENT_DATE)-TO_DAYS(tglharuskmbl)) AS lamakembali FROM rel_peminjamanbuku rp
				Left join Tbl_peminjaman tp on rp.idpeminjaman = tp.idpeminjam
				left join tbl_buku tb on tb.idbuku = rp.idbuku 
				left join tbl_users tu on tu.idusers = tp.idusers

				where tu.idusers = $id and tp.status = 1;
				";
			$result = $db->query($q);
			return $result;
		}
		public function Create($idmember,$idbuku,$tglpinjam,$tglkmbli){
			global $db;
			// $q = "INSERT INTO `seaonline`.`tbl_peminjaman` (`idusers`, `totalharga`, `tglpinjam`, `tglharuskmbl`, `tglkembali`)
			//  VALUES ($idmember, '5000',STR_TO_DATE('$tglpinjam', '%m/%d/%Y') , STR_TO_DATE('$tglkmbli', '%m/%d/%Y') , '2015-06-23 23:11:40')";

			$q = "INSERT INTO `seaonline`.`tbl_peminjaman` (`idusers`, `tglpinjam`, `tglharuskmbl`) 
			VALUES ('$idmember', STR_TO_DATE('$tglpinjam', '%m/%d/%Y'), STR_TO_DATE('$tglkmbli', '%m/%d/%Y'))";

			  $result = $db->query($q);
			 $last_id = $db->insert_id;
			 $q1 = "INSERT INTO `seaonline`.`rel_peminjamanbuku` (`idpeminjaman`, `idbuku`) 
			 VALUES ($last_id,$idbuku)";
			 $results = $db->query($q1);

			if($results == true and $result == true){
				echo "<script>alert('Data Berhasil Di Tambah !'); document.location.href='opsipeminjaman.php';</script>";
			}else{
				echo "<script>alert('Data Gagal Di Tambah !'); document.location.href='opsipeminjaman.php'</script>";
			}
		}

		public function Edit($id){
			global $db;
			$q = "UPDATE `seaonline`.`tbl_peminjaman` SET `status`='1' WHERE  `idpeminjam`=$id";

			$result = $db->query($q);
			if($result){
				echo "<script>alert('Buku Dikembalikan!'); document.location.href='opsipeminjaman.php'</script>";
			}else{
				echo "<script>alert('Buku Gagal Dikembalikan!'); document.location.href='opsipeminjaman.php'</script>";
			}
		}
		
	}

	class Pagging
	{
		function pagination($query,$per_page=10,$page=1,$url='?'){   
		    global $db; 
		    $query = "SELECT COUNT(*) as `num` FROM {$query}";
		    $row = mysqli_fetch_array(mysqli_query($db,$query));
		    $total = $row['num'];
		    $adjacents = "2"; 
		     
		    $prevlabel = "&lsaquo; Prev";
		    $nextlabel = "Next &rsaquo;";
			$lastlabel = "Last &rsaquo;&rsaquo;";
		     
		    $page = ($page == 0 ? 1 : $page);  
		    $start = ($page - 1) * $per_page;                               
		     
		    $prev = $page - 1;                          
		    $next = $page + 1;
		     
		    $lastpage = ceil($total/$per_page);
		     
		    $lpm1 = $lastpage - 1; // //last page minus 1
		     
		    $pagination = "";
		    if($lastpage > 1){   
		        $pagination .= "<ul class='pagination'>";
		        $pagination .= "<li class='page_info'>Page {$page} of {$lastpage}</li>";
		             
		            if ($page > 1) $pagination.= "<li><a href='{$url}page={$prev}'>{$prevlabel}</a></li>";
		             
		        if ($lastpage < 7 + ($adjacents * 2)){   
		            for ($counter = 1; $counter <= $lastpage; $counter++){
		                if ($counter == $page)
		                    $pagination.= "<li><a class='current'>{$counter}</a></li>";
		                else
		                    $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
		            }
		         
		        } elseif($lastpage > 5 + ($adjacents * 2)){
		             
		            if($page < 1 + ($adjacents * 2)) {
		                 
		                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
		                    if ($counter == $page)
		                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
		                    else
		                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
		                }
		                $pagination.= "<li class='dot'>...</li>";
		                $pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
		                $pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";  
		                     
		            } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
		                 
		                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
		                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
		                $pagination.= "<li class='dot'>...</li>";
		                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
		                    if ($counter == $page)
		                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
		                    else
		                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
		                }
		                $pagination.= "<li class='dot'>..</li>";
		                $pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
		                $pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";      
		                 
		            } else {
		                 
		                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
		                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
		                $pagination.= "<li class='dot'>..</li>";
		                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
		                    if ($counter == $page)
		                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
		                    else
		                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
		                }
		            }
		        }
		         
		            if ($page < $counter - 1) {
						$pagination.= "<li><a href='{$url}page={$next}'>{$nextlabel}</a></li>";
						// $pagination.= "<li><a href='{$url}page=$lastpage'>{$lastlabel}</a></li>";
					}
		         
		        $pagination.= "</ul>";        
		    }
		     
		    return $pagination;
		}

	}

	/**
	* 
	*/
	class Usulan
	{
		
		function View()
		{
			global $db;
			$q = "SELECT * FROM tbl_usulanbuku order by tanggalusulan asc";

			$result = $db->query($q);
			return $result;

		}

		function ViewById($id)
		{
			global $db;
			$q = "SELECT * FROM tbl_usulanbuku where idusulan = $id";

			$result = $db->query($q);
			return $result;

		}

		public function TotalView(){
			global $db;
			$q = "SELECT count(*) as total from tbl_usulanbuku";

			$result = $db->query($q);
			return $result;
		}

		function tambahusulan($nama,$email,$judul,$pengarang,$penerbit,$tahunterbit,$harga,$keterangan)
		{
			global $db;
			$q = "INSERT INTO `seaonline`.`tbl_usulanbuku` 
					( `nama`, `email`, `judulbuku`, `pengarang`, `penerbit`, `tahunterbit`, `harga`, `keterangan`) 
					VALUES ('$nama', '$email', '$judul', '$pengarang', '$penerbit', '$tahunterbit', '$harga', '$keterangan')";
			$result = $db->query($q);

			if($result){
				echo "<script>alert('Usulan Buku Berhasil di kirim ke Petugas SeaOnline!'); document.location.href='index.php'</script>";
			}else{
				echo "<script>alert('Usulan Buku Gagal di kirim ke Petugas SeaOnline!'); document.location.href='index.php'</script>";
			}
		}

		function Delete($id)
		{
			global $db;
			$q = "DELETE FROM `seaonline`.`tbl_usulanbuku` WHERE  `idusulan`=$id";

			$result = $db->query($q);
			if($result){
				echo "<script>alert('Usulan Buku Berhasil di Hapus!'); document.location.href='usulanbuku.php'</script>";
			}else{
				echo "<script>alert('Usulan Buku Gagal di Hapus!'); document.location.href='usulanbuku.php'</script>";
			}
		}
	}

	 
	class Cetak
	{
		function PrintByTgl($awal,$akhir){
			global $db;
    		ob_end_clean();
			
			// Include the main TCPDF library (search for installation path).
			require_once('../Admin/vendor/tcpdf/tcpdf.php');

			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

			// create new PDF document
			$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			// set document information
			$pdf->SetCreator(PDF_CREATOR);
			$pdf->SetAuthor('Christiawan Eko ');
			$pdf->SetTitle('PDF');
			$pdf->SetSubject('PDF');
			$pdf->SetKeywords('PDF');
			// set default monospaced font
			$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
			//set margins
			$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			//set auto page breaks
			$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
			//set image scale factor
			$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
			//set some language-dependent strings

			// ---------------------------------------------------------
			// set default font subsetting mode
			$pdf->setFontSubsetting(true);
			// Set font
			// dejavusans is a UTF-8 Unicode font, if you only need to
			// print standard ASCII chars, you can use core fonts like
			// helvetica or times to reduce file size.
			$pdf->SetFont('dejavusans', '', 14, '', true);
			// Add a page
			// This method has several options, check the source code documentation for more information.
			$pdf->AddPage();
			// Set some content to print
			$tbl_header = 'Tanggal Cetak Laporan : '.$awal.' hingga '.$akhir.'<br><br><br>
			<table class="table table-bordered mbn"><thead>
                                <tr>
                                    <th width="5%" align="center">No</th>
                                    <th width="25%" align="center">Nama Peminjam</th>
                                    <th width="20%" align="center">Tanggal Pinjam</th>
                                    <th width="20%" align="center">Tanggal Kembali</th>
                                    <th width="30%" align="center">Status </th>
                                </tr>
                            </thead>
                            <tbody>';
			$tbl_footer = '</tbody>
                            </table>';
			$tbl ='';
			$q = "SELECT tp.* , tu.nama FROM tbl_peminjaman tp 
					left join tbl_users tu on tu.idusers = tp.idusers
					where tp.tglpinjam >= '$awal' and tp.tglpinjam <=  '$akhir'
				 ";
			$query = $db->query($q);
			$result = $query->fetch_array();
			$tbl .="";
			$no = 0;
			if ($result!=0) {
				while( $row = mysqli_fetch_array($query) ){
					$no++;
					if ($row['status']==1) {
                    	$status =  "Sudah Kembali";
                    }else{
                    	$status =  "Belum Kembali";
                    }
					$tbl .= '<tr>
                                <td width="5%" align="center">'.$no.'</td>
                                <td width="25%" align="center">'.$row['nama'].'</td>
                                <td width="20%" align="center">'.$row['tglpinjam'].'</td>
                                <td width="20%" align="center">'.$row['tglharuskmbl'].'</td>
                                <td width="30%" align="center">'.$status.'</td>
                            </tr>';
				}
			}else{
				echo "
					<script>
						alert('Tidak Ada Laporan Buku');
						window.location='laporan.php';
					</script>
					";
			}
			
			// Print text using writeHTMLCell()
			$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');
			// ---------------------------------------------------------
			// Close and output PDF document
			// This method has several options, check the source code documentation for more information.
			$pdf->Output('', 'I');
			//============================================================+
			// END OF FILE
			//============================================================+

		}
	}
?>