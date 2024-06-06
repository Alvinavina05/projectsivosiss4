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


<form action="/ketuaosis/simpan" method="POST" enctype="multipart/form-data">
  @csrf
	<div class="card shadow mb-4">
		<div class="card-header py-3 bg-primary">
			<h3 class="m-0 text-white">Tambah Data Ketua Osis</h3>
		</div>
		<div class="card-body">
			<div class="form row">
				<div class="form-group col-sm-6">
                <label for="formGroupExampleInput">id ketua</label>
					<input required type="number" class="mt-1 mb-3 form-control" name="id_ketua"  >
                </div>

                <div class="form-group col-sm-6">
                <label for="formGroupExampleInput">Nis</label>
				<input required type="number" class="mt-1 mb-3 form-control" name="nis" placeholder="Masukkan Nis"  >
                </div>
 
				<div class="form-group col-sm-6">
                <label for="formGroupExampleInput">Nama Lengkap</label>
				<input required type="text" class="mt-1 mb-3 form-control" name="nama_ketua" placeholder="Masukkan nama lengkap"  >
                </div>

        <div class="form-group col-sm-6">
        <label for="formGroupExampleInput text-dark">Jenis Kelamin</label>
    <select required name="jenis_kelamin" id="jenis_kelamin" class="form-select form-control mt-1 mb-3" aria-label="Default select example">
        <option value="Laki-Laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
        </div>

        <div class="form-group col-sm-6">
        <label for="formGroupExampleInput">kelas</label>
		<input required type="text" class="mt-1 mb-3 form-control" name="kelas" placeholder="Masukkan kelas"  >
         </div>

        <div class="form-group col-sm-6">
        <label for="formGroupExampleInput">nomor hp</label>
		<input type="number" required class="mt-1 mb-3 form-control" name="nomor_hp" placeholder="Masukkan Nomor Hp"  >
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
<button type="submit" class="btn dasd btn-danger"><a class="text-white" href="ketuaosis.php">Kembali</a> </button>
</div>


<br>
<br>
<br>

@endsection