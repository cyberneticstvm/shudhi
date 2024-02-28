@extends("base")
@section("content")
<div class="p-3 shadow-sm bg-success danger-nav osahan-home-header">
    <div class="font-weight-normal mb-0 d-flex align-items-center">
        <h6 class="fw-normal mb-0 text-white d-flex align-items-center">
            <a class="text-white me-3 fs-4" onclick="window.history.back()" href="javascript:void(0)"><i class="bi bi-chevron-left"></i></a>
            Feedback
        </h6>
        <div class="ms-auto d-flex align-items-center">
            <a class="toggle osahan-toggle fs-4 text-white ms-auto" href="#"><i class="bi bi-list"></i></a>
        </div>
    </div>
</div>
<div class="p-4">
    <form method="post" action="{{ route('user.feedback.save') }}">
        @csrf
        <div class="mb-4">
            <label class="form-label text-muted small mb-1 req">Feedback</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-file text-muted"></i></span>
                <textarea class="form-control" name="feedback" placeholder="Feedback">{{ old('feedback') }}</textarea>
            </div>
            @error('feedback')
            <small class="text-danger">{{ $errors->first('feedback') }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1 req">Feedback Type</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-cloud text-muted"></i></span>
                <select class="form-control" name="type">
                    <option value="">Select</option>
                    <option value="Feedback">Feedback</option>
                    <option value="Complaint">Complaint</option>
                </select>
            </div>
            @error('type')
            <small class="text-danger">{{ $errors->first('type') }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <button type="submit" class="btn btn-submit btn-success btn-lg w-100 shadow">SUBMIT</button>
        </div>
    </form>
</div>
@include("bottom-nav")
@endsection