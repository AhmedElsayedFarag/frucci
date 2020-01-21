@extends('admin.layouts.app')

@section('pageTitle')
    {{trans('admin_content.dashboard')}}
@endsection

@section('pageSubTitle')
    {{trans('admin_content.edit_store')}}
@endsection

@section('content')

    <!--start div-->
    <div class="row" style="display:block">

        <div class="row breadcrumbs-top m-2">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{trans('admin_content.stores')}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('admin_content.main')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{trans('admin_content.edit_store')}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{trans('admin_content.edit_store')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @include('alert')
                        <form class="form form-horizontal needs-validation" method="post" action="{{route('stores.update', $store->id)}}">
                            {{method_field('PATCH')}} {{csrf_field()}}
                            <div class="form-body">
                                <div class="row">
                                    @foreach($store->getTranslationsArray() as $locale =>$value)
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.name')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="{{trans('admin_content.name')}}" name="{{"name_$locale"}}" value="{{$value['name']}}" required>
                                                <div class="invalid-feedback">
                                                    {{trans('admin_content.please_enter_name')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.address')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="{{trans('admin_content.address')}}" name="{{"address_$locale"}}" value="{{$value['address']}}" required>
                                                <div class="invalid-feedback">
                                                    {{trans('admin_content.please_enter_address')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.working_times')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea class="form-control" placeholder="{{trans('admin_content.working_times')}}" name="{{"working_times_$locale"}}" required>{{$value['working_times']}}</textarea>
                                                <div class="invalid-feedback">
                                                    {{trans('admin_content.please_enter_working_times')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.phone')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="tel" class="form-control" placeholder="{{trans('admin_content.phone')}}" value="{{$store->phone}}" name="phone">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.lat')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" placeholder="{{trans('admin_content.lat')}}" value="{{$store->lat}}" name="lat">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.long')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" placeholder="{{trans('admin_content.long')}}" value="{{$store->long}}" name="long">
                                            </div>
                                        </div>
                                    </div>

                                        <div class="form-group  col-md-6">
                                            <label>{{trans('admin_content.city')}}</label>
                                            <select class="form-control" name ="city_id" required>
                                                <option value="" selected disabled >{{trans('admin_content.choose_one')}}</option>
                                                @foreach($cities as $city)
                                                    <option {{$store->city_id == $city->id ? 'selected' : ''}} value="{{$city->id}}">{{$city->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                {{trans('admin_content.please_enter_city')}}
                                            </div>
                                        </div>

                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">{{trans('admin_content.edit')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
