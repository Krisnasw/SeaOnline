<?
  ob_start(); 
  session_start();
    include 'Config/conn.php';
    include 'Controller/FungsiAll.php'; 
    include 'Controller/FungsiUser.php'; 

    $classsubkategori = new Subkategori();

?>
 

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html > <!--<![endif]-->
<head> 
 
    <meta charset="utf-8">  
    
    <title>SeaOnline - SEAMEO SEAMOLEC</title> <!--insert your title here-->  
    <meta name="description" content="SeaOnline Travel SEAMEO SEAMOLEC"> <!--insert your description here-->  
    <meta name="author" content="nicDark"> <!--insert your name here-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--meta responsive-->
    
  	<!--START CSS--> 
    <link rel="stylesheet" href="includes/css/style.css"> <!--main-->
    <link rel="stylesheet" href="includes/css/grid.css"> <!--grid-->
    <link rel="stylesheet" href="includes/css/responsive.css"> <!--responsive-->
    <link rel="stylesheet" href="includes/rs-plugin/css/settings.css" media="screen" /> <!--rev slider-->
    <link rel="stylesheet" href="includes/showbizpro/css/settings.css" media="screen" /> <!--showbiz-->
    <link rel="stylesheet" href="includes/css/animate.css"> <!--animate-->
    <link rel="stylesheet" href="includes/css/superfish.css" media="screen"> <!--menu-->
    <link rel="stylesheet" href="includes/css/fancybox/jquery.fancybox.css"> <!--main fancybox-->
    <link rel="stylesheet" href="includes/css/fancybox/jquery.fancybox-thumbs.css"> <!--fancybox thumbs-->
    <link rel="stylesheet" href="includes/css/isotope.css"> <!--isotope-->
    <link rel="stylesheet" href="includes/css/flexslider.css"> <!--flexslider-->
    <link rel="stylesheet" href="Admin/assets/admin-tools/frola/css/font-awesome.min.css">
    <!--END CSS-->
    
    <!--google fonts-->
    <link href='http://fonts.googleapis.com/css?family=Signika:400,300,600,700' rel='stylesheet' type='text/css'>
    
    <!--[if lt IE 9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>  
    <![endif]-->  
    
    <!--FAVICONS-->
    <link rel="shortcut icon" href="includes/images/favicon/favicon.ico">
    <link rel="apple-touch-icon" href="includes/images/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="includes/images/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="includes/images/favicon/apple-touch-icon-114x114.png">
    <!--END FAVICONS-->
    
    
</head>  
<body id="startpage">

<!--start left menu open-->
<div class="leftmenuopen leftmenuopendark"> <!--leftmenuopenlight or leftmenuopendark-->
    <p class="titlecloseleftmenu">Kategori Buku</p>
    <ul>
        <?
            $viewkategori = $classsubkategori->View();
            while ( $datakategori = $viewkategori->fetch_array()) {
                # code...
                echo "<li class='evidenceleftmenu'><p class='red'>".$datakategori['nama']."<span class='bulletevidenceleftmenu'></span></p></li>";
                $viewsubkategori = $classsubkategori->ViewbyId($datakategori['idkategori']);
                while ( $datasubkategori = $viewsubkategori->fetch_array()) {
                    # code...
                    echo"<li><p><a href='kategori.php?action=cari&id=".base64_encode($datasubkategori['idkategori'])."'>".$datasubkategori['nama']."</a></p></li>";
                }
            }
        ?>
    </ul>
</div>
<!--end left menu open-->
<!--start header-->
<header id="navigationmenu" class="fade-down animate1 navigationmenulight">
	
    <!--start left menu close-->
    <div class="leftmenuclose">
    	<img alt="" src="includes/images/header/leftmenuclose.png">
    </div>
    <!--end left menu close-->
    
    <!--start container-->
    <div class="container">
    
        <!--start navigation-->
    	<div class="grid_12 gridnavigation">
        
        	<img class="logo fade-up animate4" alt="" src="includes/images/logo.png">
        	<!--start navigation-->
<ul class="sf-menu" id="nav">
    
    <li class="current yellow">
    	<span class="menufilter"></span>
        <a href="index.php"><strong>HOME</strong></a>
    </li>
    
    <li class="red">
    	<span class="menufilter"></span>
        <a href="books.php"><strong>Buku</strong></a>
    </li>
    
    <li class="violet">
    	<span class="menufilter"></span>
        <a href="berita.php"><strong>Berita</strong></a>
    </li>
    
    <li class="green">
    	<span class="menufilter"></span>
        <a href="usulanbuku.php"><strong>Usul Buku</strong></a>
    </li>
    
    <li class="orange">
    	<span class="menufilter"></span>
        <a href="kontak.php"><strong>Kontak</strong></a>
    </li>
    <? 
        if (!isset($_SESSION['sea_id']) && !isset($_SESSION['sea_username']) && !isset($_SESSION['sea_status'])==1) {
        ?>

    <li class="blue">
        <span class="menufilter"></span>
        <a href="#"><strong>Login - Daftar</strong></a>
        <ul>
            <li><a href="login.php">Login</a></li>
            <li><a href="login.php?action=daftar">Daftar</a></li>
        </ul>
    </li>

        <?
        }else{
        ?>
     <li class="blue">
        <span class="menufilter"></span>
        <a href="#"><strong><?=$_SESSION['sea_username'];?></strong></a>
        <ul>
            <li><a href="users.php">Panel Member</a></li>
            <li><a href="logout.php">Logout</a></li>

        </ul>
    </li>
        <?
        } 
    ?>
   
</ul>   
<!--end navigationmenu-->	     
        
        </div>
        <!--end navigation-->

    </div>
    <!--end container-->
    
    <div class="rightsearchclose">
    	<img alt="" src="includes/images/header/rightsearch.png">
    </div>   
    
</header>
<!--end header-->

<!--start right search-->
<div class="rightsearchopen">

    <!--search form-->
    <form role="search" method="get" id="searchform" class="searchform" action="#">
        <div>
            <label class="screen-reader-text" for="s">SEARCH</label>
            <input type="text" value="" name="s" id="s" />
            <input type="submit" id="searchsubmit" value="Search" />
        </div>
    </form>
    <!--end search form-->
    
    <span class="rightsearchopenclose"></span>
     
</div>