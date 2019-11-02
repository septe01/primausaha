<?php 

// tambah data pekerjaan
    if(isset($_POST['btn-peker'])){
        // var_dump($_POST);die;
        $nm = htmlspecialchars($_POST['nama']);
        $jenis = htmlspecialchars($_POST['jenis']);
        $keterangan = htmlspecialchars($_POST['keterangan']);

        $field = 'id_pekerjaan,nm_pekerjaan,jenis,keterangan';
        $data = "null,'$nm','$jenis','$keterangan'";
        if(tambahData("data_pekerjaan", $field, $data) > 0 ){
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
    $pekerjaan = tampilData("data_pekerjaan");

// hapus data Pekerjaan
    if(isset($_POST['hapus']) > 0){

       if( hapus("data_pekerjaan",'id_pekerjaan',$_POST) ){
           echo "<script>
                    alert('Data Berhasil di Hapus.');
                    document.location.href='{$_SESSION['baseAdmin']}?panel=pekerjaan';
                  </script>
            ";
       }
    }

// ubah pekerjaan
if(isset($_POST['pekubah'])){

    $id = htmlspecialchars($_POST['id']);
    $nama = htmlspecialchars($_POST['nama']);
    $jenis = htmlspecialchars($_POST['jenis']);
    $keterangan = htmlspecialchars($_POST['keterangan']);

    $data = "nm_pekerjaan='{$nama}',
            jenis='{$jenis}',
            keterangan='{$keterangan}' ";

    $id = "id_pekerjaan=".$id;

    if(ubahdata( $data, "data_pekerjaan", $id ) > 0 ){
            echo "<script>
                    alert('Data Berhasil di Ubah.');
                    document.location.href='{$_SESSION['baseAdmin']}?panel=pekerjaan';
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
            <i class="ace-icon fa fa-laptop"></i>
            <a href="#">Pekerjaan</a>
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
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Pekerjaan</h4>
                                        </div>
                                        <div class="modal-header" style="">
                                            <div class="form-group">
                                                <div class="col-sm-4 text-left">
                                                    <label for="nm" class=" control-label">Nama Pekerjaan</label>
                                                </div>
                                                <div class="col-sm-8">
                                                <input type="text" autofocus class="form-control" placeholder="Nama Pekerjaan" id="nm" name="nama" autocomplete="off">
                                                <input type="hidden" id="" name="id">
                                                <small id="nma" class="form-text text-danger"></small>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="jenis">Jenis</label>
                                                </div>  
                                                <div class="col-sm-8">
                                                <input type="text" autofocus class="form-control" placeholder="Jenis Pekerjaan Yang Dilakukan" id="jenis" name="jenis" autocomplite="off" max-lenght=14 >
                                                <small id="jns" class="form-text text-danger"></small>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="keterangan">Keterangan</label>
                                                </div>  
                                                <div class="col-sm-8">
                                                <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" autocomplete="off" maxlength="70"></textarea>
                                                <small id="ket" class="form-text text-danger"></small>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn batal btn-white btn-warning btn-bold" data-dismiss="modal"><i class="ace-icon fa fa-exclamation-circle bigger-110  "></i> <span>Reset</span></button>
                                            <button type="submit" name="btn-peker" class="btn btn-white btn-primary btn-bold save"><i class="ace-icon fa fa-check-square-o bigger-110 blue"></i><span>Simpan</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                <div class="page-header">
                                <h1>
                                    List Pekerjaan
                                </h1>
                            </div>
                                <div class=" table-responsive">
                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Nama Pekerjaan</th>
                                        <th>Jenis</th>
                                        <th>Keterangan</th>
                                        <th class="hidden-480" style="color: #707070; width:10%">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        $no = 1;
                                            foreach ($pekerjaan as $pek) :
                                        ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $pek['nm_pekerjaan'] ?></td>
                                                <td><?= $pek['jenis'] ?></td>
                                                <td><?= $pek['keterangan'] ?></td>
                                                <td style="text-align:center" class="hilang">
                                                    <div class="hidden-sm hidden-xs action-buttons">

                                                        <a class="green pekubah" href="#"
                                                            data-id = "<?= $pek['id_pekerjaan'] ?>"
                                                            data-nama = "<?= $pek['nm_pekerjaan'] ?>"
                                                            data-jenis = "<?= $pek['jenis'] ?>"
                                                            data-keterangan = "<?= $pek['keterangan'] ?>"
                                                        >
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>

                                                        <a class="red supphps" href="#" data-toggle = "modal"
                                                        data-target = "#pekhps"
                                                        data-id = "<?= $pek['id_pekerjaan'] ?>"
                                                       
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
                                        <div id="pekhps" class="modal fade">
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