@extends('admin.body')
@section('konten')

<style>
  .form-control{
    border-radius:7px;
  }
  .ff{
    float:left;
  }
  .btn{
    border-radius:5px;

  }
  .dasd{
    float:right;
  }
</style>


<form action="/ketuaosis/update/{{$main->id_ketua}}" method="POST" enctype="multipart/form-data">
  @csrf
	<div class="card shadow mb-4">
		<div class="card-header py-3 bg-primary">
			<h3 class="m-0 text-white">Edit Data Ketua Osis</h3>
		</div>
		<div class="card-body">
			<div class="form row">
				<div class="form-group col-sm-6">
                <label for="formGroupExampleInput2">Id Ketua</label>
					<input  type="number" class=" mt-1 mb-3 form-control" name="id_ketua" value="{{$main->id_ketua}}" id_ketua="id_ketua" readonly>
          </div>

          <div class="form-group col-sm-6">
            <label for="formGroupExampleInput">Nis</label>
            <input required type="number" class="mt-1 mb-3 form-control"  name="nis" value="{{$main->nis}}" nis="nis">
            </div>

				<div class="form-group col-sm-6">
                <label for="formGroupExampleInput">Nama Lengkap</label>
				<input required type="text" class="mt-1 mb-3 form-control"  name="nama_ketua" value="{{$main->nama_ketua}}" nama_ketua="nama_ketua">
                </div>

        <div class="form-group col-sm-6">
        <label for="formGroupExampleInput2 text-dark">Jenis Kelamin</label>
    <select required name="jenis_kelamin" id="jenis_kelamin" class="form-select mt-1 mb-3" aria-label="Default select example">
        <option selected value="{{$main->jenis_kelamin}}">{{$main->jenis_kelamin}}</option>
        <option value="Laki - Laki">Laki - Laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
    </div>

        <div class="form-group col-sm-6">
        <label for="formGroupExampleInput">Kelas</label>
		<input required type="text" class="mt-1 mb-3 form-control"  name="kelas" value="{{$main->kelas}}" kelas="kelas">
         </div>

        <div class="form-group col-sm-6">
        <label for="formGroupExampleInput">Nomor Hp</label>
		<input required type="number" class="mt-1 mb-3 form-control"  name="nomor_hp" value="{{$main->nomor_hp}}" nomor_hp="nomor_hp">
        </div>

				<div class="dasd">
					<br>
					<button type="submit" name="submit" class="btn dasd btn-primary">Edit Data</button>
				</div>			
      </form>
		</div>
	</div>
</div>

<div class="dasd">
<br>
<button type="submit" class="btn dasd btn-danger"><a class="text-white" href="/ketuaosis">Kembali</a> </button>
</div>


<br>
<br>
<br>

@endsection