@extends('layouts.user_type.guest')

@section('content')

<main class="main-content">
  <section>
    <div class="page-header min-vh-75">
      <span class="mask bg-gradient-success opacity-7"></span>
      <div class=" container">
        <div class="row">
          <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
            <div class="card mt-6">
              <div class="card-header pb-0 text-left bg-transparent">
                <h3 class="font-weight-bolder text-success text-gradient">Simpus Jrengik</h3>
                <p class="mb-0">Selamat Datang !🙌<br></p>
                <p class="mb-0">Untuk mengakses fiturnya login dulu yaa 👌</p>
                </p>
              </div>
              <div class="card-body">
                <form role="form" method="POST" action="/session">
                  @csrf
                  <label>Email</label>
                  <div class="mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                      aria-label="Email" aria-describedby="email-addon">
                    @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <label>Password</label>
                  <div class="mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                      aria-label="Password" aria-describedby="password-addon">
                    @error('password')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-success w-100 mt-4 mb-0">Sign in</button>
                  </div>
                </form>
              </div>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <small class="text-muted">Lupa password? tenang, reset passwordmu
                  <a href="/login/forgot-password" class="text-success text-gradient font-weight-bold">disini</a>
                </small>
                <p class="mb-4 text-sm mx-auto">
                  Apa belum punya akun?
                  <a href="register" class="text-success text-gradient font-weight-bold">Daftar Sekarang</a>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
              <!-- <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                <path fill="#00CBA9"
                  d="M42.9,-70.7C54,-68,60,-53.1,67,-39.3C74,-25.5,81.9,-12.7,84.8,1.6C87.6,16,85.4,32,78.3,45.6C71.1,59.1,59,70.2,45.2,71.8C31.3,73.3,15.7,65.3,1.2,63.3C-13.3,61.3,-26.7,65.3,-37.3,61.9C-47.9,58.5,-55.9,47.7,-63.8,36.1C-71.7,24.5,-79.6,12.3,-83.2,-2C-86.7,-16.4,-85.9,-32.7,-77,-42.6C-68.1,-52.6,-51.2,-56,-37.1,-56.9C-22.9,-57.9,-11.5,-56.2,2.3,-60.1C16,-64,31.9,-73.5,42.9,-70.7Z"
                  transform="translate(100 100)" />
              </svg> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection