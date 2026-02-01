@extends('ui')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">
    <div class="card w-100" style="max-width: 420px; border: 0; box-shadow: 0 6px 30px rgba(0,0,0,0.12);">
        <div class="card-body p-4">
            <h3 class="fw-bold mb-3 text-center">Verification Required</h3>
            <p class="text-muted text-center">Enter the verification code to proceed to login.</p>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('verify.post') }}">
                @csrf
                <div class="mb-3">
                    <label for="code" class="form-label fw-bold">Verification Code</label>
                    <input id="code" name="code" type="password" class="form-control form-control-lg" placeholder="Enter code" required autofocus>
                </div>

                <button class="btn btn-primary w-100 btn-lg" type="submit">Verify</button>
            </form>

            <div class="mt-3 text-center small text-muted">
                If you don't have the code, contact the administrator.
            </div>
        </div>
    </div>
</div>
@endsection
