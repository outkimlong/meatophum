<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.title-meta', ['title' => 'Login'])
    @include('layouts.head-css')
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-box-body">
            <p class="text-center">
                <strong>Sign in to start your session</strong>
            </p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group has-feedback">
                    <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @error('email')
                        <div class="has-error">
                            <span class="help-block invalid-feedback">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="form-group has-feedback">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @error('password')
                        <div class="has-error">
                            <span class="help-block invalid-feedback">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <a href="{{ route('register') }}" class="text-center">Sign Up a new membership</a>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat btn-sm">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('layouts.footer-script')
</body>

</html>
