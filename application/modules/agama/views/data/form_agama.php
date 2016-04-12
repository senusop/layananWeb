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
									
									<h3 class="block-title"> <?php echo $titleForm;?> <span class="label label-info"><?php echo $agama;?></span></h3>
							</div>
							<form class="form-jurusan form-horizontal push-10-t" action="<?php echo base_url($url);?>" method="post">
								<div class="block-content">
									<div class="col-lg-12">
										<div class="col-lg-6">
											<div class="row">
												<div class="col-sm-9">
													<div class="form-group">
														<label for="agama">Nama Agama</label>
														<input class="form-control" type="text" id="agama" value="<?php echo $agama;?>" name="agama" placeholder="Masukan Nama Agama">
														<input type="hidden" name="agama_id" value="<?php echo $agama_id;?>" />
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
											<?php echo anchor('agama',' Kembali','class="btn btn-sm btn-default"');?>
											<input type="submit" name="saveOnly" value="<?php echo $tbutton;?>" class="btn btn-sm btn-default"/>
											<button class="btn-sm btn btn-success" type="submit">Simpan & Kembali</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
     