<!-- BAGIAN VALIDASI -->

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
  <div class="content">
	<div class="block  block-bordered">
		<div class="block-header bg-gray-lighter">
				<h3 class="block-title"> <?php echo $titleForm;?> <span class="label label-info"><?php echo $nama_guru;?></span></h3>
		</div>
			<form class="form-guru form-horizontal " action="<?php echo base_url($url);?>" method="post">
				<div class="block-content">
					<div class="col-lg-12">
						
						<div class="col-lg-12">
							<div class="form-group ">
								<div class="col-sm-7">
									 <STRONG><span class="text-primary"><i class="si si-user-follow"></i>  Tambah Guru Baru</span></STRONG>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-8">
										<div class="form-group">
											<label class="control-label" for="no_induk">NIP Guru  <span class="text-danger">*</span></label>
											<input class="form-control" maxlength=8 type="text" id="nip_guru" value="<?php echo $nip_guru;?>" name="guru_nip" placeholder="no induk guru">
											
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<label class="control-label" for="nisn">NIDN Guru  </label>
											<input class="form-control" maxlength=12 type="text" id="nidn" value="<?php echo $nidn;?>" name="guru_nidn" placeholder="No Induk Siswa Nasional">
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<label class="control-label" for="nama_guru">Nama Lengkap guru <span class="text-danger">*</span></label>
											<input class="form-control" maxlength=30 type="text" id="nama_guru" value="<?php echo $nama_guru;?>" name="guru_nama" placeholder="Isi Nama Lengkap Guru">
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
                                            <label class="control-label" for="example-masked-date1">Tahun Masuk <span class="text-muted"><small>(18/08/2001)</small></span></label>
                                            
                                                <input class="js-masked-date form-control" value="<?php echo $thn_masuk;?>" type="text" id="example-masked-date1" name="thn_masuk" placeholder="dd/mm/yyyy">
                                          
                                        </div>
										
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<label class="control-label" for="pendidikan">Status <span class="text-danger">*</span></label>
											<select id="basic" name="guru_status" class="selectpicker show-tick form-control" data-live-search="false" style="width: 100%;" data-placeholder="pilih satu">
												<option value="<?php echo $pendidikan;?>"><?php echo $pendidikan;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
												<option value="PNS">PNS</option>		
												<option value="NON PNS">NON PNS</option>			
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<label class="control-label" for="mapel_diampu">Mapel Diampu <span class="text-danger">*</span></label>
											<select id="basic" class="selectpicker show-tick form-control" data-live-search="false" name="mapel_id" style="width: 100%;" data-placeholder="pilih satu">
												<option value="<?php echo $mapel_diampu;?>"><?php echo $mapel_diampu;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
													<?php 
														foreach($mapel as $m)
														{
															echo "<option value=".$m->mapel_id.">".$m->mapel_nama."</option>";
														}
													?>		
											</select>
											
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
							<?php echo anchor('guru',' Kembali','class="btn btn-sm btn-default"');?>
							<button class="btn-sm btn btn-success" type="submit">Simpan & Lanjut</button>
						</div>
					</div>
				</div>
				<!-- END Steps Navigation -->
			</form>
			<!-- END Form -->
	  
	</div>
</div>


		<!-- Page JS Code -->
		 <script>		
            $(function () {
                // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
                App.initHelpers(['datepicker','tags-inputs']);
            });
        </script>