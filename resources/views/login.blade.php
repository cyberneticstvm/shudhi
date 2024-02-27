@extends("base")
@section("content")
<div class="p-3 shadow-sm bg-success danger-nav osahan-home-header">
    <div class="font-weight-normal mb-0 d-flex align-items-center">
        <h6 class="fw-normal mb-0 text-white d-flex align-items-center">
            <a class="text-white me-3 fs-4" onclick="window.history.back()" href="javascript:void(0)"><i class="bi bi-chevron-left"></i></a>
            Login
        </h6>
        <div class="ms-auto d-flex align-items-center">
            <a class="toggle osahan-toggle fs-4 text-white ms-auto" href="#"><i class="bi bi-list"></i></a>
        </div>
    </div>
</div>
<div class="p-4">
    <form method="post" action="{{ route('authenticate') }}">
        @csrf
        <div class="mb-4">
            <label class="form-label text-muted small mb-1 req">Mobile Number</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-phone text-muted"></i></span>
                <input type="text" class="form-control" maxlength="10" name="mobile" value="{{ old('mobile') }}" placeholder="Mobile Number">
            </div>
            @error('mobile')
            <small class="text-danger">{{ $errors->first('mobile') }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1 req">Password</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-lock text-muted"></i></span>
                <input type="password" class="form-control" name="password" placeholder="***********">
            </div>
            @error('password')
            <small class="text-danger">{{ $errors->first('password') }}</small>
            @enderror
        </div>
        <!--<div class="mb-4">
            <input type="checkbox" name="remember" value="1">
            <label for="remember" class="form-label text-muted small mb-1">Remember me</label>
        </div>-->
        <div class="mb-4">
            <button type="submit" class="btn btn-submit btn-success btn-lg w-100 shadow">LOGIN</button>
        </div>
        <div class="p-3 text-center">
            <div class="h6">Don't have an account yet?</div>
            <p class="text-success mb-3">Click <a href="{{ route('register') }}">here</a> to Signup</p>
        </div>
        <!--<div class="p-3 text-center">
            <div class="h6">Forgot Password?</div>
            <p class="text-success mb-3">Click <a href="/forgot">here</a> to change your password</p>
        </div>-->
    </form>
</div>
@endsection