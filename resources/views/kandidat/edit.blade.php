@extends('admin.body')
@section('konten')

<?php
$queryy = DB::select("SELECT nama_ketua FROM `tb_ketuaosis` WHERE id_ketua = ?", [$main->id_ketua]);
$ketua = ""; // Inisialisasi variabel ketua

if (!empty($queryy)) {
    $ketua = $queryy[0]->nama_ketua;
}


$queryt = DB::select("SELECT nama_wakil FROM `tb_wakilosis` WHERE id_wakil = ?", [$main->id_wakil]);
$wakil = ""; // Inisialisasi variabel ketua

if (!empty($queryt)) {
    $wakil = $queryt[0]->nama_wakil;
}
?>

<form action="/kandidat/update/{{$main->id_kandidat}}" method="POST" enctype="multipart/form-data">
  @csrf
	<div class="card shadow mb-4">
		<div class="card-header py-3 bg-primary">
			<h3 class="m-0 text-white">Edit Data Kandidat</h3>
		</div>
		<div class="card-body">
			<div class="form row">
				<div class="form-group ">
        <label for="formGroupExampleInput2">Id Kandidat</label>
					<input  type="number" class=" mt-1 mb-3 form-control" name="id_kandidat" readonly value="{{$main->id_kandidat}}">
        </div>
        
				<div class="form-group col-sm-6">
                <label for="formGroupExampleInput">Id Ketua</label>
                <select required name="id_ketua" class="form-select form-control mt-1 mb-3" aria-label="Default select example">
                <option value="{{$main->id_ketua}}">{{ $ketua }}</option>
                @foreach ($allketua as $p)
                <option value="{{$p->id_ketua}}">{{$p->nama_ketua}}</option>
                @endforeach
                 </select>
                        </div>

                        <div class="form-group col-sm-6">
                <label for="formGroupExampleInput">Id Wakil</label>
                <select required name="id_wakil" name="id_wakil" class="form-select form-control mt-1 mb-3" aria-label="Default select example">
                <option value="{{$main->id_wakil}}">{{ $wakil }}</option>
                @foreach ($allwakil as $p)
                <option value="{{$p->id_wakil}}">{{$p->nama_wakil}}</option>
                @endforeach
                                </select>
                        </div>


        <div class="form-group col-sm-6">
        <label for="formGroupExampleInput text-dark">Visi</label>
        <textarea class="form-control" name="visi" rows="5" placeholder="1. Enter item 1&#10;2. Enter item 2&#10;3. ...">{{$main->visi}}</textarea>
        </div>

        <div class="form-group col-sm-6">
        <label for="formGroupExampleInput text-dark">Misi</label>
        <textarea class="form-control" name="misi" rows="5" placeholder="1. Enter item 1&#10;2. Enter item 2&#10;3. ...">{{$main->misi}}</textarea>
        </div>

        <div class="form-group mt-3 mb-2">
          <label for="formGroupExampleInput mt-1 mb-3 text-dark">Gambar</label>
          <input type="file" class="form-control" name="gambar" placeholder=""></input> 
          </div>

				<div class="dasd text-end">
					<br>
					<button type="submit" name="submit" class="btn dasd btn-primary">Edit Data</button>
				</div>			
      </form>
		</div>
	</div>
</div>

<div class="dasd text-end">
<br>
<button type="submit" name="submit" class="btn dasd btn-danger"><a class="text-white" href="/kandidat">Kembali</a> </button>
</div>


<br>
<br>
<br>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>



@endsection
