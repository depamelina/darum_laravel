<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('template/img/logo/logo2.png') }}" rel="icon">
  <title>Darum Telkom</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js" integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.1/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js" integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s=" crossorigin=""></script>
  <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/css/ruang-admin.min.css') }}" rel="stylesheet">
  
  <style>
    #mapContainer { width:100%;height:350px;position:relative; }
    #map-containerDiv { position:absolute;top:0;left:0;right:0;bottom:0;z-index:0; }
    #map { height: 100%; width: 100%; }
    #mapOptions { width:23.84%;position:absolute;top:0;left:-23.84%;bottom:0;z-index:1;box-shadow:-2px 0 5px rgba(0,0,0,0.1);z-index:99 }

    .tabbable-panel { border-left:1px solid #5cffff; }
    .tabbable-panel .tab { width:1px;height:1px;position:absolute;top:20px;left:-31px;-ms-transform:rotate(-90deg);-moz-transform:rotate(-90deg);-webkit-transform:rotate(-90deg);transform:rotate(-90deg);-ms-transform-origin:bottom right;-moz-transform-origin:bottom right;-webkit-transform-origin:bottom right;transform-origin:bottom right; }
    .tabbable-panel .tab a { height:30px;padding:0 15px;border:1px Solid #5cffff;border-bottom:0;border-radius:10px 10px 0 0;text-decoration:none;line-height:30px;float:right;white-space:nowrap;outline:none; }
    .tabbable-panel .tab a:hover { color:white;background:#24ccda; }
    .tabbable-panel .tab a:focus { color:white; }
    .tabbable-panel .content { padding:20px;position:absolute;top:0;left:0;right:0;bottom:0;overflow:auto; }
    .tabbable-panel.tab-right { border-left:none;border-right:1px solid #5cffff; }
    .tabbable-panel.tab-right .tab { left:auto;right:-31px;-ms-transform:rotate(90deg);-moz-transform:rotate(90deg);-webkit-transform:rotate(90deg);transform:rotate(90deg);-ms-transform-origin:bottom left;-moz-transform-origin:bottom left;-webkit-transform-origin:bottom left;transform-origin:bottom left; }
    .tabbable-panel.tab-right .tab a { float:left; }
    .tabbable-panel,.tabbable-target { -ms-transition:all 0.5s ease-in-out;-moz-transition:all 0.5s ease-in-out;-webkit-transition:all 0.5s ease-in-out;transition:all 0.5s ease-in-out; }


  #mapContainer.options-open #map-containerDiv { left:23.84%; }
  #mapContainer.options-open #mapOptions { left:0; }
</style>

</head>
<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    {{ view('component.navbar') }}
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        {{ view('component.topbar') }}
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total di Kota Banjar</div>
                      <div class="h5 mb-0 font-weight-bold text-primary"> {{ $b }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="mr-2"></i>unit</span>
                        <span>perumahan</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-building-wheat fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total di Kab. Ciamis</div>
                      <div class="h5 mb-0 font-weight-bold text-success"> {{ $c }} </div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="mr-2">unit</span>
                        <span>perumahan</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-mountain-city fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total di Pangandaran</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-info">{{ $p }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="mr-2">unit</span>
                        <span>perumahan</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-tree-city fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total di Kuningan</div>
                      <div class="h5 mb-0 font-weight-bold text-warning">{{ $k }}</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="mr-2">unit</span>
                        <span>perumahan</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-city fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-12 col-lg-7">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Peta Lokasi Perumahan</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                      aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div id="mapContainer">
                  <div id="map-containerDiv" class="tabbable-target">
                      <div id="map"></div>
                  </div>
                </div>
                </div>
              </div>
            </div>
            </div>
          <!--Row-->
        
          <!-- Modal Logout -->
          {{ view('component.logout') }}

        </div>
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      {{ view('component.footer') }} 
      <!-- Footer -->
    </div>
  </div>

  <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('template/js/ruang-admin.min.js') }}"></script>
  <script src="{{ asset('template/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('template/js/demo/chart-area-demo.js') }}"></script>  


  <script>   
        var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            mbUrl =
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
        var satellite = L.tileLayer(mbUrl, {
                id: 'mapbox/satellite-v9',
                tileSize: 512,
                zoomOffset: -1,
                attribution: mbAttr
            }),
            dark = L.tileLayer(mbUrl, {
                id: 'mapbox/dark-v10',
                tileSize: 512,
                zoomOffset: -1,
                attribution: mbAttr
            }),
            streets = L.tileLayer(mbUrl, {
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                attribution: mbAttr
            });
        var map = L.map('map', {
                       
            center: [{{ $centrePoint->location }}],
            zoom: 9,
            layers: [streets]
        });
        var baseLayers = {
            "Grayscale": dark,
            "Satellite": satellite,
            "Streets": streets
        };
        var overlays = {
            "Streets": streets,
            "Grayscale": dark,
            "Satellite": satellite,
        };
        // Menampilkan popup data ketika marker di klik 
        @foreach ($spaces as $item)
            L.marker([{{ $item->location }}])
                .bindPopup(
                    "<div class='my-2'><img src='{{ asset('/uploads/imgCover/' . $item->image) }}' class='img-fluid' width='100px'></div>" +
                    "<div class='my-2'><strong>Nama Space:</strong> <br>{{ $item->name }}</div>" + 
                    "<div><a href='{{ route('map.show', $item->slug) }}' class='btn btn-outline-primary btn-sm'>Detail Space</a></div>" +
                    "<div class='my-2'></div>"
                ).addTo(map);
        @endforeach
    
        var datas = [    
        @foreach ($spaces as $key => $value) 
            {"loc":[{{$value->location }}], "title": '{!! $value->name !!}'},
        @endforeach            
        ];
        // pada koding ini kita menambahkan control pencarian data        
        var markersLayer = new L.LayerGroup();
        map.addLayer(markersLayer);
        var controlSearch = new L.Control.Search({
            position:'topleft',
            layer: markersLayer,
            initial: false,
            zoom: 17,
            markerLocation: true
        })
    
    //menambahkan variabel controlsearch pada addControl
       map.addControl( controlSearch );
        // looping variabel datas utuk menampilkan data space ketika melakukan pencarian data
        for(i in datas) {
          
            var title = datas[i].title,	
                loc = datas[i].loc,		
                marker = new L.Marker(new L.latLng(loc), {title: title} );
            markersLayer.addLayer(marker);
            // melakukan looping data untuk memunculkan popup dari space yang dipilih
            @foreach ($spaces as $item)
            L.marker([{{ $item->location }}]
                )
                .bindPopup(
                    "<div class='my-2'><img src='{{ asset('/uploads/imgCover/' . $item->image) }}' class='img-fluid' width='700px'></div>" +
                    "<div class='my-2'><strong>Nama Spot:</strong> <br>{{ $item->name }}</div>" +
                    "<a href='{{ route('map.show', $item->slug) }}' class='btn btn-outline-info btn-sm'>Detail Spot</a></div>" +
                    "<div class='my-2'></div>"
                ).addTo(map);
            @endforeach
        }
        L.control.layers(baseLayers, overlays).addTo(map);
    </script>

 
  </body>
</html>

