@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="col-md-6">
          <div class="form-group d-flex align-items-center">
            <div class="input-group">
              <select name="poli" class="form-control mb-2">
                <option value="" disabled selected>Filter poli</option>
                <option value="">Semua Poli</option>
                <option value="mata">Mata</option>
                <option value="kesehatan ibu anak">Kesehatan Ibu dan Anak</option>
                <option value="gigi">Gigi</option>
                <option value="umum">Umum</option>
              </select>
            </div>
            <div class="input-group mb-2">
              <input class="form-control" placeholder="Search ..." type="text">
            </div>
            <button type="submit" class="btn ms-2">Cari</button>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header pb-0 d-flex justify-content-between">
            <h3>Antrian</h3>
            <div class="tab-table">
              <a href="?periksa=true" class="btn btn-default mx-2">Periksa</a>
              <a href="?konsultasi=true" class="btn btn-default mx-2">Konsultasi</a>
            </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Poli</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status
                    </th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal
                    </th>
                    <th class="text-secondary opacity-7"></th>
                  </tr>
                </thead>
                <tbody>
                  @if (isset($_GET['konsultasi']))
                  @foreach ($konsultasi as $konsul)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/surgeon.png" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $konsul->nama }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0 text-capitalize">{{ $konsul->poli }}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm bg-gradient-success">{{ $konsul->status }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $konsul->tanggal_konsul }}</span>
                    </td>
                    <td class="align-middle">
                      <a href="{{ route('antrian') }}" class="text-secondary font-weight-bold text-xs"
                        data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  @foreach ($antrians as $antrian)
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/user.png" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $antrian->nama }}</h6>
                          <p class="text-xs text-secondary mb-0">0{{ $antrian->no_telp }}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0 text-capitalize">{{ $antrian->poli }}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm bg-gradient-success">{{ $antrian->status }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{ $antrian->created_at }}</span>
                    </td>
                    <td class="align-middle">
                      <a href="{{ route('antrian-detail', $antrian->id) }}"
                        class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                        data-original-title="Edit user">
                        Edit
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection