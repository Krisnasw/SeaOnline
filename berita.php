<?
    include 'header.php';

    $classBerita = new Berita();
    $classPagging = new Pagging();
    if (isset($_GET['action']) && isset($_GET['id'])) {
        $id = base64_decode($_GET['id']);
        
        $namabulan = array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
        if ($_GET['action'] == 'view') {
                $fetchData = $classBerita->ViewbyId($id);
                $data = $fetchData->fetch_array();
                list($thn,$bln,$tgl)=explode('-',$data['tanggal']);
           ?>
           <!--start page-->
            <div class="divider"><span></span></div>
                <section id="internalpage">
                    <!--start container-->
                    <div class="container clearfix">
                        <!--start content-->
                        <div class="grid_8 centersinglegrid">
                        <!--start post-->
                        <div class="singlepost orange">
                            <img alt="" class="imgsinglepost" src="Includes/img/<?=$data['images'];?>">
                            <!--infosinglepost-->
                            <div class="infosinglepost">
                                <div class="datesinglepost">
                                   <p><?=$tgl;?></p>
                                    <span><?=$namabulan[(int)$bln];?></span>
                                </div>
                            </div>
                            <!--end infosinglepost-->
                            <h1 class="titlesinglepost"> <?=$data['judul'];?></h1>
                                <?=$data['berita'];?>
                            <div class="divider"><span></span></div>
                            </div>
                        </div>
                <!--end container--> 
                </div>
            </section>
            <!--end internal page-->

           <?
        }
    }else{
?>
            <!--end right search-->
            <section class="header-page fade-up header-page-tours">
                <div class="bounce-in animate4"><h2 class="header-pagetitle">Berita SeaOnline</h2></div>
            </section>

            <div class="divider"><span></span></div>

            <!--start page-->
            <section id="internalpage">

                <!--start container-->
                <div class="container clearfix">
                
                <? 
                $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
                if ($page <= 0) $page = 1;

                $per_page = 6; 

                $startpoint = ($page * $per_page) - $per_page;

                $statement = " `tbl_berita` ORDER BY `idberita` DESC"; 
                
                // $q = "SELECT tb.* , tp.nama  , tp.images ,tp.nama_lain FROM tbl_buku tb 
                //                 left join rel_bukupenulis rp on tb.idbuku = rp.idbuku
                //                 left join tbl_penulis tp on rp.idpenulis = tp.idpenulis
                //                 GROUP by tb.idbuku 
                //                 order by tb.idbuku";
                $results = mysqli_query($db,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");


                if (mysqli_num_rows($results) != 0) {
                $namabulan = array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

                    while ($data = mysqli_fetch_array($results)) {
                        if ($data['tanggal'] == 0) {
                            # code...
                        }else{
                         list($thn,$bln,$tgl)=explode('-',$data['tanggal']);
                        }
                            # code...
                ?>
                        <!--start post masonry-->
                        <div class="grid_4 singlemasonry singlepostmasonry blue">
                            
                            <img alt="" class="imgsinglepostmasonry" src="Includes/img/<?=$data['images'];?>">
                            
                            <div class="titledaysinglepostmasonry">
                                
                                <p class="titlesinglepostmasonry"><?=$data['judul'];?></p>
                            
                                <div class="daysinglepostmasonry">
                                    <p><?=$tgl;?></p>
                                    <span><?=$namabulan[(int)$bln];?></span>
                                </div>
                            
                            </div> 
                            
                            <p class="descriptionsinglepostmasonry"><?=substr($data['berita'], 3,300);?></p>   
                            <a class="areadmoresinglepostmasonry" href="?action=view&id=<?=base64_encode($data['idberita']);?>"><p class="readmoresinglepostmasonry">Baca Selengkapnya</p></a>
                        </div>
                        <!--end post masonry-->
                    <?
                    }

                    } else {
                         echo "Tidak Ada Buku.";
                    }
                    
                    ?>
                    
                
                </div>
                <!--end container--> 
                <? 
                    echo $classPagging->pagination($statement,$per_page,$page,$url='?');
                ?>
            </section>
            <!--end internal page-->

            <div class="divider"><span></span></div>

<?
    }
    include 'footer.php';
?>