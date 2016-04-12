
<div class="row">
<div class="col-lg-12">
<div class="block-content">
	<div class="form-horizontal">
		<div class="col-lg-6">
			<div class="form-group">
				<div class="col-sm-9">
					<div class="form-material">
						<input class="form-control" type="text" id="jurusan_nama" value="<?php echo $jurusan_nama;?>" name="jurusan_nama" placeholder="Masukan Nama Jurusan">
						<input type="hidden" name="jurusan_id" value="<?php echo $jurusan_id;?>" />
						<label for="jurusan_nama">Nama Jurusan</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<div class="form-material">
						<input class="form-control" type="text" id="jurusan_singkat" value="<?php echo $jurusan_singkat;?>" name="jurusan_singkat" placeholder="(TKJ / RPL / TMO)">
						<label for="val-username2">Kependekan</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-9">
					<div class="form-group">
						<div class="col-sm-8">
							<div class="form-material">
								<select class="js-select2 form-control" id="example-select2" name="akreditasi" style="width: 100%;" data-placeholder="pilih satu">
									<option value="<?php echo $akreditasi;?>"></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
										
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="C">C</option>
									<option value="D">D</option>
										
								</select>
								<label for="val-skill2">Akreditasi (<?php echo $akreditasi;?>)</label>
							</div>
						</div>
					</div>
				</div>
			</div>												
		</div>
		<div class="col-lg-6">
			<div class="form-group">
				<div class="col-sm-9">
					<div class="form-material">
					<input type="hidden" name="guru_id_awal" value="<?php echo $guru_id;?>" />
						<select class="js-select2 form-control" id="example-select2" name="guru_id" style="width: 100%;" data-placeholder="Pilih Ketua Jurusan">
							<option value="<?php echo $guru_id;?>"><?php echo $guru_nama;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
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
</div>						
</div>
   <script src="<?php echo base_url();?>assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>

        <!-- Page JS Code -->
        <script>
            $(function () {
                // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
                App.initHelpers(['select2']);
            });
        </script>