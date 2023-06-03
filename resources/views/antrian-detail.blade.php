@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 card shadow p-4">
        <h3>Rekam Medis Pasien</h3>
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
          <div class="form-group">
            <label for="example-text-input" class="form-control-label">Alamat</label>
            <input class="form-control" type="text" id="example-text-input">
          </div>
          <div class="form-group">
            <label for="example-tel-input" class="form-control-label">No. Telp</label>
            <input class="form-control" type="tel" value="40-(770)-888-444" id="example-tel-input">
          </div>
          <div class="form-group">
            <label for="example-datetime-local-input" class="form-control-label">tanggal Periksa</label>
            <input class="form-control" type="datetime-local" value="2018-11-23T10:30:00"
              id="example-datetime-local-input">
          </div>
          <div class="input-group">
            <select name="poli" class="form-control mb-2">
              <option value="" disabled selected>Poli</option>
              <option value="">Semua Poli</option>
              <option value="mata">Mata</option>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Diagnosa</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="col">
            <button class="btn btn-success" type="submit">Selesai</button>
            <a href="{{ route('tables') }}" class="btn btn-danger ms-2">Hapus</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

@endsection