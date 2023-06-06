@extends('layouts.user_type.auth')

@section('content')

<div class="row">
  <div class="col-md-6 card shadow p-4">
    <h3>Rekam Medis Pasien</h3>
    <form>
      <div class="form-group">
        <label for="nik" class="form-control-label">NIK</label>
        <input class="form-control" type="text" id="nik" name="nik" value="{{ $riwayat->antrian->nik }}">
      </div>
      <div class="form-group">
        <label for="nama" class="form-control-label">Nama</label>
        <input class="form-control" type="text" id="nama" name="nama" value="{{ $riwayat->antrian->nama }}">
      </div>
      <div class="form-group">
        <label for="no-bpjs" class="form-control-label">No. BPJS <span class="text-danger">* jika
            ada</span></label>
        <input class="form-control" type="text" id="no-bpjs" name="no_bpjs" value="{{ $riwayat->antrian->no_bpjs }}">
      </div>
      <div class="form-group">
        <label for="address" class="form-control-label">Alamat</label>
        <input class="form-control" type="text" id="address" name="alamat" value="{{ $riwayat->antrian->alamat }}">
      </div>
      <div class="form-group">
        <label for="no-telp" class="form-control-label">No. Telp</label>
        <input class="form-control" type="tel" id="no-telp" name="no_telp" value="+62{{ $riwayat->antrian->no_telp }}">
      </div>
      <div class="form-group">
        <label for="date" class="form-control-label">tanggal Periksa</label>
        <input class="form-control" type="datetime-local" value="2018-11-23T10:30:00" id="date" name="tanggal"
          value="{{ $riwayat->antrian->created_at }}">
      </div>
      <div class="form-group">
        <label for="example-text-input" class="form-control-label">Poli</label>
        <input class="form-control" type="text" id="example-text-input">
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Diagnosa</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $riwayat->diagnosa }}</textarea>
      </div>
      <div class="col">
        <button class="btn btn-success" type="submit">Update</button>
        <a href="{{ route('history') }}" class="btn btn-danger ms-2">Cancel</a>
      </div>
    </form>
  </div>
</div>

@endsection