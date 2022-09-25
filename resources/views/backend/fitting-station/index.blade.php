@extends('backend.layouts.master')
@section('title','E-SHOP || Tyers Page')
@section('main-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Fitting List</h6>
            {{--<a href="{{route('fitting-station.create')}}" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="bottom" title="Add User"><i class="fas fa-plus"></i> Add Fitting</a>--}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(count($fittings)>0)
                    <table class="table table-bordered" id="banner-dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Name</th>
                            <th>Sur Name</th>
                            <th>Address</th>
                            <th>Post Code</th>
                            <th>City</th>
                            <th>Phone</th>
                            <th>Fax</th>
                            <th>Email</th>
                            <th></th>
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
                                    <a href="{{route('fitting-station.edit',$fitting->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                    <form method="POST" action="{{route('fitting-station',[$fitting->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm dltBtn" data-id={{$fitting->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <span style="float:right">{{$fittings->links()}}</span>
                @else
                    <h6 class="text-center">No Fitting found!!! Please create Fitting</h6>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
<link href="{{asset('public/backend/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<style>
    div.dataTables_wrapper div.dataTables_paginate{
        display: none;
    }
    .zoom {
        transition: transform .2s; /* Animation */
    }

    .zoom:hover {
        transform: scale(3.2);
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

    $('#banner-dataTable').DataTable( {
        "columnDefs":[
            {
                "orderable":false,
                "targets":[3,4]
            }
        ]
    } );

    // Sweet alert

    function deleteData(id){

    }

@endpush