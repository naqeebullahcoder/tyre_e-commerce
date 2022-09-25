@extends('backend.layouts.master')
@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Fitting</h5>
    <div class="card-body">
      <form method="post" action="{{route('fitting-station.update',$fittings->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
          <label for="name" class="col-form-label">Name</label>
        <input id="name" type="text" name="name" placeholder=""  value="{{$fittings->name}}" class="form-control">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="sur_name" class="col-form-label">Sur Name</label>
          <input id="sur_name" type="text" name="sur_name" placeholder=""  value="{{$fittings->sur_name}}" class="form-control">
          @error('sur_name')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

          <div class="form-group">
              <label for="address" class="col-form-label">Address</label>
              <input id="address" type="text" name="address" placeholder=""  value="{{$fittings->address}}" class="form-control">
              @error('address')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

          <div class="form-group">
              <label for="post_code" class="col-form-label">Post Code</label>
              <input id="post_code" type="text" name="post_code" placeholder=""  value="{{$fittings->post_code}}" class="form-control">
              @error('post_code')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

          <div class="form-group">
              <label for="sur_name" class="col-form-label">Sur Name</label>
              <input id="sur_name" type="text" name="sur_name" placeholder=""  value="{{$fittings->sur_name}}" class="form-control">
              @error('sur_name')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

          <div class="form-group">
              <label for="city" class="col-form-label">City</label>
              <input id="city" type="text" name="city" placeholder=""  value="{{$fittings->city}}" class="form-control">
              @error('city')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

          <div class="form-group">
              <label for="phone" class="col-form-label">Phone</label>
              <input id="phone" type="text" name="phone" placeholder=""  value="{{$fittings->phone}}" class="form-control">
              @error('phone')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

          <div class="form-group">
              <label for="fax" class="col-form-label">Fax</label>
              <input id="fax" type="text" name="fax" placeholder=""  value="{{$fittings->fax}}" class="form-control">
              @error('fax')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

          <div class="form-group">
              <label for="email" class="col-form-label">Email</label>
              <input id="email" type="text" name="email" placeholder=""  value="{{$fittings->email}}" class="form-control">
              @error('email')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

        {{--<div class="form-group">--}}
        {{--<label for="inputPhoto" class="col-form-label">Photo</label>--}}
        {{--<div class="input-group">--}}
            {{--<span class="input-group-btn">--}}
                {{--<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">--}}
                {{--<i class="fa fa-picture-o"></i> Choose--}}
                {{--</a>--}}
            {{--</span>--}}
            {{--<input id="thumbnail" class="form-control" type="text" name="photo" value="{{$user->photo}}">--}}
        {{--</div>--}}
        {{--<img id="holder" style="margin-top:15px;max-height:100px;">--}}
          {{--@error('photo')--}}
          {{--<span class="text-danger">{{$message}}</span>--}}
          {{--@enderror--}}
        {{--</div>--}}
        {{--@php --}}
        {{--$roles=DB::table('users')->select('role')->where('id',$user->id)->get();--}}
        {{--// dd($roles);--}}
        {{--@endphp--}}
        {{--<div class="form-group">--}}
            {{--<label for="role" class="col-form-label">Role</label>--}}
            {{--<select name="role" class="form-control">--}}
                {{--<option value="">-----Select Role-----</option>--}}
                {{--@foreach($roles as $role)--}}
                    {{--<option value="{{$role->role}}" {{(($role->role=='admin') ? 'selected' : '')}}>Admin</option>--}}
                    {{--<option value="{{$role->role}}" {{(($role->role=='user') ? 'selected' : '')}}>User</option>--}}
                {{--@endforeach--}}
            {{--</select>--}}
          {{--@error('role')--}}
          {{--<span class="text-danger">{{$message}}</span>--}}
          {{--@enderror--}}
          {{--</div>--}}
          {{--<div class="form-group">--}}
            {{--<label for="status" class="col-form-label">Status</label>--}}
            {{--<select name="status" class="form-control">--}}
                {{--<option value="active" {{(($user->status=='active') ? 'selected' : '')}}>Active</option>--}}
                {{--<option value="inactive" {{(($user->status=='inactive') ? 'selected' : '')}}>Inactive</option>--}}
            {{--</select>--}}
          {{--@error('status')--}}
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

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@endpush