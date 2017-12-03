<form method="POST" action="{{ route('login') }}">
	{{ csrf_field() }}
    <div class="form-group">
        <input type="email" class="form-control" placeholder="Email">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-blue">MASUK</button>
</form>
<span class="register-overlay">REGISTER</span>