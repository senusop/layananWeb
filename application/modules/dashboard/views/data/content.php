 <script>
    var dest;
    var directionsDisplay;

    // memanggil service Google Maps Direction
    var directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer();

    $(document).ready(function() {
        var myOptions = {
            zoom: 4,
            center: new google.maps.LatLng(-2.548926,118.0148634),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        // posisi awal ketika halaman pertama kali dimuat
        var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

        // memanggil fungsi geocoder autocomplete
        var autocomplete = new google.maps.places.Autocomplete((document.getElementById('dest')),{ types: ['geocode'] });
        
        /*  
            fungsi geolocation pada geocoder ini sangat penting
            agar pencarian daerah tujuan pada textbox ga ngaco 
        */
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,geolocation));
            });
        }

    });

    $(document).ready(function() {
        // ketika tombol cari di klik, maka proses pencarian rute dimulai
        $("#cari").click(function(){

            dest = $("#dest").val();

            var defaultLatLng = new google.maps.LatLng(-2.548926,118.0148634);

            /*  
                nah, pada fungsi geolocation disini adalah
                ketika koordinat user berhasil didapat maka peta koordinat yang digunakan
                adalah koordinat user, namun jika tidak berhasil maka koordinat yang digunakan
                adalah koordinat default (pada variable defaultLatLng)
            */
            if (navigator.geolocation) {
                function success(pos) {
                    drawMap(pos.coords.latitude,pos.coords.longitude);
                }

                function fail(error) {
                    drawMap(defaultLatLng);
                }
                
                navigator.geolocation.getCurrentPosition(success, fail, { maximumAge: 500000, enableHighAccuracy:true, timeout: 6000 });

            } else {
                drawMap(defaultLatLng);  
            }

            function drawMap(lat,lng) {

                var myOptions = {
                    zoom: 15,
                    center: new google.maps.LatLng(lat,lng),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };

                var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

                // kita bikin marker untuk asal dengan koordinat user hasil dari geolocation
                var markerorigin = new google.maps.Marker({
                    position: new google.maps.LatLng(parseFloat(lat),parseFloat(lng)),
                    map: map,
                    title: "Origin",
                    visible:false // kita ga perlu menampilkan markernya, jadi visibilitasnya kita set false
                });

                // membuat request ke Direction Service
                var request = {
                    origin: markerorigin.getPosition(), // untuk daerah asal, kita ambil posisi user
                    destination: dest, // untuk daerah tujuan, kita ambil value dari textbox tujuan
                    provideRouteAlternatives:true, // set true, karena kita ingin menampilkan rute alternatif

                    /**
                     * kamu bisa tambahkan opsi yang lain seperti
                     * avoidHighways:true (set true untuk menghindari jalan raya, set false untuk menonantifkan opsi ini)
                     * atau kamu bisa juga menambahkan opsi seperti
                     * avoidTolls:true (set true untuk menghindari jalan tol, set false untuk menonantifkan opsi ini)
                     */
                    travelMode: google.maps.TravelMode.DRIVING // set mode DRIVING (mode berkendara / kendaraan pribadi)
                    /**
                     * kamu bisa ganti dengan 
                     * google.maps.TravelMode.BICYCLING (mode bersepeda)
                     * google.maps.TravelMode.WALKING (mode berjalan)
                     * google.maps.TravelMode.TRANSIT (mode kendaraan / transportasi umum)
                     */
                };


                directionsService.route(request, function(response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                      directionsDisplay.setDirections(response); 
                    }
                });
                // menampiklkan rute pada peta dan juga direction panel sebagai petunjuk text
                directionsDisplay.setMap(map);
                directionsDisplay.setPanel(document.getElementById('directions-panel'));
                
                // menampilkan layer traffic atau lalu-lintas pada peta
                var trafficLayer = new google.maps.TrafficLayer();
                trafficLayer.setMap(map);

            }
        });
    });
    </script>

      <!-- Page Header -->
               <div class="content bg-image overflow-hidden" style="background-image: url('<?php echo base_url();?>assets/img/photos/photo3@2x.jpg');">
                    <div class="push-50-t push-15">
                        <h1 class="h2 text-white animated zoomIn"><?php echo $pageTitle;?></h1>
                        <h2 class="h5 text-white-op animated zoomIn"><?php echo $subPage;?></h2>
                    </div>
                </div>
                <!-- END Page Header -->

                <!-- Page Content -->
                <div class="content bg-white border-b">
                               <div class="row items-push text-uppercase">
                        <div class="col-xs-6 col-sm-3">
                            <div class="font-w700 text-gray-darker animated fadeIn">Pengaturan Akun</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-user"></i> <?php echo $this->session->userdata('adminUsername');?></small></div>
                            <br />
                            <a href="#" class="btn btn-xs btn-default btn-square">Setting <i class="si si-arrow-right"></i></a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <div class="font-w700 text-gray-darker animated fadeIn">Data Perusahaan</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-diamond"></i> perusahaan</small></div>
                            <br />
                            <a href="#" class="btn btn-xs btn-default btn-square">Lihat Data <i class="si si-arrow-right"></i></a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                           <div class="font-w700 text-gray-darker animated fadeIn">Anggota Prakerin</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-users"></i> Anggota</small></div>
                            <br />
                            <a href="#" class="btn btn-xs btn-default btn-square">Lihat Data <i class="si si-arrow-right"></i></a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                             <div class="font-w700 text-gray-darker animated fadeIn">Data Pembimbing</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-anchor"></i> Pembimbing</small></div>
                            <br />
                            <a href="#" class="btn btn-xs btn-default btn-square">Lihat Data <i class="si si-arrow-right"></i></a>
                        </div>
                    </div>
                </div>


                    <div class="row">
                        <div class="panel">
                           <div class="container">
                                <div class="panel-heading">
                                    <h3>Pencarian Rute Jalan</h3>
                                </div>
                                <div class="panel-body">
                                <div class="input-group">
                                    <input type="text" class="form-control input-sm" id="dest" style="width:800px;">
                                    <button class="btn btn-success btn-sm btn-square nput-group-addon" type="button" id="cari">Cari Rute</button>
                                </div>

                                      
                                        
                                        <br><br>
                                        <div id="directions-panel" style="float:right; width:48%; height:600px; overflow:auto;"></div>
                                        <div id="map-canvas" style="width:50%; height:600px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- END Page Content -->
		
        
           
