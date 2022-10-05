<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{ asset('template/img/logo/logo2.png') }}" rel="icon">
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
            <h1 class="h3 mb-0 text-gray-800">Tambah Titik Koordinat Peta</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./home">Home</a></li>
              <li class="breadcrumb-item"><a href="./">Data Perumahan</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Titik Koordinat Peta</li>
            </ol>
        </div>

    <div class="container mb-3">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card rounded">
                    <div class="card-header"> <a href="/centre-point" class="btn btn-sm btn-outline-primary">Kembali</a></div>
                    <div class="card-body">
                        <form action="{{ route('centre-point.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="">Lokasi</label>
                                <input type="text" name="location"
                                    class="form-control @error('location') is-invalid @enderror" readonly id="">
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div id="map"></div>
                            <div class="form-group mt-4 text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{ view('component.logout') }} 
    </div>

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
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    <script>
        // Menambah attribut pada leaflet
        var mbAttr = 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            mbUrl =
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

        // membuat beberapa layer untuk tampilan map diantaranya satelit, dark mode, street
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

        // Membuat var map untuk instance object map ke dalam tag div yang mempunyai id map
        // menambahkan titik koordinat latitude dan longitude peta indonesia kedalam opsi center
        // mengatur zoom map dan mengatur layer yang akan digunakan  
        var map = L.map('map', {
            center: [-0.789275,113.921327],
            zoom: 5,
            layers: [streets]
        });

        var baseLayers = {
            //"Grayscale": grayscale,
            "Streets": streets,
            "Satellite" : satellite
        };

        var overlays = {
            "Streets": streets,
            "Satellite": satellite,
        };

        //Menambahkan beberapa layer ke dalam peta/map
        L.control.layers(baseLayers, overlays).addTo(map);

        // set current location / lokasi sekarang dengan koordinat peta indonesia
        var curLocation = [-0.789275,113.921327];
        map.attributionControl.setPrefix(false);

        // set marker map agar bisa di geser
        var marker = new L.marker(curLocation, {
            draggable: 'true',
        });
        map.addLayer(marker);

        // ketika marker di geser kita akan mengambil nilai latitude dan longitude
        // kemudian memasukkan nilai tersebut ke dalam properti input text dengan name-nya location
        marker.on('dragend', function(event) {
            var location = marker.getLatLng();
            marker.setLatLng(location, {
                draggable: 'true',
            }).bindPopup(location).update();

            $('#location').val(location.lat + "," + location.lng).keyup()
        });

        // untuk fungsi di bawah akan mengambil nilai latitude dan longitudenya
        // dengan cara klik lokasi pada map dan secara otomatis marker juga akan ikut bergeser dan nilai
        // latitude dan longitudenya akan muncul pada input text location
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