 
 <!-- Page Header -->
	<div class="content bg-gray-lighter">
		<div class="row items-push">
			<div class="col-sm-5">
				<ol class="breadcrumb push-10-t">
				   <li class="dropdown"> <a class="link-effect" data-toggle="dropdown" href="#"><?php echo $pageTitle;?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Data Guru</a></li>
							<li><a href="#">Data Murid</a></li>
							<li><a href="#">Data Kelas</a></li>
							<li><a href="#">Data Jurusan</a></li>
							<li><a href="#">Tahun Ajaran</a></li>
							<li class="divider"></li>
							<li><a href="#">And one more thing</a></li>
						</ul>
					</li>		
					<li>
						<?php echo $subPage;?>
					</li>
				</ol>
			</div>
		</div>
	</div>
	<!-- END Page Header -->
		<div class="col-lg-12">
		<div class="row">
                        <div class="col-lg-4">
							
                            <div class="block block-themed block-bordered">
                                <div class="block-header bg-modern ">
                                    <ul class="block-options">
                                         <li  data-toggle="tooltip" title="Sunting tahun aktif" class="dropdown"> <a class="" data-toggle="dropdown" href="#"><i class="fa fa-pencil"></i></span></a>
											<ul class="dropdown-menu dropdown-menu-right dropdown-menu-lefr font-s13 sidebar-mini-hide">
												<?php foreach($ajaran as $l)
												{
													if($l->semester ==1)
													{
														$s="ganjil";
													}else{$s="genap";}
													?>
													<li><a href="<?php echo base_url();?>ajaran/update_akttif/<?php echo $l->thn_ajaran_id;?>"><i class="si si-calendar pull-right"></i> <?php echo $l->tahun.' '.$s;?></a></li>
												<?php
													
												}
												
												?>
												<li class="divider"></li>
												<li><a href="<?php echo base_url('ajaran/default');?>"><i class="si si-anchor pull-right"></i> Setting Default</a></li>
											</ul>
										</li>		
                                    </ul>
                                    <h3 class="block-title"><i class="si si-calendar"></i> Tahun Ajaran Aktif</h3>
                                </div>
                                <div class="block-content block-content-full text-center">
									<?php 
									$thnAktif="";
									$semester="";
									if($thn_aktif ==true)
									{
										foreach($thn_aktif as $aktif)
										{
											$thnAktif = $aktif->tahun;
											$sm = $aktif->semester;
											
											if($sm ==2)
											{
												$semester ="Semester Genap";
											}elseif($sm==1)
											{
												$semester ="Semester Ganjil";
											}
										}
									}
									else
									{
										$thnAktif="Tidak Ada";
										$semester="Tidak Ada";
									}
									?>
									<h2><?php echo $thnAktif;?></h2> <h4>(<?php echo $semester;?>)</h4>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-8">
                           <form action="<?php echo base_url('ajaran/multi');?>" method="POST"> 
								<div class="block block-bordered">
									<div class="block-header bg-gray-lighter">
										<?php echo anchor('ajaran/tambah','<i class="fa fa-plus"></i> Tambah','class="btn btn-sm btn-success" data-toggle="tooltip" title="Tambah Tahun Ajaran"');?>
										<input type="submit"  name="hapusBanyak" id="hapusBanyak" class="btn btn-default btn-sm" value="Hapus" data-toggle="tooltip" title="Hapus Yang Ditandai">
									</div>
									<div class="block-content">
										<div class="row">
											<table class="table table-condensed js-table-checkable table-hover js-dataTable-full">
												<thead>
													<tr>
														<th class="text-center"></th>
														<th class="text-center">
															<label class="checkAll css-input css-checkbox css-checkbox-success remove-margin-t remove-margin-b">
																<input type="checkbox" id="check-all" name="check-all"><span></span>
															</label>
														</th>		
														<th>Tahun Ajaran</th>
														<th>Semester </th>
														<th>Status </th>
														<th class="text-center" style="">Actions</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no=1;
														foreach($ajaran as $data)
															{
															$status = $data->status;
															if($status ==1)
															{
																$status="aktif";
																$label="label-success";
															}else
															{
																$status="non aktif";
																$label="label-default";
															}
																
													?>
													<tr>
														<td class="text-center">
															<?php echo $no;?>
														</td>
														<td class="text-center">
															<label class="css-input css-checkbox css-checkbox-success">
																<input type="checkbox" value="<?php echo $data->thn_ajaran_id;?>" id="row_<?php echo $no;?>" name="thn_ajaran_id[]"><span></span>
															</label>
														</td>
														<td class=""><?php echo $data->tahun;?></td>
														<td class=""><?php echo "Semester ". $data->semester;?></td>
														<td class=""><span class="label <?php echo $label;?>"><?php echo $status;?><span></td>
														<td class="text-center">
															<div class="btn-group">
																<a href="ajaran/edit/<?php echo $data->thn_ajaran_id;?>" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Thn Ajaran"><i class="fa fa-pencil"></i></a>
																<a href="javascript:;" data-id="<?php echo $data->thn_ajaran_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" class="btn btn-xs btn-danger" type="button"    data-toggle="confirmation"><i class="fa fa-times"></i></a>
															</div>
														</td>
													</tr>
															<?php  
																$no++;
															} 
																					
															?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</form>	
                        </div>
					</div>
		
		</div>
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
							<p> Apakah anda ingin menghapus data ini?</p>
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
	
<script>
	$(function () {
		// Init page helpers (Table Tools helper)
		App.initHelpers(['table-tools']);
	});
	$(document).ready(function(){
		  
		$('#modal-konfirmasi').on('show.bs.modal', function (event) {
			
			var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

			// Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
			var id = div.data('id') 

			var modal = $(this)

			// Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal.
			modal.find('#hapus-true').attr("href","ajaran/hapus/"+id); 
			
		});
	});

</script>


 