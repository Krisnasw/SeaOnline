<?
    include 'header.php'; 

    $classpeminjaman = new Peminjaman();
    $classmember = new Member();
    $classbuku = new Buku();

    if (isset($_POST['simpan_buku'])) {

        # code...
        $nama = mysql_escape_string($_POST['nama']);
        $nmbuku = mysql_escape_string($_POST['namabuku']);
        $tglpinjam = mysql_escape_string($_POST['tglpinjam']);
        $tglkmbli = mysql_escape_string($_POST['tglkmbli']);

        $idbuku     = $classbuku->AmbilDataByNama($nmbuku);
        $idmember   = $classmember->AmbilDataByNama($nama);

        $classpeminjaman->Create($idmember,$idbuku,$tglpinjam,$tglkmbli);
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
                <li class="crumb-trail"><a href="opsipeminjaman.php">Page Peminjaman</a></li>
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
                                            <span class="panel-title">Tambah Peminjaman</span>
                                        </div>
                                        <div class="panel-body">
                                            <form  action="#" method="POST" class="form-horizontal" role="form"  enctype="multipart/form-data">
                                              
                                                <!-- <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nama</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" name="nama" class="form-control search" id="searchid" placeholder="Search for people" /> 
                                                        <input name="namabuku" type="text" class="form-control searchbuku" id="searchidbuku"  />
                                                    </div>
                                                </div> -->

                                                 <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nama Anggota</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" name="nama" class="form-control search" placeholder="Pencarian Anggota" id="nama" onkeyup="carinama(this.value);" onblur="isiTextboxnama();" required />
                                                        <div class="suggestionsBox" id="suggestnama" style="display: none;">
                                                            <img src="../Includes/images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionList" id="autoSuggestionsNama">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                               
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Nama Buku</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" name="namabuku" class="form-control search" placeholder="Pencarian Buku" id="kataKunci" onkeyup="cari(this.value);" onblur="isiTextbox();" required />
                                                        <div class="suggestionsBox" id="suggestions" style="display: none;">
                                                            <img src="../Includes/images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionList" id="autoSuggestionsList">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                 <!--   <div class="form-group">
                                                   <div class="field_wrapper">
                                                        <div> 
                                                            <input type="text" name="item[' + x + ']" value="" id="kataKunci" onkeyup="cari(this.value);" onblur="isiTextbox();" />
                                                            <a href="javascript:void(0);" class="add_button" title="Add field"><img src="add-icon.png"/></a>
                                                            <div class="suggestionsBox" id="suggestions" style="display: none;">
                                                            <img src="../Includes/images/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                            <div class="suggestionList" id="autoSuggestionsList">
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                 -->
                                                 <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Tanggal Pinjam</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" name="tglpinjam" placeholder="Tanggal Pinjam" class="form-control" id="datetimepicker" required >
                                                    </div>
                                                </div>

                                                
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label">Tanggal Kembali</label>
                                                    <div class="col-lg-5">
                                                        <input type="text" name="tglkmbli" placeholder="Tanggal Kembali" class="form-control" id="datetimepicker1" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="inputStandard" class="col-lg-3 control-label"></label>
                                                    <div class="col-lg-8 ">
                                                        <input type="submit" class="btn btn-primary "  name="simpan_buku" value="Simpan Buku" />
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
                       $classpeminjaman->Edit($id);
                    }elseif ($_GET['action'] == 'view') {
                        $datapeminaman =  $classpeminjaman->ViewById($id);
                        $data = $datapeminaman->fetch_array();
                        $dendas = $data['lamakembali'] * 5000;
                        if ($dendas <= 0) {
                            $denda = "belum ada denda";
                        }else{
                            $denda = $data['lamakembali'] * 5000;
                        }
                    ?>
                    <div id="content">
                                <div class="panel-body pn">
                                    <div class="p25 br-b">
                                        <h2 class="fw200 mb20 mt10"> Peminjaman Buku .... </small></h2>
                                    </div>
                                    <div class="table-layout bg-light">
                                        <div class="col-xs-3 text-center va-m">
                                            <img src="../includes/img/<?=$data['images'];?>" style="margin-top: 35px; height: 180px;width:180px;" class="responsive">
                                            <h5 class="text-muted pl5 mt20 mb20"> <?=$data['nama'];?> <small> ( <?=$data['username'];?> ) </small> </h5>
                                        </div>
                                        <div class="col-xs-8 br-l">
                                            <h5 class="text-muted pl5 mt20 mb20"> Buku yang di pinjam . . . </h5>
                                            <div class="col-lg-12">
                                                <ul class="fs15 list-divide-items mb30">
                                                    <li>
                                                        <div class="form-group">
                                                            Kode Buku <i class="fa fa-angle-double-right text-primary fa-lg pr10"></i> <?=$data['kodebuku'];?> 
                                                        </div>
                                                    </li>
                                                     <li>
                                                        <div class="form-group">
                                                            Nama Buku <i class="fa fa-angle-double-right text-primary fa-lg pr10"></i> <?=$data['judul'];?> 
                                                        </div>
                                                    </li>
                                                     <li>
                                                        <div class="form-group">
                                                            Tanggal Pinjam <i class="fa fa-angle-double-right text-primary fa-lg pr10"></i> <?=$data['tglpinjam'];?> 
                                                        </div>
                                                    </li>
                                                     <li>
                                                        <div class="form-group">
                                                            Tanggal Harus Kembali <i class="fa fa-angle-double-right text-primary fa-lg pr10"></i> <?=$data['tglharuskmbl'];?> 
                                                        </div>
                                                    </li>
                                                    <? if ($data['status'] == 0) {
                                                    ?>
                                                    <li>
                                                        <div class="form-group">
                                                            Status Peminjaman <i class='fa fa-angle-double-right text-primary fa-lg pr10'></i> <i class ='text-danger'>Buku Dipinjam</i>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            Denda <i class='fa fa-angle-double-right text-primary fa-lg pr10'></i> <i class ='text-danger'><?=$denda?></i>
                                                        </div>
                                                    </li>
                                                    <?
                                                        }else{
                                                    ?>
                                                    <li>
                                                        <div class="form-group">
                                                            Status Peminjaman <i class='fa fa-angle-double-right text-primary fa-lg pr10'></i> Buku Sudah Dikembalikan
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="form-group">
                                                            Denda <i class='fa fa-angle-double-right text-primary fa-lg pr10'></i> -
                                                        </div>
                                                    </li>
                                                    <?
                                                    }
                                                    ?>
                                                     <li>
                                                        <div class="form-group">
                                                            <? if ($data['status'] == 0) {
                                                               echo "Status Peminjaman <i class='fa fa-angle-double-right text-primary fa-lg pr10'></i> <i class ='text-danger'>Buku Dipinjam</i>";
                                                            }else{
                                                               echo "Status Peminjaman <i class='fa fa-angle-double-right text-primary fa-lg pr10'></i> Buku Sudah Dikembalikan";
                                                            }
                                                            ?>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xs-3 text-center va-m">
                                            <img src="../includes/img/<?=$data['cover'];?>" style="margin-top: 35px; height: 180px;width:180px;" class="responsive">
                                            <h5 class="text-muted pl5 mt20 mb20"> <?=$data['judul'];?> </h5>
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
                                    <span class="glyphicon glyphicon-tasks"></span>Peminjaman Buku
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <table class="table table-striped table-bordered table-hover" id="datatable" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="1%">No</th>
                                            <th width="14%">Nama </th>
                                            <th width="15%">Buku </th>
                                            <th  style="text-align: center" width="10%">Peminjaman</th>
                                            <th  style="text-align: center" width="10%">Harus Kembali</th>
                                            <th  style="text-align: center" width="10%">Denda</th>
                                            <th width="12%">Status</th>
                                            <th width="27%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                        $i = 1;
                                        $peminjamanview = $classpeminjaman->View();
                                        while ( $data = $peminjamanview->fetch_array()) {

                                        $dendas = $data['lamakembali'] * 5000;
                                        if ($dendas <= 0) {
                                            $denda = "belum ada denda";
                                        }else{
                                            $denda = $data['lamakembali'] * 5000;
                                        }
                                    ?>                                        
                                        <tr>
                                            <td style="text-align: center"><?=$i++;?></td>
                                            <td><?=$data['nama'];?></td>
                                            <td><?=$data['judul'];?></td>
                                            <td style="text-align: center" ><?=$data['tglpinjam'];?></td>
                                            <td style="text-align: center" ><?=$data['tglharuskmbl'];?></td>
                                            
                                            <? if ($data['status'] == 0) {
                                               ?>
                                                <td style="text-align: center" ><?=$denda;?></td>
                                                <td><p style='color:red'>Buku Dipinjam</p></td>
                                               <?
                                            }else{
                                                ?>
                                                    <td style="text-align: center" >-</td>
                                                    <td>Buku Sudah Dikembalikan</td>
                                                <?
                                            }
                                            ?>
                                            <td>
                                                <? if ($data['status'] == 0) { ?>
                                                  <a href="?action=edit&id=<?=base64_encode($data['idpeminjam']);?>" class="btn btn-primary btn-sm" 
                                                    data-toggle="confirmation" data-btn-ok-label="DiKembalikan" 
                                                    data-btn-ok-icon="glyphicon glyphicon-share-alt" 
                                                    data-btn-ok-class="btn-danger btn-sm" data-btn-cancel-label="Batal" 
                                                    data-btn-cancel-icon="glyphicon glyphicon-ban-circle"
                                                    data-placement="left" 
                                                    data-btn-cancel-class="btn-success  btn-sm"><span class="glyphicon glyphicon-trash"></span> Pengembalian</a>
                                                <? }else{ ?>
                                                    <a href="?action=edit&id=<?=base64_encode($data['idpeminjam']);?>" class="btn btn-primary btn-sm disabled "><span class="glyphicon glyphicon-trash"></span> Pengembalian </a>
                                                <? }
                                                ?>
                                                
                                                <!-- <a href="?action=delete&id=<?=base64_encode($data['idpeminjam']);?>" class="btn btn-primary btn-sm "><span class="glyphicon glyphicon-trash"></span> Delete </a> -->
                                                <a href="?action=view&id=<?=base64_encode($data['idpeminjam']);?>" class="btn btn-primary btn-sm " ><span class="glyphicon glyphicon-eye-open"></span> Detail </a>
                                            </td>
                                        </tr>
                                    <? 
                                        }  
                                    ?>
                                    </tbody>
                                </table>
                            </div>
            <!-- <PENAMBAHAN DIV> -->
                        </div>
                    </div>
                </div> 
                <a class="btn btn-info putih" href="?action=tambah">Tambah Peminjam &nbsp  <span class="glyphicon glyphicon-plus"></span></a>
            </div>
        <!-- End: Content -->
<?
            }
    include 'footer.php';
?>