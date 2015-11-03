<?
    include 'header.php';
 
    $classBuku = new Buku();
    $classBerita = new Berita();
?>
<!--end right search--><!--start slide-->
    <section class="sectionhome fade-down">
        
        <!--start rev slider-->
        <div class="tp-banner-container">
            <div class="tp-banner tp-banner-full-screen" >
                <ul>
                     <!-- SLIDE  -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="1000" >
                    <img src="Includes/images/rev-slider/1/slide1.jpg" style='background-color:#b2c4cc' alt=""  data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">
                 
                    <div class="tp-caption lfr"
                        data-x="750"
                        data-y="200"
                        data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                        data-speed="2000"
                        data-start="200"
                        data-easing="Power4.easeOut"
                        data-endspeed="500"
                        data-endeasing="Power4.easeIn"
                        style="z-index: 3"><img src="includes/images/rev-slider/1/model.png" alt="">
                    </div>

                    <div class="tp-caption customin customout"
                        data-x="534"
                        data-y="227"
                        data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                        data-speed="500"
                        data-start="2400"
                        data-easing="Back.easeOut"
                        data-endspeed="500"
                        data-endeasing="Power4.easeIn"
                        style="z-index: 3"><img src="includes/images/rev-slider/1/arrow1.png" alt="">
                    </div>

                    <div class="tp-caption customin customout"
                        data-x="453"
                        data-y="302"
                        data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                        data-speed="500"
                        data-start="2600"
                        data-easing="Back.easeOut"
                        data-endspeed="500"
                        data-endeasing="Power4.easeIn"
                        style="z-index: 3"><img src="includes/images/rev-slider/1/arrow2.png" alt="">
                    </div>

                    <div class="tp-caption customin customout"
                        data-x="372"
                        data-y="377"
                        data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                        data-speed="500"
                        data-start="2800"
                        data-easing="Back.easeOut"
                        data-endspeed="500"
                        data-endeasing="Power4.easeIn"
                        style="z-index: 3"><img src="includes/images/rev-slider/1/arrow3.png" alt="">
                    </div>

                    <div class="tp-caption greybgtextslider skewfromleft customout"
                        data-x="270"
                        data-y="220"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                        data-speed="2000"
                        data-start="700"
                        data-easing="Power4.easeOut"
                        data-endspeed="300"
                        data-endeasing="Power1.easeIn"
                        data-captionhidden="off"
                        style="z-index: 6">MEMINJAM BUKU
                    </div>
                    
                    <div class="tp-caption greybgtextslider skewfromleft customout"
                        data-x="200"
                        data-y="295"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                        data-speed="2000"
                        data-start="1200"
                        data-easing="Power4.easeOut"
                        data-endspeed="300"
                        data-endeasing="Power1.easeIn"
                        data-captionhidden="off"
                        style="z-index: 9">MENGECEK BUKU
                    </div>

                    <div class="tp-caption greybgtextslider skewfromleft customout"
                        data-x="40"
                        data-y="370"
                        data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                        data-speed="2000"
                        data-start="1700"
                        data-easing="Power4.easeOut"
                        data-endspeed="300"
                        data-endeasing="Power1.easeIn"
                        data-captionhidden="off"
                        style="z-index: 9">MENGEMBALIKAN BUKU
                    </div>
                
                </li>
                <!-- SLIDE  -->
                    <!-- SLIDE  -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1000" >
                        <img src="includes/images/rev-slider/4/slide4.jpg" style='background-color:#b2c4cc' alt=""  data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">
                    </li>
                    <!-- SLIDE  -->
                    
                    <!-- SLIDE  -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1000" >
                        <img src="includes/images/rev-slider/5/slide5.jpg" style='background-color:#b2c4cc' alt=""  data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">
                    </li>
                    <!-- SLIDE  -->
                    
                    <!-- SLIDE  -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1000" >
                        <img src="includes/images/rev-slider/6/slide6.jpg" style='background-color:#b2c4cc' alt=""  data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">
                    </li>
                    <!-- SLIDE  -->
            
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
        </div>
        <!--end rev slider-->

        
    </section>
    <!--end slide--><!--start services-->
    <section id="homeservices" class="sectionhome fade-up">

        <!--start container-->
        <div class="container clearfix">
        
            <!--start 2 service-->
            <div class="grid_4 homeservice">
                
                <div class="imgserviceopen">
                    <img alt="" src="includes/images/service/service2open.jpg" />
                </div>
                
                <div class="imgservice">
                
                    <!--start percentagehome-->
                    <div class="percentagehome" data-percent="60">
                        <img alt="" src="includes/images/service/service2.png" />
                    </div>
                    <!--end percentagehome-->
                    
                </div>
                
                <h2><a href="#">Meminjam Buku</a></h2>
                <p>Meminjam buku yang ada di perpustakaan SEAMOLEC dan berikan buku kepada petugas untuk di Proses</p>    
            </div>
            <!--end 2 service-->
            
            <!--start 1 service-->
            <div class="grid_4 homeservice">
                
                <div class="imgserviceopen">
                    <img alt="" src="includes/images/service/service1open.jpg" />
                </div>
                
                <div class="imgservice">
                    <!--start percentagehome-->
                    <div class="percentagehome" data-percent="30">
                        <img alt="" src="includes/images/service/service1.png" />
                    </div>
                    <!--end percentagehome-->
                </div>
                
                <h2><a href="#">Mengecek Buku</a></h2>
                <p>Mengecek tanggal pengembalian Buku-Buku yang di pinjam di perpustakaan SEAMEO SEAMOLEC</p>   
            </div>
            <!--end 1 service-->
            
            <!--start 3 service-->
            <div class="grid_4 homeservice">
                
                <div class="imgserviceopen">
                    <img alt="" src="includes/images/service/service3open.jpg" />
                </div>
                
                <div class="imgservice">
                
                    <!--start percentagehome-->
                    <div class="percentagehome" data-percent="100">
                        <img alt="" src="includes/images/service/service3.png" />
                    </div>
                    <!--end percentagehome-->
                    
                </div>
                
                <h2><a href="#">Mengembalikan Buku</a></h2>
                <p>Mengembalikan buku yang di pinjam ke perpustakaan SEAMEO SEAMOLEC</p>   
            </div>
            <!--end 3 service-->
        
        </div>
        <!--end container--> 
        
    </section>
    
    <div class="divider"><span></span></div>
    <!--end slide-->
    <section class="sectionhome" id="homepromotions">
        <!--start container-->
        <div class="container clearfix">
            <div class="grid_4">
            </div>
            <div class="grid_4">
                <h1 class="bounce-in animate2">Buku Terbaru</h1>
                <h4 class="bounce-in animate3">beberapa buku terbaru yang di tampilkan SeaOnline </h4>   
            </div>
            <div class="grid_4">
            </div>
        </div>
        <!--end container--> 
    </section>
    <!--end promotions-->
    <!--start homedestinations-->
    <section id="homedestinations">

        <!--start container for arrows-->
        <div class="container arrowscarousel yellow clearfix">
            
            <!--start arrows carousel-->
            <div class="grid_6">
                <div id="showbiz_left_2" class="arrowcarouselprev fade-right"></div>
            </div>
            <div class="grid_6">
                <div id="showbiz_right_2" class="arrowcarouselnext fade-left"></div>
            </div>
            <!--end arrows carousel-->
            
        </div>
        <!--end container for arrows-->
        
        <!--start container-->
        <div class="container clearfix showbiz-container">
        
            <div class="showbiz" data-left="#showbiz_left_2" data-right="#showbiz_right_2" data-play="#showbiz_play_2">
                <div class="overflowholder">
                    <ul>
                    
                    <?
                    $cbViewByGroup = $classBuku->ViewByGroup();

                    while ($data = $cbViewByGroup->fetch_array()) {
                       
                    ?>
                        <li>
                            <!--start destination 1-->
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
                                        <a href="books.php?action=view&id=<?=base64_encode($data['idbuku']);?>"><?=substr($data['judul'], 0,25);?></a>
                                    </p>
                                    <!--end title-->
                                    
                                </div>
                                <!--end avatarandtitle-->
                              
                                <p class="descriptiondestination">
                                <?=substr($data['sinopsis'], 3,75);?>

                                <div class="infodestination">
                                
                                    <div class="viewdestination">
                                        <span>
                                            <i class="fa fa-male fa-lg"></i> &nbsp
                                            1
                                        </span>
                                    </div>
                                   
                                    <div class="likedestination">
                                        <span>
                                            <i class="fa fa-book fa-lg"></i> &nbsp
                                            <?=$data['jumlahbuku'];?>
                                        </span>
                                    </div>
                                    
                                    <div class="commentsdestination">
                                        <span>
                                            <i class="fa fa-calendar fa-lg"></i> &nbsp
                                            <?=$data['tahun_terbit'];?>
                                        </span>
                                    </div>
                                
                                </div>
                                   
                            </div>
                             <!--end destination 1-->
                        </li>
                        
                    <?
                     }
                    ?>
                    
                    
                    </ul>

                </div>
            </div>
        
            
        </div>
        <!--end container--> 
        
    </section>
     <section class="sectionhome" id="homepromotions">
        <!--start container-->
        <div class="container clearfix">
            <div class="grid_4">
            </div>
            <div class="grid_4">
                <a class="btnpromotion rotate-In-Down-Left animate2" href="books.php"><p class="blue">Lebih Banyak Buku</p></a>    
            </div>
            <div class="grid_4">
            </div>
        </div>
        <!--end container--> 
    </section>
    <!--end homedestinations-->

    <!--start page-->
    <section class="sectionhome">

        <!--start container-->
        <div class="container clearfix">
            <div class="grid_12"></div><div class="grid_12"></div> <!--40px height-->
            <div class="grid_12">
                <div class="titlesection red">
                    <h2 class="titlewithborder"><span>Berita Terbaru</span></h2>
                </div>  
            </div>

            <!--start blogmasonry-->
            <div class="stylemasonry">

                <?

                    $namabulan = array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                    $cbViewBeritaLimit = $classBerita->ViewBeritaLimit();
                    while ($data = $cbViewBeritaLimit->fetch_array()) {
                        list($thn,$bln,$tgl)=explode('-',$data['tanggal']);
                        # code...

                ?>
                <!--start post masonry-->
                <div class="grid_4 singlemasonry singlepostmasonry blue">
                    <img alt="" class="imgsinglepostmasonry" src="Includes/img/<?=$data['images'];?>">
                    <div class="titledaysinglepostmasonry">
                        <p class="titlesinglepostmasonry"><?=substr($data['judul'], 0,30);?></p>
                        <div class="daysinglepostmasonry">
                            <p><?=$tgl;?></p>
                            <span><?=$namabulan[(int)$bln];?></span>
                        </div>
                    </div> 
                    <p class="descriptionsinglepostmasonry"><?=substr($data['berita'], 3,300);?></p>   
                    <a class="areadmoresinglepostmasonry" href="berita.php?action=view&id=<?=base64_encode($data['idberita']);?>"><p class="readmoresinglepostmasonry">Baca Selengkapnya</p></a>
                </div>
                <!--end post masonry-->
                <?
                    }
                ?>
            </div>
            
        </div>
        <!--end container--> 
        
    </section>
<!--end internal page-->
    <section class="sectionhome" id="homepromotions">
        <!--start container-->
        <div class="container clearfix">
            <div class="grid_4">
            </div>
            <div class="grid_4">
                <a class="btnpromotion rotate-In-Down-Right animate1" href="#"><p class="green">Lebih Banyak Berita</p></a>    
            </div>
            <div class="grid_4">
            </div>
        </div>
        <!--end container--> 
    </section>
    <div class="divider"><span></span></div>


<?
    include 'footer.php';
?>