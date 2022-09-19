@extends('participant.auth.components.template')
@section('title', 'Register')

@section('content')
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <!-- /Logo -->
            <h4 class="mb-2">Mulai Berkarya 🚀</h4>
            <p class="mb-4">Tuangkan karya terbaikmu di Fasilkom Fest!</p>

            <form id="formRegister">
              <input type="hidden" name="role_id" id="role_id">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input
                  type="text"
                  class="form-control"
                  id="username"
                  name="username"
                  placeholder="Masukan username"
                  autofocus
                />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email" />
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control"
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                  />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3 form-password-toggle">
                <label class="form-label" for="confirmPassword">Konfirmasi Password</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="confirmPassword"
                    class="form-control"
                    name="confirmPassword"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="confirmPassword"
                  />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              
              <button class="btn btn-primary d-grid w-100">Daftar</button>
            </form>

            <p class="text-center">
              <span>Sudah Memiliki Akun?</span>
              <a href="{{ route('login') }}">
                <span>Sign in</span>
              </a>
            </p>
          </div>
        </div>
        <!-- Register Card -->
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script>
    $(document).ready( function() {
      var slug = '{{ $slug }}';
      getRoleUser.loadData = "/role-peserta/" + slug;
    })
  </script>
  <script src="{{ asset('dashboard') }}/js/auth-peserta/register.js"></script>
@endsection