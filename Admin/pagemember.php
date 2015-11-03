<?
    include 'header.php';

    $classmember = new Member();

    if (isset($_POST['tambah_member'])) {
        # code...
        $username = mysql_escape_string($_POST['username']);
        $password = mysql_escape_string(md5($_POST['password']));
        $email = mysql_escape_string($_POST['email']);
        $nama = mysql_escape_string($_POST['nama']);
        $alamat = mysql_escape_string($_POST['alamat']);
        $tglahir = mysql_escape_string($_POST['tglahir']);
        $notelp = mysql_escape_string($_POST['notelp']);
        $status = mysql_escape_string($_POST['status']);
        $gambar = mysql_escape_string($_FILES['gambar']['name']);

        $classmember->Create($username,$password,$email,$nama,$alamat,$tglahir,$notelp,$status,$gambar);
    }
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
                <li class="crumb-trail"><a href="pagemember.php">Page member</a></li>
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
                                            <span class="panel-title">Tambah Members</span>
                                        </div>
                                        <div class="panel-body">
                                            <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">User Name</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" id="inputStandard" name="username" class="form-control" placeholder="User Name..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Password</label>
                                                    <div class="col-lg-8">
                                                        <input type="password" id="inputStandard" name="password" class="form-control" placeholder="Password..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Email</label>
                                                    <div class="col-lg-8">
                                                        <input type="email" id="inputStandard" name="email" class="form-control" placeholder="Email..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nama Lengkap</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" id="inputStandard" name="nama" class="form-control" placeholder="Nama Lengkap..." required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Alamat </label>
                                                    <div class="col-lg-8">
                                                       <textarea cols="70" class="form-control" name="alamat" rows="3" required> </textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Tanggal Lahir</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="tglahir" class="form-control" id="datetimepicker">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nomor Telphone</label>
                                                    <div class="col-lg-8">
                                                        <input type="text" id="inputStandard" name="notelp" class="form-control" placeholder="Nomor Telphone..." required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Status Member</label>
                                                    <div class="col-lg-8">
                                                        <select name="status" id="multiselect">
                                                        <?php if ($status == 2){
                                                            ?> <option value="1"  >Members</option>
                                                          <?
                                                        } elseif ($status == 3) {
                                                             ?> <option value="1" selected >Members</option>
                                                                <option value="2">Petugas</option>
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
                                                    <div class="col-lg-8 ">
                                                        <input type="submit" class="btn btn-primary "  name="tambah_member" value="Tambah Member" />
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

                        $memberview = $classmember->ViewbyId($id);
                        $member = $memberview->fetch_array();

                        ?>
                        
                        <div id="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Edit Members</span>
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
                                                        <input type="password" id="inputStandard" name="password" class="form-control" value="<?=$member['password'];?>"  placeholder="Password..." required>
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
                    }elseif ($_GET['action'] == 'view') {

                        $memberview = $classmember->ViewbyId($id);
                        $member = $memberview->fetch_array();
                        ?>
                        <div id="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">
                                            <span class="panel-title">Detail Members</span>
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

                        <?
                    }elseif ($_GET['action'] == 'delete') {
                        $classmember->Delete($id);
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
                                    <span class="glyphicon glyphicon-tasks"></span>Data Member
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <table class="table table-striped table-bordered table-hover" id="datatable" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="1%">No</th>
                                            <th width="25%">Nama </th>
                                            <th width="27%">Email </th>
                                            <th width="18%">Status</th>
                                            <th width="25%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                        $i = 1;

                                        $memberview = $classmember->View();

                                        while ( $data = $memberview->fetch_array()) {
                                    ?>                                        
                                        <tr>
                                            <td style="text-align: center"><?=$i++;?></td>
                                            <td><?=$data['nama'];?></td>
                                            <td><?=$data['email'];?></td>
                                            <td style="text-align: center"><?
                                                if ($data['status'] == 1) {
                                                    echo "Member Perpustakaan";
                                                }elseif ($data['status'] == 2) {
                                                    echo "Pengurus Perpustakaan";
                                                }elseif ($data['status'] == 3) {
                                                    echo "Admin Perpustakaan";
                                                }else{
                                                }
                                                ?>
                                            </td>

                                            <td style="text-align: center">
                                                <?
                                                   if ($status == 3) {
                                                        if ($data['idusers'] == $id_users) {
                                                        ?>
                                                            <a href="?action=edit&id=<?=base64_encode($data['idusers']);?>" class="btn btn-primary btn-sm disabled"><span class="glyphicon glyphicon-pencil"></span> Edit </a>
                                                            <a href="?action=delete&id=<?=base64_encode($data['idusers']);?>" class="btn btn-primary btn-sm disabled"><span class="glyphicon glyphicon-trash"></span> Delete </a>
                                                            <a href="?action=view&id=<?=base64_encode($data['idusers']);?>" class="btn btn-primary btn-sm disabled" ><span class="glyphicon glyphicon-eye-open"></span> Detail </a>
                                                        
                                                        <?
                                                        }else{
                                                        ?>
                                                            <a href="?action=edit&id=<?=base64_encode($data['idusers']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit </a>
                                                            <a href="?action=delete&id=<?=base64_encode($data['idusers']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete </a>
                                                            <a href="?action=view&id=<?=base64_encode($data['idusers']);?>" class="btn btn-primary btn-sm" ><span class="glyphicon glyphicon-eye-open"></span> Detail </a>
                                                        <? } 
                                                   }elseif ($status == 2) {
                                                         if ($data['status'] != 1) {
                                                        ?>
                                                            <a href="?action=edit&id=<?=base64_encode($data['idusers']);?>" class="btn btn-primary btn-sm disabled"><span class="glyphicon glyphicon-pencil"></span> Edit </a>
                                                            <a href="?action=delete&id=<?=base64_encode($data['idusers']);?>" class="btn btn-primary btn-sm disabled"><span class="glyphicon glyphicon-trash"></span> Delete </a>
                                                            <a href="?action=view&id=<?=base64_encode($data['idusers']);?>" class="btn btn-primary btn-sm disabled" ><span class="glyphicon glyphicon-eye-open"></span> Detail </a>
                                                        
                                                        <?
                                                        }else{
                                                        ?>
                                                            <a href="?action=edit&id=<?=base64_encode($data['idusers']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit </a>
                                                            <a href="?action=delete&id=<?=base64_encode($data['idusers']);?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete </a>
                                                            <a href="?action=view&id=<?=base64_encode($data['idusers']);?>" class="btn btn-primary btn-sm" ><span class="glyphicon glyphicon-eye-open"></span> Detail </a>
                                                        <? } 
                                                   }
                                                ?>
                                                
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
                <a class="btn btn-info putih" href="?action=tambah">Tambah Member &nbsp  <span class="glyphicon glyphicon-plus"></span></a>
            </div>
        <!-- End: Content -->
<?
            }
    include 'footer.php';
?>