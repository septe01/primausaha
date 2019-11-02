<?php 
    
    // tambah data
     if(isset($_POST["btn-usr"])){  
        $nmdpn      = htmlspecialchars($_POST['nmdpn']);
        $nmblkg     = htmlspecialchars($_POST['nmblkg']);
        $email      = htmlspecialchars($_POST['email']);
        $username   = strtolower(htmlspecialchars($_POST['username']));
        $alamat     = htmlspecialchars($_POST['alamat']);
        $tgllhr     = htmlspecialchars($_POST['tgllhr']);
        $pass       = password_hash('123456',PASSWORD_DEFAULT);
        $level      = htmlspecialchars($_POST['level']);

        $field = 'id_user,nama_depan,nama_belakang,email,username,alamat,tanggal_lahir,password,level';
        $data  = "null,'$nmdpn','$nmblkg','$email','$username','$alamat','$tgllhr','$pass','$level'";
        if(tambahData("user", $field, $data) > 0 ){
            echo "<script>
                    alert('Data Berhasil di Tambah.');
                  </script>
            "; 
        }else{
            echo "<script>
                    alert('Data Gagal di Tambah.');
                  </script>
            "; 
        }        
    }

    // tampil data
    $users = tampilData("user");

    // hapus data pengguna
    if(isset($_POST['hapus']) > 0){
       if( hapus("user",'id_user',$_POST) ){
           echo "<script>
                    alert('Data Berhasil di Hapus.');
                    document.location.href='{$_SESSION['baseAdmin']}?panel=user';
                  </script>
            ";
       }
    }

    // ubah data pengguna
    if(isset($_POST['btn-admubhusr'])){
        $id = htmlspecialchars($_POST['id']);
        $id = "id_user=".$id;

        $nmdpn = htmlspecialchars($_POST['nmdpn']);
        $nmblkg = htmlspecialchars($_POST['nmblkg']);
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['username']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $tgllhr = htmlspecialchars($_POST['tgllhr']);
        $level = htmlspecialchars($_POST['level']);

        $data =     "nama_depan='$nmdpn'".",".
                    "nama_belakang='$nmblkg'".",".
                    "email='$email'".",".
                    "username='$username'".",".
                    "alamat='$alamat'".",".
                    "tanggal_lahir='$tgllhr'".",".
                    "level='$level'";
        
        

        if(ubahdata( $data, "user", $id ) > 0 ){
            echo "<script>
                    alert('Data Berhasil di Ubah.');
                    document.location.href='{$_SESSION['baseAdmin']}?panel=user';
                  </script>
            "; 
        }else{
            echo "<script>
                    alert('Data Gagal di Ubah.');
                  </script>
            "; 
        } 
        

        
    }

    
?>

<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-user user-icon"></i>
            <a href="#">User</a>
        </li>
        <!-- <li class="active">Dashboard</li> -->
    </ul><!-- /.breadcrumb -->  
</div>

<div class="page-content">
    <div class="ace-settings-container" id="ace-settings-container">
        <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
            <i class="ace-icon fa fa-cog bigger-130"></i>
        </div>

        <div class="ace-settings-box clearfix" id="ace-settings-box">
            <div class="pull-left width-50">
                <div class="ace-settings-item">
                    <div class="pull-left">
                        <select id="skin-colorpicker" class="hide">
                            <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                            <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                            <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                            <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                        </select>
                    </div>
                    <span>&nbsp; Choose Skin</span>
                </div>

                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                    <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                </div>

                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                    <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                </div>

                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                    <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                </div>

                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
                    <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                </div>

                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
                    <label class="lbl" for="ace-settings-add-container">
                        Inside
                        <b>.container</b>
                    </label>
                </div>
            </div><!-- /.pull-left -->

            <div class="pull-left width-50">
                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                    <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                </div>

                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
                    <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                </div>

                <div class="ace-settings-item">
                    <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
                    <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                </div>
            </div><!-- /.pull-left -->
        </div><!-- /.ace-settings-box -->
    </div><!-- /.ace-settings-container -->
    

    <!-- main -->
    <div class="page-header">
        <h1>
            List Pengguna
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->   
<div class="page-header has-shadow" style="padding: 0 15px;">
    <div class="row">
        <div class="space-1"></div>
            <div class="row">
                <div class="col-xs-12 ">
                    <!-- tools -->
                    <div class="clearfix">
                        <!-- tableTools-container <-class buat tools -->
                        <div class="pull-right mb-1">
                            <button class="btn btn-white btn-primary btn-bold admtmbhusr" data-toggle="modal" data-target="#tambahusr"><i class="ace-icon fa glyphicon-plus bigger-110 blue"></i>tambah data</button>
                        </div>
                    </div>
                    <div class=" table-responsive">
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                   <th>No</th>
                                   <th>Nama</th>
                                   <th>Email</th>
                                   <th>Username</th>
                                   <th>Tanggal Lahir</th>
                                   <th>Alamat</th>
                                   <th>Level</th>
                                    <th class="hidden-480" style="color: #707070; width:10%">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                $no = 1;
                                    foreach ($users as $usr) :
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $usr['nama_depan']." ".$usr['nama_belakang'] ?></td>
                                        <td><?= $usr['email']; ?></td>
                                        <td><?= $usr['username']; ?></td>
                                        <td><?= $usr['tanggal_lahir']; ?></td>
                                        <td><?= $usr['alamat']; ?></td>
                                        <td><?= $usr['level']; ?></td>
                                        <td style="text-align:center">
                                            <div class="hidden-sm hidden-xs action-buttons">

                                                <a class="green admubahusr" href="#"
                                                    data-toggle="modal"
                                                    data-target="#admubah"
                                                    data-id="<?= $usr['id_user']; ?>"
                                                    data-nmdpn="<?= $usr['nama_depan']; ?>"
                                                    data-nmblkg="<?= $usr['nama_belakang']; ?>"
                                                    data-email="<?= $usr['email']; ?>"
                                                    data-username="<?= $usr['username']; ?>"
                                                    data-alamat="<?= $usr['alamat']; ?>"
                                                    data-tgl="<?= $usr['tanggal_lahir']; ?>"
                                                    data-level="<?= $usr['level']; ?>"
                                                >
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a class="red usrhps" href="#" 
                                                data-toggle="modal" 
                                                data-target="#admhps"                                       
                                                data-id="<?= $usr['id_user']; ?>"
                                                >
                                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>                                
                                <?php 
                                    $no++;
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                <!-- MODAL -->
                    <!-- modal tambah user -->
                        <form method="post" onsubmit="">
                            <div id="tambahusr" class="modal fade">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <span aria-hidden="true" style="outline: none">×</span>
                                            </button>
                                            <h4 class="modal-title">Tambah Pengguna</h4>
                                            <!-- <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">×</span>
                                                <span class="sr-only">tutup</span>
                                            </button> -->
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Nama Depan</label>
                                                        <input name="nmdpn" type="text" class="form-control" value="" autocomplete="off" autofocus placeholder="Jimmy">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Nama Belakang</label>
                                                        <input name="nmblkg" id="" type="text" class="form-control" placeholder="Rahmana" autocomplete="off" >
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Email</label>
                                                        <input name="email" type="email" class="form-control" id="" placeholder="Jimmy@rahmana.com" autocomplete="off" >
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Username</label>
                                                        <input name="username" type="text" id="" class="form-control" placeholder="jimmy" autocomplete="off" >
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Tanggal Lahir</label>
                                                        <input type="date" name="tgllhr" id="" class="form-control" autocomplete="off">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Level</label>
                                                        <select name="level" id="" class="custom-select form-control">
                                                            <option value="">Pilih</option>
                                                            <option value="admin">Admin</option>
                                                            <option value="owner">Owner</option>
                                                            <option value="manager">Manager</option>
                                                        </select>
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Alamat</label>
                                                        <textarea name="alamat" id="" class="form-control" placeholder="Jl.River Raya No.21" autocomplete="off" maxlength="50"></textarea>
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white btn-danger btn-bold" data-dismiss="modal"><i class="ace-icon fa fa-exclamation-circle bigger-110 red"></i> Tutup</button>
                                            <button type="submit" name="btn-usr" class="btn btn-white btn-primary btn-bold"><i class="ace-icon fa fa-check-square-o bigger-110 blue"></i> Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                    <!-- modal hps user -->
                        <form method="post" onsubmit="">
                            <div id="admhps" class="modal fade">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <span aria-hidden="true" style="outline: none">×</span>
                                            </button>
                                            <h4 class="modal-title">Hapus Data</h4>
                                            <!-- <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">×</span>
                                                <span class="sr-only">tutup</span>
                                            </button> -->
                                        </div>
                                        <div class="modal-body">
                                            <div class="row text-center">
                                                <input name="id" type="hidden" class="form-control mdhps" value="">
                                                <h2>Anda yakin mau menghapus ini ?</h2>
                                                <h6 class=" green">Data tidak dapat dikembalikan setelah di hapus</h6>
                                                
                                            </div>
                                        </div>
                                        <div class="modal-footer" >
                                            <button type="submit" name="hapus" class="btn btn-white btn-primary btn-bold"><i class="ace-icon fa fa-check-square-o bigger-110 blue"></i> Ok</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    
                    <!-- modal ubh user -->
                        <form method="post" onsubmit="">
                            <div id="admubah" class="modal fade">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <span aria-hidden="true" style="outline: none">×</span>
                                            </button>
                                            <h4 class="modal-title">Ubah Pengguna</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input name="id" type="hidden" class="form-control" value="">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Nama Depan</label>
                                                        <input name="nmdpn" type="text" class="form-control" value="" autocomplete="off" autofocus placeholder="Jimmy">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Nama Belakang</label>
                                                        <input name="nmblkg" id="" type="text" class="form-control" placeholder="Rahmana" autocomplete="off" >
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Email</label>
                                                        <input name="email" type="email" class="form-control" id="" placeholder="Jimmy@rahmana.com" autocomplete="off" >
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Username</label>
                                                        <input name="username" type="text" id="" class="form-control" placeholder="jimmy" autocomplete="off" >
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Tanggal Lahir</label>
                                                        <input type="date" name="tgllhr" id="" class="form-control" autocomplete="off">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Level</label>
                                                        <select name="level" id="" class="custom-select form-control">
                                                            <option value="">Pilih</option>
                                                            <option value="admin">Admin</option>
                                                            <option value="owner">Owner</option>
                                                            <option value="manager">Manager</option>
                                                        </select>
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Alamat</label>
                                                        <textarea name="alamat" id="" class="form-control" placeholder="Jl.River Raya No.21" autocomplete="off" maxlength="50"></textarea>
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white btn-danger btn-bold" data-dismiss="modal"><i class="ace-icon fa fa-exclamation-circle bigger-110 red"></i> Tutup</button>
                                            <button type="submit" name="btn-admubhusr" class="btn btn-white btn-primary btn-bold"><i class="ace-icon fa fa-check-square-o bigger-110 blue"></i> Ok</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </div>
</div>