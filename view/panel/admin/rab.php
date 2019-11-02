<?php 
    // tambah data
     if(isset($_POST["btn-rab"])){ 

        $rabkod		       	= htmlspecialchars($_POST['rabkod']);
     	$tanggal 			= date('Y-m-d');
        $proyekId       	= htmlspecialchars($_POST['proyekId']);

        $upah         		= str_replace(",", "", htmlspecialchars($_POST['upah']));
        $material 			= str_replace(",", "", htmlspecialchars($_POST['material']));
        $fee 				= str_replace(",", "", htmlspecialchars($_POST['fee']));
        $total 				= str_replace(",", "", htmlspecialchars($_POST['addtotal']));
        $ppn 				= htmlspecialchars($_POST['PPn']);
        $gtotal				= str_replace(",", "", htmlspecialchars($_POST['addgtotal']));

        $field = 'id_rab,kode_rab,tanggal,id_proyek,upah,material,fee,total,ppn,grand_total';
            $data  = "null,'$rabkod','$tanggal','$proyekId','$upah','$material','$fee','$total','$ppn','$gtotal'";
            if(tambahData("rab", $field, $data) > 0 ){
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
    $Rab = tampilData("rab");
    $kontraktor = tampilData("kontraktor");
    // if not exists
    $proyekData = tampilIfExist("data_proyek","rab","id_proyek");

    // hapus data pengguna
    if(isset($_POST['hapus']) > 0){
       if( hapus("rab",'id_rab',$_POST) ){
           echo "<script>
                    alert('Data Berhasil di Hapus.');
                    document.location.href='{$_SESSION['baseAdmin']}?panel=rab';
                  </script>
            ";
       }
    }

    // ubah data
    if(isset($_POST['btn-ubhrab'])){
    	$rabId 				= htmlspecialchars($_POST['idrab']);
        $rabkod		       	= htmlspecialchars($_POST['rabkodu']);
     	$tanggal 			= date('Y-m-d');
        $proyekId       	= htmlspecialchars($_POST['proyekId']);

        $upah         		= str_replace(",", "", htmlspecialchars($_POST['upah']));
        $material 			= str_replace(",", "", htmlspecialchars($_POST['material']));
        $fee 				= str_replace(",", "", htmlspecialchars($_POST['fee']));
        $total 				= str_replace(",", "", htmlspecialchars($_POST['total']));
        $ppn 				= htmlspecialchars($_POST['PPn']);
        $gtotal				= str_replace(",", "", htmlspecialchars($_POST['gtotal']));

         
        $data =     "kode_rab   ='{$rabkod}',
                    tanggal		='{$tanggal}',
                    id_proyek   ='{$proyekId}',
                    upah        ='{$upah}',
                    material    ='{$material}',
                    fee         ='{$fee}',
                    total       ='{$total}',
                    ppn         ='{$ppn}',
                    grand_total ='{$gtotal}'
                    ";
        $idrab = 	"id_rab     ='{$rabId}'";

            if(ubahdata( $data, "rab", $idrab ) > 0 ){
                echo "<script>
                        alert('Data Berhasil di Ubah.');
                        document.location.href='{$_SESSION['baseAdmin']}?panel=rab';
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
            <li class="active">Data RAB</li>
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
            List RAB
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
                            <button class="btn btn-white btn-primary btn-bold tmbrab" data-toggle="modal" data-target="#tambahusr"><i class="ace-icon fa glyphicon-plus bigger-110 blue"></i>tambah data</button>
                        </div>
                    </div>
                    <div class=" table-responsive">
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                   <th>No</th>
                                   <th>Kode Rab</th>
                                   <th>Tanggal</th>
                                   <th>Proyek</th>
                                   <th>Upah</th>
                                   <th>Material</th>
                                   <th>Fee</th>
                                   <th>Total</th>
                                   <th>PPn</th>
                                   <th>Grand Total</th>
                                   <th class="hidden-480" style="color: #707070; width:10%">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                $no = 1;
                                    foreach ($Rab as $rb) :
                                	$proyek = tampilByID("data_proyek", "id_proyek", $rb['id_proyek'] );
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $rb['kode_rab'] ?></td>
                                        <td><?= $rb['tanggal'] ?></td>
                                        <td><?= $proyek['nama_proyek'] ?></td>
                                        <td>Rp. <?= number_format($rb['upah']) ?></td>
                                        <td>Rp. <?= number_format($rb['material']) ?></td>
                                        <td>Rp. <?= number_format($rb['fee']) ?></td>
                                        <td>Rp. <?= number_format($rb['total']) ?></td>
                                        <td><?= $rb['ppn'] ?> %</td>
                                        <td>Rp. <?= number_format($rb['grand_total'])?></td>

                                        <td style="text-align:center">
                                            <div class="hidden-sm hidden-xs action-buttons">

                                                <a class="green ubhrab" href="#"
                                                    data-toggle="modal"
                                                    data-target="#rabUbah"
                                                    data-idrab = "<?= $rb['id_rab'] ?>"
                                                    data-koderab = "<?= $rb['kode_rab'] ?>"
                                                    data-namaproyek = "<?= $proyek['nama_proyek'] ?>"
                                                    data-idproyek = "<?= $rb['id_proyek'] ?>"
                                                    data-upah = "<?= $rb['upah'] ?>"
                                                    data-material = "<?= $rb['material'] ?>"
                                                    data-fee = "<?= $rb['fee'] ?>"
                                                    data-total = "<?= $rb['total'] ?>"
                                                    data-ppn = "<?= $rb['ppn'] ?>"
                                                    data-gtotal = "<?= $rb['grand_total'] ?>"
                                                >
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a class="red rabhps" href="#" 
                                                data-toggle="modal" 
                                                data-target="#proyekhps"
                                                data-id="<?= $rb['id_rab'] ?>"
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
                    <!-- modal tambah data -->
                        <form method="post" onsubmit="" class="posttambah">
                            <div id="tambahusr" class="modal fade">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <span aria-hidden="true" style="outline: none">×</span>
                                            </button>
                                            <h4 class="modal-title">Tambah RAB</h4>
                                            <!-- <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">×</span>
                                                <span class="sr-only">tutup</span>
                                            </button> -->
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Kode Rab</label>
                                                        <?php 

                                                            $kode = kode('id_rab','rab');
                                                        ?>
                                                        <input name="rabkod" type="text" class="form-control" id="" placeholder="" autocomplete="off" readonly="" value="<?= "RAB/".$kode."/".date('dmy'); ?>">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="form-field-select-3">Proyek</label>
                                                        <select class="chosen-select form-control" id="" name="proyekId" required="">
                                                                <option value="">Pilih Proyek</option>
                                                        <?php 
                                                            foreach ($proyekData as $proyek) :
                                                         ?>
                                                                <option value="<?= $proyek['id_proyek'] ?>"><?= $proyek['nama_proyek'] ?></option>
                                                        <?php 
                                                            endforeach;
                                                         ?>

                                                        </select>
                                                    </div>
                                                </div>
												<div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Upah <span class="text-danger">*</span></label>
                                                        <input type="text" name="upah" id="" class="form-control money" autocomplete="off">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Material <span class="text-danger">*</span></label>
                                                        <input type="text" name="material" id="" class="form-control money" autocomplete="off">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Fee 	<span class="text-danger">*</span></label>
                                                        <input type="text" name="fee" id="" class="form-control money addfee" autocomplete="off">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Total <span class="text-danger"></span></label>
                                                        <input type="text" name="addtotal" id="" class="form-control money" autocomplete="off" readonly="">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">PPn <span class="text-danger">*</span></label>
                                                        <input type="text" name="PPn" id="" class="form-control " autocomplete="off">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Grand Total <span class="text-danger"></span></label>
                                                        <input type="text" name="addgtotal" id="" class="form-control money" autocomplete="off" readonly="">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white btn-danger btn-bold" data-dismiss="modal"><i class="ace-icon fa fa-exclamation-circle bigger-110 red"></i> Tutup</button>
                                            <button type="submit" name="btn-rab" class="btn btn-white btn-primary btn-bold"><i class="ace-icon fa fa-check-square-o bigger-110 blue"></i> Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                    <!-- modal hps -->
                        <form method="post" onsubmit="">
                            <div id="proyekhps" class="modal fade">
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

                    
                    <!-- modal ubh -->
                        <form method="post" onsubmit="">
                            <div id="rabUbah" class="modal fade">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <span aria-hidden="true" style="outline: none">×</span>
                                            </button>
                                            <h4 class="modal-title">Ubah RAB</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Kode Rab</label>
                                                        <?php 

                                                            $kode = kode('id_rab','rab');
                                                        ?>
                                                        <input name="rabkodu" type="text" class="form-control" id="" placeholder="" autocomplete="off" readonly="">
                                                        <input name="idrab" type="hidden">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="form-field-select-3">Proyek</label>
                                                        <select class="chosen-select form-control" id="" name="proyekId">
                                                                <option value="" class="proyek" selected="">Pilih Proyek</option>
                                                        <?php 
                                                            foreach ($proyekData as $proyek) :
                                                         ?>
                                                                <option value="<?= $proyek['id_proyek'] ?>"><?= $proyek['nama_proyek'] ?></option>
                                                        <?php 
                                                            endforeach;
                                                         ?>

                                                        </select>
                                                    </div>
                                                </div>
												<div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Upah <span class="text-danger ">*</span>
                                                        </label>
                                                        <input type="text" name="upah" id="" class="form-control money uuph" autocomplete="off">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Material <span class="text-danger">*</span></label>
                                                        <input type="text" name="material" id="umaterial" class="form-control money umtrl" autocomplete="off">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Fee 	<span class="text-danger">*</span></label>
                                                        <input type="text" name="fee" id="" class="form-control money ufe" autocomplete="off">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Total <span class="text-danger"></span></label>
                                                        <input type="text" name="total" id="" class="form-control money utotal" autocomplete="off" readonly="">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">PPn <span class="text-danger">*</span></label>
                                                        <input type="text" name="PPn" id="" class="form-control uppn" autocomplete="off">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Grand Total <span class="text-danger"></span></label>
                                                        <input type="text" name="gtotal" id="" class="form-control money ugtotal" autocomplete="off" readonly="">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white btn-danger btn-bold" data-dismiss="modal"><i class="ace-icon fa fa-exclamation-circle bigger-110 red"></i> Tutup</button>
                                            <button type="submit" name="btn-ubhrab" class="btn btn-white btn-primary btn-bold"><i class="ace-icon fa fa-check-square-o bigger-110 blue"></i> Ok</button>
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
