<?
    include 'header.php';

    $classberita = new Berita();

    if (isset($_POST['tambah_berita'])) {
        # code...
        $judul = mysql_escape_string($_POST['judul']);
        $artikel = mysql_escape_string($_POST['artikel']);
        $gambar = mysql_escape_string($_FILES['gambar']['name']);
 
        $classberita->Create($judul, $artikel,$gambar);
    }
    if (isset($_POST['ubah_berita'])) {
        # code...
        $id           = base64_decode($_GET['id']);
         $judul = mysql_escape_string($_POST['judul']);
        $artikel = mysql_escape_string($_POST['artikel']);
        $gambar = mysql_escape_string($_FILES['gambar']['name']);

        $classberita->Edit($id,$judul, $artikel,$gambar);
       
    }
?>

     <!-- Start: Topbar -->
    <header id="topbar" class="affix">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="crumb-active">
                    <a href="index.php">Opsi Berita</a>
                </li>
                <li class="crumb-icon">
                    <a href="index.php">
                        <span class="glyphicon glyphicon-user"></span>
                    </a>
                </li>
                <li class="crumb-link">
                    <a href="index.php">Home</a>
                </li>
                <li class="crumb-trail"><a href="berita.php">Berita</a></li>
            </ol>
        </div>
    </header> 
    <!-- End: Topbar -->


            	<?  
                if (isset($_GET['action'])) {
                     if ($_GET['action'] == 'tambah') {
                        ?><br><br><br>
                        <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                        <section id="content" class="table-layout">
                            <div class="tray tray-center pn va-t">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">Artikel Berita</span>
                                    </div>
                                    <div class="panel-body">
                                        <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="inputStandard" class="col-lg-2 control-label">Judul Artikel</label>
                                                <div class="col-lg-8">
                                                    <input type="text" id="inputStandard" name="judul" class="form-control" placeholder="Judul Artikel...">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputStandard" class="col-lg-2 control-label">Artikel Berita</label>
                                                <div class="col-lg-10">
                                                    <textarea cols="80" id="edit" name="artikel" rows="10"> </textarea>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>

                            <aside class="tray tray-right w320 va-t" data-tray-height="match">

                                <h4 class="ph10 mt10 mb15"> Upload Image </h4>
                                <hr class="mn br-light">
                                <div class="fileupload fileupload-new admin-form mt20" data-provides="fileupload">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <span class="button btn-system btn-file btn-block ph5">
                                                <span class="fileupload-new">Select image</span>
                                                <span class="fileupload-exists">Change File</span>
                                                <input type="file" class="button" name="gambar">
                                            </span>
                                        </div>
                                        <div class="col-xs-8 pln">
                                        </div>
                                    </div>

                                    <div class="fileupload-preview thumbnail m5 mt20 mb30">
                                        <img data-src="holder.js/100%x140" alt="holder">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" name="tambah_berita" value="Tambah Berita" />

                            </aside>

                        </section>
                        </form>
                        <?

                    }else{
                        header ('location : opsipenulis.php');
                    }
                }
                if (isset($_GET['action']) && isset($_GET['id'])) {
                    $id = base64_decode($_GET['id']);
                    if ($_GET['action'] == 'view') {
                        $beritaview = $classberita->ViewbyId($id);

                        $profile = $beritaview->fetch_array();
                        ?>
                        <div id="content">
                            <div class="pv30 ph40 bg-light dark br-b br-grey posr">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="w200 text-center pr30">
                                            <img src="../includes/img/<?=$profile['images'];?>" style="margin-top: 35px; height: 180px;width:180px;" class="responsive">
                                        </div>
                                        <a href="?action=edit&id=<?=base64_encode($profile['idberita']);?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit Berita </a>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="va-t m30">
                                            <h2 class=""> <?=$profile['judul'];?> <small> ( <?=$profile['tanggal'];?> ) </small></h2>
                                            <p class="fs15 mb20"><?=$profile['berita'];?></p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                       <?
                    }elseif ($_GET['action'] == 'edit') {

                        $beritaview = $classberita->ViewbyId($id);

                        $profile = $beritaview->fetch_array();
                        ?>
                        <br><br><br>
                        <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                        <section id="content" class="table-layout">
                            <div class="tray tray-center pn va-t">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <span class="panel-title">Artikel Berita</span>
                                    </div>
                                    <div class="panel-body">
                                        <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="inputStandard" class="col-lg-2 control-label">Judul Artikel</label>
                                                <div class="col-lg-8">
                                                    <input type="text" id="inputStandard" name="judul" value="<?=$profile['judul'];?>" class="form-control" placeholder="Judul Artikel...">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputStandard" class="col-lg-2 control-label">Artikel Berita</label>
                                                <div class="col-lg-10">
                                                    <textarea cols="80" id="edit" name="artikel" rows="10"> <?=$profile['berita'];?> </textarea>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>

                            <aside class="tray tray-right w320 va-t" data-tray-height="match">

                                <h4 class="ph10 mt10 mb15"> Upload Image </h4>
                                <hr class="mn br-light">
                                <div class="fileupload fileupload-new admin-form mt20" data-provides="fileupload">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <span class="button btn-system btn-file btn-block ph5">
                                                <span class="fileupload-new">Select image</span>
                                                <span class="fileupload-exists">Change File</span>
                                                <input type="file" class="button" name="gambar">
                                            </span>
                                        </div>
                                        <div class="col-xs-8 pln">
                                        </div>
                                    </div>

                                    <div class="fileupload-preview thumbnail m5 mt20 mb30">
                                        <img src="../includes/img/<?=$profile['images'];?>">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" name="ubah_berita" value="Edit Berita" />

                            </aside>

                        </section>
                        </form>
        

                        <?
                    }elseif ($_GET['action'] == 'delete') {
                        $classberita->Delete($id);
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
                                            <th width="10%">Judul</th>
                                            <th width="28%">Berita</th>
                                            <th width="12%">Tanggal Pembuatan</th>
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                        $i = 1;
                                        $beritaview = $classberita->View();

                                        while ( $data =$beritaview->fetch_array()) {
                                        $bio = substr($data['berita'], 0, 100);
                                    ?>                                        
                                        <tr>
                                            <td style="text-align: center"><?=$i++;?></td>
                                            <td><?=$data['judul'];?></td>
                                            <td><?=$bio?></td>
                                            <td><?=$data['tanggal'];?></td>
                                            <td style="text-align: center">
                                                <a href="?action=edit&id=<?=base64_encode($data['idberita']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit </a>
                                                <a href="?action=delete&id=<?=base64_encode($data['idberita']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete </a>
                                                <a href="?action=view&id=<?=base64_encode($data['idberita']);?>" class="btn btn-primary btn-sm" ><span class="glyphicon glyphicon-eye-open"></span> Detail </a>
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
                <a class="btn btn-info putih" href="?action=tambah">Tambah Artikel Berita &nbsp  <span class="glyphicon glyphicon-plus"></span></a>
            </div>
        <!-- End: Content -->
<?
            }
    include 'footer.php';
?>