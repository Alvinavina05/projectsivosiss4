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


<form action="/voting/simpan" method="POST" enctype="multipart/form-data">
    @csrf
	<div class="card shadow mb-4">
		<div class="card-header py-3 bg-primary">
			<h3 class="m-0 text-white">Tambah Data Voting</h3>
		</div>
		<div class="card-body">
			<div class="form row">
				<div class="form-group col-sm-6">
                <label for="formGroupExampleInput">Siswa</label>
                <select required name="nis_nip" class="form-select form-control mt-1 mb-3" aria-label="Default select example">
                  @foreach ($akun as $p)
                <option value="{{$p->nis_nip}}">{{$p->nama_lengkap}}</option>
                @endforeach
               </select>
                
        </div>
        <div class="form-group col-sm-6">
          <label for="formGroupExampleInput">Kandidat</label>
          <select required name="id_kandidat" class="form-select form-control mt-1 mb-3" aria-label="Default select example">
            @foreach ($kandidat as $p)
                <option value="{{$p->id_kandidat}}">{{$p->id_kandidat}}</option>
                @endforeach
            </select>
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