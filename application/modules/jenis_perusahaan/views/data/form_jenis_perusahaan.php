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
					<div class="content">
						<div class="block block-bordered">
							<div class="block-header bg-gray-lighter">
									
									<h3 class="block-title"> <?php echo $titleForm;?> <span class="label label-info"><?php echo $jenis_perusahaan;?></span></h3>
							</div>
							<div class="block-content">
							<!-- Material Forms Validation -->
							<div class="block">	
								<div class="block-content block-content-narrow">
									<!-- jQuery Validation (.js-validation-material class is initialized in js/pages/base_forms_validation.js) -->
									<!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
										<form class="form-jurusan form-horizontal push-10-t" action="<?php echo base_url($url);?>" method="post">
											<div class="col-lg-6">
												<div class="row">
													<div class="form-group">
														<div class="col-sm-9">
															<label for="jenis_perusahaan">Nama jenis perusahaan</label>
															<input class="form-control" type="text" id="jenis_perusahaan" value="<?php echo $jenis_perusahaan;?>" name="jenis_perusahaan" placeholder="Masukan Nama jenis perusahaan">
															<input type="hidden" name="jenis_perusahaan_id" value="<?php echo $jenis_perusahaan_id;?>" />
														</div>
													</div>	
												</div>
											</div>
											
												<div class="form-group">
													<div class="col-xs-12">
														<?php echo anchor('jenis_perusahaan',' Kembali','class="btn btn-sm btn-default"');?>
														<input type="submit" value="<?php echo $tbutton;?>" class="btn btn-sm btn-success"/>
													</div>
												</div>
										</form>
								</div>
							</div>
							<!-- END Material Forms Validation -->
							</div>
						</div>
					</div>
     
		<!-- Page JS Code -->
		<script>
			$(function () {
				// Init page helpers (Table Tools helper)
				App.initHelpers(['table-tools']);
			});
		</script>