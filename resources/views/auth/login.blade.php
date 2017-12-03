@extends('layouts.master')

@section('content')
<div class="container full-container flex-div">
    <div class="col-5 mx-auto mt-3">
        <form method="POST" action="{{ route('login') }}">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" class="form-control" name="email" placeholder="EMAIL" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" class="form-control" name="password" placeholder="PASSWORD" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
            </div>

            <div class="form-group">
                <div class="row no-gutters">
                    <div class="col-6">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">Remember Me</span>
                        </label>
                            </div>
                            <div class="col-6 text-right">
            <a href="{{ route('password.request') }}">
                                    Forgot Password?
                                </a>
                            </div>
                </div>
                            
                        </div>

            <button type="submit" class="btn btn-blue btn-block btn-lg">MASUK</button>
        </form>
        <!-- <a href="/register" class="register-overlay">REGISTER</a> -->
    </div>
</div>
@endsection
