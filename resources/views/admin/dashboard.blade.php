@extends('admin.body')

@section('konten')
@php
$data = DB::select("
    SELECT 
    tb_ketuaosis.nama_ketua AS nama_pasangan,
    COUNT(tb_voting.nis_nip) AS total_vote
FROM 
    tb_kandidat
JOIN 
    tb_ketuaosis ON tb_kandidat.id_ketua = tb_ketuaosis.id_ketua
LEFT JOIN 
    tb_voting ON tb_kandidat.id_kandidat = tb_voting.id_kandidat
GROUP BY 
    tb_ketuaosis.nama_ketua
ORDER BY 
    total_vote DESC
");
@endphp


<?php $jmlh_akun = 0 ?>
@foreach ($t_akun as $item)
    <?php $jmlh_akun = $jmlh_akun + 1 ?>
@endforeach

<?php $jmlh_kandidat = 0 ?>
@foreach ($t_kandidat as $item)
    <?php $jmlh_kandidat = $jmlh_kandidat + 1 ?>
@endforeach

<?php $jmlh_voting = 0 ?>
@foreach ($t_voting as $item)
    <?php $jmlh_voting = $jmlh_voting + 1 ?>
@endforeach

<?php $jmlh_belumvote = 0 ?>
@foreach ($t_akunvote as $item)
    <?php $jmlh_belumvote = $jmlh_belumvote + 1 ?>
@endforeach


<div class="row">
    <div class="col-7 align-self-center">
        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning {{ session('nama_lengkap') }}</h3>
    </div>
    <div class="col-5 align-self-center">
        <div class="customize-input float-end">
        </div>
    </div>
</div>

<br>


<style>
    /* Mengecilkan gambar dalam carousel */
    #carouselExample .carousel-item img {
        max-height: 400px; /* Atur tinggi maksimum gambar */
        width: auto; /* Biarkan lebar gambar menyesuaikan proporsi */
        border-radius: 10px;
    }
</style>


<div id="carouselExample" class="carousel slide mt-2" >
<div class="carousel-inner">
<div class="carousel-item active">
<img src="{{ asset('gambardashboard/vosisbiru.png') }}" class="d-block w-100" alt="...">
</div>
<div class="carousel-item">
<img src="https://cdn-sekolah.annibuku.com/20521778/3.jpg" class="d-block w-100" alt="...">
</div>
<div class="carousel-item">
<img src="https://cdn-sekolah.annibuku.com/20521778/1.jpg" class="d-block w-100" alt="...">
</div>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="visually-hidden">Previous</span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Next</span>
</button>
</div>
 <br>
 <br>

<div class="row">
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Rata - Rata Voting</h4>
                <div id="campaign-v2" class="mt-2" style="height: 283px; width: 100%;"></div>
                <ul class="list-style-none mb-3 mt-4">
                    @foreach ($data as $pasangan)
                    <li>
                        <i class="fas fa-circle text-info font-10 me-2"></i>
                        <span class="text-dark">{{ $pasangan->nama_pasangan }}</span>
                        <span class="text-dark float-end font-weight-medium">{{ $pasangan->total_vote }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="row">
            <div class="col-sm-6 col-lg-6">
                <div class="card border-end">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{$jmlh_akun}}</h2>
                                    {{-- <span class="badge bg-primary font-12 text-white font-weight-medium rounded-pill ms-2 d-lg-block d-md-none">+18.33%</span> --}}
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Data Akun</h6>
                            
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="user-plus"></i> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 font-weight-medium">{{$jmlh_kandidat}}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Kandidat</h6>
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="users"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-6">
                <div class="card border-end">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{$jmlh_voting}}</h2>
                                    {{-- <span class="badge bg-success font-12 text-white font-weight-medium rounded-pill ms-2 d-md-none d-lg-block">-18.33%</span> --}}
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Vote</h6>
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="archive"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-6">
                <div class="card border-end">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{$jmlh_belumvote}}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Belum Vote</h6>
                            </div>
                            <div class="ms-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="user-x"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<script>
    window.onload = function() {
        $(function () {
            c3.generate({
                bindto: "#campaign-v2",
                data: {
                    columns: [
                        @foreach ($data as $pasangan)
                            ['{{ $pasangan->nama_pasangan }}', {{ $pasangan->total_vote }}],
                        @endforeach
                    ],
                    type: "donut",
                    tooltip: { show: true }
                },
                donut: {
                    label: { show: false },
                    title: "Data",
                    width: 18
                },
                legend: { show: true },
                color: {
                    pattern: ["#EA4198", "#5f76e8", "#62EA41", "#41EAD8"]
                }
            });
        });
    };
    </script>
    

<link rel="stylesheet" href="{{ asset('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css') }}">
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>

@endsection