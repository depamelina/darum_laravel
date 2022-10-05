<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{ asset('template/img/logo/logo2.png') }}" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('template/css/ruang-admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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
            <h1 class="h4 mb-0 text-gray-800">Data Perumahan</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Perumahan</li>
            </ol>
      </div>
          
      
          <div class="row justify-content-center">
              <div class="col-md-11">
                  <div class="card mb-5">
                      <div class="card-body">
                          <a href="/exportexcel/" class="btn btn-outline-success float-end mb-2"><i class="fas fa-print mr-1"></i>Export</a>
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
          </div>
    

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
    <script>
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
    </script>

    <script>
        $(document).ready(function () {

        $('#dataTable').DataTable(); // ID From dataTable 
        $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>

</body> 
</html>

