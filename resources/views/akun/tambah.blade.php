@extends('admin.body')
@section('konten')

<script src="/libs/jquery/dist/jquery.min.js"></script>
<script src="/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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


<form action="/akun/simpan" method="POST" enctype="multipart/form-data">
  @csrf
	<div class="card shadow mb-4">
		<div class="card-header py-3 bg-primary">
			<h3 class="m-0 text-white">Tambah Data Akun</h3>
		</div>
		<div class="card-body">
			<div class="form row">
				<div class="form-group col-sm-6">
        <label for="formGroupExampleInput2">Nis/Nip</label>
					<input  type="number" class=" mt-1 mb-3 form-control" name="nis_nip">
        </div>
				<div class="form-group col-sm-6">
        <label for="formGroupExampleInput">Nama Lengkap</label>
					<input required type="text" class="mt-1 mb-3 form-control"  name="nama_lengkap">
      </div>

        <div class="form-group col-sm-6">
        <label for="formGroupExampleInput text-dark">Jenis Kelamin</label>
    <select required name="jenis_kelamin" id="jenis_kelamin" class="form-select form-control mt-1 mb-3" aria-label="Default select example">
        <option value="Laki - Laki">Laki - Laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
        </div>

        <div class="form-group col-sm-6">
        <label for="formGroupExampleInput2 text-dark">Nama Posisi</label>
    <select required name="id_posisi" class="form-select form-control mt-1 mb-3" aria-label="Default select example">
        <option value="Admin">Admin</option>
        <option value="Murid">Murid</option>
        <option value="Guru">Guru</option>
    </select>
        </div>

        <div class="form-group col-sm-6">
        <label for="formGroupExampleInput">kelas</label>
					<input  type="text" class="mt-1 mb-3 form-control"  name="kelas"  >
          </div>

          <input required hidden type="text" class="mt-1 mb-3 form-control" Value="Belum Voting"  name="status">

        <div class="form-group col-sm-6">
        <label for="formGroupExampleInput">Pasword</label>
					<input required type="text" class="mt-1 mb-3 form-control"  name="pass">
          </div>

				<div class="dasd">
					<br>
					<button type="submit" name="submit" class="btn dasd btn-primary">Tambah Data</button>
				</div>			
      </form>
		</div>
	</div>
</div>

<div class="dasd">
<br>
<button type="submit" name="submit" class="btn dasd btn-danger"><a class="text-white" href="/akun">Kembali</a> </button>
</div>


<br>
<br>
<br>

@endsection