@extends('admin.body')
@section('konten')

<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="alert alert-success" role="alert" style="display: none;">Data Kandidat Telah Ditambahkan!</div>
<div class="alert hapuss alert-danger" role="alert" style="display: none;">Data Kandidat Telah Dihapus!</div>
<div class="alert updatee alert-success" role="alert" style="display: none;">Data Kandidat Telah Diperbarui!</div>


<script>
    $(document).ready(function() {
        // Tangkap parameter alert dari URL dan tampilkan alert jika ada
        var urlParams = new URLSearchParams(window.location.search);
        var alertParam = urlParams.get('alert');
        if (alertParam === 'success') {
            $('.alert').fadeIn().delay(5000).fadeOut(); // Tampilkan alert, kemudian hilangkan setelah 5 detik
        }
    });

    $(document).ready(function() {
        // Tangkap parameter alert dari URL dan tampilkan alert jika ada
        var urlParams = new URLSearchParams(window.location.search);
        var alertParam = urlParams.get('update');
        if (alertParam === 'berhasil') {
            $('.updatee').fadeIn().delay(5000).fadeOut(); // Tampilkan alert, kemudian hilangkan setelah 5 detik
        }
    });

    $(document).ready(function() {
        // Tangkap parameter alert dari URL dan tampilkan alert jika ada
        var urlParams = new URLSearchParams(window.location.search);
        var alertParam = urlParams.get('hapus');
        if (alertParam === 'berhasil') {
            $('.hapuss').fadeIn().delay(5000).fadeOut(); // Tampilkan alert, kemudian hilangkan setelah 5 detik
        }
    });
</script>

<a href="/kandidat/tambah" type="button" class="btn btn-primary fw-bold text-white mb-5">Tambah Data</a>

<div class="row">
    @foreach ($kandidat as $p)
        <div class="col-lg-4 col-md-12">
            <div class="card" style="border-radius: 15px 0px 5px 5px;">
                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                    <img src="{{$p->gambar}}" style="border-radius: 15px 0px 15px 0px;" class="w-100 h-70" data-mdb-img="{{$p->gambar}}" />
                    <div class="d-flex justify-content-start align-items-end h-100">
                        <span class="badge bg-dark">Kandidat Ke  {{$p->id_kandidat}}</span>
                    </div>
                </div>
                <div class="card-body text-center">
                    <h3 class="card-title text-dark">{{ $p->nama_ketua }}</h3>
                    <h5 class="card-title text-dark">{{ $p->nama_wakil }}</h5>
                    <br>
                    <div class="d-flex justify-content-center align-items-center">
                        
                        <button data-toggle="modal" data-target="#visi{{$p->id_kandidat}}" class="btn font-bold btkan btn-success me-1">Visi & Misi</button>
                        <a href="/kandidat/edit/{{$p->id_kandidat}}" class="btn btn-primary text-white m-2"><i class="svg-icon" data-feather="edit"></i></a>
                        {{-- <a href="/kandidat/edit/{{$p->id_kandidat}}" class="btn btn-primary me-3">Edit </a> --}}
                        <a type="button" data-toggle="modal" data-target="#hapus{{$p->id_kandidat}}" class="btn btn-danger"><i class="svg-icon" data-feather="trash-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@foreach ($kandidat as $p)
<div class="modal fade" id="visi{{$p->id_kandidat}}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h3 class="modal-title text-white" id="exampleModalLabel3">Detail Visi & Misi</h3>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex align-items-start align-items-sm-center mb-3 gap-1">
                    <img src="{{$p->gambar}}" style="width:150px; height:150px; border-radius:10px;" alt="user-avatar" class="d-block me-3" />
                    <div class="d-flex flex-column justify-content-center">
                        <h3 class="card-title text-dark mb-2"><span class="font-bold">Ketua: </span>{{$p->nama_ketua}}</h3>
                        <h4 class="card-title text-dark mb-0"><span class="font-bold">Wakil: </span>{{$p->nama_wakil}}</h4>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h3 class="text-center p-3 fw-bold mb-3 card-title">Visi</h3>
                        <ul class="list-group">
                            <li class="list-group-item disabled">{{$p->visi}}</li>
                          </ul>
                        {{-- <h4>{{$p->visi}}</h4> --}}
                    </div>
                    <div class="col-12 col-md-6">
                        <h3 class="text-center p-3 fw-bold mb-3 card-title">Misi</h3>
                        <ul class="list-group">
                            <li class="list-group-item disabled">{{$p->misi}}</li>
                          </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($kandidat as $p)
<div class="modal fade" id="hapus{{$p->id_kandidat}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Apakah kamu ingin menghapus data ini? {{$p->nama_ketua}}</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="/kandidat/hapus/{{$p->id_kandidat}}" class="btn btn-primary">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection
