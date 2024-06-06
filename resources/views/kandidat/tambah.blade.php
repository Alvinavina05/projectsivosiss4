@extends('admin.body')
@section('konten')

<?php
$query = DB::select("SELECT * FROM tb_kandidat");
$lastCode = "KL0000";

if ($query) {
    $lastCode = $query[count($query) - 1]->id_kandidat;
}

$newNumber = $lastCode + 1;

if ($newNumber < 10) {
    $newCode = $newNumber;
} elseif ($newNumber < 100) {
    $newCode = $newNumber;
} else {
    $newCode = $newNumber;
}

?>


<form  method="POST" action="/kandidat/simpan" enctype="multipart/form-data">
  @csrf

	<div class="card shadow mb-4">
		<div class="card-header py-3 bg-primary">
			<h3 class="m-0 text-white">Tambah Data Kandidat</h3>
		</div>
		<div class="card-body">
			<div class="form row">
				<div class="form-group ">
        <label for="formGroupExampleInput2">Id Kandidat</label>
					<input  type="number" class=" mt-1 mb-3 form-control" name="id_kandidat" readonly value="{{ $newCode }}">
        </div>
        
				<div class="form-group col-sm-6">
                <label for="formGroupExampleInput">Ketua</label>
                <select required name="id_ketua" class="form-select form-control mt-1 mb-3" aria-label="Default select example">
                                
                                 @foreach ($ketua as $p)
                                 <option value="{{$p->id_ketua}}">{{$p->nama_ketua}}</option>
                                 @endforeach
                                </select>
                        </div>

                        <div class="form-group col-sm-6">
                <label for="formGroupExampleInput">Wakil</label>
                <select required name="id_wakil" class="form-select form-control mt-1 mb-3" aria-label="Default select example">
                  @foreach ($wakil as $p)
                  <option value="{{$p->id_wakil}}">{{$p->nama_wakil}}</option>
                  @endforeach
                   </select>
                        </div>


        <div class="form-group col-sm-6">
        <label for="formGroupExampleInput text-dark">Visi</label>
        <textarea class="form-control" name="visi" rows="5" placeholder="1. Enter item 1&#10;2. Enter item 2&#10;3. ..."></textarea>
        </div>

        <div class="form-group col-sm-6">
        <label for="formGroupExampleInput text-dark">Misi</label>
        <textarea class="form-control" name="misi" rows="5" placeholder="1. Enter item 1&#10;2. Enter item 2&#10;3. ..."></textarea>
        </div>

        <div class="form-group mt-3 mb-2">
        <label for="formGroupExampleInput mt-1 mb-3 text-dark">Gambar</label>
        <input type="file" class="form-control" name="gambar" placeholder=""></input> 
        </div>

				<div class="dasd text-end">
					<br>
					<button type="submit" name="submit" class="btn dasd btn-primary">Tambah Data</button>
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