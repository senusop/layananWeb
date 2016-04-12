				<?php
					$url = $this->uri->segment(1);
					//MENU MASTER DATA //
						$activedashboard ="";
						$openMaster="";
						$openMasterKelas="";
						$openMasterJurusan="";
						$openPrakerin="";
						$openBasisData="";
						$activeJurusan="";
						$activeKajur="";
						$activeAgama="";
						$activeAjaran="";
						$activeMurid="";
						$activeGuru="";
						$activeKelas="";
						$activeTingkat="";
						$activeWali="";
						$activeMapel="";
						$activeJenisPerusahaan="";
						$perusahaan="";
						$pembimbing="";
						$peserta="";
						$jadwal_prakerin="";
						$jadwal_monitoring="";
						if($url =="dashboard")
						{
							$activedashboard="active";
						}
						elseif($url =="jurusan")
						{
							$openMaster ="open";
							$openMasterJurusan ="open";
							$activeJurusan="active";
						}
						elseif($url =="kajur")
						{
							$openMaster ="open";
							$openMasterJurusan ="open";
							$activeKajur="active";
						}
						elseif($url =="agama")
						{
							$openMaster ="open";
							$activeAgama="active";
						}
						elseif($url =="ajaran")
						{
							$openMaster ="open";
							$activeAjaran="active";
						}
						elseif($url =="murid")
						{
							$openMaster ="open";
							$activeMurid="active";
						}
						elseif($url =="guru")
						{
							$openMaster ="open";
							$activeGuru="active";
						}
						elseif($url =="kelas")
						{
							$openMaster ="open";
							$openMasterKelas ="open";
							$activeKelas="active";
						}
						elseif($url =="tingkat")
						{
							$openMaster ="open";
							$openMasterKelas ="open";
							$activeTingkat="active";
						}
						elseif($url =="kelas_wali")
						{
							$openMaster ="open";
							$openMasterKelas ="open";
							$activeWali="active";
						}
						elseif($url =="mapel")
						{
							$openMaster ="open";
							$activeMapel="active";
						}
						elseif($url =="jenis_perusahaan")
						{
							$openPrakerin ="open";
							$activeJenisPerusahaan="active";
						}
						elseif($url =="perusahaan")
						{
							$openPrakerin ="open";
							$perusahaan="active";
						}
						elseif($url =="pembimbing")
						{
							$openPrakerin ="open";
							$pembimbing="active";
						}
						elseif($url =="peserta")
						{
							$openPrakerin ="open";
							$peserta="active";
						}
						elseif($url =="jadwal_prakerin")
						{
							$openPrakerin ="open";
							$jadwal_prakerin="active";
						}
						elseif($url =="jadwal_monitoring")
						{
							$openPrakerin ="open";
							$jadwal_monitoring="active";
						}
				?>
					<div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="side-header side-content bg-white-op">
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times"></i>
                            </button>
                            <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                            <div class="btn-group pull-right">
                                <button class="btn btn-link text-gray dropdown-toggle" data-toggle="dropdown" type="button">
                                    <i class="si si-drop"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right font-s13 sidebar-mini-hide">
                                    <li>
                                        <a data-toggle="theme" data-theme="default" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-default pull-right"></i> <span class="font-w600">Default <?php echo $url;?></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/amethyst.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-amethyst pull-right"></i> <span class="font-w600">Amethyst</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/city.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-city pull-right"></i> <span class="font-w600">City</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/flat.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-flat pull-right"></i> <span class="font-w600">Flat</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/modern.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-modern pull-right"></i> <span class="font-w600">Modern</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/smooth.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-smooth pull-right"></i> <span class="font-w600">Smooth</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <a class="h5 text-white" href="index.html">
                                <strong><i class="si si-pie-chart text-success"></i></strong> <span class="h4 font-w600 sidebar-mini-hide">manage</span>
                            </a>
                        </div>
                        <!-- END Side Header -->

                        <!-- Side Content -->
                        <div class="side-content">
                            <ul class="nav-main">
                                <li>
                                    <?php echo anchor('dashboard','<i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span>','class='.$activedashboard);?>
                                </li>
                                <li class="nav-main-heading"><span class="sidebar-mini-hide">MAIN NAVIGATION</span></li>
                                
                                <li class="<?php echo $openMaster;?>">
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-grid"></i><span class="sidebar-mini-hide">Master Data</span></a>
                                    <ul>
                                        <li>
                                            <?php echo anchor('guru','Data Guru','class='.$activeGuru);?>
                                        </li>
                                        <li>
                                            <?php echo anchor('murid','Data Murid','class='.$activeMurid);?>
                                        </li>
                                       <li class="<?php echo $openMasterJurusan;?>">
											<a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">Data Jurusan</span></a>
											<ul>
												<li>
													 <?php echo anchor('jurusan','Buat Jurusan','class='.$activeJurusan);?>
												</li>
												<li>
													 <?php echo anchor('kajur','Ketua Jurusan','class='.$activeKajur);?>
												</li>
												
											</ul>
										</li>
									   <li class="<?php echo $openMasterKelas;?>">
											<a class="nav-submenu" data-toggle="nav-submenu" href="#"><span class="sidebar-mini-hide">Data Kelas</span></a>
											<ul>
												<li>
													 <?php echo anchor('tingkat','Tingkat Kelas','class='.$activeTingkat);?>
												</li>
												<li>
													 <?php echo anchor('kelas','Daftar Kelas','class='.$activeKelas);?>
												</li>
												<li>
													 <?php echo anchor('kelas_wali','Wali Kelas','class='.$activeWali);?>
												</li>
											</ul>
										</li>
										
										<li>
                                            <?php echo anchor('agama','Data Agama','class='.$activeAgama);?>
                                        </li>
                                        <li>
                                            <?php echo anchor('ajaran','Tahun Ajaran','class='.$activeAjaran);?>
                                        </li>
										<li>
                                            <?php echo anchor('mapel','Mata Pelajaran','class='.$activeMapel);?>
                                        </li>
										
                                    </ul>
                                </li>
                                <li class="<?php echo $openPrakerin;?>">
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Prakerin</span></a>
                                    <ul>
                                        <li>
                                            <?php echo anchor('jenis_perusahaan','Jenis Perusahaan','class='.$activeJenisPerusahaan);?>
                                        </li>
                                        <li>
                                            <?php echo anchor('perusahaan','Data Perusahaan','class='.$perusahaan);?>
                                        </li>
                                        <li>
                                            <?php echo anchor('pembimbing','Data Pembimbing','class='.$pembimbing);?>
                                        </li>
                                         <li>
                                            <?php echo anchor('peserta','Data Peserta Prakerin','class='.$peserta);?>
                                        </li>
                                        <li>
                                            <?php echo anchor('jadwal_prakerin','Jadwal Prakerin','class='.$jadwal_prakerin);?>
                                        </li>
                                        <li>
                                            <?php echo anchor('jadwal_monitoring','Jadwal Monitoring','class='.$jadwal_monitoring);?>
                                        </li>
                                    </ul>
                                </li>
								<li class="<?php echo $openBasisData;?>">
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-database"></i><span class="sidebar-mini-hide">Basis Data</span></a>
                                    <ul>
                                        <li>
                                            <?php echo anchor('backup','Backup Data','class='.$activeJenisPerusahaan);?>
                                        </li>
                                        <li>
                                            <?php echo anchor('restore','Restore Data','class='.$perusahaan);?>
                                        </li>
										<li>
                                            <?php echo anchor('import','Import Data','class='.$perusahaan);?>
                                        </li>
										<li>
                                            <?php echo anchor('export','Export Data','class='.$perusahaan);?>
                                        </li>
                                    </ul>
                                </li>
                                
                                
                            </ul>
                        </div>
                        <!-- END Side Content -->
                    </div>