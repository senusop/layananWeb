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
									
									<h3 class="block-title"> <?php echo $titleForm;?> <span class="label label-info"><?php echo $thn_ajaran;?></span></h3>
							</div>
								<form class="form-jurusan form-horizontal push-10-t" action="<?php echo base_url($url);?>" method="post">
									
									<div class="block-content">
										<div class="col-lg-12">
											<div class="col-lg-6">
												<div class="form-group">
													<div class="form-material">
														<input type="hidden" name="thn_ajaran_id" value="<?php echo $thn_ajaran_id;?>" />
															<label for="tahun">Tahun Ajaran (<?php echo $tahun;?>)</label>
															<select id="basic" class="selectpicker show-tick form-control" data-live-search="false" name="tahun" style="width: 100%;" data-placeholder="pilih satu">
																<option value="<?php echo $tahun;?>"></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
																<?php 
																	$thn = date('Y');
																	for($i=2010; $i <= $thn; $i++)
																	{
																		echo "<option value=".$i."/".($i+1).">".$i."/".($i+1)."</option>";
																	}
																?>
															</select>
															
													</div>
												</div>	
												<div class="form-group">
														<div class="form-material">
														
														<?php 
															$sm = $semester;
														if($semester ==1)
																{
																	$smst ="Ganjil";
																}
																elseif($semester ==2)
																{
																	$smst ="Genap";
																}
																else
																{
																	$smst="";
																}
															?>
															<label for="val-skill2">Semester (<?php echo $smst;?>)</label>
															<select id="basic" class="selectpicker show-tick form-control" data-live-search="false" name="semester" style="width: 100%;" data-placeholder="pilih satu">
																<option value="<?php echo $sm;?>"></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
																<option value="1">Ganjil</option>
																<option value="2">Genap</option>
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
												<?php echo anchor('ajaran',' Kembali','class="btn btn-sm btn-default"');?>
												<input type="submit" name="saveOnly" value="<?php echo $tbutton;?>" class="btn btn-sm btn-default"/>
												<button class="btn-sm btn btn-success" type="submit">Simpan & Kembali</button>
											</div>
										</div>
									</div>
									<!-- END Steps Navigation -->
							</form>
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