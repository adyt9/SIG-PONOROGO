                <?php foreach($data_ as $row): ?>
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img style="object-fit:cover;object-position:center;" width="100%" alt="user" src="<?= base_url('image/').$row->id_gambar; ?>">
                                <div class="">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="../plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white"></h4>
                                        <?php 


                                        ?>
                                        <h5 class="text-white"></h5> </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <div class="col-md-12 col-sm-12 text-center">
                                    <p class="text-danger"><i class="ti-map"></i></p>
                                    <h3>Wisata <?= $row->nama_wisata; ?></h3> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <h3><b>Peta</b></h3><hr/>
                            <div id="map" style="height:300px;" class="col-md-12 col-sm-12 col-lg-12"></div>
                            <h3><b>Deskripsi</b></h3><hr/>
                            <p><?= $row->deskripsi;?></p>
                            <h3><b>Fasilitas</b></h3><hr/>
                            <p><?= $row->id_fasilitas;?></p>
                            <h3><b>Alamat</b></h3><hr/>
                            <p><?= $row->alamat_wisata;?></p>
                            <input type="hidden" id="lat" value="<?= $row->latitude;?>">
                            <input type="hidden" id="lng" value="<?= $row->longitude;?>">        
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <?php endforeach; ?>
                <script>
                    mapboxgl.accessToken = 'pk.eyJ1IjoiZWZoYWwiLCJhIjoiY2ptOXRiZ3k2MDh4bzNrbnljMjk5Z2d5aSJ9.8dSNgeAjpdTlZ3x-b2vsog';
                    var map = new mapboxgl.Map({
                        container: 'map', // container id
                        style: 'mapbox://styles/mapbox/streets-v9', // stylesheet location
                        center: [118.7235608,-8.4547702], // starting position [lng, lat]
                        zoom: 13 // starting zoom
                    });
                    var lng = $("#lng").val();
                    var lat = $("#lat").val();
                    var marker = new mapboxgl.Marker({}).setLngLat([lng,lat]).addTo(map);
                    /*load the css files  */
                    
                    /*load the css files  */
                    </script>