@extends('backend.layouts.master')
@section('title','car')
@section('main-content')

    <div class="card">
        <h5 class="card-header">Edit Profit Margin</h5>
        <div class="card-body">
            <form method="post" action="{{route('profit-margin.update',$profit_margins->id)}}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="price_from" class="col-form-label">Price From<span class="text-danger">*</span></label>
                    <input id="price_from" type="number" name="price_from" placeholder=""  value="{{$profit_margins->price_from}}" class="form-control">
                    @error('price_from')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price_to" class="col-form-label">Price To</label>
                    <input id="price_to" type="number" name="price_to" placeholder=""  value="{{$profit_margins->price_to}}" class="form-control">
                    @error('price_to')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                {{--<div class="form-group">--}}
                    {{--<label for="profit" class="col-form-label">Profit</label>--}}
                    {{--<input id="profit" type="number" name="profit" placeholder=""  value="{{$profit_margins->profit}}" class="form-control">--}}
                    {{--@error('profit')--}}
                    {{--<span class="text-danger">{{$message}}</span>--}}
                    {{--@enderror--}}
                {{--</div>--}}

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