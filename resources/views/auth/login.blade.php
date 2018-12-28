@extends('layouts.single-page')

@section('content')
<div class="row full-height">
    <div class="col-md-4 pl-4 pr-4 gradient-1">
        <a class="navbar-brand" href="/">
            <i class="fas fa-bolt header-text text-white"></i>
            <strong class="header-text text-white">Ebiller</strong>
        </a>
        <div class="text-center mt-5 pt-5">
            <p class="mb-0 text-white mt-5 lead">Keep track of your bills and expenses in one place.</p>
            <div class="blockquote-footer text-white">No need to worry about pending <cite title="Source Title">Bills.</cite></div>
        </div>
    </div>
    <div class="col-md-6 p-5 col-md-offset-2">
        <h2 class="h3 text-primary font-weight-normal pt-5">Welcome <b>Back</b></h2>
        <p class="mb-5">Login to manage your account</p>
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">EMAIL ADDRESS</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">PASSWORD</label>
                    <input id="password" type="password" class="form-control" name="password" required placeholder="******">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary float-right">
                    Login
                </button>

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
