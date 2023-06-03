@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 card shadow p-4">
        <h3>Form Pendaftaran Checkup</h3>
        <form>
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">NIK</label>
            <input class="form-control" type="text" id="example-text-input">
          </div>
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Nama</label>
            <input class="form-control" type="text" id="example-text-input">
          </div>
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">No. BPJS <span class="text-danger">* jika
                ada</span></label>
            <input class="form-control" type="text" id="example-text-input">
          </div>
          <label for="poli" class="form-control-label">Poli</label>
          <div class="input-group">
            <select name="poli" class="form-control mb-2">
              <option value="" disabled selected>Pilih Poli</option>
              <option value="mata">Mata</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1" class="form-control-label">Alamat</label>
            <textarea class="form-control" id="exampleFormControlTextarea1"></textarea>
          </div>
          <div class="form-group">
            <label for="example-tel-input" class="form-control-label">No. Telp</label>
            <input class="form-control" type="tel" value="40-(770)-888-444" id="example-tel-input">
          </div>
          <div class="col">
            <button class="btn btn-success" type="submit">Daftar</button>
            <a href="{{ route('tables') }}" class="btn btn-danger ms-2">Hapus</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

@endsection