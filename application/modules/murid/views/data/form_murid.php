<?php
if(empty($foto))
{
	$img="foto.png";
	$btnHapus ="";
}
else
{
	$img=$foto;
	$btnHapus ="<a href=\"javascript:;\" class=\"btn btn-default btn-sm\" data-id=".$murid_id." data-toggle=\"modal\" data-target=\"#modal-konfirmasi\"><i class=\"fa fa-times\"></i> Hapus</a>";
}

?>
<!-- BAGIAN VALIDASI -->

		<script type="text/javascript">
		  $(".form-murid").validate({
			rules: {
			   thefield: { digits:true, required: true }
			},
			tooltip_options: {
			   thefield: { placement: 'left' }
			}
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
<form class="form-murid form-horizontal " action="<?php echo base_url($url);?>" method="post">
  <div class="content">
	<div class="block  block-bordered">
		<div class="block-header bg-gray-lighter">
				<div class="col-xs-6">
				<h3 class="block-title"> <?php echo $titleForm;?> <span class="label label-info"><?php echo $nama_lengkap;?></span></h3>
				</div>
				<div class="col-xs-6 text-right">
					<?php echo anchor('murid',' Kembali','class="btn hidden-xs btn-sm btn-default"');?>
					<?php echo anchor('murid/tambah',' Tambah Baru','class="hidden-xs btn btn-sm btn-default"');?>
					<input type="submit" name="saveOnly" value="<?php echo $tbutton;?>" class=" hidden-xs btn btn-sm btn-default"/>
					<button class="hidden-xs btn-sm btn btn-success" type="submit">Simpan & Kembali</button>
				</div>
		</div>
			
				<div class="block-content">
					<div class="col-lg-12">
						 <!-- Foto Murid -->
						 <div class="col-lg-4">
                            <div class="block">
                                <div class="block-header">
                                    <h3 class="block-title"><i class="si si-picture"></i> Foto Murid </h3>
                                </div>
                                <div class="block-content">
                                    <div class="img-container">
                                        <img class="img-responsive" width="200px" height="300px" src="<?php echo base_url();?>data/murid/photo/<?php echo $img;?>" alt="">
                                        <div class="img-options">
                                            <div class="img-options-content">
                                                <h3 class="font-w400 text-white push-5"><?php echo $nama_lengkap;?></h3>
                                                <h4 class="h6 font-w400 text-white-op push-15">NIS : <?php echo $no_induk;?></h4>
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
											<label class="control-label" for="no_induk">No Induk  <span class="text-danger">*</span></label>
											<input class="form-control" maxlength=8 type="text" id="no_induk" value="<?php echo $no_induk;?>" name="no_induk" placeholder="no induk murid">
											<input type="hidden" name="uri3" value="<?php echo $this->uri->segment(3);?>" />
											<input type="hidden" name="uri4" value="<?php echo $this->uri->segment(4);?>" />
											<input type="hidden" name="murid_id" value="<?php echo $murid_id;?>" />
											
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-10">
										<div class="form-group">
											<label class="control-label" for="nisn">NISN  </label>
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
											<select id="basic" name="angkatan" class="selectpicker show-tick form-control" data-live-search="true" name="angkatan" style="width: 100%;" data-placeholder="pilih satu">
												<option value="<?php echo $angkatan;?>"><?php echo $angkatan;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
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
                                            
                                                <input class="js-masked-date form-control" type="text" id="example-masked-date1" name="tgl_lahir" value="<?php echo $tgl_lahir;?>" placeholder="dd/mm/yyyy">
                                          
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

					<div class="col-lg-6">
						<div class="form-group">
							<div class="col-lg-7">
								 <STRONG><span class="text-primary"><i class="si si-directions"></i> ALAMAT MURID</span></STRONG>
							</div>
						</div>
						<script type="text/javascript">
							$(function(){
								$("#myprovinsi").autocomplete({
									source:"<?php echo base_url('murid/provinsi');?>",
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
									source:"<?php echo base_url('murid/kabupaten');?>",
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
									source:"<?php echo base_url('murid/kecamatan');?>",
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
									source:"<?php echo base_url('murid/desa');?>",
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
						<div class="col-lg-8">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="email">Email</label>
										<input class="form-control" type="email" id="email" value="<?php echo $email;?>" name="email" placeholder="Isi Email">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
								<div class="col-lg-9">
									<div class="form-group">
										<label class="control-label" for="kode_pos">Kode Pos</label>
										<input class="form-control" type="text" id="kode_pos" value="<?php echo $kode_pos;?>" name="kode_pos" placeholder="Isi Kode Pos">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="no_hp_murid">No Handphone</label>
										<input class="form-control" type="text" id="no_hp_murid" value="<?php echo $no_hp_murid;?>" name="no_hp_murid" placeholder="Isi No Handphone">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="tlp_rumah">No Tlp Rumah</label>
										<input class="form-control" type="text" id="tlp_rumah" value="<?php echo $tlp_rumah;?>" name="tlp_rumah" placeholder="Isi No Tlp Rumah">
									</div>
								</div>
							</div>
						</div>
					</div>	
					
					<div class="col-lg-6">
						<div class="form-group">
							<div class="col-sm-7">
								 <STRONG><span class="text-primary"><i class="si si-briefcase"></i> DATA ASAL SEKOLAH</span></STRONG>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="sd_asal">Sekolah Dasar Asal</label>
										<input class="form-control" type="text" id="sd_asal" value="<?php echo $sd_asal;?>" name="sd_asal" placeholder="Nama Sekolah Dasar Asla">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-8">
									<div class="form-group">
										<label class="control-label" for="thn_lulus_sd">Tahun Lulus SD</label>
										<input class="form-control" type="text" id="thn_lulus_sd" value="<?php echo $thn_lulus_sd;?>" name="thn_lulus_sd" placeholder="Isi Tahun Lulus SD">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-10">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="alamat_sd">Alamat Sekolah Dasar</label>
										<textarea class="form-control" id="alamat_sd" name="alamat_sd" rows="3" placeholder="Isi Alamat SD"><?php echo $alamat_sd;?></textarea>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="smp_mts_asal">SMP/MTS Asal</label>
										<input class="form-control" type="text" id="smp_mts_asal" value="<?php echo $smp_mts_asal;?>" name="smp_mts_asal" placeholder="Nama SMP/MTS Asla">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-8">
									<div class="form-group">
										<label class="control-label" for="thn_lulus_smp_mts">Tahun Lulus SMP/MTS</label>
										<input class="form-control" type="text" id="thn_lulus_smp_mts" value="<?php echo $thn_lulus_smp_mts;?>" name="thn_lulus_smp_mts" placeholder="Isi Tahun Lulus SMP/MTS">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-10">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="alamat_smp_mts">Alamat Sekolah SMP/MTS</label>
										<textarea class="form-control" id="alamat_smp_mts" name="alamat_smp_mts" rows="3" placeholder="Isi Alamat SMP/MTS"><?php echo $alamat_smp_mts;?></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-lg-6">
						<div class="form-group">
							<div class="col-sm-7">
								 <STRONG><span class="text-primary"><i class="si si-users"></i> DATA ORANG TUA</span></STRONG>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="nama_lengkap_ayah">Nama Ayah</label>
										<input class="form-control" type="text" id="nama_lengkap_ayah" value="<?php echo $nama_lengkap_ayah;?>" name="nama_lengkap_ayah" placeholder="Nama Lengkap Ayah">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="nama_lengkap_ibu">Nama Ibu</label>
										<input class="form-control" type="text" id="nama_lengkap_ibu" value="<?php echo $nama_lengkap_ibu;?>" name="nama_lengkap_ibu" placeholder="Nama Lengkap Ibu">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="pendidikan_ayah">Pendidikan Ayah</label>
										<select id="basic" class="selectpicker show-tick form-control" data-live-search="true" name="pendidikan_ayah" style="width: 100%;" data-placeholder="pilih satu">
											<option value="<?php echo $pendidikan_ayah;?>"><?php echo $pendidikan_ayah;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
											<option value="s3">S3</option>
											<option value="s2">S2</option>
											<option value="s1">S1</option>
											<option value="d3">D3</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="pendidikan_ibu">Pendidikan Ibu</label>
										<select id="basic" class="selectpicker show-tick form-control" data-live-search="true" name="pendidikan_ibu" style="width: 100%;" data-placeholder="pilih satu">
											<option value="<?php echo $pendidikan_ibu;?>"><?php echo $pendidikan_ibu;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
											<option value="s3">S3</option>
											<option value="s2">S2</option>
											<option value="s1">S1</option>
											<option value="d3">D3</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="pekerjaan_ayah">Pekerjaan Ayah</label>
										<select id="basic" class="selectpicker show-tick form-control" data-live-search="true" name="pekerjaan_ayah" style="width: 100%;" data-placeholder="pilih satu">
											<option value="<?php echo $pekerjaan_ayah;?>"><?php echo $pekerjaan_ayah;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
											<option value="petani">Petani</option>
											<option value="buruh">Buruh</option>
											<option value="pns">Pekerja Negeri Sipil</option>
											<option value="honorer">Honorer</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="pekerjaan_ibu">Pekerjaan Ibu</label>
										<select id="basic" class="selectpicker show-tick form-control" data-live-search="true" name="pekerjaan_ibu" style="width: 100%;" data-placeholder="pilih satu">
											<option value="<?php echo $pekerjaan_ibu;?>"><?php echo $pekerjaan_ibu;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
											<option value="petani">Petani</option>
											<option value="buruh">Buruh</option>
											<option value="pns">Pekerja Negeri Sipil</option>
											<option value="honorer">Honorer</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-10">
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="control-label" for="alamat_ortu">Alamat Orang Tua</label>
										<textarea class="form-control" id="alamat_ortu" name="alamat_ortu" rows="3" placeholder="Isi Alamat Orang Tua"><?php echo $alamat_ortu;?></textarea>
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
							<?php echo anchor('murid',' Kembali','class="btn btn-sm btn-default"');?>
							<?php echo anchor('murid/tambah',' Tambah Baru','class="btn btn-sm btn-default"');?>
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
							<input type="hidden" name="muridID" value="<?php echo $murid_id;?>" />
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
						modal.find('#hapus-true').attr("href","<?php echo base_url();?>murid/hapusFoto/"+id); 
						
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
							url : "<?php echo base_url('murid/uploadFoto');?>",
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