<?
    include 'header.php';
    $classmember = new Member();
    $classbuku = new Buku();
    $classpeminjaman = new Peminjaman();
    $classusulan = new Usulan();
    $classrelasi = new RelBuku();


    $usulan = $classusulan->TotalView();
    $totalusulan = $usulan->fetch_array();

    $peminjaman = $classpeminjaman->TotalPeminjaman();
    $totalpeminjaman = $peminjaman->fetch_array();

    $buku = $classbuku->TotalBuku();
    $totalbuku = $buku->fetch_array();
 
    $member = $classmember->TotalMember();
    $totalmember = $member->fetch_array();

?> 
            <!-- Start: Topbar -->
            <header id="topbar" class="affix">
                <div class="topbar-left">
                    <ol class="breadcrumb">
                        <li class="crumb-active">
                            <a href="index.php">Dashboard</a>
                        </li>
                        <li class="crumb-icon">
                            <a href="index.php">
                                <span class="glyphicon glyphicon-home"></span>
                            </a>
                        </li>
                        <li class="crumb-link">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="crumb-trail">Dashboard</li>
                    </ol>
                </div>
            </header>
            <!-- End: Topbar -->
            
            <!-- Begin: Content -->
            <section id="content">
               <!-- Dashboard Tiles -->
                <div class="row mb10">
                    <div class="col-md-3">
                        <div class="panel bg-alert light of-h mb10">
                            <div class="pn pl20 p5">
                                <div class="icon-bg"> <i class="fa fa-users"></i> </div>
                                <h2 class="mt15 lh15"> <b><?=$totalmember['total'];?></b> </h2>
                                <h5 class="text-muted">Anggota</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel bg-info light of-h mb10">
                            <div class="pn pl20 p5">
                                <div class="icon-bg"> <i class="fa fa-book"></i> </div>
                                <h2 class="mt15 lh15"> <b><?=$totalbuku['total'];?></b> </h2>
                                <h5 class="text-muted">Buku</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel bg-danger light of-h mb10">
                            <div class="pn pl20 p5">
                                <div class="icon-bg"> <i class="fa fa-bookmark"></i> </div>
                                <h2 class="mt15 lh15"> <b><?=$totalpeminjaman['total'];?></b> </h2>
                                <h5 class="text-muted">Peminjaman</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="panel bg-warning light of-h mb10">
                            <div class="pn pl20 p5">
                                <div class="icon-bg"> <i class="fa fa-inbox"></i> </div>
                                <h2 class="mt15 lh15"> <b><?=$totalusulan['total'];?></b> </h2>
                                <h5 class="text-muted">Usulan Buku</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Admin-panels -->
                <div class="admin-panels fade-onload sb-l-o-full">

                    <!-- full width widgets -->
                    <div class="row">

                        <!-- Three panes -->
                        <div class="col-md-12 admin-grid">
                            <div class="panel sort-disable" id="p0">
                                <div class="panel-heading">
                                    <span class="panel-title">Halaman Utama </span>
                                </div>
                                <div class="panel-body mnw700 of-a">
                                    <div class="row">
                                        <div id="charts" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                                        <hr>

                                        <!-- Multi Text Column -->

                                        <div class="col-md-6 br-r">
                                            <h5 class="mt5 mbn ph10 pb5 br-b fw700"> Member Aktif <small class="pull-right fw700 text-primary">Peminjaman </small> </h5>
                                            <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">
                                                <thead>
                                                    <tr class="hidden">
                                                        <th>Source</th>
                                                        <th>Count</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?
                                                    $peminjamancount = $classpeminjaman->ViewTotPinjamCount();
                                                    while ($data = $peminjamancount->fetch_array()) {
                                                        # code...
                                                        ?>
                                                            <tr>
                                                                <td><i class="fa fa-circle text-warning fs8 pr15"></i>
                                                                    <span><?=$data['nama'];?></span>
                                                                </td>
                                                                <td><?=$data['peminjaman'];?> Buku</td>
                                                            </tr>
                                                        <?
                                                    }
                                                ?>
                                                    
                                                </tbody>
                                            </table>
                                            <h5 class="mt15 mbn ph10 pb5 br-b fw700">Kategori Terbanyak <small class="pull-right fw700 text-primary">Buku Di Kategori </small> </h5>
                                            <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">
                                                <thead>
                                                    <tr class="hidden">
                                                        <th>Source</th>
                                                        <th>Count</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?
                                                    $katecount = $classrelasi->ViewTotKateCount();
                                                    while ($data = $katecount->fetch_array()) {
                                                        # code...
                                                        ?>
                                                            <tr>
                                                                <td><i class="fa fa-circle text-warning fs8 pr15"></i>
                                                                    <span><?=$data['nama'];?></span>
                                                                </td>
                                                                <td><?=$data['tot'];?> Buku</td>
                                                            </tr>
                                                        <?
                                                    }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Flag/Icon Column -->
                                        <div class="col-md-6">
                                            <h5 class="mt5 ph10 pb5 br-b fw700">Buku Terbaru <small class="pull-right fw700 text-primary"> Rak </small> </h5>
                                            <table class="table mbn">
                                                <thead>
                                                    <tr class="hidden">
                                                        <th>#</th>
                                                        <th>First Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?
                                                    $book = $classbuku->ViewByLimit();
                                                    while ($data = $book->fetch_array()) {
                                                        ?>
                                                            <tr>
                                                                <td class="va-m fw600 text-muted">
                                                                    <i class="fa fa-book"> <?=$data['judul'];?>  </td>
                                                                <td class="fs15 fw700 text-right"><?=$data['nama'];?></td>
                                                            </tr>
                                                        <?
                                                    }
                                                ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                  <!-- Icon Column -->
                                        <div class="col-md-4 hidden">
                                            <h5 class="mt5 ph10 pb5 br-b fw700">Content Viewed <small class="pull-right fw700 text-primary">Refresh </small> </h5>
                                            <table class="table mbn">
                                                <thead>
                                                    <tr class="hidden">
                                                        <th class="mw30">#</th>
                                                        <th>First Name</th>
                                                        <th>Revenue</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="fs17 text-center w30">
                                                            <span class="fa fa-desktop text-warning"></span>
                                                        </td>
                                                        <td class="va-m fw600 text-muted">Television</td>
                                                        <td class="fs14 fw700 text-muted text-right"><i class="fa fa-caret-up text-info pr10"></i>$855,913</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fs17 text-center">
                                                            <span class="fa fa-microphone text-primary"></span>
                                                        </td>
                                                        <td class="va-m fw600 text-muted">Radio</td>
                                                        <td class="fs14 fw700 text-muted text-right"><i class="fa fa-caret-down text-danger pr10"></i>$349,712</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fs17 text-center">
                                                            <span class="fa fa-newspaper-o text-info"></span>
                                                        </td>
                                                        <td class="va-m fw600 text-muted">Newspaper</td>
                                                        <td class="fs14 fw700 text-muted text-right"><i class="fa fa-caret-up text-info pr10"></i>$1,259,742</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fs17 text-center">
                                                            <span class="fa fa-facebook text-alert"></span>
                                                        </td>
                                                        <td class="va-m fw600 text-muted">Social Media</td>
                                                        <td class="fs14 fw700 text-muted text-right"><i class="fa fa-caret-up text-info pr10"></i>$3,512,672</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fs17 text-center">
                                                            <span class="fa fa-bank text-alert"></span>
                                                        </td>
                                                        <td class="va-m fw600 text-muted">Investments</td>
                                                        <td class="fs14 fw700 text-muted text-right"><i class="fa fa-caret-up text-info pr10"></i>$3,512,672</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: .col-md-12.admin-grid -->

                    </div>
                    <!-- end: .row -->

            </section>
            <!-- End: Content -->
<?
    include 'footer.php';
?>