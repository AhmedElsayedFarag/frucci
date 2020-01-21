

@extends('admin.layouts.app')

@section('pageTitle'){{trans('admin_content.dashboard')}}
@endsection

@section('pageSubTitle') {{trans('admin_content.stores')}}
@endsection

@section('content')

    <!--start div-->
    <div class="row" style="display:block">


        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{trans('admin_content.stores')}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('admin_content.main')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{trans('admin_content.stores')}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="{{route('stores.create')}}" class="btn btn-primary btn-block my-2 waves-effect waves-light">{{trans('admin_content.add_store')}} </a>
                            <table class="table table-bordered mb-0">
                                <thead>
                                <tr align="center">
                                    <th>#</th>
                                    <th>{{trans('admin_content.name')}}</th>
                                    <th>{{trans('admin_content.phone')}}</th>
                                    <th>{{trans('admin_content.address')}}</th>
                                    <th>{{trans('admin_content.lat')}}</th>
                                    <th>{{trans('admin_content.long')}}</th>
                                    <th>{{trans('admin_content.working_times')}}</th>
                                    <th>{{trans('admin_content.city')}}</th>
                                    <th>{{trans('admin_content.taken_action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stores as $store)
                                    <tr align="center">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$store->name}}</td>
                                        <td>{{$store->phone}}</td>
                                        <td>{{$store->address}}</td>
                                        <td>{{$store->lat}}</td>
                                        <td>{{$store->long}}</td>
                                        <td>{{$store->working_times}}</td>
                                        <td>{{$store->city->name}}</td>
                                        <td>
                                            <a href="{{route('stores.edit', $store->id)}}"><i class="fa fa-edit"></i></a>

                                            <a title="delete" onclick="return true;" class="remove-alert" id="confirm-color" object_id="{{ $store->id }}" delete_url="/stores/" href="#">
                                                <i class="fa fa-times"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--end div-->

@endsection










@section('scripts')

@endsection
