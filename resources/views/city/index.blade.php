<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Darum - Data Kota/Kabupaten</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/vendor/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('template/css/ruang-admin.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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
            <h1 class="h4 mb-0 text-gray-800">Kota/Kabupaten</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Kota/Kabupaten</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row justify-content-center">
            <!-- DataTable with Hover -->
            <div class="col-lg-9">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"></h6>
                </div>
                <div class="ml-4">
                  <button type="button" class="btn btn-outline-danger btn-sm mb-1" data-toggle="modal" data-target="#exampleModalCenter"
                  id="#modalCenter">Tambah</button>
                </div>
               
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr class="text-center">
                        <th>No</th>
                        <th>Nama Kota/Kabupaten</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                         $no=1;
                      @endphp

                      @foreach ($data as $d)
                      <tr class="text-center">
                        <td scope="row">{{ $no++ }}</td>
                        <td>{{ $d->city_name }}</td>
                        <td class="text-center">
                          <a href="" id="editCompany" data-toggle="modal" data-target="#ubah"
                          id="#modalCenter" data-id="{{ $d->id }}" class="btn btn-info btn-sm">
                            <i class="fas fa-pen mr-1"></i> Edit
                          </a>
                          <a href="#" class="btn btn-danger btn-sm delete" data-id="{{ $d->id }}" data-nama="{{ $d->city_name }}">
                            <i class="fas fa-trash mr-1"></i> Hapus
                          </a>    
                      </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Kota/Kabupaten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="\addcity" method="POST" enctype="multipart/form-data">
                        @csrf
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama </label>
                  <input type="text" name="city_name" class="form-control" id="exampleFormControlInput1"
                    placeholder="Masukkan nama Kota/Kabupaten">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="ubah" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Kota/Kabupaten</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form id="companydata">
              <input type="hidden" id="id" name="id" value="">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama </label>
                  <input type="text" name="city_name" id="city_name" value="" class="form-control">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
                </form>
              </div>
            </div>
          </div>
        </div>

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

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script> -->
  <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/vendor/select2/dist/js/select2.min.js') }}"></script>
  <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('template/js/ruang-admin.min.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>

$(document).ready(function () {

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  $('body').on('click', '#submit', function (event) {
    event.preventDefault()
    var id = $("#id").val();
    var city_name = $("#city_name").val();
   
    $.ajax({
      url: '/updatedata/' + id,
      type: "POST",
      data: {
        id: id,
        city_name: city_name,
      },
      dataType: 'json',
      success: function (data) {
          
          $('#companydata').trigger("reset");
          $('#ubah').modal('hide');
          window.location.reload(true);
      }
  });
});

$('body').on('click', '#editCompany', function (event) {

    event.preventDefault();
    var id = $(this).data('id');
    $.get('showcity/' + id, function (data) {
         $('#userCrudModal').html("Edit category");
         $('#ubah').modal('show');
         $('#id').val(data.data.id);
         $('#city_name').val(data.data.city_name);
     })
});

}); 
</script>

  <script>
    $('.delete').click(function () {
        var pegawaiid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');

             swal({
                    title: "Yakin?",
                    text: "Kamu akan menghapus data pegawai dengan nama " + nama + " ",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/delete/" + pegawaiid + ""
                        swal("Data berhasil dihapus", {
                        icon: "success",
                        });
                    } else {
                        swal("Data tidak terhapus");
                    }
                });
            });
</script>
  

  <script>
    $(document).ready(function () {

      // Select2 Single  with Placeholder
      $('.select2-single-placeholder').select2({
        placeholder: "Pilih Kategori",
        allowClear: true
      });   

      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

</body>

</html>