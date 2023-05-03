@extends('layouts.auth')

@section('content')

<!-- main -->
    <div class="w3layouts-main">
        <div class="bg-layer">
            <h1>Register</h1>
            <div class="header-main">
                <div class="main-icon pb-2" style="display:block; margin:auto; margin-bottom : 30px !important">
                </div>
                <div class="header-left-bottom">
                     <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="icon1">
                            <span class="fa fa-user"></span>
                          <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="icon1">
                            <span class="fa fa-user"></span>
                            <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="icon1">
                            <span class="fa fa-user"></span>
                            <input type="text" placeholder="Username" name="username" required />
                        </div>
                        <div class="icon1">
                            <span class="fa fa-lock"></span>
                            <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                         <div class="icon1">
                              <input placeholder="Password Confirm" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="icon1">
                            <select class="option" placeholder="Pilih Daftar Sebagai" class="form-control  form-select" name="level" id="OptionLevel">
                                <option>Daftar sebagai</option>
                                <option value="2">Pemilik</option>
                                <option value="3">Pencari</option>
                            </select>
                        </div>
                        <div class="login-check">
                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i> Keep me logged in</label>
                        </div>
                          <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                        <div class="links">
                            <p class="right"><a href="login.php">Have account?Login</a></p>
                            <div class="clear"></div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- copyright -->
            <!-- //copyright -->
        </div>
    </div>
    <!-- //main -->







<div id="auth">
        <div class="row h-100">
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.svg" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Sign Up</h1>
                    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                     <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                             <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="{{ route('login') }}" class="font-bold">Log
                        in</a>.</p>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
@endsection
