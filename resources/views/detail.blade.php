<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />

    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/css/ruang-admin.min.css') }}" rel="stylesheet">
  

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }
        .leaflet-container {
            height: 400px;
            width: 600px;
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        
        {{ view('component.navbar') }}
        
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">

                {{ view('component.topbar') }}

                    <div class="container-fluid" id="container-wrapper">
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Detail Tempat</h1>
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                            </ol>
                        </div>
    
                        <div class="container py-4 justify-content-center">
                            <div class="row">
                                <div class="col-md-6 col-xs-6 mb-2">
                                    <div class="card">
                                    <div class="card-header">
                                        <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="form group mb-2">
                                            <label for="">Nama Tempat</label>
                                            <input type="text" value="{{ $spaces->name }}" class="form-control" readonly>
                                        </div>
                                        <div class="form group mb-2">
                                            <label for="">Alamat</label>
                                            <input type="text" value="{{ $spaces->content }}" class="form-control" readonly>
                                        </div>
                                        <div class="form group mb-3">
                                            <label for="">Foto</label><br>
                                            <img class="img-fluid" width="400" src="{{ asset('uploads/imgCover/' . $spaces->image) }}" alt="">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form group mb-2">
                                                <label for="">Titik Koordinat</label>
                                                <input type="text"  value="{{ $spaces->location }}" class="form-control" readonly>
                                            </div>
                                            <div class="form group mb-2">
                                                <div id="map"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{ view('component.logout') }}
                        </div>
                    </div>

                </div>
                {{ view('component.footer') }} 
            </div>

    </div>
  
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('template/js/ruang-admin.min.js') }}"></script>
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
        var data{{ $spaces->id }} = L.layerGroup()
        var map = L.map('map', {
            center: [{{ $spaces->location }}],
            zoom: 20,
            fullscreenControl: {
                pseudoFullscreen: false
            },
            layers: [streets, data{{ $spaces->id }}]
        });
        var baseLayers = {
            "Streets": streets,
            "Satellite": satellite,
            "Dark": dark,
        };
        var overlays = {
            //"Streets": streets
            "{{ $spaces->name }}": data{{ $spaces->id }},
        };
        L.control.layers(baseLayers, overlays).addTo(map);
        var curLocation = [{{ $spaces->location }}];
        map.attributionControl.setPrefix(false);
        var marker = new L.marker(curLocation, {
            draggable: 'false',
        });
        map.addLayer(marker);
    </script>
</body>

</html>
