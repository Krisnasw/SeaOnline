<?
    include 'header.php'; 

    $classpenulis = new Penulis();

    if (isset($_POST['tambah_penulis'])) {
        # code...
        $nama = mysql_escape_string($_POST['nama']);
        $namalain = mysql_escape_string($_POST['namalain']);
        $biografi = mysql_escape_string($_POST['biografi']);
        $gambar = mysql_escape_string($_FILES['gambar']['name']);

        $classpenulis->Create($nama, $namalain, $biografi,$gambar); 
        
    }
    if (isset($_POST['ubah_penulis'])) {
        # code...
        $id           = base64_decode($_GET['id']);
        $nama = mysql_escape_string($_POST['nama']);
        $namalain = mysql_escape_string($_POST['namalain']);
        $biografi = mysql_escape_string($_POST['biografi']);
        $gambar = mysql_escape_string($_FILES['gambar']['name']);

        $classpenulis->Edit($id,$nama, $namalain, $biografi,$gambar); 


    }
?> 

     <!-- Start: Topbar -->
    <header id="topbar" class="affix">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="crumb-active">
                    <a href="index.php">Opsi Penulis</a>
                </li>
                <li class="crumb-icon">
                    <a href="index.php">
                        <span class="glyphicon glyphicon-user"></span>
                    </a>
                </li>
                <li class="crumb-link">
                    <a href="index.php">Home</a>
                </li>
                <li class="crumb-trail"><a href="opsipenulis.php">Penulis</a></li>
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
                                            <span class="panel-title">Tambah Penulis</span>
                                        </div>
                                        <div class="panel-body">
                                            <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nama Penulis</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" id="inputStandard" name="nama" class="form-control" placeholder="Nama Penulis..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nama Lain</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" id="inputStandard" name="namalain" class="form-control" placeholder="Nama Lain Penulis...">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Biografi Penulis</label>
                                                    <div class="col-lg-8">
                                                        <textarea cols="80" id="edit" name="biografi" rows="10"> </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Photo Member</label>
                                                    <div class="col-lg-8">
                                                        <div class="admin-form theme-primary">
                                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                <div class="tab-body">
                                                                    <div class="row mv25">
                                                                        <div class="col-md-3">
                                                                            <span class="btn btn-system btn-file btn-block">
                                                                                <span class=" fileupload-new">Select image</span>
                                                                                <span class=" fileupload-exists">Change File</span>
                                                                                <input type="file" class="button" name="gambar">
                                                                            </span>
                                                                            <a href="#" class="btn btn-danger btn-block fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                                        </div>
                                                                        <div class="col-md-9">
                                                                            <div class="fileupload-preview thumbnail">
                                                                                <img >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label"></label>
                                                    <div class="col-lg-8">
                                                        <input type="submit" class="btn btn-primary" name="tambah_penulis" value="Tambah Penulis" />
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
                    if ($_GET['action'] == 'view') {
                        $penulisviewbyid = $classpenulis->ViewbyId($id);
                        $profile = $penulisviewbyid->fetch_array();

                        ?>
                        <div id="content">
                            <div class="pv30 ph40 bg-light dark br-b br-grey posr">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="w200 text-center pr30">
                                            <img src="../includes/img/<?=$profile['images'];?>" style="margin-top: 35px; height: 180px;width:180px;" class="responsive">
                                        </div>
                                        <a href="?action=edit&id=<?=base64_encode($profile['idpenulis']);?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit Profile </a>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="va-t m30">
                                            <h2 class=""> <?=$profile['nama'];?> <small> ( <?=$profile['nama_lain'];?> ) </small></h2>
                                            <p class="fs15 mb20"><?=$profile['biografi'];?></p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                       <?
                    }elseif ($_GET['action'] == 'edit') {
                         $penulisviewbyid = $classpenulis->ViewbyId($id);
                         $profile = $penulisviewbyid->fetch_array();
                        ?>
                        <div id="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Edit Penulis</span>
                                        </div>
                                        <div class="panel-body">
                                           <div class="row">
                                                <div class="col-md-11">
                                                    <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label for="inputStandard" class="col-lg-3 control-label">Nama Penulis</label>
                                                            <div class="col-lg-8">
                                                                <input type="text" id="inputStandard" value="<?=$profile['nama'];?>" name="nama" class="form-control" placeholder="Nama Penulis..." required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputStandard" class="col-lg-3 control-label">Nama Lain</label>
                                                            <div class="col-lg-8">
                                                                <input type="text" id="inputStandard" value="<?=$profile['nama_lain'];?>" name="namalain" class="form-control" placeholder="Nama Lain Penulis...">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputStandard" class="col-lg-3 control-label">Biografi Penulis</label>
                                                            <div class="col-lg-8">
                                                                <textarea cols="80" id="edit" name="biografi" rows="10"> <?=$profile['biografi'];?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputStandard" class="col-lg-3 control-label">Photo Member</label>
                                                            <div class="col-lg-8">
                                                                <div class="admin-form theme-primary">
                                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                                        <div class="tab-body">
                                                                            <div class="row mv25">
                                                                                <div class="col-md-3">
                                                                                    <span class="btn btn-system btn-file btn-block">
                                                                                        <span class="button fileupload-new">Select image</span>
                                                                                        <span class="button fileupload-exists">Change File</span>
                                                                                        <input type="file" class="button" name="gambar">
                                                                                    </span>
                                                                                    <a href="#" class="btn btn-danger btn-block fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <div class="fileupload-preview thumbnail">
                                                                                        <img src="../includes/img/<?=$profile['images'];?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputStandard" class="col-lg-3 control-label"></label>
                                                            <div class="col-lg-8">
                                                                <input type="submit" class="btn btn-primary" name="ubah_penulis" value="Ubah Data Penulis" />
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        

                        <?
                    }elseif ($_GET['action'] == 'delete') {
                        $classpenulis->delete($id);
                    }else{
                        echo"<script>document.location.href='opsipenulis.php';</script>";
                    }
                }else{

            ?>
            <div id="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-visible">
                            <div class="panel-heading">
                                <div class="panel-title hidden-xs">
                                    <span class="glyphicon glyphicon-tasks"></span>Data Penulis
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <table class="table table-striped table-bordered table-hover" id="datatable" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="15%">Nama</th>
                                            <th width="15%">Nama Lain</th>
                                            <th width="40%">Biografi Singkat</th>
                                            <th width="25%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                        $penulisview =  $classpenulis->View();

                                        $i = 1;
                                        while ( $data = $penulisview->fetch_array()) {
                                        $bio = substr($data['biografi'], 0, 100);
                                    ?>                                        
                                        <tr>
                                            <td style="text-align: center"><?=$i++;?></td>
                                            <td><?=$data['nama'];?></td>
                                            <td><?=$data['nama_lain'];?></td>
                                            <td><?=$bio?></td>
                                            <td style="text-align: center">
                                                <a href="?action=edit&id=<?=base64_encode($data['idpenulis']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit </a>
                                                <a href="?action=delete&id=<?=base64_encode($data['idpenulis']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete </a>
                                                <a href="?action=view&id=<?=base64_encode($data['idpenulis']);?>" class="btn btn-primary btn-sm" ><span class="glyphicon glyphicon-eye-open"></span> Detail </a>
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
                <a class="btn btn-info putih" href="?action=tambah">Tambah Penulis &nbsp  <span class="glyphicon glyphicon-plus"></span></a>
            </div>
        <!-- End: Content -->
<?
            }
    include 'footer.php';
?>