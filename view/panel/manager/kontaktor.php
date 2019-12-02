<?php 

// tambah data kontraktor
    if(isset($_POST['btn-kont'])){
        // var_dump($_POST);die;
        $nm = htmlspecialchars($_POST['nama']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $email = htmlspecialchars($_POST['email']);
        $tel = htmlspecialchars($_POST['tel']);
        $petugas = htmlspecialchars($_POST['penJawab']);

        $field = 'id_kontraktor,nama,alamat,email,telepon,kepala_proyek
';
        $data = "null,'$nm','$alamat','$email','$tel','$petugas'";
        if(tambahData("kontraktor", $field, $data) > 0 ){
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

// tampil data kontraktor
    $kontraktor = tampilData("kontraktor");

// hapus data kontraktor
    if(isset($_POST['hapus']) > 0){

       if( hapus("kontraktor",' 
id_kontraktor',$_POST) ){
           echo "<script>
                    alert('Data Berhasil di Hapus.');
                    document.location.href='{$_SESSION['baseAdmin']}?panel=kontaktor';
                  </script>
            ";
       }
    }

// ubah kontraktor
if(isset($_POST['kontubah'])){

    $id = htmlspecialchars($_POST['id']);
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $email = htmlspecialchars($_POST['email']);
    $tel = htmlspecialchars($_POST['tel']);
    $petugas = htmlspecialchars($_POST['penJawab']);

    $data = "nama='{$nama}',
            alamat='{$alamat}',
            email='{$email}',
            telepon='{$tel}',
            kepala_proyek='{$petugas}'"
            ;

    $id = "id_kontraktor=".$id;

    if(ubahdata( $data, "kontraktor", $id ) > 0 ){
            echo "<script>
                    alert('Data Berhasil di Ubah.');
                    document.location.href='{$_SESSION['baseAdmin']}?panel=kontaktor';
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
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="<?= $_SESSION['baseAdmin']?>">Home</a>
            </li>
        <li>
            <i class="ace-icon fa fa-cog"></i>
            <a href="#">Kontraktor</a>
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
    <!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">    
        <!-- PAGE CONTENT BEGINS --> 
            <div class="page-header has-shadow" style="padding: 0 15px;">
                <div class="row">
                    <div class="space-1"></div>
                        <!-- tool -->
                        <!-- <div class="row">
                            <div class="">
                                <div class="pull-right tableTools-container">
                                </div>
                            </div>
                        </div> -->
                        <div class="row" >
                            <div class="col-md-4" >
                                <form method="post" onsubmit="" class="form-horizontal kontraktor">
                                    <div class="modal-content pl-1 pr-1" >
                                        <div class="modal-header">
                                            <h4 class="modal-title jdlForm">Tambah Kontraktor</h4>
                                        </div>
                                        <div class="modal-header" style="">
                                            <div class="form-group mt--1">
                                                    <label for="nm" class=" control-label">PT</label>
                                                <input type="text" autofocus class="form-control" placeholder="PT Nama" id="nm" name="nama" autocomplete="off" required="">
                                                <input type="hidden" id="" name="id">
                                                <small id="nma" class="form-text text-danger"></small>
                                            </div>
                                            
                                            <div class="form-group mt--1">
                                                    <label class="control-label" for="alamat">Alamat</label>
                                                <textarea name="alamat" id="alamat" class="form-control" placeholder="Jl.Marunda Raya No.21" autocomplete="off" maxlength="50" required=""></textarea>
                                                <small id="almt" class="form-text text-danger"></small>
                                            </div>
                                            
                                            <div class="form-group mt--1">
                                                    <label class="control-label" for="email">Email</label>
                                                <input type="text" autofocus class="form-control" placeholder="jhon@gmail.com" id="email" name="email" autocomplite="off" max-lenght="40" required="">
                                                <small id="hp" class="form-text text-danger"></small>
                                            </div>
                                            
                                            <div class="form-group mt--1">
                                                    <label class="control-label" for="tel">Telp</label>
                                                <input type="tel" autofocus class="form-control" placeholder="081231233" id="tel" name="tel" autocomplite="off" max-lenght="14" required="">
                                                <small id="errorfax" class="form-text text-danger"></small>
                                            </div>
                                            
                                            <div class="form-group mt--1">
                                                    <label class="control-label" for="pen">Petugas</label>
                                                <input name="penJawab" type="text" class="form-control" id="pen" placeholder="Jhon" autocomplete="off" required="">
                                                <small id="errormail" class="form-text text-danger"></small>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn batal btn-white btn-warning btn-bold" data-dismiss="modal"><i class="ace-icon fa fa-exclamation-circle bigger-110  "></i> <span>Reset</span></button>
                                            <button type="submit" name="btn-kont" class="btn btn-white btn-primary btn-bold save"><i class="ace-icon fa fa-check-square-o bigger-110 blue"></i><span>Simpan</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                <div class="page-header">
                                <h1>
                                    List Kontraktor
                                </h1>
                            </div>
                                <div class=" table-responsive">
                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Nama PT</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Petugas</th>
                                        <th class="hidden-480" style="color: #707070; width:10%">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        $no = 1;
                                            foreach ($kontraktor as $kont) :
                                        ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $kont['nama'] ?></td>
                                                <td><?= $kont['alamat'] ?></td>
                                                <td><?= $kont['email'] ?></td>
                                                <td><?= $kont['telepon'] ?></td>
                                                <td><?= $kont['kepala_proyek'] ?></td>
                                                <td style="text-align:center" class="hilang">
                                                    <div class="hidden-sm hidden-xs action-buttons">

                                                        <a class="green kontubah" href="#"
                                                            data-id = "<?= $kont['id_kontraktor'] ?>"
                                                            data-nama = "<?= $kont['nama'] ?>"
                                                            data-alamat = "<?= $kont['alamat'] ?>"
                                                            data-email = "<?= $kont['email'] ?>"
                                                            data-tel = "<?= $kont['telepon'] ?>"
                                                            data-petugas = "<?= $kont['kepala_proyek'] ?>"
                                                        >
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>

                                                        <a class="red supphps" href="#" data-toggle = "modal"
                                                        data-target = "#kontphps"
                                                        data-id = "<?= $kont['id_kontraktor'] ?>"
                                                       
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
                            </div>
                        </div>
                                
                            <!-- MODAL -->
                                 <!-- modal hps user -->
                                    <form method="post" onsubmit="">
                                        <div id="kontphps" class="modal fade">
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
                                

                                
                                <!-- </div> -->
                            <!-- </div> -->
                        </div>
                    </div><!-- /.row -->
                </div>
            </div>