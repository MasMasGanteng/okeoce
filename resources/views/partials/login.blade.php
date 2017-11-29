<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
        <div class="invalid-feedback">
        	{{ $errors->first('email') }}
        </div>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
        @if ($errors->has('password'))
        <div class="invalid-feedback">
            {{ $errors->first('password') }}
        </div>
        @endif
    </div>
    <button type="submit" class="btn btn-blue">MASUK</button>
</form>
<span class="register-overlay">REGISTER</span>