<?
    include 'header.php';
    $cetak = new Cetak();
    if (isset($_POST['cetak_laporan'])) {
        # code...
        // $tglawal = mysql_escape_string($_POST['tglawal']);
        // $tglakhir = mysql_escape_string($_POST['tglakhir']);
        $tglawal = date_format(date_create($_POST['tglawal']), 'Y-m-d');
        $tglakhir = date_format(date_create($_POST['tglakhir']), 'Y-m-d');
        $cetak->PrintByTgl($tglawal,$tglakhir);
        // echo $tglawal."<br>".$tglakhir;
    }
?> 
     <!-- Start: Topbar -->
    <header id="topbar" class="affix">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="crumb-active">
                    <a href="index.php">Member Perpustakaan</a>
                </li>
                <li class="crumb-icon">
                    <a href="index.php">
                        <span class="glyphicon glyphicon-user"></span>
                    </a>
                </li>
                <li class="crumb-link">
                    <a href="index.php">Home</a>
                </li>
                <li class="crumb-trail"><a href="opsipeminjaman.php">Page Laporan</a></li>
            </ol>
        </div>
    </header> 
    <!-- End: Topbar -->

    <div id="content">
        <div class="row">

            <div class="col-md-12">

                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Standard Fields</span>
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <div class="well well-sm">Mencetak Laporan - Laporan Peminjaman buku <b>SeaOnline</b>
                            </div>
                        </div>
                        <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Tanggal Mulai</label>
                                <div class="col-lg-5">
                                    <input type="text" name="tglawal" placeholder="Tanggal Awal" class="form-control" id="datetimepicker" required >
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Tanggal Akhir</label>
                                <div class="col-lg-5">
                                    <input type="text" name="tglakhir" placeholder="Tanggal Akihr" class="form-control" id="datetimepicker1" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label"></label>
                                <div class="col-lg-8 ">
                                    <input type="submit" class="btn btn-primary "  name="cetak_laporan" value="Cetak Laporan Peminjaman" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>       
            </div>       
        </div>       
    </div>         
<?
    include 'footer.php';
?>