
@extends('admin.layouts.app')

@section('pageTitle'){{trans('admin_content.dashboard')}}
@endsection

@section('pageSubTitle') {{trans('admin_content.edit_settings')}}
@endsection

@section('content')

    <!--start div-->
    <div class="row" style="display:block">


        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{trans('admin_content.edit_settings')}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('admin_content.main')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{trans('admin_content.edit_settings')}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{trans('admin_content.edit_settings')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @include('alert')
                        <form class="form form-horizontal needs-validation" method="post" action="{{route('update')}}" enctype="multipart/form-data">
                            {{method_field('put')}} {{csrf_field()}}
                            @foreach($settings as $setting)
                            <div class="form-body">
                                <div class="row">
                                    @if($setting->type == 'url')
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>{{$setting->name}}</span>
                                                </div>
                                                <input type="url" class="form-control" name="{{$setting->key}}" placeholder="{{trans($setting->name)}}" value="{{$setting->value}}">
                                            </div>
                                        </div>

                                    @elseif($setting->type == 'email')
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>{{$setting->name}}</span>
                                                </div>
                                                <input type="email" class="form-control" name="{{$setting->key}}" placeholder="{{trans($setting->name)}}" value="{{$setting->value}}">
                                            </div>
                                        </div>

                                    @elseif($setting->type == 'tel')
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>{{$setting->name}}</span>
                                                </div>
                                                <input type="tel" class="form-control" name="{{$setting->key}}" placeholder="{{trans($setting->name)}}" value="{{$setting->value}}">
                                            </div>
                                        </div>
                                    @elseif($setting->type == 'text')
                                            <div class="col-12">
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <span>{{$setting->name}}</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="{{$setting->key}}" placeholder="{{trans('admin_content.location')}}" value="{{$setting->value}}">
                                                </div>
                                            </div>
                                    @elseif($setting->type == 'file')
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>{{$setting->name}}</span>
                                                </div>
                                                <input type="file" class="form-control" name="{{$setting->key}}" placeholder="{{trans($setting->name)}}" accept=".gif, .jpg, .png, .webp">
                                                <img src="{{asset($setting->value)}}" alt="logo" style="width:200px; height:100px"/>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">{{trans('admin_content.edit')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--end div-->

@endsection

@section('scripts')


@endsection
