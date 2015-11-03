<?
    include 'header.php';

    $classusulan = new Usulan();

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
                <li class="crumb-trail"><a href="usulanbuku.php">Page Usulan Buku</a></li>
            </ol>
        </div>
    </header> 
    <!-- End: Topbar -->


                <?  
                if (isset($_GET['action']) && isset($_GET['id'])) {
                    $id = base64_decode($_GET['id']);
                    if ($_GET['action'] == 'view') {

                        $viewusulanbyid = $classusulan->ViewbyId($id);
                        $data = $viewusulanbyid->fetch_array();
                        ?>
                        <div id="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Tambah Buku</span>
                                        </div>
                                        <div class="panel-body">
                                            <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nama Pengusul </label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                                            <input type="text" id="inputStandard" name="judul" class="form-control" value="<?=$data['nama'];?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Email Pengusul </label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                                            <input type="text" id="inputStandard" name="judul" class="form-control" value="<?=$data['email'];?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Judul Buku</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                                            <input type="text" id="inputStandard" name="judul" class="form-control" value="<?=$data['judulbuku'];?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Pengarang Buku</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                                            <input type="text" id="inputStandard" name="judul" class="form-control" value="<?=$data['pengarang'];?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Penerbit Buku</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                                            <input type="text" id="inputStandard" name="judul" class="form-control" value="<?=$data['penerbit'];?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Tahun Terbit</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                                            <input type="text" id="inputStandard" name="judul" class="form-control" value="<?=$data['tahunterbit'];?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Harga Buku</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                                            <input type="text" id="inputStandard" name="judul" class="form-control" value="<?=$data['harga'];?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Keterangan </label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                                            <textarea class="form-control" id="textArea3" rows="3" disabled><?=$data['keterangan'];?></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?
                                                    $timestamp = $data['tanggalusulan'];
                                                    $new_time = explode(" ",$timestamp);
                                                    $get_date = $new_time[0];
                                                    $get_time = $new_time[1];

                                                    $date_lagi = explode("-", $get_date);
                                                    $tahun = $date_lagi[0];
                                                    $tanggal = $date_lagi[2];
                                                    $bulan = $date_lagi[1];

                                                ?>

                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Tanggal Usul </label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                                            <input type="text" id="inputStandard" name="judul" class="form-control" value="<? echo $tanggal." - ".$bulan." - ".$tahun;?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?
                    }elseif ($_GET['action'] == 'delete') {
                        $classusulan->Delete($id);
                    }else{
                        echo"<script>document.location.href='pagemember.php';</script>";
                    }
                }else{

            ?>
            <div id="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-visible">
                            <div class="panel-heading">
                                <div class="panel-title hidden-xs">
                                    <span class="glyphicon glyphicon-tasks"></span>Data Usulan Buku 
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <table class="table table-striped table-bordered table-hover" id="datatable" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="1%">No</th>
                                            <th width="20%">Nama </th>
                                            <th width="19%">Email </th>
                                            <th width="10%">Judul Buku</th>
                                            <th width="15%">Tanggal</th>
                                            <th width="25%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                        $i = 1;

                                        $viewusulan = $classusulan->View();

                                        while ( $data = $viewusulan->fetch_array()) {
                                    ?>                                        
                                        <tr>
                                            <td style="text-align: center"><?=$i++;?></td>
                                            <td><?=$data['nama'];?></td>
                                            <td><?=$data['email'];?></td>
                                            <td><?=$data['judulbuku'];?></td>
                                            <td><?=$data['tanggalusulan'];?></td>

                                            <td style="text-align: center">
                                                <a href="?action=delete&id=<?=base64_encode($data['idusulan']);?>" class="btn btn-primary btn-sm "><span class="glyphicon glyphicon-trash"></span> Delete </a>
                                                <a href="?action=view&id=<?=base64_encode($data['idusulan']);?>" class="btn btn-primary btn-sm " ><span class="glyphicon glyphicon-eye-open"></span> Detail </a>
                                            </td>
                                        </tr>
                                    <? 
                                    }  ?>
                                    </tbody>
                                </table>
                            </div>
            <!-- <PENAMBAHAN DIV> -->
                        </div>
                    </div>
                </div> 
            </div>
        <!-- End: Content -->
<?
            }
    include 'footer.php';
?>