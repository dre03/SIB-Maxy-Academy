@extends('layout')
@section('content')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('proses_register') }}" method="POST" id="regForm">
                                        @csrf
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputFirstName">Nama</label>
                                            <input class="form-control @error('name') is-invalid @enderror"
                                                id="inputFirstName" type="text" name="name"
                                                placeholder="Masukkan Nama" />
                                            @if ($errors->has('name'))
                                                <span class="error invalid-feedback"> * {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputusername">Username</label>
                                            <input class="form-control @error('username') is-invalid @enderror"
                                                id="inputusername" type="text" name="username"
                                                placeholder="Masukkan username" />
                                            @if ($errors->has('username'))
                                                <span class="error invalid-feedback"> *
                                                    {{ $errors->first('username') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control @error('email') is-invalid @enderror"
                                                id="inputEmailAddress" type="email" aria-describedby="emailHelp"
                                                name="email" placeholder="Masukkan Email" />
                                            @if ($errors->has('email'))
                                                <span class="error invalid-feedback">* {{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group row mt-2">
                                            <label class="small mb-1" for="inputLevel">Role</label>
                                            <div class="col">
                                                <input class="form-check-input @error('level') is-invalid @enderror"
                                                    type="radio" name="level" id="bloger" value="bloger">
                                                <label class="form-check-label" for="bloger">Bloger</label>
                                            </div>
                                            <div class="col">
                                                <input class="form-check-input @error('level') is-invalid @enderror"
                                                    type="radio" name="level" id="user" value="user" checked>
                                                <label class="form-check-label" for="user">User</label>
                                            </div>
                                            @error('level')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control @error('password') is-invalid @enderror"
                                                id="inputPassword" type="password" name="password"
                                                placeholder="Masukkan Password" />
                                            @if ($errors->has('password'))
                                                <span class="error invalid-feedback">*
                                                    {{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputConfirmPassword">Konfirmasi Password</label>
                                            <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                                id="inputConfirmPassword" type="password" name="password_confirmation"
                                                placeholder="Konfirmasi Password" />
                                            @error('password_confirmation')
                                                <span class="error invalid-feedback"> * {{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group d-flex justify-content-center mt-2">
                                            <button class="btn btn-primary btn-block" type="submit">Daftar!</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="{{ route('login') }}">Sudah Punya Akun? Login!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
