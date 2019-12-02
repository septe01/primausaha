<?php   
    // header
	// include 'view/komponen/header.php';
	include '../../komponen/header.php';
	include '../../../control/function.php';
	// var_dump($_SESSION);
	if(empty($_SESSION)){
		header("Location:http://localhost/primausaha/");
	}
?>

<!-- content -->
<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="<?= $_SESSION['baseAdmin']?>" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Prima Usaha Era Mandiri
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?= $base_url; ?>/assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $_SESSION['username']; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<!-- <li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li> -->

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="http://localhost/primausaha/logut.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
                </script>
                
                <?php include '../../komponen/nav.php'; ?>
				<!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				
				<div class="main-content-inner">
					
					<?php






                        if(isset($_GET['panel'])){

                            $panel = $_GET['panel'];
                            
                            if($panel == "home"){
                                include 'home.php';
                            }
                            elseif($panel == "suplayer"){
                                include 'suplayer.php';
                            }
                            elseif($panel == "kontaktor"){
                                include 'kontaktor.php';
                            }
                            elseif($panel == "pekerjaan"){
                                include 'pekerjaan.php';
                            }
                            elseif($panel == "proyek"){
                                include 'proyek.php';
                            }
                            elseif($panel == "rab"){
                                include 'rab.php';
                            }
							elseif($panel == "material"){
                                include 'material.php';
                            }
                            elseif($panel == "alat"){
                                include 'alat.php';
                            }
                            elseif($panel == "status"){
                                include 'status.php';
                            }
                            elseif($panel == ""){
                            	include 'error.php';
                            }
                            elseif($panel != "user" && $panel != "suplayer" && $panel != "kontaktor" && $panel != "pekerjaan" && $panel != "proyek" && $panel != "rab" && $panel != "material" && $panel != "alat" && $panel != "status"){
                            	include 'error.php';
                            }
                        }else{
                                include 'home.php';
                            }
                        
                        
                    ?>
						
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
                        

<?php 
    // footer
    include '../../komponen/footer.php';
?>