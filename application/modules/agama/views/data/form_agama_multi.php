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
		
										<form class="form-jurusan form-horizontal push-10-t" action="<?php echo base_url($url);?>" method="post">
												<?php	
													for($i =0; $i < count($agama_id); $i++)
													{
														$query = "select * from tb_agama where agama_id = ".$agama_id[$i];
														$row=$this->db->query($query)->result();
														foreach($row as $agama)
														{
															
																	?>
																	<!-- Material Forms Validation -->
													
																	<div class="col-lg-6">
																		<div class="block block-bordered ">
																			<div class="block-header bg-gray-lighter">
																				<h3 class="block-title"><i class="si si-note"></i> Edit Agama <span class="label label-info"><?php echo $agama->agama;?></span></h3>
																			</div>
																			<div class="block-content block-content-narrow">
																				<div class="form-group">
																					<div class="col-sm-9">
																						<div class="form-material">
																							<input class="form-control" type="text" id="agama" value="<?php echo $agama->agama;?>" name="agama[]" placeholder="Masukan Nama Jurusan">
																							<input type="hidden" name="agama_id[]" value="<?php echo $agama->agama_id;?>" />
																							<label for="jurusan_nama">Nama Agama</label>
																						</div>
																					</div>
																				</div>
																			
																			
																			
																			</div>
																		</div>
																	</div>
														
														<!-- END Material Forms Validation -->
			
															<?php
															
														}
														
													}
													?>
												<div class="content">
													<div class="form-group">
														<div class="col-xs-12">
															<?php echo anchor('agama',' Kembali','class="btn btn-sm btn-default"');?>
															<button class="btn btn-sm btn-success" type="submit"><?php echo $tbutton;?></button>
														</div>
													</div>
												</div>
										</form>
								
     
		<!-- Page JS Code -->
		<script>
			$(function () {
				// Init page helpers (Table Tools helper)
				App.initHelpers(['table-tools','select2']);
			});
		</script>