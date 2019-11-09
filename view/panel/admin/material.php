<?php 

// tambah data
    if(isset($_POST['btn-material'])){
        $nm         = htmlspecialchars($_POST['nama']);
        $supId      = htmlspecialchars($_POST['supId']);
        $proyekId   = htmlspecialchars($_POST['proyekId']);
        $tanggal    = date('Y-m-d');
        $jenis      = htmlspecialchars($_POST['jenis']);

        $hrg        = str_replace(",", "", htmlspecialchars($_POST['mharga']));
        $harga      = $hrg;
        $jumlah     = htmlspecialchars($_POST['mjumlah']);
        $total      = str_replace(",", "", htmlspecialchars($_POST['mtotal']));

        $field = 'id_material,nama_material,id_supplier,id_proyek,tanggal,jenis,harga,jumlah,total';
        $data = "null,'$nm','$supId','$proyekId','$tanggal','$jenis','$harga','$jumlah','$total'";
        if(tambahData("data_material", $field, $data) > 0 ){
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
    $material = tampilData("data_material");

// hapus data 
    if(isset($_POST['hapus']) > 0){

       if( hapus("data_material","id_material",$_POST) ){
           echo "<script>
                    alert('Data Berhasil di Hapus.');
                    document.location.href='{$_SESSION['baseAdmin']}?panel=material';
                  </script>
            ";
       }
    }
// ubah data
if(isset($_POST['matubah'])){
    $id         = htmlspecialchars($_POST['idm']);
    $nama       = htmlspecialchars($_POST['nama']);
    $supIdu     = htmlspecialchars($_POST['supIdu']);
    $proyekIdu  = htmlspecialchars($_POST['proyekIdu']);
    $tanggal    = date('Y-m-d');
    $jenis      = htmlspecialchars($_POST['jenis']);
    $mharga     = str_replace(",","",htmlspecialchars($_POST['mharga']));
    $mjumlah    = str_replace(",","",htmlspecialchars($_POST['mjumlah']));
    $mtotal     = str_replace(",","",htmlspecialchars($_POST['mtotal']));

    $data = "nama_material='{$nama}',
                id_supplier='{$supIdu}',
                id_proyek='{$proyekIdu}', 
                tanggal='{$tanggal}', 
                jenis='{$jenis}', 
                harga='{$mharga}', 
                jumlah='{$mjumlah}', 
                total='{$mtotal}' 
            ";

    $id = "id_material=".$id;

    if(ubahdata( $data, "data_material", $id ) > 0 ){
            echo "<script>
                    alert('Data Berhasil di Ubah.');
                    document.location.href='{$_SESSION['baseAdmin']}?panel=material';
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
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
            </li>

            <li>
                <a href="#">Proyek</a>
            </li>
            <li class="active">Materal</li>
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
                                            <h4 class="modal-title jdlForm">Tambah Material</h4>
                                        </div>
                                        <div class="modal-header" style="">
                                            <div class="">
                                                <label for="nm" class="form-field-8">Nama Material</label>
                                                <input type="text" autofocus class="form-control" placeholder="Nama Material" id="nm" name="nama" autocomplete="off">
                                                 <input type="hidden" id="" name="idm">
                                                 <small id="nma" class="form-text text-danger"></small>
                                            </div>
                                            <!-- tambah -->
                                            <div class="mt-1 proyekId">
                                                <label for="nm" class="form-field-8">Proyek</label>
                                                <select name="proyekId" id="proid" class="form-control" required="">
                                                    <option class="proyek" value="" selected="">Pilih Proyek</option>
                                                    <?php 
                                                        $Proyek = tampilData("data_proyek");
                                                        foreach ($Proyek as $pro) :?>
                                                           <option value="<?= $pro['id_proyek'] ?>">
                                                                <?= $pro['nama_proyek'] ?> 
                                                            </option> 
                                                        <?php
                                                        endforeach;
                                                    ?>
                                                </select>
                                                 <small id="nma" class="form-text text-danger"></small>
                                            </div>
                                            <!-- ubah -->
                                            <div class="mt-1 proyekIdu">
                                                <label for="nm" class="form-field-8">Proyek</label>
                                                    <select name="proyekIdu" id="proid" class="form-control" required="">
                                                        <option class="proyekubah" value="" selected="">Pilih Proyek</option>
                                                        <?php 
                                                            $Proyek = tampilIfExist("data_proyek","data_material","id_proyek");
                                                            foreach ($Proyek as $pro) :?>
                                                            <option value="<?= $pro['id_proyek'] ?>">
                                                                    <?= $pro['nama_proyek'] ?> 
                                                                </option> 
                                                            <?php
                                                            endforeach;
                                                        ?>
                                                    </select>
                                                    <small id="nma" class="form-text text-danger"></small>
                                            </div>
                                           <!-- tambah -->
                                            <div class="mt-1 supId">
                                                <label for="nm" class="form-field-8">Suplayer</label>
                                                <select name="supId" id="supid" class="form-control" required="">
                                                    <option value="">Pilih Suplayer</option>
                                                    <?php 
                                                        $suplayer = tampilData("supplier");
                                                        foreach ($suplayer as $sup) :?>
                                                           <option value="<?= $sup['id_supplier'] ?>">
                                                                <?= $sup['nama'] ?> Kategori <?= $sup['jenis'] ?>
                                                            </option> 
                                                        <?php
                                                        endforeach;
                                                    ?>
                                                </select>
                                                 <small id="nma" class="form-text text-danger"></small>
                                            </div>
                                            <!-- ubah -->
                                            <div class="mt-1 supIdu">
                                                <label for="nm" class="form-field-8">Suplayer</label>
                                                <select name="supIdu" id="supidu" class="form-control" required="">
                                                    <option class="supubah" value="">Pilih Suplayer</option>
                                                    <?php 
                                                        $suplayer = tampilIfExist("supplier","data_material","id_supplier");
                                                        foreach ($suplayer as $sup) :?>
                                                           <option value="<?= $sup['id_supplier'] ?>">
                                                                <?= $sup['nama'] ?> Kategori <?= $sup['jenis'] ?>
                                                            </option> 
                                                        <?php
                                                        endforeach;
                                                    ?>
                                                </select>
                                                 <small id="nma" class="form-text text-danger"></small>
                                            </div>

                                            <div class="mt-1">
                                                <label for="nm" class="form-field-8">Jenis</label>
                                                <input type="text" name="jenis" placeholder="Jenis Material" class="form-control" required="" >
                                                 <small id="nma" class="form-text text-danger"></small>
                                            </div>

                                            <div class="mt-1">
                                                <label for="nm" class="form-field-8">Harga</label>
                                                <input type="text" name="mharga" placeholder="100,000" class="form-control mharga money numger" required="" onkeyup="isNumber()">
                                                 <small id="number" class="form-text text-danger"></small>
                                            </div>

                                            <div class="mt-1">
                                                <label for="nm" class="form-field-8">Jumlah</label>
                                                <input type="number" name="mjumlah" placeholder="10" class="form-control mjumlah" required="" >
                                                 <small id="nma" class="form-text text-danger"></small>
                                            </div>

                                            <div class="mt-1">
                                                <label for="nm" class="form-field-8">Total</label>
                                                <input type="text" name="mtotal" placeholder="1,000,000" class="form-control money mtotal" required="" readonly="" >
                                                 <small id="nma" class="form-text text-danger"></small>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn batalmat btn-white btn-warning btn-bold" data-dismiss="modal"><i class="ace-icon fa fa-exclamation-circle bigger-110  "></i> <span>Reset</span></button>
                                            <button type="submit" name="btn-material" class="btn btn-white btn-primary btn-bold savemat"><i class="ace-icon fa fa-check-square-o bigger-110 blue"></i><span>Simpan</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                <div class="page-header">
                                <h1>
                                    List Materal
                                </h1>
                            </div>
                                <div class=" table-responsive">
                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Material</th>
                                        <th>Proyek</th>
                                        <th>Suplayer</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total</th>
                                        <th class="hidden-480" style="color: #707070; width:10%">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        $no = 1;
                                            foreach ($material as $mat) :
                                            $proyek = tampilByID("data_proyek","id_proyek",$mat['id_proyek']);
                                            $suplayer = tampilByID("supplier","id_supplier",$mat['id_supplier']);

                                        ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $mat['nama_material'] ?></td>
                                                <td><?= $proyek['nama_proyek']; ?></td>
                                                <td><?= $suplayer['nama'] ?></td>
                                                <td class="money"><?= $mat['harga'] ?></td>
                                                <td class=""><?= $mat['jumlah'] ?></td>
                                                <td class="money"><?= $mat['total'] ?></td>
                                                <td style="text-align:center" class="hilang">
                                                    <div class="hidden-sm hidden-xs action-buttons">
                                                        <a class="green matubah" href="#"
                                                        data-id = "<?= $mat['id_material'] ?>"
                                                        data-nmmaterial = "<?= $mat['nama_material'] ?>"
                                                        data-nmproyek = "<?= $proyek['nama_proyek'] ?>"
                                                        data-idproyek = "<?= $mat['id_proyek'] ?>"
                                                        data-nmsuplayer = "<?= $suplayer['nama'] ?>"
                                                        data-idsuplayer = "<?= $mat['id_supplier'] ?>"
                                                        data-jenis = "<?= $mat['jenis'] ?>"
                                                        data-harga = "<?= $mat['harga'] ?>"
                                                        data-jumlah = "<?= $mat['jumlah'] ?>"
                                                        data-total = "<?= $mat['total'] ?>"
                                                        >
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>

                                                        <a class="red mathps" href="#" data-toggle = "modal"
                                                        data-target = "#mathps"
                                                        data-id     = "<?= $mat['id_material'] ?>"
                                                       
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
                                 <!-- modal hps -->
                                    <form method="post" onsubmit="">
                                        <div id="mathps" class="modal fade">
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