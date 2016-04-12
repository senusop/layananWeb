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
				<h3 class="block-title"> <?php echo $titleForm;?> <span class="label label-info"><?php echo $mapel_nama;?></span></h3>
		</div>
			<form class="form-guru form-horizontal " action="<?php echo base_url($url);?>" method="post">
				<div class="block-content">
					<div class="col-lg-12">
						
						<div class="col-lg-12">
							<div class="form-group ">
								<div class="col-sm-7">
									 <STRONG><span class="text-primary"><i class="si si-user-follow"></i>  Tambah Mapel Baru</span></STRONG>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-8">
										<div class="form-group">
											<label class="control-label" for="no_induk">Nama mapel  <span class="text-danger">*</span></label>
											<input class="form-control" maxlength=30 type="text" id="nama_mapel" value="<?php echo $mapel_nama;?>" name="mapel_nama" placeholder="Isi Mata Pelajaran">
											<input type="hidden" name="uri3" value="<?php echo $this->uri->segment(3);?>" />
											<input type="hidden" name="uri4" value="<?php echo $this->uri->segment(4);?>" />
											<input type="hidden" name="mapel_id" value="<?php echo $mapel_id;?>" />
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<label class="control-label" for="nisn">Singkatan  </label>
											<input class="form-control" maxlength=30 type="text" id="pimipinan_mapel" value="<?php echo $singkatan;?>" name="singkatan" placeholder="Singkatan Mata Pelajaran">
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
							<?php echo anchor('mapel',' Kembali','class="btn btn-sm btn-default"');?>
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