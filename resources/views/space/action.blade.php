
<?php
use App\Models\Space;
$spaces = Space::get();
?>
<a href="{{ route('space.edit', $id) }}" class="btn btn-info btn-sm"><i class="fas fa-pen mr-1 pl-1"></i></a>

<!-- @foreach ($spaces as $item)@endforeach
<a href="{{ route('map.show', $item->slug) }}" class="btn btn-warning btn-sm"><i class="fas fa-eye mr-1 pl-1"></i></a> -->


<button href="{{ route('space.destroy',$model) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash mr-1 pl-1"></i></button>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
    $('button#delete').on('click',function(e){
        e.preventDefault();
        var href = $(this).attr('href');
            Swal.fire({
            title: 'Yakin?',
            text: "Apakah yakin akan menghapus data ini?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor:'#d33',
            cancelButtonColor: '#A9A9A9',
            confirmButtonText: 'Hapus',
            cancelButtonText : 'Batal'
            }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').action = href;
                document.getElementById('deleteForm').submit();
                Swal.fire(
                'Terhapus!',
                'Data sudah terhapus.',
                'success'
                )
            }
            })
        });
</script>
