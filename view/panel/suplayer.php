<?php 

// tambah data supplier
    if(isset($_POST['btn-supp'])){
        
        $nm = htmlspecialchars($_POST['nama']);
        $jns = htmlspecialchars($_POST['jenis']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $hp = htmlspecialchars($_POST['hp']);
        $fax = htmlspecialchars($_POST['fax']);
        $email = htmlspecialchars($_POST['email']);

        $field = 'id_supplier,nama,jenis,alamat,hp,fax,email';
        $data = "'','$nm','$jns','$alamat','$hp','$fax','$email'";
        if(tambahData("supplier", $field, $data) > 0 ){
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

// tampil data supplier
    $suppliers = tampilData("supplier");

// hapus data supplayer
    if(isset($_POST['hapus']) > 0){

       if( hapus("supplier",'id_supplier',$_POST) ){
           echo "<script>
                    alert('Data Berhasil di Hapus.');
                    document.location.href='http://localhost/primausaha/?panel=suplayer';
                  </script>
            ";
       }
    }

// ubah supplier
if(isset($_POST['suppubah'])){
    
    $id = htmlspecialchars($_POST['id']);
    $nama = htmlspecialchars($_POST['nama']);
    $jns = htmlspecialchars($_POST['jenis']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $hp = htmlspecialchars($_POST['hp']);
    $fax = htmlspecialchars($_POST['fax']);
    $email = htmlspecialchars($_POST['email']);

    $data = "nama='{$nama}',
            jenis='{$jns}',
            alamat='{$alamat}',
            hp='{$hp}',
            fax='{$fax}',
            email='{$email}'";

    $id = "id_supplier=".$id;

    if(ubahdata( $data, "supplier", $id ) > 0 ){
            echo "<script>
                    alert('Data Berhasil di Ubah.');
                    document.location.href='http://localhost/primausaha/?panel=suplayer';
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
            <i class="ace-icon fa fa-users user-icon"></i>
            <a href="#">Suplayer</a>
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
                                <form method="post" onsubmit="" class="form-horizontal">
                                    <div class="modal-content" >
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Suplayer</h4>
                                        </div>
                                        <div class="modal-header" style="">
                                            <div class="form-group">
                                                <div class="col-sm-2 text-left">
                                                    <label for="nm" class=" control-label">Nama</label>
                                                </div>
                                                <div class="col-sm-10">
                                                <input type="text" autofocus class="form-control" placeholder="Nama" id="nm" name="nama" autocomplete="off">
                                                <input type="hidden" id="" name="id">
                                                <small id="nma" class="form-text text-danger"></small>
                                                </div>
                                            </div>

                                             <div class="form-group">
                                                <div class="col-sm-2 text-left">
                                                    <label for="jns" class=" control-label">Jenis</label>
                                                </div>
                                                <div class="col-sm-10">
                                                <input type="text" autofocus class="form-control" placeholder="Jenis Suplayer" id="jns" name="jenis" autocomplete="off">
                                                <small id="jns" class="form-text text-danger"></small>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" for="alamat">Alamat</label>
                                                </div>  
                                                <div class="col-sm-10">
                                                <textarea name="alamat" id="alamat" class="form-control" placeholder="Jl.River Raya No.21" autocomplete="off" maxlength="50"></textarea>
                                                <small id="almt" class="form-text text-danger"></small>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" for="hp">No.Hp</label>
                                                </div>  
                                                <div class="col-sm-10">
                                                <input type="text" autofocus class="form-control" placeholder="08129812812" id="hp" name="hp" autocomplite="off" max-lenght=14 >
                                                <small id="hp" class="form-text text-danger"></small>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" for="fax">Fax</label>
                                                </div>  
                                                <div class="col-sm-10">
                                                <input type="tel" autofocus class="form-control" placeholder="(021) 71323" id="fax" name="fax" autocomplite="off" max-lenght=14 >
                                                <small id="errorfax" class="form-text text-danger"></small>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" for="email">Email</label>
                                                </div>  
                                                <div class="col-sm-10">
                                                <input name="email" type="email" class="form-control" id="email" placeholder="Supp@gmail.com" autocomplete="off" >
                                                <small id="errormail" class="form-text text-danger"></small>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn batal btn-white btn-warning btn-bold" data-dismiss="modal"><i class="ace-icon fa fa-exclamation-circle bigger-110  "></i> <span>Reset</span></button>
                                            <button type="submit" name="btn-supp" class="btn btn-white btn-primary btn-bold save"><i class="ace-icon fa fa-check-square-o bigger-110 blue"></i><span>Simpan</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                <div class="page-header">
                                <h1>
                                    List Suplayer
                                </h1>
                            </div>
                                <div class=" table-responsive">
                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis</th>
                                        <th>Alamat</th>
                                        <th>No. Hp</th>
                                        <th>Fax</th>
                                        <th>Email</th>
                                        <th class="hidden-480" style="color: #707070; width:10%">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        $no = 1;
                                            foreach ($suppliers as $supp) :
                                        ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $supp['nama'] ?></td>
                                                <td><?= $supp['jenis'] ?></td>
                                                <td><?= $supp['alamat']; ?></td>
                                                <td><?= $supp['hp']; ?></td>
                                                <td><?= $supp['fax']; ?></td>
                                                <td><?= $supp['email']; ?></td>
                                                <td style="text-align:center" class="hilang">
                                                    <div class="hidden-sm hidden-xs action-buttons">

                                                        <a class="green suppubah" href="#"
                                                            data-id = "<?= $supp['id_supplier'] ?>"
                                                            data-nama = "<?= $supp['nama'] ?>"
                                                            data-jns = "<?= $supp['jenis'] ?>"
                                                            data-alamat = "<?= $supp['alamat'] ?>"
                                                            data-hp = "<?= $supp['hp'] ?>"
                                                            data-fax = "<?= $supp['fax'] ?>"
                                                            data-email = "<?= $supp['email'] ?>"
                                                        >
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>

                                                        <a class="red supphps" href="#"                      data-toggle = "modal"
                                                        data-target = "#supphps"
                                                        data-id = "<?= $supp['id_supplier'] ?>"
                                                       
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
                                        <div id="supphps" class="modal fade">
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