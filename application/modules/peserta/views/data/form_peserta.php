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
				<h3 class="block-title"> <?php echo $titleForm;?> <span class="label label-info"><?php echo $nama_peserta;?></span></h3>
		</div>
			<form class="form-guru form-horizontal " action="<?php echo base_url($url);?>" method="post">
				<div class="block-content">
						
						<div class="col-lg-12">
							<div class="form-group ">
								<div class="col-sm-7">
									 <STRONG><span class="text-primary"><i class="si si-user-follow"></i>  Tambah peserta Baru</span></STRONG>
								</div>
							</div>
	
							<div class="col-lg-12">
								<div class="row">
									<div class="col-lg-5">
										<div class="form-group">
											<label class="control-label" for="pendidikan">Nama Murid <span class="text-danger">*</span></label>
											<input type="hidden" name="active" value=0 />
											<input type="hidden" name="uri3" value="<?php echo $this->uri->segment(3);?>" />
											<input type="hidden" name="uri4" value="<?php echo $this->uri->segment(4);?>" />
											<select id="basic" name="murid_id" class="selectpicker show-tick form-control" data-live-search="false" style="width: 100%;" data-placeholder="pilih satu">
												<option value="<?php echo $murid_id;?>"><?php echo $nama_peserta;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
												<?php
													foreach($murid as $m)
													{
												?>
													<option value="<?php echo $m->murid_id;?>"><?php echo $m->nama_lengkap;?></option>
												<?php
													}
												?>
											</select>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-12">
								<div class="row">
									<div class="col-lg-5">
										<div class="form-group">
											<label class="control-label" for="pendidikan">Tempat Prakerin<span class="text-danger">*</span></label>
											<select id="basic" name="perusahaan_id" class="selectpicker show-tick form-control" data-live-search="false" style="width: 100%;" data-placeholder="pilih satu">
												<option value="<?php echo $perusahaan_id;?>"><?php echo $nama_perusahaan;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
												<?php
													foreach($perusahaan as $p)
													{
												?>
													<option value="<?php echo $p->perusahaan_id;?>"><?php echo $p->nama_perusahaan;?></option>
												<?php
													}
												?>
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
							<?php echo anchor('peserta',' Kembali','class="btn btn-sm btn-default"');?>
							<input type="submit" name="saveOnly" value="<?php echo $tbutton;?>" class="btn btn-sm btn-default"/>
							<button class="btn-sm btn btn-success" type="submit">Simpan & Kembali</button>
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