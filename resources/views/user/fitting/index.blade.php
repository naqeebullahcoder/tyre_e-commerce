@extends('user.layouts.master')

@section('main-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Fitting Station Lists</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(count($fittings)>0)
                    <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Full Name</th>
                            <th>Sur Name</th>
                            <th>Address</th>
                            <th>Post Code</th>
                            <th>City</th>
                            <th>Phone</th>
                            <th>Fax</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fittings as $fitting)
                            <tr>
                                <td>{{$fitting->id}}</td>
                                <td>{{$fitting->name}}</td>
                                <td>{{$fitting->sur_name}}</td>
                                <td>{{$fitting->address}}</td>
                                <td>{{$fitting->post_code}}</td>
                                <td>{{$fitting->city}}</td>
                                <td>{{$fitting->phone}}</td>
                                <td>{{$fitting->fax}}</td>
                                <td>{{$fitting->email}}</td>
                                <td>
                                    <a href="{{route('user.fitting-station.edit',$fitting->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                    <form method="POST" action="{{route('user.fitting-station.delete',[$fitting->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm dltBtn" data-id={{$fitting->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--<span style="float:right">{{$reviews->links()}}</span>--}}
                @else
                    <h6 class="text-center">No Fitting Station found!!!</h6>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
<link href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<style>
    div.dataTables_wrapper div.dataTables_paginate{
        display: none;
    }
</style>
@endpush

@push('scripts')

<!-- Page level plugins -->
<script src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('publie/backend/js/demo/datatables-demo.js')}}"></script>
<script>

    $('#order-dataTable').DataTable( {
        "columnDefs":[
            {
                "orderable":false,
                "targets":[5,6]
            }
        ]
    } );

    // Sweet alert

    function deleteData(id){

    }
</script>
@endpush