@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Riwayat Checkup</h6>
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
                  <tr>
                    <td>
                      <p class="text-sm font-weight-bold mb-0 px-2">321321039340990</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">Agus Halim</p>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold">01/05/23</span>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-sm font-weight-bold mb-0">Mata</p>
                    </td>
                    <td class="align-middle">
                      <button class="btn btn-link text-secondary mb-0">
                        <i class="fa fa-ellipsis-v text-xs"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p class="text-sm font-weight-bold mb-0 px-2">321321039340990</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">Dan Ciubotaru</p>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold">21/05/23</span>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-sm font-weight-bold mb-0">Paru</p>
                    </td>
                    <td class="align-middle">
                      <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-xs"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p class="text-sm font-weight-bold mb-0 px-2">321321039340990</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">Andrew Ng</p>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold">10/04/23</span>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-sm font-weight-bold mb-0">Kulit dan Kelamin</p>
                    </td>
                    <td class="align-middle">
                      <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-xs"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p class="text-sm font-weight-bold mb-0 px-2">321321039340990</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">Tim Cook</p>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold">10/04/23</span>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-sm font-weight-bold mb-0">Gigi</p>
                    </td>
                    <td class="align-middle">
                      <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-xs"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p class="text-sm font-weight-bold mb-0 px-2">321321039340990</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">Jack Dorsey</p>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold">01/05/23</span>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-sm font-weight-bold mb-0">THT</p>
                    </td>
                    <td class="align-middle">
                      <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-xs"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p class="text-sm font-weight-bold mb-0 px-2">321321039340990</p>
                    </td>
                    <td>
                      <p class="text-sm font-weight-bold mb-0">Robert Downey Jr</p>
                    </td>
                    <td>
                      <span class="text-xs font-weight-bold">21/05/23</span>
                    </td>
                    <td class="align-middle text-center">
                      <p class="text-sm font-weight-bold mb-0">Paru</p>
                    </td>
                    <td class="align-middle">
                      <button class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-ellipsis-v text-xs"></i>
                      </button>
                    </td>
                  </tr>
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