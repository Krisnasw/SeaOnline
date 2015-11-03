<?
    include 'header.php'; 

    $classpenerbit = new Penerbit();

    if (isset($_POST['tambah_penerbit'])) {
        # code...
        $nama = mysql_escape_string($_POST['nama']);

        $classpenerbit->Create($nama);
    }
    if (isset($_POST['ubah_penerbit'])) {
        # code...
        $id           = base64_decode($_GET['id']);
        $nama = mysql_escape_string($_POST['nama']);
        $classpenerbit->Edit($id,$nama);         
    }
?>

     <!-- Start: Topbar -->
    <header id="topbar" class="affix">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="crumb-active">
                    <a href="index.php">Opsi Penerbit</a>
                </li>
                <li class="crumb-icon">
                    <a href="index.php">
                        <span class="glyphicon glyphicon-user"></span>
                    </a>
                </li>
                <li class="crumb-link">
                    <a href="index.php">Home</a>
                </li>
                <li class="crumb-trail"><a href="opsipenerbit.php">Penerbit</a></li>
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
                                            <span class="panel-title">Tambah Penerbit</span>
                                        </div>
                                        <div class="panel-body">
                                            <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nama Penerbit</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" id="inputStandard" name="nama" class="form-control" placeholder="Nama Penulis..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label"></label>
                                                    <div class="col-lg-8">
                                                        <input type="submit" class="btn btn-primary" name="tambah_penerbit" value="Tambah Penerbit" />
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
                        header ('location : opsipenulis.php');
                    }
                }
                if (isset($_GET['action']) && isset($_GET['id'])) {
                    $id = base64_decode($_GET['id']);
                    if ($_GET['action'] == 'edit') {
                        $penerbitview = $classpenerbit->ViewbyId($id);
                        $penerbit = $penerbitview->fetch_array();
                        ?>
                        
                        <div id="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Edit Penerbit</span>
                                        </div>
                                        <div class="panel-body">
                                            <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nama Penerbit</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" id="inputStandard" value="<?=$penerbit['nama'];?>" name="nama" class="form-control" placeholder="Nama Penulis..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label"></label>
                                                    <div class="col-lg-8">
                                                        <input type="submit" class="btn btn-primary" name="ubah_penerbit" value="Ubah Penerbit" />
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
                        $classpenerbit->Delete($id);
                    }else{
                        echo"<script>document.location.href='opsipenerbit.php';</script>";
                    }
                }else{

            ?>
            <div id="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-visible">
                            <div class="panel-heading">
                                <div class="panel-title hidden-xs">
                                    <span class="glyphicon glyphicon-tasks"></span>Data Penerbit
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <table class="table table-striped table-bordered table-hover" id="datatable" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="70%">Nama Penerbit</th>
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                        $i = 1;
                                        $penerbitview = $classpenerbit->View();

                                        while ( $data = $penerbitview->fetch_array()) {


                                    ?>                                        
                                        <tr>
                                            <td style="text-align: center"><?=$i++;?></td>
                                            <td><?=$data['nama'];?></td>
                                            <td style="text-align: center">
                                                <a href="?action=edit&id=<?=base64_encode($data['idpenerbit']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit </a>
                                                <a href="?action=delete&id=<?=base64_encode($data['idpenerbit']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete </a>
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
                <a class="btn btn-info putih" href="?action=tambah">Tambah Penerbit &nbsp  <span class="glyphicon glyphicon-plus"></span></a>
            </div>
        <!-- End: Content -->
<?
            }
    include 'footer.php';
?>