<?
    include 'header.php';

    $classBuku = new Buku();
    $classPagging = new Pagging();
?>
                                <!--end right search-->
    <section class="header-page fade-up header-page-tours">
        <div class="bounce-in animate4"><h2 class="header-pagetitle">Buku SeaOnline</h2></div>
    </section>

    <div class="divider"><span></span></div>

    <!--start page-->
    <section id="internalpage">

        <!--start container-->
    <div class="container clearfix">
    <?
    if (isset($_GET['action']) && isset($_GET['id'])) {
        $id = base64_decode($_GET['id']);
        if ($_GET['action'] == 'cari') {
            $ViewBukuByKategori = $classBuku->ViewbyKategori($id);
            while ($data = $ViewBukuByKategori->fetch_array()) {
                # code...
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
                                        
                                            <a title="Baca Lebih Detail" class="tooltip"  href="books.php?action=view&id=<?=base64_encode($data['idbuku']);?>"><img alt="" src="Includes/images/tours/icon/insurance.png"> Baca Selengkapnya</a>
                                        
                                        </p>
                                    
                                    </div>
                                
                                </div>
                                <!--end right-->
                                   
                            </div>
                            <!--end archivetour-->
                        </div>
                   
                <?
            }
        }
    }else{
        header('Location: index.php');
    }
    ?>
            </div>
        </section>
    <div class="divider"><span></span></div>

<?
    include 'footer.php';
?>