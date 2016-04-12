 <!-- BAGIAN VALIDASI -->
		<script src="<?php echo base_url();?>assets/js/validation.js"></script>
		<script type="text/javascript">
		  $(document).ready(function(){
			  $(".form-jurusan").validate({
				rules: {
				   jurusan_nama: {required: true },
				   jurusan_singkat: {required : true}
				   akreditasi: {required : true}
				},
				tooltip_options: {
				   no_induk: { placement: 'top' }
				},
				 messages: {
					'jurusan_nama': {
						required: 'Jurusan tidak boleh kosong',
					},
					'jurusan_singkat': {
						required: 'Isi singkatan!',
					},
					'akreditasi': {
						required: 'Isi Akreditasi!',
					}
				}
			 });
		});
		</script>
		<!-- END VALIDASI -->
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
									
									<h3 class="block-title"> <?php echo $titleForm;?> <span class="label label-info"><?php echo $jurusan_singkat;?></span></h3>
							</div>
								<form class="form-jurusan form-horizontal push-10-t" action="<?php echo base_url($url);?>" method="post">
									<div class="block-content">
										<div class="col-lg-12">
											<div class="col-lg-12">
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group">
															<label for="jurusan_nama">Nama Jurusan</label>
															<input class="form-control" type="text" id="jurusan_nama" value="<?php echo $jurusan_nama;?>" name="jurusan_nama" placeholder="Masukan Nama Jurusan">
															<input type="hidden" name="jurusan_id" value="<?php echo $jurusan_id;?>" />
															<input type="hidden" name="uri3" value="<?php echo $this->uri->segment(3);?>" />
															<input type="hidden" name="uri4" value="<?php echo $this->uri->segment(4);?>" />
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label for="val-username2">Kependekan</label>
															<input class="form-control" type="text" id="jurusan_singkat" value="<?php echo $jurusan_singkat;?>" name="jurusan_singkat" placeholder="(TKJ / RPL / TMO)">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-9">
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="val-skill2">Akreditasi (<?php echo $akreditasi;?>)</label>
																	<select id="basic" class="selectpicker show-tick form-control" data-live-search="false" name="akreditasi" style="width: 100%;" data-placeholder="pilih satu">
																		<option value="<?php echo $akreditasi;?>"></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
																		<option value="A">A</option>
																		<option value="B">B</option>
																		<option value="C">C</option>
																		<option value="D">D</option>
																	</select>
																	
																</div>
															</div>
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
											<?php echo anchor('jurusan',' Kembali','class="btn btn-sm btn-default"');?>
											<input type="submit" name="saveOnly" value="<?php echo $tbutton;?>" class="btn btn-sm btn-default"/>
											<button class="btn-sm btn btn-success" type="submit">Simpan & Kembali</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>