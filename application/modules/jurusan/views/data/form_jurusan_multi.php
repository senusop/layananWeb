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
													for($i =0; $i < count($guruID); $i++)
													{
														$query = "select * from tb_jurusan where guru_id = ".$guruID[$i];
														$row=$this->db->query($query)->result();
														foreach($row as $jurusan)
														{
															for($x=0; $x < count($jurusan->guru_id); $x++)
															{
																$query = "select * from tb_guru where guru_id = ".$jurusan->guru_id;
																$row=$this->db->query($query)->result();
																foreach($row as $guru)
																{
																	?>
																	<!-- Material Forms Validation -->
													
																	<div class="col-lg-6">
																		<div class="block block-bordered ">
																			<div class="block-header bg-gray-lighter">
																				<h3 class="block-title"><i class="si si-note"></i> Edit Jurusan <span class="label label-info"><?php echo $jurusan->jurusan_singkat;?></span></h3>
																			</div>
																			<div class="block-content block-content-narrow">
																				<div class="form-group">
																					<div class="col-sm-9">
																						<div class="form-material">
																							<input class="form-control" type="text" id="jurusan_nama" value="<?php echo $jurusan->jurusan_nama;?>" name="jurusan_nama[]" placeholder="Masukan Nama Jurusan">
																							
																							<label for="jurusan_nama">Nama Jurusan</label>
																						</div>
																					</div>
																				</div>
																				<div class="form-group">
																					<div class="col-sm-6">
																						<div class="form-material">
																							<input class="form-control" type="text" id="jurusan_singkat" value="<?php echo $jurusan->jurusan_singkat;?>" name="jurusan_singkat[]" placeholder="(TKJ / RPL / TMO)">
																							<label for="val-username2">Kependekan</label>
																						</div>
																					</div>
																				</div>
																				<div class="form-group">
																					<div class="col-sm-9">
																						<div class="form-group">
																							<div class="col-sm-6">
																								<div class="form-material">
																									<select class="js-select2 form-control" id="example-select2" name="akreditasi[]" style="width: 100%;" data-placeholder="pilih satu">
																										<option value="<?php echo $jurusan->akreditasi;?>"></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
																											
																										<option value="A">A</option>
																										<option value="B">B</option>
																										<option value="C">C</option>
																										<option value="D">D</option>
																											
																									</select>
																									<label for="val-skill2">Akreditasi (<?php echo $jurusan->akreditasi;?>)</label>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>	
																				<div class="form-group">
																					<div class="col-sm-9">
																						<div class="form-material">
																							<input type="hidden" name="guru_id_awal[]" value="<?php echo $guru->guru_id;?>" />
																							<select class="js-select2 form-control" id="example-select2" name="guru_id[]" style="width: 100%;" data-placeholder="Pilih Ketua Jurusan">
																								<option value="<?php echo $guru->guru_id;?>"><?php echo $guru->guru_nama;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
																									<?php foreach($dataGuru as $guru)
																									{
																									?>
																									<option value="<?php echo $guru->guru_id;?>"><?php echo $guru->guru_nama;?></option>
																									<?php } ?>
																							</select>
																							<label for="val-skill2">Ketua Jurusan</label>
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
														}
														
													}
													?>
												<div class="content">
													<div class="form-group">
														<div class="col-xs-12">
															<?php echo anchor('jurusan',' Kembali','class="btn btn-sm btn-default"');?>
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