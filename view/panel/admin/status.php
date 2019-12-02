<?php 
// tampil data 
    $pekerjaan = tampilData("data_pekerjaan");

// hapus data 
    if(isset($_GET["detail"])){
        $urlDet = $_GET["detail"];
    }    
    if(isset($_POST['hapus']) > 0){
       if( hapus("status","id_status",$_POST) ){
           echo "<script>
                    alert('Data Berhasil di Hapus.');
                    document.location.href='{$_SESSION['baseAdmin']}?panel=status&&detail={$urlDet}';
                  </script>
            ";
       }
    }


    if(isset($_GET['detail'])){// get detail
        $idPekerjaan = $_GET['detail'];
?>
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
        <li>
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="<?= $_SESSION['baseAdmin']?>">Home</a>
            </li>

            <li>
                <a href="#">Proyek</a>
            </li>
            <li>
                <a href="<?= $_SESSION['baseAdmin']?>?panel=status">Status</a>
            </li>
            <li class="active">Detail</li>
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
                <!-- <div class="row">
                    <div class="space-1"></div>
                        <div class="pull-right mb-1">
                            <button class="btn btn-white btn-primary btn-bold admtmbhstatus" data-toggle="modal" data-target="#tambahstatus"><i class="ace-icon fa glyphicon-plus bigger-110 blue"></i>tambah data</button>
                        </div>
                </div> -->
            </div><!-- /.row -->
        </div>
    </div>

    
    

    <div class="row">
        <div class="col">
            <div class="page-header">
            <h1>
                 <?php 
                        $dataStatus = tampilData("status");
                            foreach ($dataStatus as $datstat) {
                                if(hash('sha256', $datstat['id_pekerjaan']) == $idPekerjaan){
                                    if(!empty($datstat)){

                                    $getPekerjaan = tampilByID("data_pekerjaan","id_pekerjaan",$datstat['id_pekerjaan']);
                                    $getProyek = tampilByID("data_proyek","id_pekerjaan",$datstat['id_pekerjaan']);
                                    $getRab    = tampilByID("rab","id_proyek",$getProyek['id_proyek']);
                                    
                                    
                                    $getAnggaranDana = tampilByID("data_pekerjaan","id_pekerjaan",$datstat['id_pekerjaan']);
                                    $nmPekerjaan = $getPekerjaan['nm_pekerjaan'];
                                    }
                            }

                        }
                        $getsummaterial = sumData("data_material","total","id_proyek",$getProyek['id_proyek']);
                            if($getsummaterial['SUM(total)'] == null){
                               $pengMaterial = 0 ;
                            }else{
                                $pengMaterial = intval($getsummaterial['SUM(total)']);
                            }

                        $getSumAlatBantu = sumData("alat_bantu","total","id_proyek",$getProyek['id_proyek']);
                        
                            if($getSumAlatBantu['SUM(total)'] == null){
                               $pengAlatBantu = 0;
                            }else{
                                $pengAlatBantu = intval($getSumAlatBantu['SUM(total)']);
                            }

                        $totalPengeluaran = $pengMaterial + $pengAlatBantu; //total pngeluaran

                        if(isset($nmPekerjaan)){
                            echo "Galeri ".ucfirst($nmPekerjaan);
                        }else{  
                        echo "No Data";
                        }
                ?>
            </h1>
        </div>
                <div class="row">

                <?php
                    $rows = [];
                    foreach ($dataStatus as $datstat) {
                        if(hash('sha256', $datstat['id_pekerjaan']) == $idPekerjaan){
                            $rows[] = $datstat;
                        }
                    }


                        for($getStat = 0; $getStat < count($rows); $getStat++){
                            if($getStat == 0){ ?>

                            <div class="col-md-4">
                            <div class="thumbnail">
                                <div class="img-hover-zoom center card-detail" style="height: 100% !important">
                                  <div class="img" >
                                      <img  src="../../../assets/images/upload/<?= $rows[$getStat]['gambar']; ?>" alt="...">
                                      <div class="content-detail">
                                        <div class="row" style=" margin-top: -15%;">
                                            <div class="col">

                                                <div class="row mt--1">
                                                    <div class="col-md-6 col-xs-6">
                                                        <h3 style="text-align: left; text-indent:40px;">Proyek :</h3>
                                                    </div>
                                                    <div class="col-md-6 col-xs-6">
                                                        <h3 style="text-align: left;"><?= $getProyek['nama_proyek']; ?></h3>
                                                    </div>
                                                </div>

                                                <div class="row mt--3">
                                                    <div class="col-md-6 col-xs-6">
                                                        <p style="text-align: left; text-indent:40px;">Mulai :</p>
                                                    </div>
                                                    <div class="col-md-6 col-xs-6">
                                                        <p style="text-align: left;"><?= $getProyek['mulai']; ?></p>
                                                    </div>
                                                </div>

                                                <div class="row mt--5">
                                                    <div class="col-md-6 col-xs-6">
                                                        <p style="text-align: left; text-indent:40px;">Selesai :</p>
                                                    </div>
                                                    <div class="col-md-6 col-xs-6">
                                                        <p style="text-align: left;"><?= $getProyek['selesai']; ?></p>
                                                    </div>
                                                </div>

                                                <div class="row mt--5">
                                                    <div class="col-md-6 col-xs-6">
                                                        <h4 style="text-align: left; text-indent:40px;">RAB :</h4>
                                                    </div>
                                                    <div class="col-md-6 col-xs-6">
                                                        <h4 style="text-align: left;"><?= "Rp. ". number_format($getRab['grand_total']); ?></h4>
                                                    </div>
                                                </div>

                                                <?php if($totalPengeluaran >= $getRab['grand_total']){ ?>
                                                    <div class="row mt--5">
                                                        <div class="col-md-6 col-xs-6">
                                                            <h4 style="text-align: left; text-indent:40px;">Pengeluaran :</h4>
                                                        </div>
                                                        <div class="col-md-6 col-xs-6">
                                                            <h4 style="text-align: left;"><?= "Rp. ". number_format($totalPengeluaran); ?></h4>
                                                        </div>
                                                        <span></span>
                                                    </div>
                                                <?php }else{ ?>
                                                    <div class="row mt--5">
                                                        <div class="col-md-6 col-xs-6">
                                                            <h4 style="text-align: left; text-indent:40px;">Pengeluaran :</h4>
                                                        </div>
                                                        <div class="col-md-6 col-xs-6">
                                                            <h4 style="text-align: left;"><?= "Rp. ". number_format($totalPengeluaran); ?></h4>
                                                        </div>
                                                    </div>
                                              <?php } ?>

                                                <div class="tools">
                                                    <div class="row" style="padding-top: 10px; padding-bottom: 10px">
                                                        <div class="col-md-6" style="text-align: right; ">
                                                            <!-- <a class="red supphps" href="#">
                                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                            </a> -->
                                                        </div>
                                                        <div class="col-md-6" style="text-align: left; " >
                                                            <a class="red dethpsone" href="#"
                                                                data-toggle = "modal"
                                                                data-target = "#dethpsone"
                                                                data-idstts = "<?= $rows[$getStat]['id_status'] ?>"
                                                            >
                                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                  </div>
                                </div>
                            </div>
                          </div>

                          <?php  }else if($getStat != 0){ ?>

                            <div class="col-md-4">
                                <div class="thumbnail">
                                    <div class="img-hover-zoom center card-detail" style="height: 100% !important">
                                      <div class="img" >
                                          <img  src="../../../assets/images/upload/<?= $rows[$getStat]['gambar']; ?>" alt="...">
                                          <div class="content-detail">
                                            <div class="row">
                                                <div class="col">
                                                    <h4><?= $rows[$getStat]['keterangan']; ?></h4>
                                                    <span><?= $rows[$getStat]['tanggal']; ?></span>
                                                </div>
                                            </div>

                                            <div class="tools">
                                                <div class="row" style="padding-top: 10px; padding-bottom: 10px">
                                                    <div class="col-md-6" style="text-align: right; ">

                                                        <!-- <a class="red supphps" href="#">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a> -->

                                                    </div>
                                                    <div class="col-md-6" style="text-align: left; " >
                                                        <a class="red dethpsone" href="#"
                                                            data-toggle = "modal"
                                                            data-target = "#dethpsone"
                                                            data-idstts = "<?= $rows[$getStat]['id_status'] ?>"
                                                        >
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                              </div>

                    <?php           
                                }
                            }
                     ?>

                </div>
        </div>
    </div>

        <!-- MODAL -->
         <!-- modal hps -->
            <form method="post" onsubmit="" style="z-index: 9999999">
                <div id="dethpsone" class="modal fade">
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
    
    
<?php  } else{ ?>
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="<?= $_SESSION['baseAdmin']?>">Home</a>
            </li>

            <li>
                <a href="#">Proyek</a>
            </li>
            <li class="active">Status</li>
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
                        <div class="pull-right mb-1">
                            <button class="btn btn-white btn-primary btn-bold admtmbhstatus" data-toggle="modal" data-target="#tambahstatus"><i class="ace-icon fa glyphicon-plus bigger-110 blue"></i>tambah data</button>
                        </div>
                </div>
            </div><!-- /.row -->
        </div>
    </div>

    <!-- modal tambah setatus -->
    <form id="status_upload" action="" method="post" enctype="multipart/form-data" onsubmit="return onSubmit()">
        <div id="tambahstatus" class="modal fade">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span aria-hidden="true" style="outline: none">×</span>
                        </button>
                        <h4 class="modal-title">Tambah Status</h4>
                        <!-- <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">tutup</span>
                        </button> -->
                    </div>
                    <div class="modal-body">
                        <div class="row pl-3 pr-3 pb-2">
                          
                                <div class="col-lg">
                                    <div class="form-group">
                                        <label class="form-control-label" for="form-field-select-3">Pekerjaan</label>
                                        <select class="chosen-select form-control" id="" name="proyekId" required="">
                                                <option value="" class="proyek" selected="">Pilih Proyek</option>
                                        <?php 

                                            foreach ($pekerjaan as $pekerja) :
                                         ?>
                                                <option value="<?= $pekerja['id_pekerjaan'] ?>"><?= $pekerja['nm_pekerjaan']?></option>
                                        <?php 
                                            endforeach;
                                         ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg ">
                                    <div class="imgpreview">
                                        <div class="img mb-2" id="image-preview-div" style="display: none">
                                          <img id="preview-img" class="imgsize" src="noimage">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="upload">
                                            <label for="fileUpload" class="uploadButton pt-1 pl-1 pb-1 pr-1"><i class="ace-icon fa fa-cloud-upload mr-1 ml-1"></i>Browse..</label>
                                            <input type="file" name="upload" accept="" id="fileUpload" required/>
                                            <span class="fileName">Select file..</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg mb-1">
                                    <label for="form-field-8">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="form-field-8" placeholder="" required=""></textarea>
                                </div>



                                <div class="col-lg">
                                    <div class="alert myalertupload alert-info" id="loading" style="display: none;" role="alert">
                                      Uploading ...
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                        </div>
                                      </div>
                                    </div>
                                    <div id="message"></div>
                                </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white btn-danger btn-bold" data-dismiss="modal"><i class="ace-icon fa fa-exclamation-circle bigger-110 red"></i> Tutup</button>
                       <button type="submit" name="btn-status" class="btn btn-white btn-primary btn-bold" id="upload-button"disabled><i class="ace-icon fa fa-check-square-o bigger-110 blue"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    

    <div class="row">
        <div class="col">
            <div class="page-header">
            <h1>
                List Status
            </h1>
        </div>
                <div class="row">

                    <?php 
                        $disStatus = disStatus("status","id_pekerjaan");
                        $i = 0;
                        foreach($disStatus[0] as $stat){
                            $tampilById = tampilByID("data_pekerjaan","id_pekerjaan",$stat['id_pekerjaan']);
                        
                    ?>
                    <div class="col-md-4">
                    <div class="thumbnail">
                        <div class="img-hover-zoom center">
                          <div class="img">
                              <img  src="../../../assets/images/upload/<?= $stat['gambar']; ?>" alt="...">
                          </div>
                        </div>
                      <div class="caption">
                        <div class="deskrip">
                            <h3><?= $tampilById['nm_pekerjaan']; ?></h3>
                            <p style="font-weight: bold; font-size: 10px; margin-top:-6px"><?= $tampilById['tanggal']; ?></p>
                            <p style="font-size: 14px;"><?= $tampilById['keterangan']; ?></p>
                            <!-- href="?panel=status&&detail=<?= $stat['id_status']; ?>" -->
                            <button href="" class="button btn-hide button--winona button--border-thin button--round-s center btn-stts-detail" data-text="<?=$disStatus[1][$i];?> Photos" data-id="<?= 
                            hash('sha256', $tampilById['id_pekerjaan']); ?>">                                
                                <span class=""><?=$disStatus[1][$i];  ?> Photos</span>
                            </button>        
                        </div>
                      </div>
                    </div>
                  </div>
                    <?php 
                    $i++;
                        }
                     ?>

                </div>
        </div>
    </div>
<?php } ?>