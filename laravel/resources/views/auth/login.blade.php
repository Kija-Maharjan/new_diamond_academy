@extends('ui')

@section('content')
<div class="content-wrapper">
    <h1>Login</h1>
    @if($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</div>
@endsection
