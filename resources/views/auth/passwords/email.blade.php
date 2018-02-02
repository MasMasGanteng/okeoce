@extends('layouts.master')

@section('content')
<style type="text/css">
.full-container {
    min-height: calc(100% - 15.2rem);
}
</style>
<div class="container full-container mt-3">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="row mx-0 h-50">
        <div class="col-lg-4 col-md-4 col-12 mx-auto d-flex justify-content-center align-items-center flex-column">
            <div class="text-center h4 mb-5"><b>RESET PASSWORD</b></div>
            <form class="w-100" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" placeholder="EMAIL" value="{{ old('email') }}" required autofocus> @if ($errors->has('email'))
                    <small class="form-text text-muted">
                        {{ $errors->first('email') }}
                    </small> @endif
                </div>
                <button type="submit" class="btn btn-blue btn-block btn-lg">Send Password Reset Link</button>
            </form>
        </div>
    </div>
    <!--  <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
</div>
@endsection
