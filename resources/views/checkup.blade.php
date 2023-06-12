@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <form action="?search" method="GET">
          <div class="form-group d-flex align-items-center">
            <div class="input-group">
              <select name="poli" class="form-control mb-2">
                <option value="" disabled selected>Filter poli</option>
                <option value="">Semua Poli</option>
                <option value="mata">Mata</option>
              </select>
            </div>
            <div class="input-group mb-2">
              <input class="form-control" placeholder="Search ..." type="text" name="search">
            </div>
            <button type="submit" class="btn ms-2">Cari</button>
          </div>
        </form>
      </div>
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h3>Rekam Medis</h3>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center justify-content-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">
                      Poli</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($riwayat as $r)
                  <tr>
                    <td>
                      <p class="text-sm font-weight-bold mb-0 px-2">{{ $r->antrian->nik }}</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">{{ $r->antrian->nama }}</p>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold">{{ $r->antrian->created_at }}</span>
                    </td>
                    <td class="align-middle text-center text-capitalize">
                      <p class="text-sm font-weight-bold mb-0">{{ $r->antrian->poli }}</p>
                    </td>
                    <td class="align-middle">
                      <a class="btn btn-link text-secondary mb-0" href="{{ route('checkup-history-show', $r->id) }}">
                        <i class="fa fa-ellipsis-v text-xs"></i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      {{ $riwayat->links() }}
    </div>
  </div>
</main>

@endsection