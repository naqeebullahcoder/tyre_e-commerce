@extends('backend.layouts.master')
@section('title','car')
@section('main-content')

    <div class="card">
        <h5 class="card-header">Edit CAR</h5>
        <div class="card-body">
            <form method="post" action="{{route('car.update',$cars->id)}}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
                    <input id="name" type="text" name="name" placeholder=""  value="{{$cars->name}}" class="form-control">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="model_no" class="col-form-label">Model #</label>
                    <input id="model_no" type="text" name="model_no" placeholder=""  value="{{$cars->model_no}}" class="form-control">
                    @error('model_no')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="company" class="col-form-label">Company</label>
                    <input id="company" type="text" name="company" placeholder=""  value="{{$cars->company}}" class="form-control">
                    @error('company')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="body_type" class="col-form-label">Body Type</label>
                    <input id="body_type" type="text" name="body_type" placeholder=""  value="{{$cars->body_type}}" class="form-control">
                    @error('body_type')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="generation" class="col-form-label">Generation</label>
                    <input id="generation" type="text" name="generation" placeholder=""  value="{{$cars->generation}}" class="form-control">
                    @error('generation')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="engine" class="col-form-label">Engine</label>
                    <input id="engine" type="text" name="engine" placeholder=""  value="{{$cars->engine}}" class="form-control">
                    @error('engine')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <button class="btn btn-success" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('public/backend/summernote/summernote.min.css')}}">
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('public/backend/summernote/summernote.min.js')}}"></script>
<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
        $('#description').summernote({
            placeholder: "Write short description.....",
            tabsize: 2,
            height: 150
        });
    });
</script>
@endpush