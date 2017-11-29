<form method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <input id="name" type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
        <div class="invalid-feedback">
            {{ $errors->first('name') }}
        </div>
        @endif
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
        <div class="invalid-feedback">
            {{ $errors->first('email') }}
        </div>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" class="form-control" placeholder="Password" name="password" required> @if ($errors->has('password'))
        <div class="invalid-feedback">
            {{ $errors->first('password') }}
        </div>
        @endif
    </div>
    <!-- <div class="form-group">
        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
    </div>
    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
        <input id="phone" type="number" class="form-control" placeholder="No. Handphone" name="phone" value="{{ old('phone') }}" required>
    </div> -->
    <!-- <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
        <input id="address" type="text" class="form-control" placeholder="Alamat" name="address" value="{{ old('address') }}" required>
    </div> -->
    <button type="submit" class="btn btn-blue">DAFTAR</button>
</form>