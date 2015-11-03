<?
    include 'header.php';
    $classmember = new Member();
    $classpeminjaman = new Peminjaman();


    if (!isset($_SESSION['sea_id']) && !isset($_SESSION['sea_username']) && !isset($_SESSION['sea_status'])==1) {
        header("Location:logout.php");
        exit();
    }else{
        set_time_limit(10000); 
        $id_users   = $_SESSION['sea_id'];
        $username    = $_SESSION['sea_username'];
        $status     = $_SESSION['sea_status'];
    } 


    $dataquery = $classmember->ViewbyId($id_users);
    $data = $dataquery->fetch_array();

?>
		<!--end right search-->
		<section class="header-page fade-up">
			<div class="bounce-in animate4"><h2 class="header-pagetitle">Panel Member</h2></div>
		</section>
		<section id="internalpage">
			<!--start container-->
		    <div class="divider"><span></span></div>
			<div class="container clearfix">
			 	<div class="titlesection">
	                <h1> Panel Member </h1>
	                <div class="grid_8 centersinglegrid">
	                <h4> panel yang bertujuan untuk mengecek beberapa buku yang anda pinjam   </h4>
	                </div> 
	            </div>  
				<div class="grid_2 orange">
		        	<div class="member orange fade-left animate1">
		                <div class="imgmember">
		                	<img alt="" class="opacity" src="Includes/img/<?=$data['images'];?>">
		                </div>
		                <h4 class="membername"><?=$data['nama'];?></h4>
		                <p class="memberposition"><i><?=$data['username'];?></i></p>
		                <p class="memberdescription"><?=$data['alamat'];?></p>
		        	</div>
		        	<div class="socialmember">
                	<ul>
                    	<li><a title="Pengaturan Akun" class="tooltip" href="#"><img alt="" src="Includes/images/tours/weather.png"></a></li>

                    	
                    </ul>
                </div>
		        </div> 
		        <div class="grid_10 orange">
		        <?
                $namabulan = array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		        $ViewPeminjamanByuser = $classpeminjaman->ViewByUsers($data['idusers']);
	        	while ($data = $ViewPeminjamanByuser->fetch_array()) {
		        		# code...
		        ?>
		        	<div class="grid_3 orange">
			        	<div class="destinationcarousel single-carousel">
                                
                                <img alt="" height="280" width="280" style="float:left" src="Includes/img/<?=$data['cover'];?>">
                                
                                <!--start avatarandtitle-->
                                <div class="avatarandtitle">
                                    
                                    <!--start avatar-->
                                    <div class="avatardestination">
                                        <img alt="" src="Includes/img/<?=$data['images'];?>"> 
                                    </div>
                                    <!--end avatar-->
                                    <!--title-->
                                    <p class="titledestination">
                                        <a href="books.php?action=view&id=<?=base64_encode($data['idbuku']);?>"><?=$data['judul'];?></a>
                                    </p>
                                    <!--end title-->
                                </div>
                                <!--end avatarandtitle-->
                                <p class="descriptiondestination">
                                <?
                                $dendas = $data['lamakembali'] * 5000;
                                    if ($dendas <= 0) {
                                        $denda = "belum ada denda";
                                    }else{
                                        $denda = $data['lamakembali'] * 5000;
                                    }
                                ?>

                                <?=substr($data['sinopsis'], 3,75);?> <br> denda : <?=$denda;?>
                                <?
                                	list($thn,$bln,$tgl)=explode('-',$data['tglharuskmbl']);
                                ?>
                                <div class="infodestination">
                                
                                    <div class="viewdestination">
                                        <span>
                                             &nbsp
                                            <?=$tgl;?>
                                        </span>
                                    </div>
                                   
                                    <div class="likedestination">
                                        <span>
                                             &nbsp
                                            <?=$namabulan[(int)$bln];?>
                                        </span>
                                    </div>
                                    
                                    <div class="commentsdestination">
                                        <span>
                                             &nbsp
                                            <?=$thn;?>
                                        </span>
                                    </div>
                                
                                </div>
                                   
                            </div>
                             <!--end destination 1-->
	                </div>
	                <? 
		        		}
	                ?>
		        </div> 
		    </div>

		</section>
<?
    include 'footer.php';
?>