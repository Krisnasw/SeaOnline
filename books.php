<?
    include 'header.php';
 
    $classBuku = new Buku();
    $classPagging = new Pagging();
    if (isset($_GET['action']) && isset($_GET['id'])) {
        $id = base64_decode($_GET['id']); 
        if ($_GET['action'] == 'view') {

                $fetchData = $classBuku->ViewbyId($id);
                $data = $fetchData->fetch_array();

                $fetchbkpnjam = $classBuku->Bkupinjam($id);
                $bkpnjam = $fetchbkpnjam->fetch_array();
           ?>
           <!--start page-->
            <div class="divider"><span></span></div>
            <section id="internalpage">

                <!--start container-->
                <div class="container clearfix">
                
                
                    <!--start content-->
                    <div class="grid_8 ">
                    
                        <!--start post-->
                        <div class="singlepost green">
                            
                            <img alt="" class="imgsinglepost" src="Includes/img/<?=$data['cover'];?>">
                            
                            <!--infosinglepost-->
                            <div class="infosinglepost">
                            
                                <div class="datesinglepost">
                                    <p><?=$data['tahun_terbit'];?></p>
                                    <span>th</span>
                                </div>
                               
                                <div class="iconsinglepost">
                                    <p><img alt="" src="Includes/images/blog/author.png"><a href="#"><?=$data['penulis'];?></a></p>
                                    <p><img alt="" src="Includes/images/blog/category.png"><a href="#"><?=$data['namapenerbit'];?></a></p>
                                </div>
                                
                            </div>
                            <!--end infosinglepost-->
                            
                            
                            <h1 class="titlesinglepost"><?=$data['judul'];?></h1>
                            <?=$data['sinopsis'];?>
                            <div class="divider"><span></span></div>
                            
                        </div>
                        <!--end post-->
                        
                    </div>
                    <!--end content-->
                    <!--start sidebar-->
                    <div class="grid_4">
                        <!--start pages-->
                        <div id="pages-2" class="widget widget_pages">
                            <h2>Detail Buku</h2>
                            <ul>
                                <li class="page_item page-item-98">
                                    <a href="#">Kode Buku : <?=$data['kodebuku'];?> </a>
                                </li>
                                <li class="page_item page-item-98">
                                    <a href="#">ISBN : <?=$data['isbn'];?> </a>
                                </li>
                                <li class="page_item page-item-98">
                                    <? 
                                        $totpnjm = $data['jumlahbuku']-$bkpnjam['bkpinjam'];

                                        if ($totpnjm == 0) {
                                            # code...
                                            ?>
                                                <a href="#">Jumlah Buku : Stock Habis</a>
                                            <?
                                        }else{
                                            ?>
                                                <a href="#">Jumlah Buku : <?=$totpnjm;?> </a>
                                            <?
                                        }
                                    ?>
                                </li>
                                <li class="page_item page-item-98">
                                    <a href="#">Buku Hilang: <?=$data['bukuhilang'];?> </a>
                                </li>
                                <li class="page_item page-item-98">
                                    <a href="#">Buku Rusak : <?=$data['bukurusak'];?> </a>
                                </li>
                                <li class="page_item page-item-98">
                                    <a href="#">Harga Buku : <?=$data['hargabuku'];?> </a>
                                </li>
                                <li class="page_item page-item-98">
                                    <a href="#">Rak buku : <?=$data['namarakbuku'];?></a>
                                </li>
                            </ul>
                        </div>
                        <!--end pages-->

                        <!--start tag-->
                        <div id="tag_cloud-2" class="widget widget_tag_cloud">
                            <h2>Kategori Buku</h2>
                            <?
                                $pecah = strtok($data['namakatekogri'], ",");
                                while ($pecah) {
                                    # code...
                                    echo "<div class='tagcloud'><a href='#'>".$pecah."</a></div>";
                                    $pecah = strtok(",");
                                }
                            ?>
                            
                        </div> 
                        <!--end tag-->        
                    </div>
                </div>
                <!--end container--> 
                
            </section>
            <!--end internal page-->

           <?
        }
    }else{
?>
            <!--end right search-->
            <section class="header-page fade-up header-page-buku">
                <div class="bounce-in animate4"><h2 class="header-pagetitle">Buku SeaOnline</h2></div>
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

                $statement = "`tbl_buku` ORDER BY `idbuku` ASC"; 
                
                $q = "SELECT tb.* , tp.nama  , tp.images ,tp.nama_lain FROM tbl_buku tb 
                                left join rel_bukupenulis rp on tb.idbuku = rp.idbuku
                                left join tbl_penulis tp on rp.idpenulis = tp.idpenulis
                                GROUP by tb.idbuku 
                                order by tb.idbuku DESC";
                $results = mysqli_query($db,"{$q} LIMIT {$startpoint} , {$per_page}");

                if (mysqli_num_rows($results) != 0) {

                    while ($data = mysqli_fetch_array($results)) {
                        
                ?>
                        <div class="grid_6">
                            <!--start archivetour-->
                            <div class="archivetour yellow fade-left animate1">
                                
                                <!--left-->
                                <div class="leftarchivetour">
                                    <a href="?action=view&id=<?=base64_encode($data['idbuku']);?>">
                                    <img alt="" class="opacity" height="219" width="290" style="float:left"  src="Includes/img/<?=$data['cover'];?>">
                                    </a>
                                
                                    <div class="pricetitleleftarchivetour">
                                        <div class="avatardestinationbooks">
                                            <img alt="" src="Includes/img/<?=$data['images'];?>"> 
                                        </div>

                                        <p class="titleleftarchivetour"><?=$data['nama'];?></p>
                                    </div>
                                
                                
                                </div>
                                <!--end left-->
                                
                                <!--right-->
                                <div class="rightarchivetour">
                                
                                    <div class="titledayarchivetour">
                                        <a href="?action=view&id=<?=base64_encode($data['idbuku']);?>"><p class="titlearchivetour"><?=$data['judul'];?></p></a>
                                    
                                        <div class="dayarchivetour">
                                            <p><?=$data['tahun_terbit'];?></p>
                                            <span>th</span>
                                        </div>
                                    
                                    </div>
                                    
                                    <div class="descriptioniconsarchivetour">
                                    
                                        <p class="descriptionarchivetour">
                                            <?=substr($data['sinopsis'], 3,175);?>
                                        </p>
                                        <p class="iconsarchivetour">
                                        
                                            <a title="Baca Lebih Detail" class="tooltip"  href="?action=view&id=<?=base64_encode($data['idbuku']);?>"><img alt="" src="Includes/images/tours/icon/insurance.png"> Baca Selengkapnya</a>
                                        
                                        </p>
                                    
                                    </div>
                                
                                </div>
                                <!--end right-->
                                   
                            </div>
                            <!--end archivetour-->
                        </div>
                    
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