<?php 
    // tambah data
     if(isset($_POST["btn-pro"])){ 

        $pekerjaanId        = htmlspecialchars($_POST['pekerjaanId']);
        $kontraktorId       = htmlspecialchars($_POST['kontraktorId']);
        $namaproyek         = htmlspecialchars($_POST['nama']);
        $nospk              = htmlspecialchars($_POST['spk']);
        $lokasi             = htmlspecialchars($_POST['lokasi']);
        $mulaidate          = htmlspecialchars($_POST['mulaidate']);
        $selesaidate        = htmlspecialchars($_POST['selesaidate']);

        $diff  = date_diff( date_create($mulaidate), date_create($selesaidate));
            if($diff->y == 0 && $diff->m == 0){
                $hari = $diff->d." hari";
            }elseif($diff->y == 0){
                $hari = $diff->m . ' Bulan '.$diff->d." hari";
            }else{
                $hari = $diff->y . ' Tahun '.$diff->m." Bulan";
            }
        $selesai            = $hari;

        $nilaiKontrak       = htmlspecialchars($_POST['nilaiKontrak']);
        $nominal            = str_replace(",", "", $nilaiKontrak);

        if($mulaidate < $selesaidate){
            $field = 'id_proyek,id_pekerjaan,id_kontraktor,nama_proyek,no_spk,lokasi,mulai,selesai,lama,nilai_kontrak';
            $data  = "null,'$pekerjaanId','$kontraktorId','$namaproyek','$nospk','$lokasi','$mulaidate','$selesaidate','$selesai','$nominal'";
            if(tambahData("data_proyek", $field, $data) > 0 ){
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
        }else{
            echo "<script>
                        alert('Tanggal selesai harus lebih dari tanggal mulai.');
                      </script>
                "; 
        }
    }

    // tampil data
    $dataProyek = tampilData("data_proyek");
    // $kontraktor = tampilData("kontraktor");
    // if not exists
    $pekerjaan = tampilIfExist("data_pekerjaan", "data_proyek", "id_pekerjaan");
    $kontraktor = tampilIfExist("kontraktor", "data_proyek", "id_kontraktor");

    // hapus data pengguna
    if(isset($_POST['hapus']) > 0){
       if( hapus("data_proyek",'id_proyek',$_POST) ){
           echo "<script>
                    alert('Data Berhasil di Hapus.');
                    document.location.href='{$_SESSION['baseAdmin']}?panel=proyek';
                  </script>
            ";
       }
    }

    // ubah data proyrk
    if(isset($_POST['btn-ubhproyek'])){
        $proyekId           = htmlspecialchars($_POST['proyekId']);
        $pekerjaanId        = htmlspecialchars($_POST['pekerjaanId']);
        $kontraktorId       = htmlspecialchars($_POST['kontraktorId']);
        $namaproyek         = htmlspecialchars($_POST['nama']);
        $nospk              = htmlspecialchars($_POST['spku']);
        $lokasi             = htmlspecialchars($_POST['lokasi']);
        $mulaidate          = htmlspecialchars($_POST['mulaidate']);
        $selesaidate        = htmlspecialchars($_POST['selesaidate']);

         $diff  = date_diff( date_create($mulaidate), date_create($selesaidate));
            if($diff->y == 0 && $diff->m == 0){
                $hari = $diff->d." hari";
            }elseif($diff->y == 0){
                $hari = $diff->m . ' Bulan '.$diff->d." hari";
            }else{
                $hari = $diff->y . ' Tahun '.$diff->m." Bulan";
            }
        $selesai            = $hari;

        $nilaiKontrak       = htmlspecialchars($_POST['nilaiKontrak']);
        $nominal            = str_replace(",", "", $nilaiKontrak);



        $data =     "id_pekerjaan   ='{$pekerjaanId}',
                    id_kontraktor   ='{$kontraktorId}',
                    nama_proyek     ='{$namaproyek}',
                    no_spk          ='{$nospk}',
                    lokasi          ='{$lokasi}',
                    mulai           ='{$mulaidate}',
                    selesai         ='{$selesaidate}',
                    lama            ='{$selesai}',
                    nilai_kontrak   ='{$nominal}'
                    ";
        
        if($mulaidate < $selesaidate){
            if(ubahdata( $data, "data_proyek", $proyekId ) > 0 ){
                echo "<script>
                        alert('Data Berhasil di Ubah.');
                        document.location.href='{$_SESSION['baseAdmin']}?panel=proyek';
                      </script>
                "; 
            }else{
                echo "<script>
                        alert('Data Gagal di Ubah.');
                      </script>
                "; 
            } 
        }else{
            echo "<script>
                        alert('Tanggal selesai harus lebih dari tanggal mulai.');
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
            <li class="active">Data Proyek</li>
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
            List Proyek
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
                            <button class="btn btn-white btn-primary btn-bold tmbproyek" data-toggle="modal" data-target="#tambahusr"><i class="ace-icon fa glyphicon-plus bigger-110 blue"></i>tambah data</button>
                        </div>
                    </div>
                    <div class=" table-responsive">
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                   <th>No</th>
                                   <th>Proyek</th>
                                   <th>No SPK</th>
                                   <th>Lokasi</th>
                                   <th>Tanggal Mulai</th>
                                   <th>Tanggal Selesai</th>
                                   <th>Perkiraan</th>
                                   <th>Nilai Kontrak</th>
                                   <th class="hidden-480" style="color: #707070; width:10%">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                $no = 1;
                                    foreach ($dataProyek as $datpro) :
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $datpro['nama_proyek'] ?></td>
                                        <td><?= $datpro['no_spk'] ?></td>
                                        <td><?= $datpro['lokasi'] ?></td>
                                        <td><?= $datpro['mulai'] ?></td>
                                        <td><?= $datpro['selesai'] ?></td>
                                        <td><?= $datpro['lama'] ?></td>
                                        <td>Rp. <?= number_format($datpro['nilai_kontrak']) ?></td>
                                        <?php 
                                            $nmpekerjaan = tampilByID("data_pekerjaan", "id_pekerjaan", $datpro['id_pekerjaan'] );

                                            $nmakontraktor = tampilByID("kontraktor", "id_kontraktor", $datpro['id_kontraktor'] );
                                        ?>
                                        <td style="text-align:center">
                                            <div class="hidden-sm hidden-xs action-buttons">

                                                <a class="green ubhpro" href="#"
                                                    data-toggle="modal"
                                                    data-target="#proyekUbah"
                                                    data-proyekid="<?= $datpro['id_proyek'] ?>"
                                                    data-namakerjaan="<?= $nmpekerjaan['nm_pekerjaan'] ?>"
                                                    data-idkerjaan="<?= $nmpekerjaan['id_pekerjaan'] ?>"
                                                    data-namakontraktor="<?= $nmakontraktor['nama'] ?>"
                                                    data-kontraktorid="<?= $nmakontraktor['id_kontraktor'] ?>"
                                                    data-nmproyek="<?= $datpro['nama_proyek'] ?>"
                                                    data-spkno="<?= $datpro['no_spk'] ?>"
                                                    data-lokasi="<?= $datpro['lokasi'] ?>"
                                                    data-mulai="<?= $datpro['mulai'] ?>"
                                                    data-selesai="<?= $datpro['selesai'] ?>"
                                                    data-lama="<?= $datpro['lama'] ?>"
                                                    data-nilai="<?= $datpro['nilai_kontrak'] ?>"
                                                >
                                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                </a>

                                                <a class="red proyekhps" href="#" 
                                                data-toggle="modal" 
                                                data-target="#proyekhps"
                                                data-id="<?= $datpro['id_proyek'] ?>" 
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
                    <!-- modal tambah proyek -->
                        <form method="post" onsubmit="">
                            <div id="tambahusr" class="modal fade">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <span aria-hidden="true" style="outline: none">×</span>
                                            </button>
                                            <h4 class="modal-title">Tambah Proyek</h4>
                                            <!-- <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">×</span>
                                                <span class="sr-only">tutup</span>
                                            </button> -->
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Nomer SPK</label>
                                                        <?php 
                                                            $nospk = kode('id_proyek','data_proyek');
                                                        ?>
                                                        <input name="spk" type="text" class="form-control" id="" placeholder="" autocomplete="off" readonly="" value="<?= "PUEM/".$nospk."/".date('d')."/".date('M')."/".date('Y'); ?>">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="form-field-select-3">Jenis Pekerjaan</label>
                                                        <select class="chosen-select form-control" id="" name="pekerjaanId">
                                                                <option value="">Pilih</option>
                                                        <?php 
                                                            foreach ($pekerjaan as $pekerja) :
                                                         ?>
                                                                <option value="<?= $pekerja['id_pekerjaan'] ?>"><?= $pekerja['nm_pekerjaan'] ?></option>
                                                        <?php 
                                                            endforeach;
                                                         ?>

                                                        </select>
                                                    </div>
                                                </div>

                                                 <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="form-field-select-3">Jenis Kontraktor</label>
                                                        <select class="chosen-select form-control" id="" name="kontraktorId">
                                                             
                                                                <option value="">Pilih</option>
                                                        <?php 
                                                            foreach ($kontraktor as $kontrak) :
                                                        ?>
                                                                <option value="<?= $kontrak['id_kontraktor'] ?>"><?= $kontrak['nama'] ?></option>
                                                        <?php 
                                                            endforeach;
                                                         ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Nama Proyek</label>
                                                        <input name="nama" id="" type="text" class="form-control" placeholder="Nama Proyek" autocomplete="off" >
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Lokasi</label>
                                                        <input name="lokasi" type="text" id="" class="form-control" placeholder="Lokasi proyek" autocomplete="off" >
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Mulai Proyek</label>
                                                        <input type="date" name="mulaidate" id="" class="form-control" autocomplete="off">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Selesai Proyek</label>
                                                        <input type="date" name="selesaidate" id="" class="form-control" autocomplete="off">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Nilai Kontrak</label>
                                                        <input type="text" name="nilaiKontrak" id="" class="form-control money" autocomplete="off">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white btn-danger btn-bold" data-dismiss="modal"><i class="ace-icon fa fa-exclamation-circle bigger-110 red"></i> Tutup</button>
                                            <button type="submit" name="btn-pro" class="btn btn-white btn-primary btn-bold"><i class="ace-icon fa fa-check-square-o bigger-110 blue"></i> Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                    <!-- modal hps user -->
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

                    
                    <!-- modal ubh user -->
                        <form method="post" onsubmit="">
                            <div id="proyekUbah" class="modal fade">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <span aria-hidden="true" style="outline: none">×</span>
                                            </button>
                                            <h4 class="modal-title">Ubah Proyek</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Nomer SPK</label>
                                                        <input name="spku" type="text" class="form-control" id="" placeholder="" autocomplete="off" readonly="">
                                                        <small id="" class="form-text text-danger"></small>
                                                        <input name="proyekId" type="hidden">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="form-field-select-3">Jenis Pekerjaan</label>
                                                        <select class="chosen-select form-control" id="" name="pekerjaanId">
                                                                <option value="" class="oppkerjaan" selected=""></option>
                                                        <?php 
                                                            foreach ($pekerjaan as $pekerja) :
                                                         ?>
                                                                <option 
                                                                value="<?= $pekerja['id_pekerjaan'] ?>"><?= $pekerja['nm_pekerjaan'] ?></option>
                                                        <?php 
                                                            endforeach;
                                                         ?>

                                                        </select>
                                                    </div>
                                                </div>

                                                 <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="form-field-select-3">Jenis Kontraktor</label>
                                                        <select class="chosen-select form-control" id="" name="kontraktorId">
                                                             
                                                                <option value="" class="optkontraktor" selected=""></option>
                                                        <?php 
                                                            foreach ($kontraktor as $kontrak) :
                                                        ?>
                                                                <option value="<?= $kontrak['id_kontraktor'] ?>"><?= $kontrak['nama'] ?></option>
                                                        <?php 
                                                            endforeach;
                                                         ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Nama Proyek</label>
                                                        <input name="nama" id="" type="text" class="form-control" placeholder="Nama Proyek" autocomplete="off" >
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Lokasi</label>
                                                        <input name="lokasi" type="text" id="" class="form-control" placeholder="Lokasi proyek" autocomplete="off" >
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Mulai Proyek</label>
                                                        <input type="date" name="mulaidate" id="" class="form-control" autocomplete="off">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Selesai Proyek</label>
                                                        <input type="date" name="selesaidate" id="" class="form-control" autocomplete="off">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Nilai Kontrak</label>
                                                        <input type="text" name="nilaiKontrak" id="" class="form-control money" autocomplete="off">
                                                        <small id="" class="form-text text-danger"></small>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white btn-danger btn-bold" data-dismiss="modal"><i class="ace-icon fa fa-exclamation-circle bigger-110 red"></i> Tutup</button>
                                            <button type="submit" name="btn-ubhproyek" class="btn btn-white btn-primary btn-bold"><i class="ace-icon fa fa-check-square-o bigger-110 blue"></i> Ok</button>
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
