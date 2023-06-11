@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 card shadow p-4">
        <h3>Form Pendaftaran Checkup</h3>
        <form method="POST" action="{{ route('checkup-history-store', $antrian->id) }}">
          @csrf
          <div class="form-group">
            <label for="nik" class="form-control-label">NIK</label>
            <input class="form-control" type="text" id="nik" name="nik" value="{{ $antrian->nik }}" required>
          </div>
          <div class="form-group">
            <label for="nama" class="form-control-label">Nama</label>
            <input class="form-control" type="text" id="nama" name="nama" value="{{ $antrian->nama }}" required>
          </div>
          <div class="form-group">
            <label for="no-bpjs" class="form-control-label">No. BPJS <span class="text-danger">* jika
                ada</span></label>
            <input class="form-control" type="text" id="no-bpjs" value="{{ $antrian->no_bpjs }}" name="no_bpjs">
          </div>
          <label for="poli" class="form-control-label">Poli</label>
          <div class="input-group">
            <select name="poli" class="form-control mb-2">
              <option value="" disabled selected>Pilih Poli</option>
              <option value="mata" {{ $antrian->poli == 'mata' ? 'selected' : '' }}>Mata</option>
              <option value="kesehatan ibu anak" {{ $antrian->poli == 'kesehatan ibu anak' ? 'selected' : ''
                }}>Kesehatan Ibu dan Anak</option>
              <option value="gigi" {{ $antrian->poli == 'gigi' ? 'selected' : '' }}>Gigi</option>
              <option value="umum" {{ $antrian->poli == 'umum' ? 'selected' : '' }}>Umum</option>
            </select>
          </div>
          <div class="form-group">
            <label for="address" class="form-control-label">Alamat</label>
            <textarea class="form-control" id="address" name="alamat" required>{{ $antrian->alamat }}</textarea>
          </div>
          <label for="no-tlp">No. Telepon</label>
          <div class="input-group mb-4">
            <span class="input-group-text">+62</span>
            <input class="form-control" placeholder="834-(1234)-7853" type="text" id="no-tlp" name="no_telp"
              value="{{ $antrian->no_telp }}" required>
          </div>
          <div class="form-group">
            <label for="example-datetime-local-input" class="form-control-label">tanggal Periksa</label>
            <input class="form-control" type="datetime-local" value="{{ $antrian->created_at }}"
              id="example-datetime-local-input">
          </div>
          <div class="form-group">
            <label for="Diagnosa">Diagnosa</label>
            <textarea class="form-control" id="Diagnosa" rows="3" name="diagnosa"></textarea>
          </div>
          <div class="col">
            <button class="btn btn-success" type="submit">Selesai</button>
            <a href="{{ route('antrian-delete', $antrian->id) }}" class="btn btn-danger ms-2"
              onclick="return confirm('apakah anda yakin akan menghapus?')">Hapus</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

@endsection