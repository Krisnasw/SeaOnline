<?
    include 'header.php';

    $classusulan = new Usulan();
     if (isset($_POST['tambah_usulan'])) {
        # code...
        $nama 		= mysql_escape_string($_POST['nama']);
        $email 		= mysql_escape_string($_POST['email']);
        $judul 		= mysql_escape_string($_POST['judul']);
        $pengarang 	= mysql_escape_string($_POST['pengarang']);
        $penerbit 	= mysql_escape_string($_POST['penerbit']);
        $tahunterbit = mysql_escape_string($_POST['tahunterbit']);
        $harga 		= mysql_escape_string($_POST['harga']);
        $keterangan = mysql_escape_string($_POST['keterangan']);
 
        $classusulan->tambahusulan($nama,$email,$judul,$pengarang,$penerbit,$tahunterbit,$harga,$keterangan);
        
    }
?>
		<!--end right search-->
		<section class="header-page fade-up">
			<div class="bounce-in animate4"><h2 class="header-pagetitle">Usulan Buku</h2></div>
		</section>
		<section id="internalpage">
			<!--start container-->
		    <div class="container clearfix">
				<div class="grid_12">
		            <div class="titlesection">
		                <h1>Usulan Buku</h1>
		                <div class="grid_8 centersinglegrid">
		                <h4>
		                Perpustakaan SEAONLINE mengagendakan pembelian buku baru 
		                untuk meningkatkan jumlah koleksi. Berkenaan dengan hal tersebut, kami menghimbau kepada dosen,
		                 karyawan dan mahasiswa 
		                SEAMEO SEAMOLEC dan diluar SEAMEO SEAMOLEC untuk mengusulkan judul buku yang nantinya akan kami 
		                jadikan bahan acuan pembelian buku baru.</h4>
		                </div> 
		            </div>  
		        </div>
		        <!--start content-->
		        <div class="grid_8 centersinglegrid">
		            <!--start post-->	
		            <div class="singlepost orange">

		                <div class="comment-respond">
		                    
		                    <form action="#" method="POST" role="form"  enctype="multipart/form-data" class="comment-form">
		                        <input type="text" name="nama" placeholder="Nama" required />
		                        <input type="text" name="email" placeholder="Email"  required/>
		                        <input type="text" name="judul" placeholder="Judul Buku"  required/>
		                        <input type="text" name="pengarang" placeholder="Pengarang"  required/>
		                        <input type="text" name="penerbit" placeholder="Penerbit"  required/>
		                        <input type="text" name="tahunterbit" placeholder="Tahun Terbit" required />
		                        <input type="text" name="harga" placeholder="Harga Buku"  required/>
		                        <textarea name="keterangan"  placeholder="Keterangan Mengusulkan buku ini" required></textarea>
		                        <input type="submit"  name="tambah_usulan" value="Usul Buku Ini" />

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
    include 'footer.php';
?>