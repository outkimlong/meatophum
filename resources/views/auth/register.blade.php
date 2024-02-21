<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.title-meta', ['title' => 'Register'])
    @include('layouts.head-css')
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-box-body">
            <p class="text-center">
                <strong>Sign Up a new membership</strong>
            </p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group has-feedback">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Full name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @error('name')
                        <div class="has-error">
                            <span class="help-block invalid-feedback">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="form-group has-feedback">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @error('email')
                        <div class="has-error">
                            <span class="help-block invalid-feedback">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="form-group has-feedback">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @error('password')
                        <div class="has-error">
                            <span class="help-block invalid-feedback">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
                <div class="form-group has-feedback">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Retype password">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-success btn-block btn-flat btn-sm">Sign Up</button>
                    </div>
                </div>
            </form>
            <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
        </div>
    </div>
    @include('layouts.footer-script')
</body>

</html>
