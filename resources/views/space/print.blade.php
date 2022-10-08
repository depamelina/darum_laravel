<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ asset('template/img/logo/logo2.png') }}" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/css/ruang-admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> -->
  <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Select2 -->
  <link href="{{ asset('template/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Bootstrap DatePicker -->  
  <link href="{{ asset('template/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" >
  <!-- Bootstrap Touchspin -->
  <link href="{{ asset('template/vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" >
  <!-- ClockPicker -->
  <link href="{{ asset('template/vendor/clock-picker/clockpicker.css') }}" rel="stylesheet">
  <!-- RuangAdmin CSS -->
  <link href="{{ asset('template/css/ruang-admin.min.css') }}" rel="stylesheet">
</head>
<body>
  <div id="wrapper">    
    
    {{ view('component.navbar') }}

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        {{ view('component.topbar') }} 
      
      <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h4 mb-0 text-gray-800">Export Data</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item"><a href="./">Data Perumahan</a></li>
              <li class="breadcrumb-item active" aria-current="page">Export Data</li>
            </ol>
      </div>
          
      
          <div class="row justify-content-center">
              <div class="col-md-6">
                  <div class="card mb-5">
                      <div class="card-body">
                            <div class="col-md-12 ">
                            <select class="select2-single form-control form-control-sm" name="id_city" id="select2Single">
                                @foreach ($city as $c)
                                <option value="{{ $c->id }}">{{ $c->city_name }}</option>
                                @endforeach
                                </select>
                                <!-- <div class="form-group">
                                    <label for="select2Multiple">Pilihan Kota/Kabupaten</label>
                                    <select class="select2-multiple form-control" name="states[]" multiple="multiple"
                                    id="select2Multiple">
                                    @foreach ($city as $c)
                                        <option value="{{ $c->id }}">{{ $c->city_name }}</option>
                                        @endforeach   </select>
                                </div> -->
                            </div>
                          
                                <div class="col-md-12 mt-4">
                                    <label>Pilihan Export</label><br>
                                    <div class="text-center mt-2">
                                        <a href="/exportexcel/" class="btn btn-outline-success float-end mb-2 mr-5"><i class="fas fa-print mr-1"></i>Export Excel</a>
                                        <a href="/exportexcel/" class="btn btn-outline-danger float-end mb-2"><i class="fas fa-print mr-1"></i>Export PDF</a>
                                    </div>
                                </div>
                        </div>
                  </div>
              </div> 
          </div>
          
          <!-- <div class="row justify-content-center">
              <div class="col-md-10">
                  <div class="card">
                      <div class="card-body">
                            <table class="table align-items-center table-flush table-hover" id="dataSpaces">
                              <thead class="thead-light">
                                  <tr>
                                      <th>No.</th>
                                      <th>Nama Perumahan</th>
                                      <th>Kota/Kabupaten</th>
                                      <th>Alamat</th>
                                      <th>Titik Koordinat</th>
                                  </tr>
                              <tbody></tbody>
                              </thead>
                          </table>
                          <form action="" method="get" id="deleteForm">
                              @csrf
                              <input type="submit" value="Hapus" style="display: none">
                          </form>
                      </div>
                  </div>
              </div>
          </div> -->
    
    </div>
    
    </div>

    {{ view('component.footer') }} 

  </div>
</div>

  <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Select2 -->
  <script src="{{ asset('template/vendor/select2/dist/js/select2.min.js') }}"></script>
  <!-- Bootstrap Datepicker -->
  <script src="{{ asset('template/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <!-- Bootstrap Touchspin -->
  <script src="{{ asset('template/vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js') }}"></script>
  <!-- ClockPicker -->
  <script src="{{ asset('template/vendor/clock-picker/clockpicker.js') }}"></script>
  <!-- RuangAdmin Javascript -->
  <script src="{{ asset('template/js/ruang-admin.min.js') }}"></script>
<!-- 
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('template/js/ruang-admin.min.js') }}"></script>
    <script src="{{ asset('template/vendor/select2/dist/js/select2.min.js') }}"></script> -->

    <!-- <script>
        $(function() {
            $('#dataSpaces').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                
                // Route untuk menampilkan data space
                ajax: '{{ route('space') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'id_city'
                    },
                    {
                        data: 'content'
                    },
                    {
                        data: 'location'
                    }
                ]
            })
        })
    </script> -->
<script>
     $('.select2-multiple').select2();
</script>
    <!-- <script>
        $(document).ready(function () {

        $('#dataTable').DataTable(); // ID From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script> -->

</body> 
</html>

