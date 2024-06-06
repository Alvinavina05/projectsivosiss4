@extends('admin.body')
@section('konten')

<style>
    a{

    }
    .btn-success{
        padding:5px 7px 5px 7px;
        /* width:10px; */
    }
    .btn-danger{
        padding:5px 7px 5px 7px;
    }
</style>

<a href="/ketuaosis/tambah" type="button" class="btn btn-primary mb-4">Tambah data</a>

<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Data Ketua Osis</h2>
                                <br>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                        <thead class="bg-dark text-white">
                                            <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Id Ketua</th>
                                        <th scope="col">Nis</th>
                                        <th scope="col">Nama Lengkap</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">No Hp</th>
                                        <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            
                                        @foreach ($allketua as $p)
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$p->id_ketua}}</td>
                                        <td>{{$p->nis}}</td>
                                        <td>{{$p->nama_ketua}}</td>
                                        <td>{{$p->jenis_kelamin}}</td>
                                        <td>{{$p->kelas}}</td>
                                        <td>{{$p->nomor_hp}}</td>
                                                <td>
                                                <a href="/ketuaosis/edit/{{$p->id_ketua}}" class="btn btn-success text-white"><i class="svg-icon" data-feather="edit"></i></a>
                                                <span style="padding: 0 0 10px 0"></span>
                                                <a type="button" class="btn btn-danger text-white" data-toggle="modal" data-target="#hapus{{$p->id_ketua}}">
                                                <i class="svg-icon" data-feather="trash-2"></i>
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
                </div>

       
      {{-- <!-- Modal -->
      <div class="modal fade" id="hapus" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Apakah kamu ingin menghapus nama   </h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div> --}}

@foreach ($allketua as $p)
<!-- Modal -->
<div class="modal fade" id="hapus{{$p->id_ketua}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
  <h4>apakah kamu ingin menghapus data {{$p->nama_ketua}}</h4>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <a href="/ketuaosis/hapus/{{$p->id_ketua}}" class="btn btn-primary">Hapus</a>
</div>
</div>
</div>
</div>

@endforeach


<link rel="stylesheet" href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 
    <!--This page plugins -->
    <script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <script src="../assets/dist/js/pages/datatable/datatable-basic.init.js"></script>


    @endsection