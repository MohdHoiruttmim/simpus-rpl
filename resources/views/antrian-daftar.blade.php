@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 card shadow p-4">
        <h3>Form Pendaftaran Checkup</h3>
        <form method="POST" action="{{ route('antrian-store') }}">
          @csrf
          <div class="form-group">
            <label for="nik" class="form-control-label">NIK</label>
            <input class="form-control" type="text" id="nik" name="nik" required>
          </div>
          <div class="form-group">
            <label for="nama" class="form-control-label">Nama</label>
            <input class="form-control" type="text" id="nama" name="nama" required>
          </div>
          <div class="form-group">
            <label for="no-bpjs" class="form-control-label">No. BPJS <span class="text-danger">* jika
                ada</span></label>
            <input class="form-control" type="text" id="no-bpjs" name="no_bpjs">
          </div>
          <label for="poli" class="form-control-label">Poli</label>
          <div class="input-group">
            <select name="poli" class="form-control mb-2">
              <option value="" disabled selected>Pilih Poli</option>
              <option value="mata">Mata</option>
              <option value="kesehatan ibu anak">Kesehatan Ibu dan Anak</option>
              <option value="gigi">Gigi</option>
              <option value="umum">Umum</option>
            </select>
          </div>
          <div class="form-group">
            <label for="address" class="form-control-label">Alamat</label>
            <textarea class="form-control" id="address" name="alamat" required></textarea>
          </div>
          <label for="no-tlp">No. Telepon</label>
          <div class="input-group mb-4">
            <span class="input-group-text">+62</span>
            <input class="form-control" placeholder="834-(1234)-7853" type="text" id="no-tlp" name="no_telp" required>
          </div>
          <div class="col">
            <button class="btn btn-success" type="submit">Daftar</button>
            <a href="{{ route('antrian') }}" class="btn btn-danger ms-2">Hapus</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<script>
  /*
  window.print();
  setTimeout(function () {
    window.location.href = '{{ route("checkup-register") }}';
  }, 1000);
  */
</script>

@endsection