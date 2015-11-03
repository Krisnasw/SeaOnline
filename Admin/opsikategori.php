<?
    include 'header.php'; 

    $classkategori = new Kategori();
    $classsubkategori = new SubKategori();

    if (isset($_POST['tambah_kategori'])) {
        # code...

        $nama = mysql_escape_string($_POST['nama']);

        $classkategori->Create($nama);
    }
    if (isset($_POST['tambah_subkategori'])) {
        # code...
        $id = base64_decode($_GET['id']);
        $nama = mysql_escape_string($_POST['nama']);

        $classsubkategori->Create($id,$nama);
    } 
    if (isset($_POST['ubah_kategori'])) {
        # code...
        $id           = base64_decode($_GET['id']);
        $nama = mysql_escape_string($_POST['nama']);
        $classkategori->Edit($id,$nama);        
    }
?>

     <!-- Start: Topbar -->
    <header id="topbar" class="affix">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="crumb-active">
                    <a href="index.php">Opsi Kategori</a>
                </li>
                <li class="crumb-icon">
                    <a href="index.php">
                        <span class="glyphicon glyphicon-user"></span>
                    </a>
                </li>
                <li class="crumb-link">
                    <a href="index.php">Home</a>
                </li>
                <li class="crumb-trail"><a href="opsikategori.php">Kategori</a></li>
            </ol>
        </div>
    </header> 
    <!-- End: Topbar -->


                <?  
                if (isset($_GET['action'])) {
                     if ($_GET['action'] == 'tambah' && $_GET['action'] != 'edit') {
                        ?>
                        <div id="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Tambah Kategori</span>
                                        </div>
                                        <div class="panel-body">
                                            <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nama Kategori</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" id="inputStandard" name="nama" class="form-control" placeholder="Nama Kategori..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label"></label>
                                                    <div class="col-lg-8">
                                                        <input type="submit" class="btn btn-primary" name="tambah_kategori" value="Tambah Kategori" />
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
                        header ('location : opsikategori.php');
                    }
                }
                if (isset($_GET['action']) && isset($_GET['id'])) {
                    $id = base64_decode($_GET['id']);
                    if ($_GET['action'] == 'tambahsubkategori') {
                        ?>
                        <div id="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Tambah Sub Kategori</span>
                                        </div>
                                        <div class="panel-body">
                                            <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nama Sub Kategori</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" id="inputStandard" name="nama" class="form-control" placeholder="Nama Kategori..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label"></label>
                                                    <div class="col-lg-8">

                                                        <input type="submit" class="btn btn-primary" name="tambah_subkategori" value="Tambah Sub Kategori" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?

                    }elseif ($_GET['action'] == 'edit') {
                         $kategoriview = $classkategori->ViewbyId($id);
                         $kategori = $kategoriview->fetch_array();
                        ?>
                        
                        <div id="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Edit Kategori</span>
                                        </div>
                                        <div class="panel-body">
                                            <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nama Kategori</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" id="inputStandard" value="<?=$kategori['nama'];?>" name="nama" class="form-control" placeholder="Nama Kategori..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label"></label>
                                                    <div class="col-lg-8">
                                                        <input type="submit" class="btn btn-primary" name="ubah_kategori" value="Ubah Kategori" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>       

                        <?
                    }elseif ($_GET['action'] == 'editsubkategori') {
                         $kategoriview = $classkategori->ViewbyId($id);
                         $kategori = $kategoriview->fetch_array();
                        ?>
                        
                        <div id="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Edit Kategori</span>
                                        </div>
                                        <div class="panel-body">
                                            <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nama Kategori</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" id="inputStandard" value="<?=$kategori['nama'];?>" name="nama" class="form-control" placeholder="Nama Kategori..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label"></label>
                                                    <div class="col-lg-8">
                                                        <input type="submit" class="btn btn-primary" name="ubah_kategori" value="Ubah Kategori" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>       

                        <?
                    }elseif ($_GET['action'] == 'subkategori') {
                    ?>
                            <div id="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-visible">
                                            <div class="panel-heading">
                                                <div class="panel-title hidden-xs">
                                                    <span class="glyphicon glyphicon-tasks"></span>Data Sub Kategori
                                                </div>
                                            </div>
                                            <div class="panel-body pn">
                                            <?
                                                $i = 1;
                                                $kategoriview = $classsubkategori->ViewbyId($id);
                                                if ($kategoriview -> num_rows > 0) {
                                            ?>
                                                <table class="table table-striped table-bordered table-hover" id="datatable" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th width="5%">No</th>
                                                            <th width="70%">Nama Sub Kategori</th>
                                                            <th width="20%">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?
                                                       
                                                            while ( $data = $kategoriview->fetch_array()) {
                                                        ?>                                        
                                                            <tr>
                                                                <td style="text-align: center"><?=$i++;?></td>
                                                                <td><?=$data['nama'];?></td>
                                                                <td style="text-align: center">
                                                                    <a href="?action=editsubkategori&id=<?=base64_encode($data['idkategori']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit </a>
                                                                    <a href="?action=deletesubkategori&id=<?=base64_encode($data['idkategori']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete </a>
                                                                </td>
                                                            </tr>
                                                        <? }
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <?}else{ echo "<blockquote>
                                                                    <p>TIDAK ADA SUB KATEGORI .</p>
                                                                    <small>Silahkan Tambahkan Sub Kategori Baru </small>
                                                                </blockquote>"
                                                                ; }  ?>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <a class="btn btn-info putih" href="?action=tambahsubkategori&id=<?=base64_encode($id);?>">Tambah Sub Kategori &nbsp  <span class="glyphicon glyphicon-plus"></span></a>
                            </div>
                        <?
                    }elseif ($_GET['action'] == 'delete') {
                        $classkategori->Delete($id);
                        
                    }elseif ($_GET['action'] == 'deletesubkategori') {
                        $classsubkategori->Delete($id);
                        
                    }else{
                        echo"<script>document.location.href='opsikategori.php';</script>";
                    }
                }else{

            ?>
            <div id="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-visible">
                            <div class="panel-heading">
                                <div class="panel-title hidden-xs">
                                    <span class="glyphicon glyphicon-tasks"></span>Data Kategori
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <table class="table table-striped table-bordered table-hover" id="datatable" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="70%">Nama Kategori</th>
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                        $i = 1;
                                        $kategoriview = $classkategori->View();
                                        while ( $data = $kategoriview->fetch_array()) {
                                    ?>                                        
                                        <tr>
                                            <td style="text-align: center"><?=$i++;?></td>
                                            <td><a href="?action=subkategori&id=<?=base64_encode($data['idkategori']);?>" title="Lihat Sub Kategori : <?=$data['nama'];?>"><?=$data['nama'];?></a></td>
                                            <td style="text-align: center">
                                                <a href="?action=edit&id=<?=base64_encode($data['idkategori']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit </a>
                                                <a href="?action=delete&id=<?=base64_encode($data['idkategori']);?>" class="btn btn-primary btn-sm" 
                                                data-toggle="confirmation" data-btn-ok-label="Hapus" 
                                                data-btn-ok-icon="glyphicon glyphicon-share-alt" 
                                                data-btn-ok-class="btn-danger btn-sm" data-btn-cancel-label="Cencel" 
                                                 data-btn-cancel-icon="glyphicon glyphicon-ban-circle"
                                                 data-placement="left" 
                                                 data-btn-cancel-class="btn-success  btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                            
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
                <a class="btn btn-info putih" href="?action=tambah">Tambah Kategori &nbsp  <span class="glyphicon glyphicon-plus"></span></a>
            </div>
        <!-- End: Content -->
<?
            }
    include 'footer.php';
?>