@extends('backend.layouts.master')
@section('main-content')

    <div class="card">
        <h5 class="card-header">Add Profit Margin</h5>
        <div class="card-body">
            <form method="post" action="{{route('profit-margin.store')}}">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="price_from" class="col-form-label">Price From <span class="text-danger">*</span></label>
                    <input id="price_from" type="number" name="price_from"  placeholder=""  value="{{old('price_from')}}" class="form-control">
                    @error('price_from')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price_to" class="col-form-label">Price To <span class="text-danger">*</span></label>
                    <input id="price_to" type="number" name="price_to" placeholder=""  value="{{old('price_to')}}" class="form-control">
                    @error('price_to')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {{--<div class="form-group">--}}
                    {{--<label for="profit" class="col-form-label">Profit<span class="text-danger">*</span></label>--}}
                    {{--<input  id="profit" type="number" name="profit" placeholder="" value="{{old('profit')}}" class="form-control">--}}
                    {{--@error('profit')--}}
                    {{--<span class="text-danger">{{$message}}</span>--}}
                    {{--@enderror--}}
                {{--</div>--}}
                    <div class="form-group mb-3">
                        <button type="reset" class="btn btn-warning">Reset</button>
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
            </form>
        </div>
    </div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('public/backend/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="{{('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css')}}" />
@endpush
@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('public/backend/summernote/summernote.min.js')}}"></script>
<script src="{{('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js')}}"></script>

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