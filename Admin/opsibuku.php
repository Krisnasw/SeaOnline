<?
    include 'header.php'; 

    $classbuku = new Buku();
    $classpenerbit = new Penerbit();
    $classkategori = new kategori();
    $classpenulis = new Penulis();
    $classsubkategori = new Subkategori();
    $classrelbuku = new RelBuku();
    $clasrakbuku = new RakBuku();
    
    if (isset($_POST['tambah_buku'])) {
        # code...
        $judul = mysql_escape_string($_POST['judul']);
        $kodebu = $_POST['kodebu'];
        $sinopsis = mysql_escape_string($_POST['sinopsis']);
        $gambar = mysql_escape_string($_FILES['gambar']['name']);
        $jumlah = mysql_escape_string($_POST['jumlah']);
        $tahunterbit = mysql_escape_string($_POST['tahunterbit']);
        $isbn = mysql_escape_string($_POST['isbn']);
        $hargabuku = mysql_escape_string($_POST['hargabuku']);
        $penerbit = mysql_escape_string($_POST['penerbit']);
        $rakbuku = mysql_escape_string($_POST['rakbuku']);

        $CreateClassbuku = $classbuku->Create($kodebu,$judul,$sinopsis,$jumlah,$tahunterbit,$isbn,$hargabuku,$penerbit,$rakbuku,$gambar);
        $penulis = $_POST['penulis'];
        $kategori=$_POST['kategori'];
        if ($CreateClassbuku == true) {
            $last_id = $db->insert_id;
            if (is_array($penulis)) {
                foreach ($penulis as $p) {
                    $CreateRelPenulis   = $classrelbuku->CreateRelPenulis($last_id,$p);
                }
            }
            if (is_array($kategori)) {
                foreach ($kategori as $k) {
                    $CreaterelKate      = $classrelbuku->CreateRelKategori($last_id,$k); 
                }
            }

            echo "<script>alert('Data Berhasil Di Tambah !'); document.location.href='opsibuku.php';</script>";
        }else{
             echo "<script>alert('Data gagal Di Tambah !'); document.location.href='opsibuku.php';</script>";
        }
        
    }
    if (isset($_POST['ubah_buku'])) {
        # code...
        $id    = base64_decode($_GET['id']);
        $judul = mysql_escape_string($_POST['judul']);
        $sinopsis = mysql_escape_string($_POST['sinopsis']);
        $gambar = mysql_escape_string($_FILES['gambar']['name']);
        $jumlah = mysql_escape_string($_POST['jumlah']);
        $tahunterbit = mysql_escape_string($_POST['tahunterbit']);
        $isbn = mysql_escape_string($_POST['isbn']);
        $hargabuku = mysql_escape_string($_POST['hargabuku']);
        $bukuhilang = mysql_escape_string($_POST['bukuhilang']);
        $bukurusak = mysql_escape_string($_POST['bukurusak']);
        $penerbit = mysql_escape_string($_POST['penerbit']);
        $rakbuku = mysql_escape_string($_POST['rakbuku']);
       
       

        $ChangeClassBuku = $classbuku->Edit($id,$judul,$sinopsis,$jumlah,$tahunterbit,$isbn,$hargabuku,$bukuhilang,$bukurusak,$penerbit,$rakbuku,$gambar);
        
        $penulis = $_POST['penulis'];
        $kategori=$_POST['kategori'];

        if ($ChangeClassBuku == true) {
            # code...
            $deletekategori = $classrelbuku->DeleteRelBukuKategori($id);
            $deletepenulis  = $classrelbuku->DeleteRelBukuPenulis($id);
            if (is_array($penulis)) {
                foreach ($penulis as $p) {
                    $CreateRelPenulis   = $classrelbuku->CreateRelPenulis($id,$p);
                }
            }
            if (is_array($kategori)) {
                foreach ($kategori as $k) {
                    $CreaterelKate      = $classrelbuku->CreateRelKategori($id,$k); 
                }
            }

            echo "<script>alert('Data Berhasil Di Ubah !'); document.location.href='opsibuku.php';</script>";       

        }else{
            echo "<script>alert('Data gagal Di Ubah !'); document.location.href='opsibuku.php';</script>";
        }

    }
?>

     <!-- Start: Topbar -->
    <header id="topbar" class="affix">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="crumb-active">
                    <a href="index.php">Opsi Buku</a>
                </li>
                <li class="crumb-icon">
                    <a href="index.php">
                        <span class="glyphicon glyphicon-book"></span>
                    </a>
                </li>
                <li class="crumb-link">
                    <a href="index.php">Home</a>
                </li>
                <li class="crumb-trail"><a href="opsibuku.php">Buku</a></li>
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
                                            <span class="panel-title">Tambah Buku</span>
                                        </div>
                                        <div class="panel-body">
                                            <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Kode Buku</label>
                                                    <div class="col-lg-2">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                                            <?
                                                                $kodebuku = $classbuku->KodeBuku(); 
                                                            ?>
                                                            <input type="text" id="inputStandard" name="kodebu" class="form-control" value="<?=$kodebuku;?>" readonly >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Judul Buku</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                                            <input type="text" id="inputStandard" name="judul" class="form-control" placeholder="Judul Buku..." required>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Sinopsi Buku</label>
                                                    <div class="col-lg-8">
                                                        <textarea cols="80" id="edit" name="sinopsis" rows="10"> </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Cover Buku</label>
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
                                                    <label for="spinner1" class="col-lg-3 control-label">Jumlah Buku</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                                            <input class="form-control ui-spinner-input" name="jumlah" value="1" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mt10">
                                                    <label class="col-md-3 control-label" for="datetimepicker1">Tahun Terbit</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                                            <input type="text" name="tahunterbit" class="form-control" id="datetahun">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nomor ISBN</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                                            <input type="text" id="inputStandard" name="isbn" class="form-control" placeholder="Nomor ISBN..." required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Harga Buku</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                                            <input type="text" name="hargabuku" id="angka3" class="form-control" placeholder="Harga Buku" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group"> 
                                                    <label for="inputStandard" class="col-lg-3 control-label">Penerbit</label>
                                                    <div class="col-lg-8">
                                                        <select id="multiselect" name="penerbit">
                                                            <? 
                                                                $penerbitview = $classpenerbit->View();
                                                                while ( $penerbit = $penerbitview->fetch_array()) {
                                                                    echo " <option value=".$penerbit['idpenerbit'].">".$penerbit['nama']."</option>";
                                                                }
                                                             ?>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                            
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Penulis</label>
                                                    <div class="col-lg-8">
                                                        <select id="multiselectwithfilter" name="penulis[]" multiple="multiple">
                                                            <? 
                                                                $penulisview = $classpenulis->View();
                                                                while ($data = $penulisview->fetch_array()) { 
                                                                    ?>
                                                                        <option value="<?=$data['idpenulis'];?>"><?=$data['nama'];?></option>
                                                                    <?
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Kategori</label>
                                                    <div class="col-lg-8">
                                                        <select id="multiselectwithlabel" class="multiselect-withlabels" name="kategori[]" multiple="multiple">
                                                            <?
                                                                $subkategoriview = $classsubkategori->View();
                                                                while ( $data = $subkategoriview->fetch_array()) {
                                                                    ?>
                                                                    <optgroup label='<?=$data['nama'];?>'>
                                                                        <?
                                                                            $id = $data['idkategori'];
                                                                            $subkategoriselect = $classsubkategori->ViewbyId($id);
                                                                            while ( $datasubselect = $subkategoriselect->fetch_array()) {
                                                                                ?>
                                                                                    <option value="<?=$datasubselect['idkategori'];?>"><?=$datasubselect['nama'];?></option>
                                                                                <?
                                                                            }
                                                                        ?>
                                                                    </optgroup>

                                                                    <?
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group"> 
                                                    <label for="inputStandard" class="col-lg-3 control-label">RakBuku</label>
                                                    <div class="col-lg-8">
                                                         <select id="multiselecttwo" name="rakbuku">
                                                            <? 
                                                                $rakbukuview = $clasrakbuku->View();
                                                                while ( $rakbuku = $rakbukuview->fetch_array()) {
                                                                    echo " <option value=".$rakbuku['idrak'].">".$rakbuku['nama']."</option>";
                                                                }
                                                             ?>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="panel-footer pt25">
                                                    <div class="form-group mt10">
                                                        <label for="inputStandard" class="col-lg-9 control-label"></label>
                                                        <div class="col-lg-3">
                                                            <input type="submit" class="btn btn-primary" name="tambah_buku" value="Tambah Buku Baru" />
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?

                    }else{
                        header ('location : opsibuku.php');
                    }
                }
                if (isset($_GET['action']) && isset($_GET['id'])) {
                    $id = base64_decode($_GET['id']);
                    if ($_GET['action'] == 'edit') {
                        $bukuviewdetail = $classbuku->ViewbyId($id);
                        $data = $bukuviewdetail->fetch_array();
                        ?>
                        
                        <div id="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Edit Buku</span>
                                        </div>
                                        <div class="panel-body">
                                            <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Kode Buku</label>
                                                    <div class="col-lg-2">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                            <input type="text" id="inputStandard" name="kodebu" class="form-control" value="<?=$data['kodebuku'];?>" readonly >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Judul Buku</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                                            <input type="text" id="inputStandard" name="judul" class="form-control" value="<?=$data['judul'];?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Sinopsi Buku</label>
                                                    <div class="col-lg-8">
                                                        <textarea cols="80" id="edit" name="sinopsis" rows="10"><?=$data['sinopsis'];?> </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Cover Buku</label>
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
                                                                                <img src="../includes/img/<?=$data['cover'];?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </div>
                                                <div class="form-group">
                                                    <label for="spinner1" class="col-lg-3 control-label">Jumlah Buku</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                                            <input class="form-control ui-spinner-input" name="jumlah" value="<?=$data['jumlahbuku'];?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mt10">
                                                    <label class="col-md-3 control-label" for="datetimepicker1">Tahun Terbit</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                                            <input type="text" name="tahunterbit" class="form-control" id="datetahun" value="<?=$data['tahun_terbit'];?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nomor ISBN</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                                            <input type="text" id="inputStandard" name="isbn" class="form-control" value="<?=$data['isbn'];?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Harga Buku</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                                            <input type="text" name="hargabuku" id="angka3" class="form-control" value="<?=$data['hargabuku'];?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Buku Hilang</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                                            <input type="text" id="inputStandard" name="bukuhilang" class="form-control" value="<?=$data['bukuhilang'];?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Buku Rusak</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                                            <input type="text" id="inputStandard" name="bukurusak" class="form-control" value="<?=$data['bukurusak'];?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group"> 
                                                    <label for="inputStandard" class="col-lg-3 control-label">Penerbit</label>
                                                    <div class="col-lg-8">
                                                        <select id="multiselect" name="penerbit">
                                                            <? 
                                                                $penerbitview = $classpenerbit->View();
                                                                while ( $penerbit = $penerbitview->fetch_array()) {
                                                                    if ($penerbit['idpenerbit'] == $data['idpenerbit']) {
                                                                        # code...
                                                                        echo " <option value=".$penerbit['idpenerbit']." selected>".$penerbit['nama']."</option>";
                                                                    }else{
                                                                        echo " <option value=".$penerbit['idpenerbit'].">".$penerbit['nama']."</option>";
                                                                    }
                                                                }
                                                             ?>
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Penulis</label>
                                                    <div class="col-lg-8">
                                                        <select id="multiselectwithfilter" name="penulis[]" multiple="multiple">
                                                            <? 

                                                                $ViewCheckPen=$classpenulis->ViewCheckPenulis($id);
                                                                $datacheckpen=array();
                                                                while($data=$ViewCheckPen->fetch_array()){
                                                                    $datacheckpen[]=$data['idpenulis'];
                                                                }
                                                                $penulisview=$classpenulis->View();
                                                                while($data=$penulisview->fetch_array()){
                                                                    echo "<option value='{$data['idpenulis']}' ".(in_array($data['idpenulis'],$datacheckpen)?" selected":"").">{$data['nama']}</option>";
                                                                }

                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Kategori</label>
                                                    <div class="col-lg-8">
                                                        <select id="multiselectwithlabel" class="multiselect-withlabels" name="kategori[]" multiple="multiple">
                                                            <?
                                                                $ViewCheckKat = $classkategori->ViewCheckKategori($id);
                                                                $datacheckkat = array();
                                                                while ($data= $ViewCheckKat->fetch_array()) {
                                                                    # code...
                                                                    $datacheckkat[] = $data['idkategori'];
                                                                }

                                                                $subkategoriview = $classsubkategori->View();
                                                                while ( $data = $subkategoriview->fetch_array()) {
                                                                                                                                 
                                                                    ?>
                                                                    <optgroup label='<?=$data['nama'];?>'>
                                                                        <?
                                                                            $id = $data['idkategori'];
                                                                            $subkategoriselect = $classsubkategori->ViewbyId($id);
                                                                            while ( $datasubselect = $subkategoriselect->fetch_array()) {

                                                                                    echo "<option value='{$datasubselect['idkategori']}' ".(in_array($datasubselect['idkategori'],$datacheckkat)?" selected":"").">{$datasubselect['nama']}</option>";
                                                                            }
                                                                        ?>
                                                                    </optgroup>

                                                                    <?
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group"> 
                                                    <label for="inputStandard" class="col-lg-3 control-label">RakBuku</label>
                                                    <div class="col-lg-8">
                                                         <select id="multiselecttwo" name="rakbuku">
                                                            <? 
                                                                $rakbukuview = $clasrakbuku->View();
                                                                while ( $rakbuku = $rakbukuview->fetch_array()) {
                                                                    if ($rakbuku['idrak'] == $data['idrakbuku']) {
                                                                        # code...
                                                                        echo " <option value=".$rakbuku['idrak']." selected>".$rakbuku['nama']."</option>";
                                                                    }else{
                                                                        echo " <option value=".$rakbuku['idrak']." >".$rakbuku['nama']."</option>";
                                                                    }
                                                                }
                                                             ?>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="panel-footer pt25">
                                                    <div class="form-group mt10">
                                                        <label for="inputStandard" class="col-lg-9 control-label"></label>
                                                        <div class="col-lg-3">
                                                            <input type="submit" class="btn btn-primary" name="ubah_buku" value="Edit Buku " />
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>      

                        <?
                    }elseif ($_GET['action'] == 'delete') {
                        $classbuku->Delete($id);
                    }elseif ($_GET['action'] == 'view'){
                        $bukuviewdetail = $classbuku->ViewbyId($id);
                        $data = $bukuviewdetail->fetch_array();
                    ?>
                        <div id="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Tambah Buku</span>
                                        </div>
                                        <div class="panel-body">
                                        <div class="col-md-2">
                                            <div class="w200 text-center pr30">
                                                <img src="../includes/img/<?=$data['cover'];?>" style="margin-top: 35px;width:250px;" class="responsive">
                                            </div>
                                            <a href="?action=edit&id=<?=base64_encode($data['idbuku']);?>" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit Buku </a>
                                    
                                        </div>
                                        <div class="col-md-10">
                                            <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Kode Buku</label>
                                                    <div class="col-lg-2">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>

                                                            <input type="text" id="inputStandard" name="kodebu" class="form-control" value="<?=$data['kodebuku'];?>" readonly >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Judul Buku</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                                            <input type="text" id="inputStandard" name="judul" class="form-control" value="<?=$data['judul'];?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Sinopsi Buku</label>
                                                    <div class="col-lg-8">
                                                        <p><?=$data['sinopsis'];?> </p>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="spinner1" class="col-lg-3 control-label">Jumlah Buku</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-tasks"></i></span>
                                                            <input class="form-control ui-spinner-input" name="jumlah"  value="<?=$data['jumlahbuku'];?>" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group mt10">
                                                    <label class="col-md-3 control-label" for="datetimepicker1">Tahun Terbit</label>
                                                    <div class="col-md-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                                            <input type="text" name="tahunterbit" class="form-control"  value="<?=$data['tahun_terbit'];?>" readonly >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nomor ISBN</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                                            <input type="text" id="inputStandard" name="isbn" class="form-control" value="<?=$data['isbn'];?>" readonly >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Harga Buku</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                                            <input type="text" name="hargabuku" id="angka3" class="form-control"  value="<?=$data['hargabuku'];?>" readonly >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Buku Rusak</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-minus-circle"></i></span>
                                                            <input type="text" name="bukurusak" class="form-control"  value="<?=$data['bukurusak'];?>" readonly >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Buku Hilang</label>
                                                    <div class="col-lg-8">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="fa fa-times-circle"></i></span>
                                                            <input type="text" name="bukuhilang" class="form-control"  value="<?=$data['bukuhilang'];?>" readonly >
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group"> 
                                                    <label for="inputStandard" class="col-lg-3 control-label">Penerbit</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="namapenerbit" class="form-control"  value="<?=$data['namapenerbit'];?>" readonly >
                                                    </div>
                                                </div>
                                                            
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Penulis</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="penulis" class="form-control"  value="<?=$data['penulis'];?>" readonly >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Kategori</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="namakatekogri" class="form-control"  value="<?=$data['namakatekogri'];?>" readonly >
                                                    </div>
                                                </div>
                                                <div class="form-group"> 
                                                    <label for="inputStandard" class="col-lg-3 control-label">RakBuku</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" name="namarakbuku" class="form-control"  value="<?=$data['namarakbuku'];?>" readonly >
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <?
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
                                    <span class="glyphicon glyphicon-tasks"></span>Data Buku
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <table class="table table-striped table-bordered table-hover" id="datatable" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="10%">Kode Buku</th>
                                            <th width="25%">Judul</th>
                                            <th width="10%">Rak Buku</th>
                                            <th width="25%">Sinopsis</th>
                                            <th width="20%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                        $i = 1;
                                        $bukuview = $classbuku->view();
                                        while ( $data = $bukuview->fetch_array()) {
                                    ?>                                        
                                        <tr>
                                            <td style="text-align: center"><?=$i++;?></td>
                                            <td style="text-align: center"><?=$data['kodebuku'];?></td>
                                            <td><?=$data['judul'];?></td>
                                            <td><?=$data['namarak'];?></td>
                                            <td><?=substr($data['sinopsis'], 0,50)." . . .  ";?></td>
                                            <td style="text-align: center">
                                                <a href="?action=view&id=<?=base64_encode($data['idbuku']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Detail </a>
                                                <a href="?action=edit&id=<?=base64_encode($data['idbuku']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit </a>
                                                <a href="?action=delete&id=<?=base64_encode($data['idbuku']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete </a>
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
                <a class="btn btn-info putih" href="?action=tambah">Tambah Buku &nbsp  <span class="glyphicon glyphicon-plus"></span></a>
            </div>
        <!-- End: Content -->
<?
            }
    include 'footer.php';
?>