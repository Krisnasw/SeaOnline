<?
    include 'header.php';

    $classmember = new Member();

    $ViewMember = $classmember->ViewbyId($id_users);
    $member = $ViewMember->fetch_array();
    if (isset($_POST['edit_member'])) {
        # code...

        $id = $id = base64_decode($_GET['id']);
        $username = mysql_escape_string($_POST['username']);
        $password = mysql_escape_string(md5($_POST['password']));
        $email = mysql_escape_string($_POST['email']);
        $nama = mysql_escape_string($_POST['nama']);
        $alamat = mysql_escape_string($_POST['alamat']);
        $tglahir = mysql_escape_string($_POST['tglahir']);
        $notelp = mysql_escape_string($_POST['notelp']);
        $status = mysql_escape_string($_POST['status']);
        $gambar = mysql_escape_string($_FILES['gambar']['name']);
        $classmember->Edit($id,$username,$password,$email,$nama,$alamat,$tglahir,$notelp,$status,$gambar);    
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
                <li class="crumb-trail"><a href="usulanbuku.php">Account</a></li>
            </ol>
        </div>
    </header> 
    <?
    if (isset($_GET['action']) && isset($_GET['id'])) {
        $id = base64_decode($_GET['id']);
        if ($_GET['action'] == 'edit') {
            $memberview = $classmember->ViewbyId($id);
            $member = $memberview->fetch_array();
            ?>
            <div id="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title">Edit Account</span>
                            </div>
                            <div class="panel-body">
                                <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">User Name</label>
                                        <div class="col-lg-8">
                                            <input type="text" id="inputStandard" name="username" class="form-control" value="<?=$member['username'];?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Password</label>
                                        <div class="col-lg-8">
                                            <input type="text" id="inputStandard" name="password" class="form-control" placeholder="Password..." required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Email</label>
                                        <div class="col-lg-8">
                                            <input type="email" id="inputStandard" name="email" class="form-control" value="<?=$member['email'];?>"  required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Nama Lengkap</label>
                                        <div class="col-lg-8">
                                            <input type="text" id="inputStandard" name="nama" value="<?=$member['nama'];?>" class="form-control" placeholder="Nama Kategori..." required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Alamat </label>
                                        <div class="col-lg-8">
                                            <textarea cols="70" class="form-control" name="alamat" rows="3"><?=$member['alamat'];?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Tanggal Lahir</label>
                                        <div class="col-md-8">
                                            <input type="text" name="tglahir" class="form-control" value="<?=$member['tgl_lahir'];?>"  id="datetimepicker">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Nomor Telphone</label>
                                        <div class="col-lg-8">
                                            <input type="text" id="inputStandard" name="notelp" class="form-control" value="<?=$member['no_telp'];?>"  required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputStandard" class="col-lg-3 control-label">Status Member</label>
                                        <div class="col-lg-8">
                                            <select name="status" id="multiselect">
                                            <?php if ($status == 2){
                                                ?> <option value="1" selected="">Members</option>
                                              <?
                                            } elseif ($status == 3) {
                                                if ($member['status'] == 1) {
                                                echo "   <option value='1' selected >Members</option>
                                                    <option value='2'>Petugas</option>
                                                    ";
                                                }else{
                                                   echo "   <option value='1'  >Members</option>
                                                    <option value='2' selected>Petugas</option>
                                                    ";
                                                }
                                                 ?> 
                                            <?
                                            }else{} ?>
                                            </select>
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
                                                                    <img src="../includes/img/<?=$member['images'];?>">
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
                                        <div class="col-lg-8 ">
                                            <input type="submit" class="btn btn-primary "  name="edit_member" value="Update Member" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            <?
        }
    }else{
    ?>
    <div id="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Detail Account</span>
                    </div>
                    <div class="panel-body">
                    <div class="col-md-4">
                        <div class="fileupload-preview thumbnail">
                            <img src="../includes/img/<?=$member['images'];?>">
                        </div>
                            <a class="btn btn-dark " href="?action=edit&id=<?=base64_encode($member['idusers']);?>">Edit</a>
                    </div>
                    <div class="col-md-8">
                        <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">User Name</label>
                                <div class="col-lg-8">
                                    <p class="form-control-static text-muted"><?=$member['username'];?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Email</label>
                                <div class="col-lg-8">
                                    <p class="form-control-static text-muted"><?=$member['email'];?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Nama Lengkap</label>
                                <div class="col-lg-8">
                                    <p class="form-control-static text-muted"><?=$member['nama'];?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Alamat </label>
                                <div class="col-lg-8">
                                    <p class="form-control-static text-muted"><?=$member['alamat'];?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Tanggal Lahir</label>
                                <div class="col-md-8">
                                    <p class="form-control-static text-muted"><?=$member['tgl_lahir'];?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Nomor Telphone</label>
                                <div class="col-lg-8">
                                    <p class="form-control-static text-muted"><?=$member['no_telp'];?></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Status Member</label>
                                <div class="col-lg-8">
                                   <?
                                    if ($member['status'] == 1) {
                                       echo " <p class='form-control-static text-muted'>Member</p>";
                                    }elseif ($member['status'] == 2) {
                                       echo " <p class='form-control-static text-muted'>Pengurus</p>";
                                    }else{
                                       echo " <p class='form-control-static text-muted'>Admin</p>";
                                    }
                                   ?>
                                </div>
                            </div>
                          
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?  }
    include 'footer.php';
?>