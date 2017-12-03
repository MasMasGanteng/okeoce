@extends('layouts.master')

@section('content')
<div class="container full-container flex-div">
    <div class="col-5 mx-auto">
        <h4 class="text-center"><b>REGISTER</b></h4>
        <div class="row my-4">
            <div class="col-6">
                <button class="btn btn-blue btn-lg btn-block">FACEBOOK</button>
            </div>
            <div class="col-6">
                <button class="btn btn-peach btn-lg btn-block">GOOGLE</button>
            </div>
        </div>
        <p class="text-center">or</p>
        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input id="name" type="text" placeholder="NAME" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input id="email" type="email" placeholder="EMAIL" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" placeholder="PASSWORD" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
            </div>
            <div class="form-group">
                <input id="password-confirm" type="password" placeholder="CONFIRM PASSWORD" class="form-control" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-blue btn-block btn-lg mt-3">SIGN UP</button>
        </form>
        <p class="text-center">
            Already have an account? <a href="{{ route('login') }}">LOGIN</a>
        </p>
    </div>
</div>
@endsection
