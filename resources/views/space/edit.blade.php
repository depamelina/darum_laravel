<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Form Advanceds</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Select2 -->
  <link href="{{ asset('template/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
  <!-- RuangAdmin CSS -->
  <link href="{{ asset('template/css/ruang-admin.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
    <style>
        #map {
            height: 500px;
        }
    </style>

<body id="page-top">
  <div id="wrapper">
  
    {{ view('component.navbar') }}

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        {{ view('component.topbar') }} 

        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Data</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./home">Home</a></li>
              <li class="breadcrumb-item"><a href="./">Data Perumahan</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-6">
              <!-- Select2 -->
              <div class="card mb-4">  
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <a href="{{ route('space.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                </div>
                <div class="card-body">       
                  <p></p>   
                <form action="{{ route('space.update',$space) }}" method="POST" enctype="multipart/form-data">   
                     @csrf  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Perumahan</label>
                    <input type="text" class="form-control form-control-sm" name="name" value="{{ $space->name }}" placeholder="Masukkan Nama Perumahan">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                      email with anyone else.</small> -->
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Foto Perumahan</label>
                    <img id="previewImage" class="mb-2" src="#" width="100%" alt="">
                    <input type="file" class="form-control" name="image" id="image">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                      email with anyone else.</small> -->
                  </div>
                  <div class="form-group">
                    <label for="select2Single">Lokasi</label>
                    <select class="select2-single form-control form-control-sm" name="lokasi" id="select2Single">
                      @foreach ($city as $c)
                        <option value="{{ $c->id }}" {{ $c->id == $space->id_city ? 'selected' : ''}} >{{ $c->city_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" class="form-control form-control-sm" name="content" value="{{ $space->content }}" placeholder="Masukkan Alamat Perumahan">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                      email with anyone else.</small> -->
                  </div>
                 
                </div>
              </div>

            </div>
            <div class="col-lg-6">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="card-body">
                  <p></p>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Titik Koordinat</label>
                    <input type="text" class="form-control form-control-sm" name="location" value="{{ $space->location }}" placeholder="Masukkan Latitude dan Longtitude">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your
                      email with anyone else.</small> -->
                  </div>
                  <div class="form-group">
                    <div id="map"></div>
                  </div>
                  <div class="form-group text-center">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
        </div>

        {{ view('component.logout') }}

        </div>  

        {{ view('component.footer') }} 
        
    </div>
</div>

    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('template/js/ruang-admin.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function() {
            readURL(this);
        });
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
            center: [{{ $space->location }}],
            zoom: 14,
            layers: [streets]
        });
        var baseLayers = {
            //"Grayscale": grayscale,
            "Streets": streets,
            "Satellite": satellite
        };
        var overlays = {
            "Streets": streets,
            "Satellite": satellite,
        };
        L.control.layers(baseLayers, overlays).addTo(map);
        var curLocation = [{{ $space->location }}];
        map.attributionControl.setPrefix(false);
        var marker = new L.marker(curLocation, {
            draggable: 'true',
        });
        map.addLayer(marker);
        marker.on('dragend', function(event) {
            var location = marker.getLatLng();
            marker.setLatLng(location, {
                draggable: 'true',
            }).bindPopup(location).update();
            $('#location').val(location.lat + "," + location.lng).keyup()
        });
        var loc = document.querySelector("[name=location]");
        map.on("click", function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
            if (!marker) {
                marker = L.marker(e.latlng).addTo(map);
            } else {
                marker.setLatLng(e.latlng);
            }
            loc.value = lat + "," + lng;
        });
    </script>

</body>
</html>