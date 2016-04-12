<!-- BAGIAN VALIDASI -->
		<script src="<?php echo base_url();?>assets/js/validation.js"></script>
		<script type="text/javascript">
		  $(document).ready(function(){
			  $(".form-murid").validate({
				rules: {
				   no_induk: { digits:true, minlength:8, required: true },
				   nama_lengkap: {required : true},
				   angkatan: {required : true},
				},
				tooltip_options: {
				   no_induk: { placement: 'top' }
				},
				 messages: {
					'no_induk': {
						required: 'No induk tidak boleh kosong',
						minlength: 'minimal 8 karakter',
						digits: 'Hanya boleh angka'
					},
					'nama_lengkap': {
						required: 'Nama Lengkap tidak boleh kosong',
					},
					'angkatan':{
						required: 'Angkatan tidak boleh kosong',
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
  <div class="content">
	<div class="block  block-bordered">
		<div class="block-header bg-gray-lighter">
				<h3 class="block-title"> <?php echo $titleForm;?> <span class="label label-info"><?php echo $nama_lengkap;?></span></h3>
		</div>
			<form class="form-murid form-horizontal " action="<?php echo base_url($url);?>" method="post">
				<div class="block-content">
					<div class="col-lg-12">
						 <!-- Foto Murid -->
						<div class="col-lg-12">
							<div class="form-group ">
								<div class="col-sm-7">
									 <STRONG><span class="text-primary"><i class="si si-user-follow"></i> Tambah Murid Baru</span></STRONG>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-8">
										<div class="form-group form-no_induk">
											<label class="control-label" for="no_induk">No Induk  <span class="text-danger">**</span></label>
											<input class="form-control" required maxlength=8 type="text" id="no_induk" value="<?php echo $no_induk;?>" name="no_induk" placeholder="no induk murid"  data-content="Nama tidak boleh kosong minimal 3 karakter" data-placement="top"/>
											<input type="hidden" name="murid_id" value="<?php echo $murid_id;?>" />
											
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-8">
										<div class="form-group">
											<label class="control-label" for="nisn">NISN <span class="text-danger">**</span>  </label>
											<input class="form-control" maxlength=12 type="text" id="nisn" value="<?php echo $nisn;?>" name="nisn" placeholder="No Induk Siswa Nasional">
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<label class="control-label" for="nama_lengkap">Nama Lengkap Murid <span class="text-danger">*</span></label>
											<input class="form-control" maxlength=30 type="text" id="nama_lengkap" value="<?php echo $nama_lengkap;?>" name="nama_lengkap" placeholder="Isi Nama Lengkap">
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<label class="control-label" for="nama_panggilan">Nama Panggilan</label>
											<input class="form-control" type="text" id="nama_panggilan" value="<?php echo $nama_panggilan;?>" name="nama_panggilan" placeholder="Isi Nama Panggilan">
										</div>	
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<label class="control-label" for="angkatan">Angkatan <span class="text-danger">*</span></label>
											<select  name="angkatan" class="selectpicker show-tick form-control" data-live-search="true" name="angkatan" style="width: 100%;" data-placeholder="pilih satu">
												<option value="<?php echo $angkatan;?>"><?php echo $angkatan;?></option>
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
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="row"></div>
				<!-- Steps Navigation -->
				<div class="block-content bg-gray-lighter block-content-mini block-content-full border-t">
					<div class="row">
						<div class="col-xs-4 text-left">
							<span class="text-danger">* <small class="text-muted"><i>(harus di isi)</i></small></span>
							<span class="text-danger">** <small class="text-muted"><i>(tdk boleh sama)</i></small></span>
						</div>
						<div class="col-xs-8 text-right">
							<?php echo anchor('murid',' Kembali','class="btn btn-sm btn-default"');?>
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
		App.initHelpers(['datepicker', 'colorpicker','tags-inputs']);
	});
</script>