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
				 <div class="col-lg-8">
					<div class="content">
						<div class="block block-bordered">
							<div class="block-header bg-gray-lighter">
									
									<h3 class="block-title"> <?php echo $titleForm;?> <span class="label label-info"><?php echo $nama_tingkat;?></span></h3>
							</div>
								<form class="form-kelas form-horizontal push-10-t" action="<?php echo base_url($url);?>" method="post">
									<div class="block-content">
										<div class="col-lg-12">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-11">
														<div class="form-group">
															<label class="control-label" for="no_induk">Pilih Jurusan  <span class="text-danger">*</span></label>
															<select id="basic" class="selectpicker show-tick form-control" data-live-search="false" name="jurusan_id" style="width: 100%;" data-placeholder="pilih Jurusan">
																<option value="<?php echo $jurusan_id;?>"><?php echo $jurusan_nama;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
																	<?php 
																		foreach($jurusan as $j)
																		{
																			echo "<option value=".$j->jurusan_id.">".$j->jurusan_nama."</option>";
																		}
																	?>		
															</select>
															
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-3">
												<div class="row">
													<div class="col-lg-10">
														<div class="form-group">
															<label class="control-label" for="nisn">Tingkat  </label>
															<select id="basic" class="selectpicker show-tick form-control" data-live-search="false" name="tingkat" style="width: 100%;" data-placeholder="pilih Jurusan">
																<option value="<?php echo $tingkat;?>"><?php echo "tingkat ".$tingkat;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
																<option value="1">Tingkat 1</option>		
																<option value="2">Tingkat 2</option>		
																<option value="3">Tingkat 3</option>		
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="row">
													<div class="col-lg-6">
														<div class="form-group">
															<label class="control-label" for="nisn">Nama Kelas  </label>
															<input class="form-control" maxlength=12 type="text" id="nidn" value="<?php echo $nama_tingkat ?>" name="nama_tingkat" placeholder="Isi Nama Kelas">
															<input type="hidden" name="tingkat_id" value="<?php echo $tingkat_id;?>" />
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
											<?php echo anchor('kelas',' Kembali','class="btn btn-sm btn-default"');?>
											<input type="submit" name="saveOnly" value="<?php echo $tbutton;?>" class="btn btn-sm btn-default"/>
											<button class="btn-sm btn btn-success" type="submit">Simpan & Kembali</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>