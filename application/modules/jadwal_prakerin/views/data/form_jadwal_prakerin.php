 <!-- Page Header -->
                <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        
                        <div class="col-sm-5">
                            <ol class="breadcrumb push-10-t">
                                <li><a class="link-effect" href=""><?php echo $pageTitle;?></a></li>
                                <li><?php echo $subPage;?></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- END Page Header -->
				 <!-- Dynamic Table Full -->
				 <div class="col-lg-12">
					<div class="content">
						<div class="block block-bordered">
							<div class="block-header bg-gray-lighter">
									
									<h3 class="block-title"> <?php echo $titleForm;?> <span class="label label-info"><?php echo $nama_kelas_wali;?></span></h3>
							</div>
								<form class="form-kajur form-horizontal push-10-t" action="<?php echo base_url($url);?>" method="post">
									<div class="block-content">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-sm-4">
														<div class="form-group">
															<div class="block block-themed block-bordered">
																<div class="block-header bg-modern ">
																	<h3 class="block-title"><i class="si si-calendar"></i> Tahun Ajaran</h3>
																</div>
																<div class="block-content block-content-full text-center">
																	<h2><?php echo $activeThn;?></h2>
																	<input type="hidden" name="thn_ajaran_id" value="<?php echo $thn_ajaran_id;?>" />
						
																</div>
															</div>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="block block-themed block-bordered">
																<div class="block-header bg-warning ">
																	<h3 class="block-title"><i class="si si-calendar"></i> Tanggal Mulai</h3>
																</div>
																<div class="block-content block-content-full text-center">
																	<input class="js-masked-date form-control" type="text" id="example-masked-date1" name="tgl_mulai" placeholder="dd/mm/yyyy">
						
																</div>
															</div>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<div class="block block-themed block-bordered">
																<div class="block-header bg-amethyst ">
																	<h3 class="block-title"><i class="si si-calendar"></i> Tanggal Selesai</h3>
																</div>
																<div class="block-content block-content-full text-center">
																	<input class="js-masked-date form-control" value="" type="text" id="example-masked-date1" name="tgl_selesai" placeholder="dd/mm/yyyy">
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<label class="control-label">Gelombang</label>
															<select id="basic" class="selectpicker show-tick form-control" data-live-search="false" name="gelombang" style="width: 100%;" data-placeholder="Pilih Ketua kajur">
																<option value=""></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
																<option value=1>Gelombang 1</option>
																<option value=2>Gelombang 2</option>
																	
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<label class="control-label">Peserta Prakerin</label>
															<select multiple id="basic" class="selectpicker show-tick form-control" data-live-search="true" name="dataGuru" style="width: 100%;" data-placeholder="Pilih Ketua kajur">
																<option value=""></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
																	<?php foreach($peserta->result() as $data)
																	{
																	?>
																	<option value="<?php echo $data->peserta_id;?>"><?php echo $data->nama_lengkap;?></option>
																	<?php } ?>
															</select>
														</div>
													</div>
												</div>
																		
											</div>

									</div>
								<div class="row"></div>
								<!-- Steps Navigation -->
								<div class="block-content bg-gray-lighter block-content-mini block-content-full border-t">
									<div class="row">
										<div class="col-xs-12 text-right">
											<?php echo anchor('kajur',' Kembali','class="btn btn-sm btn-default"');?>
											<input required="true" type="submit" name="saveOnly" value="<?php echo $tbutton;?>" class="btn btn-sm btn-default"/>
											<button class="btn-sm btn btn-success" type="submit">Simpan & Kembali</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>



