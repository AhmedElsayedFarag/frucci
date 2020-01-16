

@extends('admin.layouts.app')

@section('pageTitle'){{trans('admin_content.dashboard')}}
@endsection

@section('pageSubTitle') {{trans('admin_content.cities')}}
@endsection

@section('content')

    <!--start div-->
    <div class="row" style="display:block">


        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{trans('admin_content.cities')}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('admin_content.main')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{trans('admin_content.cities')}}
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
                            <a href="{{route('cities.create')}}" class="btn btn-primary btn-block my-2 waves-effect waves-light">{{trans('admin_content.add_city')}} </a>
                            <table class="table table-bordered mb-0">
                                <thead>
                                <tr align="center">
                                    <th>#</th>
                                    <th>{{trans('admin_content.city')}}</th>
                                    <th>{{trans('admin_content.country')}}</th>
                                    <th>{{trans('admin_content.taken_action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cities as $city)
                                    <tr align="center">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$city->name}}</td>
                                        <td>{{$city->country->name}}</td>
                                        <td>
                                            <a href="{{route('cities.edit', $city->id)}}"><i class="fa fa-edit"></i></a>

                                            <a title="delete" onclick="return true;" class="remove-alert" id="confirm-color" object_id="{{ $city->id }}" delete_url="/cities/" href="#">
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
