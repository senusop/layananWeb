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
				 <div class="col-lg-6">
					<div class="content">
						<div class="block block-bordered">
							<div class="block-header bg-gray-lighter">
									
									<h3 class="block-title"> <?php echo $titleForm;?> <span class="label label-info"><?php echo $jurusan_nama;?></span></h3>
							</div>
								<form class="form-kajur form-horizontal push-10-t" action="<?php echo base_url($url);?>" method="post">
									<div class="block-content">
										<div class="col-lg-12">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<div class="block block-themed block-bordered">
																<div class="block-header bg-modern ">
																	<h3 class="block-title"><i class="si si-calendar"></i> Tahun Ajaran</h3>
																</div>
																<div class="block-content block-content-full text-center">
																	<h4><?php echo $activeThn;?></h4>
																	<input type="hidden" name="thn_ajaran_id" value="<?php echo $thn_ajaran_id;?>" />
																	<input type="hidden" name="kajur_id" value="<?php echo $kajur_id;?>" />
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<label class="control-label">Jurusan</label>
															<select id="basic" class="selectpicker show-tick form-control" data-live-search="false" name="jurusan_id" style="width: 100%;" data-placeholder="Pilih Ketua kajur">
																<option value="<?php echo $jurusan_id;?>"><?php echo $jurusan_nama;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
																	<?php foreach($dataJurusan as $jurusan)
																	{
																	?>
																	<option value="<?php echo $jurusan->jurusan_id;?>"><?php echo $jurusan->jurusan_nama;?></option>
																	<?php } ?>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<label class="control-label">Ketua Jurusan</label>
															<select id="basic" class="selectpicker show-tick form-control" data-live-search="true" name="guru_id" style="width: 100%;" data-placeholder="Pilih Ketua kajur">
																<option value="<?php echo $guru_id;?>"><?php echo $guru_nama;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
																	<?php foreach($dataGuru as $guru)
																	{
																	?>
																	<option value="<?php echo $guru->guru_id;?>"><?php echo $guru->guru_nama;?></option>
																	<?php } ?>
															</select>
														</div>
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
											<input type="submit" name="saveOnly" value="<?php echo $tbutton;?>" class="btn btn-sm btn-default"/>
											<button class="btn-sm btn btn-success" type="submit">Simpan & Kembali</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>