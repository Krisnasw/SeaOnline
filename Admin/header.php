<?
  ob_start(); 
  session_start();
    include ('../config/conn.php');
    include ('../controller/FungsiUser.php');
    include ('../controller/FungsiAll.php');

    if (!isset($_SESSION['sea_id']) && !isset($_SESSION['sea_username']) && !isset($_SESSION['sea_status'])) {
        header("Location:logout.php");
        exit();
    }else{
        set_time_limit(10000); 
        $id_users   = $_SESSION['sea_id'];
        $username    = $_SESSION['sea_username'];
        $status     = $_SESSION['sea_status'];
    }

    $classmember = new Member();
    $Viewmember = $classmember->ViewbyId($id_users);
    $member = $Viewmember->fetch_array();
?> 

<!DOCTYPE html>
<html>

<head> 
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>Admin Panel SeaOnline</title>
    <meta name="keywords" content="SEAONLINE" />
    <meta name="description" content="SEAONLINE">
    <meta name="author" content="SEAONLINE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="assets/js/bootstrap-confirmation.js"></script>-->
    <!-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css"> -->
    <!-- <script src="http://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script> -->


    <!-- AUTO COMPLITE-->
    <script type="text/javascript" src="assets/js/jquery-1.2.1.pack.js"></script> 
    <script type="text/javascript">
        function cari(kataKunci){
            if(kataKunci.length == 0) {
                $('#suggestions').hide();
            } else {
                $.post("prosesbukusearch.php", {kataKunci: ""+kataKunci+""}, function(data){
                    if(data.length >0) {
                        $('#suggestions').show();
                        $('#autoSuggestionsList').html(data);
                    }
                });
            }
        }
        function isiTextbox(thisValue) {
            $('#kataKunci').val(thisValue);
            setTimeout("$('#suggestions').hide();", 200); 
        }

        function carinama(nama){
            if(nama.length == 0) {
                $('#suggestnama').hide();
            } else {
                $.post("prosesbukusearch.php", {nama: ""+nama+""}, function(data){
                    if(data.length >0) {
                        $('#suggestnama').show();
                        $('#autoSuggestionsNama').html(data);
                    }
                });
            }
        }
        function isiTextboxnama(thisValue) {
            $('#nama').val(thisValue);
            setTimeout("$('#suggestnama').hide();", 200); 
        }
    </script>
    <!-- AUTO COMPLITE selesai -->
    <!-- AUTO tambah filed row 
    <script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; 
        var addButton = $('.add_button');
        var wrapper = $('.field_wrapper'); 
        var fieldHTML = '<div><input type="text" name="field_name[' + x + ']" value="" id="kataKunci" onkeyup="cari(this.value);" onblur="isiTextbox(); value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="remove-icon.png"/></a></div>'; //New input field html 
        var x = 1;
        $(addButton).click(function(){ 
            if(x < maxField){ 
                x++; 
                $(wrapper).append(fieldHTML); 
            }else{
                 alert("CUKUP");
            }
        });
        $(wrapper).on('click', '.remove_button', function(e){ 
            e.preventDefault();
            $(this).parent('div').remove(); 
            x++; 
        });
        x++;
    }); -->
    </script>
    <!-- CHARTS -->

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'charts',
                    type: 'column'
                },
                title: {
                    text: 'Buku Populer',
                    x: -20 //center
                },
                subtitle: {
                    text: 'buku yang sering di pinjam oleh anggota',
                    x: -20
                },
                xAxis: {
                    categories: []
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Peminjam'
                    },
                    plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                },
                tooltip: {
                    headerFormat: '<span style="font-size:11px">Jumlah Peminjam</span><br>',
                    pointFormat: '<span style="color:{point.color}"></span>:<b>{point.y}</b> of total<br/>'
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -40,
                    y: 100,
                    floating: true,
                    borderWidth: 1,
                    backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
                    shadow: true
                },
                series: []
            };
            $.getJSON("data.php", function(json) {
                options.xAxis.categories = json[0]['data']; //xAxis: {categories: []}
                options.series[0] = json[1];
                chart = new Highcharts.Chart(options);
            });
        });
    </script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
    <!-- CHARTS selesai -->


    <!-- AUTO tambah filed row  selesai-->
    <!-- FROLAAAAAAAAAAAA  -->
    <script src="assets/admin-tools/frola/js/libs/jquery-1.11.1.min.js"></script>
    <script src="assets/admin-tools/frola/js/froala_editor.min.js"></script>



    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='assets/stylefont.css'>
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">
    
    <!-- Required Plugin CSS -->
    <link rel="stylesheet" type="text/css" href="vendor/plugins/datatables/media/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    
    <link rel="stylesheet" type="text/css" href="vendor/plugins/ladda/ladda.min.css">
  
    <link href="assets/admin-tools/frola/css/froala_editor.min.css" rel="stylesheet" type="text/css">
    <link href="assets/admin-tools/frola/css/froala_style.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<style type="text/css">
    .suggestionsBox {
        position: absolute;
        left: 40px;
        z-index: 10;
        margin: 10px 0px 0px 0px;
        width: 400px;
        background-color: #212427;
        -moz-border-radius: 7px;
        -webkit-border-radius: 7px;
        border: 2px solid #000;
        color: #fff;
    }
    .suggestionList {
        margin: 0px;
        padding: 0px;
    }
    .suggestionList li {
        margin: 0px 0px 3px 0px;
        padding: 3px;
        list-style-type: none;
        cursor: pointer;
    }
    .suggestionList li:hover {
        background-color: #659CD8;
    }
</style>

</head>


<body class="tables-datatables-page">
    <script>
        var boxtest = localStorage.getItem('boxed');
        if (boxtest === 'true') {
            document.body.className += ' boxed-layout';
        }
    </script>




    <!-- Start: Main -->
    <div id="main">

        <!-- Start: Header -->
        <header class="navbar navbar-fixed-top bg-light">
            <div class="navbar-branding">
                <a class="navbar-brand" href="index.php"> <b>Sea</b>Online </a>
                <span id="toggle_sidemenu_l" class="glyphicons glyphicons-show_lines"></span>
                <ul class="nav navbar-nav pull-right hidden">
                    <li>
                        <a href="#" class="sidebar-menu-toggle">
                            <span class="octicon octicon-ruby fs20 mr10 pull-right "></span>
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <span id="toggle_sidemenu_l2" class="glyphicon glyphicon-log-in fa-flip-horizontal hidden"></span>
                </li>
                <li class="dropdown hidden">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicons glyphicons-settings fs14"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="javascript:void(0);">
                                <span class="fa fa-times-circle-o pr5 text-primary"></span> Reset LocalStorage </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span class="fa fa-slideshare pr5 text-info"></span> Force Global Logout </a>
                        </li>
                        <li class="divider mv5"></li>
                        <li>
                            <a href="javascript:void(0);">
                                <span class="fa fa-tasks pr5 text-danger"></span> Run Cron Job </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span class="fa fa-wrench pr5 text-warning"></span> Maintenance Mode </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="request-fullscreen toggle-active" href="#">
                        <span class="octicon octicon-screen-full fs18"></span>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="ph10 pv20"> <i class="fa fa-circle text-tp fs8"></i>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img src="../Includes/img/<?=$member['images'];?>" alt="avatar" class="mw30 br64 mr15">
                        <span><?=$member['nama'];?></span>
                        <span class="caret caret-tp"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-persist pn w250 bg-white" role="menu">
                        <li class="br-t of-h">
                            <a href="#" class="fw600 p12 animated animated-short fadeInDown">
                                <span class="fa fa-gear pr5"></span> Account Settings </a>
                        </li>
                        <li class="br-t of-h">
                            <a href="logout.php" class="fw600 p12 animated animated-short fadeInDown">
                                <span class="fa fa-power-off pr5"></span> Logout </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </header>
        <!-- End: Header -->

        <!-- Start: Sidebar -->
        <aside id="sidebar_left" class="nano nano-primary">
            <div class="nano-content">

                <!-- Start: Sidebar Header -->
                <header class="sidebar-header">
                    <div class="user-menu">
                        <div class="row text-center mbn">
                            <div class="col-xs-4">
                                <a href="dashboard.html" class="text-primary" data-toggle="tooltip" data-placement="top" title="Dashboard">
                                    <span class="glyphicons glyphicons-home"></span>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="pages_messages.html" class="text-info" data-toggle="tooltip" data-placement="top" title="Messages">
                                    <span class="glyphicons glyphicons-inbox"></span>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="pages_profile.html" class="text-alert" data-toggle="tooltip" data-placement="top" title="Tasks">
                                    <span class="glyphicons glyphicons-bell"></span>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="pages_timeline.html" class="text-system" data-toggle="tooltip" data-placement="top" title="Activity">
                                    <span class="glyphicons glyphicons-imac"></span>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="pages_profile.html" class="text-danger" data-toggle="tooltip" data-placement="top" title="Settings">
                                    <span class="glyphicons glyphicons-settings"></span>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="pages_gallery.html" class="text-warning" data-toggle="tooltip" data-placement="top" title="Cron Jobs">
                                    <span class="glyphicons glyphicons-restart"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- End: Sidebar Header -->

                <!-- sidebar menu -->
                <ul class="nav sidebar-menu">
                    <li class="sidebar-label pt20">Menu</li>
                    <li class="active">
                        <a href="index.php">
                            <span class="glyphicons glyphicons-home"></span>
                            <span class="sidebar-title">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="berita.php">
                            <span class="glyphicons glyphicons-cup"></span>
                            <span class="sidebar-title">Berita</span>
                        </a>
                    </li>
                    <li class="sidebar-label pt15">Buku</li>
                   
                    <li>
                        <a class="accordion-toggle" href="#">
                            <span class="glyphicons glyphicons-book"></span>
                            <span class="sidebar-title">Page Buku</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="opsibuku.php">
                                    <span class="glyphicons glyphicons-warning_sign"></span> Opsi Buku </a>
                            </li>
                            <li>
                                <a href="opsikategori.php">
                                    <span class="glyphicons glyphicons-dislikes"></span> Opsi Kategori </a>
                            </li>
                            <li>
                                <a href="opsipenerbit.php">
                                    <span class="glyphicons glyphicons-macbook"></span> Opsi Penerbit </a>
                            </li>
                            <li>
                                <a href="opsipenulis.php">
                                    <span class="glyphicons glyphicons-check"></span> Opsi Penulis </a>
                            </li>
                            <li>
                                <a href="opsirakbuku.php">
                                    <span class="glyphicons glyphicons-check"></span> Opsi Rak Buku </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="accordion-toggle" href="#">
                            <span class="glyphicons glyphicons-book"></span>
                            <span class="sidebar-title">Page Peminjaman</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="nav sub-nav">
                            <li>
                                <a href="opsipeminjaman.php">
                                    <span class="glyphicons glyphicons-dislikes"></span> Opsi Peminjaman </a>
                            </li>
                            <li>
                                <a href="pagemember.php">
                                    <span class="glyphicons glyphicons-dislikes"></span> Member Perpustakaan</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="usulanbuku.php">
                            <span class="glyphicons glyphicons-book"></span>
                            <span class="sidebar-title">Usulan Buku</span>
                        </a>
                    </li>
                    <li>
                        <a href="laporan.php">
                            <span class="glyphicons glyphicons-book"></span>
                            <span class="sidebar-title">Laporan Buku</span>
                        </a>
                    </li>
                    <!-- sidebar bullets -->
                    <li class="sidebar-label pt20">Setting</li>
                    
                    <li class="sidebar-proj">
                        <a href="account.php">
                            <span class="fa fa-dot-circle-o text-primary"></span>
                            <span class="sidebar-title">Setting Akun</span>
                        </a>
                    </li>
                    <li class="sidebar-proj">
                        <a href="logout.php">
                            <span class="fa fa-dot-circle-o text-danger"></span>
                            <span class="sidebar-title">Logout</span>
                        </a>
                    </li>

                    <!-- sidebar progress bars -->
                    <li class="sidebar-label pt25 pb10">Buku Status</li>
                    <li class="sidebar-stat mb10">
                        <a href="#projectOne" class="fs11">
                            <span class="fa fa-inbox text-info"></span>
                            <span class="sidebar-title text-muted">Buku Persen</span>
                            <span class="pull-right mr20 text-muted">35%</span>
                            <div class="progress progress-bar-xs ml20 mr20">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 35%">
                                    <span class="sr-only">35% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="sidebar-stat mb10">
                        <a href="#projectOne" class="fs11">
                            <span class="fa fa-dropbox text-warning"></span>
                            <span class="sidebar-title text-muted">Bandwidth</span>
                            <span class="pull-right mr20 text-muted">58%</span>
                            <div class="progress progress-bar-xs ml20 mr20">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 58%">
                                    <span class="sr-only">58% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="sidebar-toggle-mini">
                    <a href="#">
                        <span class="fa fa-sign-out"></span>
                    </a>
                </div>
            </div>
        </aside>

        <!-- Start: Content -->
        <section id="content_wrapper">

                        <!-- Start: Topbar-Dropdown -->
            <div id="topbar-dropmenu">
                <div class="topbar-menu row">
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="metro-tile bg-success">
                            <span class="metro-icon glyphicons glyphicons-inbox"></span>
                            <p class="metro-title">Messages</p>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="metro-tile bg-info">
                            <span class="metro-icon glyphicons glyphicons-parents"></span>
                            <p class="metro-title">Users</p>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="metro-tile bg-alert">
                            <span class="metro-icon glyphicons glyphicons-headset"></span>
                            <p class="metro-title">Support</p>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="metro-tile bg-primary">
                            <span class="metro-icon glyphicons glyphicons-cogwheels"></span>
                            <p class="metro-title">Settings</p>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="metro-tile bg-warning">
                            <span class="metro-icon glyphicons glyphicons-facetime_video"></span>
                            <p class="metro-title">Videos</p>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-2">
                        <a href="#" class="metro-tile bg-system">
                            <span class="metro-icon glyphicons glyphicons-picture"></span>
                            <p class="metro-title">Pictures</p>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End: Topbar-Dropdown -->

