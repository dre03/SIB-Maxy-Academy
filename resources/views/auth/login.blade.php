@extends('layout')
@section('content')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                {{-- Error Alert --}}
                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('proses_login') }}" method="POST" id="logForm">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            @error('login_gagal')
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <span class="alert-inner--text"><strong>Warning!</strong>
                                                        {{ $message }}</span>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @enderror
                                            <label class="small mb-1" for="inputEmailAddress">Username</label>
                                            <input class="form-control @error('username') is-invalid @enderror" id="inputEmailAddress" name="username"
                                                type="text" placeholder="Masukkan Username" />
                                            @if ($errors->has('username'))
                                                <span class="error invalid-feedback">{{ $errors->first('username') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="password"
                                                name="password" placeholder="Masukkan Password" />
                                            @if ($errors->has('password'))
                                                <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="rememberPasswordCheck"
                                                    type="checkbox" />
                                                <label class="custom-control-label" for="rememberPasswordCheck">Remember
                                                    password</label>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            {{-- <a class="small" href="#">Forgot Password?</a> --}}
                                            <button class="btn w-100 btn-primary btn-block btn-login"
                                                type="submit">Login</button>

                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small">
                                        <a href="{{route('register')}}">Belum Punya Akun? Daftar!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
@endsection
