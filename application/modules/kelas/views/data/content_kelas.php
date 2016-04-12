
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
										<li><a href="#">Data kelas</a></li>
										<li><a href="#">Tahun Ajaran</a></li>
										<li class="divider"></li>
										<li><a href="#">Dashboard</a></li>
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
				 <!-- Dynamic Table Full -->
			<form action="<?php echo base_url('kelas/multi');?>" method="POST"> 
				<div class="content">
					<div class="block">
						<div class="block-header">
							<?php echo anchor('kelas/tambah','<i class="fa fa-plus"></i> Tambah','class=" btn btn-sm btn-success" data-toggle="tooltip" title="Tambah kelas"');?>
							<input type="submit" name="hapusBanyak" id="hapusBanyak" class="btn btn-default btn-sm" value="Hapus" data-toggle="tooltip" title="Hapus Yang Ditandai">
						</div>
						<div class="block-content">
						<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
							<table class="table table-condensed js-table-checkable table-hover js-dataTable-full">
								<thead>
									<tr>
										<th class="text-center"></th>
										<th class="text-center">
											<label class="checkAll css-input css-checkbox css-checkbox-success remove-margin-t remove-margin-b">
												<input type="checkbox" id="check-all" name="check-all"><span></span>
											</label>
										</th>		
										<th>Tahun Ajar </th>
										<th>Kelas </th>
										<th class="hidden-xs">tingkat</th>
										<th class="hidden-xs">NIS / Nama Murid</th>
										<th class="text-center" style="">Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no=1;
										foreach($datakelas as $data)
											{
													if($data->tingkat ==1)
												{
													$label="label-primary";
												}
												elseif($data->tingkat ==2)
												{
													$label="label-warning";
												}
												elseif($data->tingkat ==3)
												{
													$label="label-success";
												}
												else
												{
													$label="label-danger";
												}
											
									?>
									<tr>
										<td class="text-center">
											<?php echo $no;?>
										</td>
										<td class="text-center">
											<label class="css-input css-checkbox css-checkbox-success">
												<input type="checkbox" value="<?php echo $data->kelas_id;?>" id="row_<?php echo $no;?>" name="kelas[]"><span></span>
											</label>
										</td>
										<td class=""><?php echo $data->tahun;?></td>
										<td class="hidden-xs"><?php echo $data->nama_tingkat;?></td>
											
										<td class="hidden-xs"><span class="label <?php echo $label;?>"><?php echo $data->tingkat;?></span></td>
										<td class="hidden-xs"><?php echo "<span class='text-muted'>".$data->no_induk."</span> ". anchor("murid/data_murid/$data->murid_id","$data->nama_lengkap","target='blank'");?></span></td>
										
										<td class="text-center">
											<div class="btn-group">
												<a href="kelas/edit/<?php echo $data->kelas_id;?>" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit kelas"><i class="fa fa-pencil"></i></a>
												<a href="javascript:;" data-id="<?php echo $data->kelas_id;?>" data-toggle="modal" data-target="#modal-konfirmasi" class="btn btn-xs btn-danger" type="button" title="Hapus kelas"><i class="fa fa-times"></i></a>
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
			<!-- end modal konfirmasi -->

<script>
	$(function () {
		// Init page helpers (Table Tools helper)
		App.initHelpers(['table-tools',]);
		});
		
	$(document).ready(function(){
	
		  
		$('#modal-konfirmasi').on('show.bs.modal', function (event) {
			
			var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

			// Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
			var id = div.data('id') 

			var modal = $(this)

			// Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal.
			modal.find('#hapus-true').attr("href","kelas/hapus/"+id); 
			
		})
		
	});

</script>


 