<?php
if(empty($foto))
{
	$img="foto.png";
	$btnHapus ="";
}
else
{
	$img=$foto;
	$btnHapus ="<a href=\"javascript:;\" class=\"btn btn-default btn-sm\" data-id=".$guru_id." data-toggle=\"modal\" data-target=\"#modal-konfirmasi\"><i class=\"fa fa-times\"></i> Hapus</a>";
}

?>
<!-- BAGIAN VALIDASI -->
		<script src="<?php echo base_url();?>assets/js/validasi_murid.js"></script>
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
<form class="form-guru form-horizontal " action="<?php echo base_url($url);?>" method="post">
  <div class="content">
	<div class="block  block-bordered">
		<div class="block-header bg-gray-lighter">
				<div class="col-xs-6">	
					<h3 class="block-title"> <?php echo $titleForm;?> <span class="label label-info"><?php echo $guru_nama;?></span></h3>
				</div>
				<div class="col-xs-6 text-right">
					<?php echo anchor('guru',' Kembali','class="btn hidden-xs btn-sm btn-default"');?>
					<?php echo anchor('guru/tambah',' Tambah Baru','class="hidden-xs btn btn-sm btn-default"');?>
					<input type="submit" name="saveOnly" value="<?php echo $tbutton;?>" class=" hidden-xs btn btn-sm btn-default"/>
					<button class="hidden-xs btn-sm btn btn-success" type="submit">Simpan & Kembali</button>
				</div>
		</div>
				<div class="block-content">
					<div class="col-lg-12">
						 <!-- Foto guru -->
						 <div class="col-lg-4">
                            <div class="block">
                                <div class="block-header">
                                    <h3 class="block-title"><i class="si si-picture"></i> Foto guru </h3>
                                </div>
                                <div class="block-content">
                                    <div class="img-container">
                                        <img class="img-responsive" width="200px" height="300px" src="<?php echo base_url();?>data/guru/photo/<?php echo $img;?>" alt="">
                                        <div class="img-options">
                                            <div class="img-options-content">
                                                <h3 class="font-w400 text-white push-5"><?php echo $guru_nama;?></h3>
                                                <h4 class="h6 font-w400 text-white-op push-15"><?php echo $guru_nip;?></h4>
                                                <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-upload"  href="#"><i class="fa fa-pencil"></i> Sunting</a>
                                                 <?php echo $btnHapus;?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center push">
                                        <small>Ukuruan foto harus 3x4</small>
										<?php 
											$message = $this->session->flashdata('msgFoto');
											if($message)
											{
												echo "<div class=\"alert alert-success alert-dismissable\">
														<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
														<p><i class=\"fa fa-warning\"></i> $message</p>
													</div>";

											}?>
                                    </div>
                                </div>
                            </div>
                            <!-- END foto -->
						</div>
						<div class="col-lg-8">
							<div class="form-group ">
								<div class="col-sm-7">
									 <STRONG><span class="text-primary"><i class="glyphicon glyphicon-user"></i> DATA PRIBADI</span></STRONG>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-8">
										<div class="form-group">
											<label class="control-label" for="no_induk">NIP Guru  <span class="text-danger">*</span></label>
											<input class="form-control" maxlength=8 type="text" id="guru_nip" value="<?php echo $guru_nip;?>" name="guru_nip" placeholder="no induk guru">
											<input type="hidden" name="guru_id" value="<?php echo $guru_id;?>" />
											
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<label class="control-label" for="nisn">NIDN Guru  </label>
											<input class="form-control" maxlength=12 type="text" id="nidn" value="<?php echo $guru_nidn;?>" name="guru_nidn" placeholder="No Induk Siswa Nasional">
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<label class="control-label" for="guru_nama">Nama Lengkap guru <span class="text-danger">*</span></label>
											<input class="form-control" maxlength=30 type="text" id="guru_nama" value="<?php echo $guru_nama;?>" name="guru_nama" placeholder="Isi Nama Lengkap Guru">
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
											<label class="control-label" for="tempat_lahir">Tempat Lahir</label>
											<input class="form-control" type="text" id="tempat_lahir" value="<?php echo $tempat_lahir;?>" name="tempat_lahir" placeholder="Tempat Lahir">
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
                                            <label class="control-label" for="example-masked-date1">Tanggal lahir <span class="text-muted"><small>(18/08/1994)</small></span></label>
                                            
                                                <input class="js-masked-date form-control" type="text" value="<?php echo $tgl_lahir;?>" id="example-masked-date1" name="tgl_lahir" placeholder="dd/mm/yyyy">
                                          
                                        </div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<label class="control-label" for="angkatan">Pendidikan <span class="text-danger">*</span></label>
											<select id="basic" name="pendidikan" class="selectpicker show-tick form-control" data-live-search="false" name="angkatan" style="width: 100%;" data-placeholder="pilih satu">
												<option value="<?php echo $pendidikan;?>"><?php echo $pendidikan;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
												<option value="s3">Strata 3</option>		
												<option value="s2">Strata 2</option>		
												<option value="s1">Strata 1</option>		
												<option value="d3">Diploma 3</option>		
												<option value="d2">Diploma 2</option>		
												<option value="d1">Diploma 1</option>		
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<label class="control-label" for="gol_darah">Status</label>
											<select id="basic" class="selectpicker show-tick form-control" data-live-search="false" name="guru_status" style="width: 100%;" data-placeholder="pilih satu">
												<option value="<?php echo $guru_status;?>"><?php echo $guru_status;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->													
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
											<label class="control-label" for="jurusan">Mapel Diampu <span class="text-danger">*</span></label>
											<select id="basic" class="selectpicker show-tick form-control" data-live-search="false" name="mapel_id" style="width: 100%;" data-placeholder="pilih satu">
												<option value="<?php echo $mapel_id;?>"><?php echo $mapel_nama;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
													<?php 
														foreach($mapel_diampu as $m)
														{
															echo "<option value=".$m->mapel_id.">".$m->mapel_nama."</option>";
														}
													?>		
											</select>
											
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<label class="control-label" for="agama">Agama</label>
											<select id="basic" class="selectpicker show-tick form-control" data-live-search="false" name="agama_id" style="width: 100%;" data-placeholder="pilih satu">
												<option value="<?php echo $agama_id;?>"><?php echo $agama_nama;?></option>
												<?php 
												foreach($agama as $r)
												{
													?>
													<option value="<?php echo $r->agama_id;?>"><?php echo $r->agama;?></option>
												<?php
												}
													?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<label class="control-label"  for="gender">Gender</label>
											<select id="basic" class="selectpicker show-tick form-control" data-live-search="false" name="gender" style="width: 100%;" data-placeholder="pilih satu">
												<?php if($gender =='P'){$genderX="Perempuan";}elseif($gender =='L'){$genderX="Laki-Laki";}else{$genderX="";}?>
												<option value="<?php echo $gender;?>"><?php echo $genderX;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
												<option value="L">Laki-Laki</option>
												<option value="P">Perempuan</option>
											</select>											
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="row">
									<div class="col-lg-9">
										<div class="form-group">
											<label class="control-label" for="gol_darah">Gol Darah</label>
											<select id="basic" class="selectpicker show-tick form-control" data-live-search="false" name="gol_darah" style="width: 100%;" data-placeholder="pilih satu">
												<option value="<?php echo $gol_darah;?>"><?php echo $gol_darah;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->													
												<option value="A">A</option>
												<option value="B">B</option>
												<option value="O">O</option>
												<option value="A+">A+</option>
											</select>								
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-lg-4">
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<div class="col-lg-7">
								 <STRONG><span class="text-primary"><i class="si si-directions"></i> ALAMAT guru</span></STRONG>
							</div>
						</div>
						<script type="text/javascript">
							$(function(){
								$("#myprovinsi").autocomplete({
									source:"<?php echo base_url('guru/provinsi');?>",
									minLength:2,
								});
							});
						</script>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label  class="control-label" for="prov">Provinsi</label>
										<input class="form-control" type="text" name="provinsi" id="myprovinsi"  value="<?php echo $provinsi;?>" placeholder="Isi Provinsi">
									</div>	
								</div>
							</div>
						</div>
						<script type="text/javascript">
							$(function(){
								$("#mykab").autocomplete({
									source:"<?php echo base_url('guru/kabupaten');?>",
									minLength:2,
								});
							});
						</script>
						<div class="col-lg-6">
							<div class="row">
							<div class="col-lg-10">
								<div class="form-group">
									<label class="control-label" for="kab">Kabupaten</label>
									<input class="form-control" type="text" id="mykab" name="kabupaten" value="<?php echo $kabupaten;?>"  placeholder="Isi Kabupaten">
								</div>
							</div>
							</div>
						</div>
						<script type="text/javascript">
							$(function(){
								$("#kec").autocomplete({
									source:"<?php echo base_url('guru/kecamatan');?>",
									minLength:2,
								});
							});
						</script>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="kec">Kecamatan</label>
										<input class="form-control" type="text" id="kec" value="<?php echo $kecamatan;?>"  name="kecamatan"  placeholder="Isi Kecamatan">
									</div>
								</div>
							</div>
						</div>
						<script type="text/javascript">
							$(function(){
								$("#des").autocomplete({
									source:"<?php echo base_url('guru/desa');?>",
									minLength:2,
								});
							});
						</script>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="desa">Desa</label>
										<input class="form-control" type="text"  id="des" name="desa"  value="<?php echo $desa;?>"  placeholder="Isi Desa">
										
									</div>
								</div>
							</div>
						</div>
						
						
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="rt">RT</label>
										<input class="form-control" maxlength=2 type="text" id="rt" value="<?php echo $rt;?>" name="rt" placeholder="Isi RT">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="rw">RW</label>
										<input class="form-control" maxlength=2 type="text" id="rw" value="<?php echo $rw;?>" name="rw" placeholder="Isi RW">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="email">Email</label>
										<input class="form-control" type="email" id="email" value="<?php echo $guru_email;?>" name="guru_email" placeholder="Isi Email">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="no_hp">No Handphone</label>
										<input class="form-control" type="text" id="no_hp" value="<?php echo $no_hp;?>" name="no_hp" placeholder="Isi No Handphone">
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
							<?php echo anchor('guru/tambah',' Tambah Baru','class="hidden-xs btn btn-sm btn-default"');?>
							<input type="submit" name="saveOnly" value="<?php echo $tbutton;?>" class="btn btn-sm btn-default"/>
							<button class="btn-sm btn btn-success" type="submit">Simpan & Kembali</button>
						</div>
					</div>
				</div>
				<!-- END Steps Navigation -->
	</div>
</div>
</form>
<!-- END Form -->

<!-- modal Upload-->
		<div id="modal-upload" data-keyboard="false" data-backdrop="static" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<?php	
				$atr =array(
					'id' => 'formUpload',
					'class' => 'formUpload',
				);
				echo form_open_multipart("murid/uploadFoto",$atr);?>
				<div class="modal-content">
					 <div class="block block-transparent remove-margin-b">
							<div class="block-header bg-gray-lighter">
								<ul class="block-options">
									<li>
										<button data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
									</li>
								</ul>
								<h3 class="block-title">Upload Foto</h3>
							</div>
							
							<div class="block-content">
								<p> 
									<div class="block">
										<div class="block-content block-content-full">
										

												<div class="row">
												
													<div class="wrap-cropbox content bg-image overflow-hidden">
														<img class="crop  push-10-t push-30-l" width="50"/>
														<span class="textupload"></span>
														<span class="info"></span>
													</div>
													
													<div class="starCrop"></div>
												</div>
												
											
										</div>
									</div>
								</p>
							</div>
						</div>
					<div class="modal-footer">
						<div class="btn btn-sm btn-default btn-file">
						 <i class="si si-picture"></i> Pilih Foto
							<input type="hidden" name="guru_id" value="<?php echo $guru_id;?>" />
							<input type="file" name="userfile" id="file"  onchange="$('.crop')[0].src = window.URL.createObjectURL(this.files[0])" />
						</div>
						<button class="btn btn-success btn-sm" onclick="upload()" type="submit">Upload Foto</button>
					</div>
				</div>
				<?php echo form_close();?>
			</div>
		</div>
		<!-- end modal upload-->
		<!-- modal konfirmasi-->
		<div id="modal-konfirmasi" data-keyboard="false" data-backdrop="static" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					 <div class="block block-transparent remove-margin-b">
							<div class="block-header bg-gray-lighter">
								<ul class="block-options">
									<li>
										<button data-dismiss="modal" type="button"><i class="fa fa-times"></i></button>
									</li>
								</ul>
								<h3 class="block-title">Konfirmasi</h3>
							</div>
							<div class="block-content">
							<p> Apakah anda ingin menghapus foto ini?</p>
							</div>
						</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tidak</button>
						<a href="javascript:;" class="btn btn-success btn-sm" id="hapus-true">Hapus</a>
					</div>
				</div>
			</div>
		</div>
		<!-- end modal konfirmasi-->
		<!-- Page JS Code -->
		 <script>
				//menghapus foto
				$(document).ready(function(){
					  
					$('#modal-konfirmasi').on('show.bs.modal', function (event) {
						
						var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

						// Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
						var id = div.data('id') 

						var modal = $(this)

						// Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal.
						modal.find('#hapus-true').attr("href","<?php echo base_url();?>guru/hapusFoto/"+id); 
						
					});
				});
				
				//end menghapus foto
				
				$("#formUpload").submit(function(e)
				{
					e.preventDefault();
					if($("#file").val() !="")
					{
						
						
						$.ajax({
							type : "POST",
							dataType:"html",
							url : "<?php echo base_url('guru/uploadFoto');?>",
							data : new FormData(this),
							contentType : false,
							cache : false,
							processData : false,
							success:function(data){
									
									$(".textupload").html("success..");
									$(".starCrop").html(data);
									
									$(".formUpload")[0].reset();
									file=false;
									$(".info").html('').show();
							
						
							},
							
							beforeSend : function(){
								$(".info").append("uploading");
							}
						});
					}
					else{
						$(".info").html("pilih file dulu");
						
					}
							
				});
					
				
		
			
			
            $(function () {
                // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
                App.initHelpers(['datepicker', 'colorpicker', 'select2', 'tags-inputs']);
            });
        </script>