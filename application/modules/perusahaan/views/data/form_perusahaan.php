<!-- BAGIAN VALIDASI -->

		<!-- END VALIDASI -->
 <!-- Page Header -->

 <script type='text/javascript'>


var placeSearch, autocomplete;
/*
kita siapin dulu komponen formnya, 
untuk dokumentasinya ada disini
https://developers.google.com/maps/documentation/geocoding/#JSON
*/
var componentForm = {
    route: 'long_name',
    administrative_area_level_2: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
};

/*
kita bikin inisialisasinya dulu, dengan mendeklarasikan service Google Maps Autocomplete
lalu ketika form autocomplete di isi, maka service ini akan berjalan,
setelah itu maka script ini akan memanggil fungsi isiAlamat()
*/
function initialize() {
    autocomplete = new google.maps.places.Autocomplete((document.getElementById('autocomplete')),{ types: ['geocode'] });
    
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        isiAlamat();
    });
}

window.onload=initialize;
/*
nah, fungsi ini untuk mengisi field-field pada form 
dengan output hasil dari autocomplete tadi. 
*/
function isiAlamat() {
    var place = autocomplete.getPlace();
    for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
    }
    
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
        }
    }
}

/*
fungsi ini berguna untuk geolocate, dimana nama jalan yang akan tampil di autocomplete
tidak akan jauh dengan lokasi tempat kita berada.
Fungsi ini berguna karena tanpa fungsi ini, autocomplete akan menampilkan alamat yang kurang akurat
atau bahkan ngaco.
*/
function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,geolocation));
        });
    }
}
</script>
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
				<h3 class="block-title"> <?php echo $titleForm;?> <span class="label label-info"><?php echo $nama_perusahaan;?></span></h3>
		</div>
			<form class="form-guru form-horizontal " action="<?php echo base_url($url);?>" method="post">
				<div class="block-content">
					<div class="col-lg-12">
						<div class="form-group ">
							<div class="col-sm-7">
								 <STRONG><span class="text-primary"><i class="si si-user-follow"></i>  Tambah Perusahaan Baru</span></STRONG>
							</div>
						</div>
					</div>
							
					<div class="col-lg-6">	
						<div class="col-lg-12">
							<div class="form-group">
								<label class="control-label" for="no_induk">Nama Perusahaan  <span class="text-danger">*</span></label>
								<input class="form-control" maxlength=30 type="text" id="nama_perusahaan" value="<?php echo $nama_perusahaan;?>" name="nama_perusahaan" placeholder="Isi Nama Perusahaan">
								<input type="hidden" name="uri3" value="<?php echo $this->uri->segment(3);?>" />
								<input type="hidden" name="uri4" value="<?php echo $this->uri->segment(4);?>" />
								<input type="hidden" name="perusahaan_id" value="<?php echo $perusahaan_id;?>" />
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<label class="control-label" for="nisn">Pimpinan Perusahaan  </label>
								<input class="form-control" maxlength=30 type="text" id="pimipinan_perusahaan" value="<?php echo $pimpinan_perusahaan;?>" name="pimpinan_perusahaan" placeholder="Pimpinan Perusahaan">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-11">
									<div class="form-group">
										<label class="control-label" for="nisn">No Tlp  </label>
										<input class="form-control" maxlength=12 type="text" id="no_tlp" value="<?php echo $no_tlp;?>" name="no_tlp" placeholder="No TLP Perusahaan">
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="control-label" for="pendidikan">Jenis Perusahaan <span class="text-danger">*</span></label>
										<select id="basic" name="jenis_perusahaan_id" class="selectpicker show-tick form-control" data-live-search="false" style="width: 100%;" data-placeholder="pilih satu">
											<option value="<?php echo $jenis_perusahaan_id;?>"><?php echo $jenis_perusahaan;?></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
											<?php
												foreach($jenis as $x)
												{
											?>
												<option value="<?php echo $x->jenis_perusahaan_id;?>"><?php echo $x->jenis_perusahaan;?></option>
											<?php
												}
											?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				
					
					<div class="col-lg-6">
						<div class="col-lg-12">
							<div class="col-lg-12">
								<div class="form-group">
									<label class="control-label">Ketikan Nama Jalan</label>
									<input class="form-control"  type="text" id="autocomplete" placeholder="Ketikan Nama Jalan">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label class="control-label">Alamat</label>
									<input class="form-control" name="jalan"  type="text" id="route" placeholder="Alamat">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label class="control-label">Kota</label>
									<input class="form-control" name="kota"  type="text" id="administrative_area_level_2" placeholder="Kota">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label class="control-label">Kode Pos</label>
									<input class="form-control"  type="text" id="postal_code" placeholder="Kode Pos">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label class="control-label">Provinsi</label>
									<input class="form-control" name="provinsi" type="text" id="administrative_area_level_1" placeholder="Provinsi">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<label class="control-label">Negara</label>
									<input class="form-control" name="negara"  type="text" id="country" placeholder="Negara">
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
							<?php echo anchor('perusahaan',' Kembali','class="btn btn-sm btn-default"');?>
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