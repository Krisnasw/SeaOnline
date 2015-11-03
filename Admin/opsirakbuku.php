<?
    include 'header.php'; 

    $classrak = new RakBuku();

    if (isset($_POST['tambah_rak'])) {
        # code...
        $nama = mysql_escape_string($_POST['nama']);

        $classrak->Create($nama);
    }
    if (isset($_POST['ubah_rak'])) {
        # code...
        $id           = base64_decode($_GET['id']);
        $nama = mysql_escape_string($_POST['nama']);
        $classrak->Edit($id,$nama);         
    }
?>

     <!-- Start: Topbar -->
    <header id="topbar" class="affix">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="crumb-active">
                    <a href="index.php">Opsi Rak Buku</a>
                </li>
                <li class="crumb-icon">
                    <a href="index.php">
                        <span class="glyphicon glyphicon-user"></span>
                    </a>
                </li>
                <li class="crumb-link">
                    <a href="index.php">Home</a>
                </li>
                <li class="crumb-trail"><a href="opsipenerbit.php">Rak Buku</a></li>
            </ol>
        </div>
    </header> 
    <!-- End: Topbar -->


                <?  
                if (isset($_GET['action'])) {
                     if ($_GET['action'] == 'tambah') {
                        ?>
                        <div id="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Tambah Rak Buku</span>
                                        </div>
                                        <div class="panel-body">
                                            <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nama Rak Buku</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" id="inputStandard" name="nama" class="form-control" placeholder="Nama Rak Buku..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label"></label>
                                                    <div class="col-lg-8">
                                                        <input type="submit" class="btn btn-primary" name="tambah_rak" value="Tambah Rak Buku" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?

                    }else{
                        header ('location : opsirakbuku.php');
                    }
                }
                if (isset($_GET['action']) && isset($_GET['id'])) {
                    $id = base64_decode($_GET['id']);
                    if ($_GET['action'] == 'edit') {
                        $rakview = $classrak->ViewbyId($id);
                        $rakbu = $rakview->fetch_array();
                        ?>
                        
                        <div id="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Edit Rak Buku</span>
                                        </div>
                                        <div class="panel-body">
                                            <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nama Rak Buku</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" id="inputStandard" value="<?=$rakbu['nama'];?>" name="nama" class="form-control" placeholder="Nama Rak Buku..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label"></label>
                                                    <div class="col-lg-8">
                                                        <input type="submit" class="btn btn-primary" name="ubah_rak" value="Ubah Penerbit" />
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
                        $classrak->Delete($id);
                    }else{
                        echo"<script>document.location.href='opsirakbuku.php';</script>";
                    }
                }else{

            ?>
            <div id="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-visible">
                            <div class="panel-heading">
                                <div class="panel-title hidden-xs">
                                    <span class="glyphicon glyphicon-tasks"></span>Data Rak Buku
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <table class="table table-striped table-bordered table-hover" id="datatable" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="70%">Nama Rak Buku</th>
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                        $i = 1;
                                        $rakview = $classrak->View();

                                        while ( $data = $rakview->fetch_array()) {


                                    ?>                                        
                                        <tr>
                                            <td style="text-align: center"><?=$i++;?></td>
                                            <td><?=$data['nama'];?></td>
                                            <td style="text-align: center">
                                                <a href="?action=edit&id=<?=base64_encode($data['idrak']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit </a>
                                                <a href="?action=delete&id=<?=base64_encode($data['idrak']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete </a>
                                            </td>
                                        </tr>
                                    <? }  ?>
                                    </tbody>
                                </table>
                            </div>
            <!-- <PENAMBAHAN DIV> -->
                        </div>
                    </div>
                </div> 
                <a class="btn btn-info putih" href="?action=tambah">Tambah Rak Buku &nbsp  <span class="glyphicon glyphicon-plus"></span></a>
            </div>
        <!-- End: Content -->
<?
            }
    include 'footer.php';
?>