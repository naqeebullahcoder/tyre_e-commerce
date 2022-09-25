@extends('backend.layouts.master')
@section('main-content')

    <div class="card">
        <h5 class="card-header">Add CAR</h5>
        <div class="card-body">
            <form method="post" action="{{route('car.store')}}">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name" class="col-form-label">Name <span class="text-danger">*</span></label>
                    <input id="name" type="text" name="name"  placeholder=""  value="{{old('name')}}" class="form-control">
                    @error('name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="model_no" class="col-form-label">Model # <span class="text-danger">*</span></label>
                    <input id="model_no" type="text" name="model_no" placeholder=""  value="{{old('model_no')}}" class="form-control">
                    @error('model_no')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="company" class="col-form-label">Company <span class="text-danger">*</span></label>
                    <input  id="company" type="text" name="company" placeholder="" value="{{old('company')}}" class="form-control">
                    @error('company')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="body_type" class="col-form-label">Body Type <span class="text-danger">*</span></label>
                    <input id="body_type" type="text" name="body_type" placeholder="" value=" {{old('body_type')}}" class="form-control">
                    @error('body_type')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="generation" class="col-form-label">Generation <span class="text-danger">*</span></label>
                    <input id="generation" type="text" name="generation" placeholder="" value=" {{old('generation')}}" class="form-control">
                    @error('generation')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="engine" class="col-form-label">Engine <span class="text-danger">*</span></label>
                    <input id="engine" type="text" name="engine" placeholder="" value=" {{old('engine')}}" class="form-control">
                    @error('engine')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                    <div class="form-group mb-3">
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
            </form>
        </div>
    </div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $('#lfm').filemanager('image');

    $(document).ready(function() {
        $('#summary').summernote({
            placeholder: "Write short description.....",
            tabsize: 2,
            height: 100
        });
    });

    $(document).ready(function() {
        $('#description').summernote({
            placeholder: "Write detail description.....",
            tabsize: 2,
            height: 150
        });
    });
    // $('select').selectpicker();

</script>
@endpush