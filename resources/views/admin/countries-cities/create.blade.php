@extends('admin.layouts.app')

@section('pageTitle')
    {{trans('admin_content.dashboard')}}
@endsection

@section('pageSubTitle')
    {{trans('admin_content.add_country_city')}}
@endsection

@section('content')

    <!--start div-->
    <div class="row" style="display:block">

        <div class="row breadcrumbs-top m-2">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{trans('admin_content.countries_cities')}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('admin_content.main')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{trans('admin_content.add_country_city')}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{trans('admin_content.add_country_city')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @include('alert')
                        <form class="form form-horizontal needs-validation" method="post" action="{{route('countries-cities.store')}}">
                            @csrf
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.name_en')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input class="form-control" placeholder="{{trans('admin_content.country_city')}}" name="name_en" required>
                                                <div class="invalid-feedback">
                                                    {{trans('admin_content.please_enter_name')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.name_ar')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input class="form-control" placeholder="{{trans('admin_content.country_city')}}" name="name_ar" required>
                                                <div class="invalid-feedback">
                                                    {{trans('admin_content.please_enter_name')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group  col-md-6">
                                        <label>{{trans('admin_content.country')}}</label>
                                        <select class="form-control" name ="parent_id" required>
                                            <option value="" selected disabled >{{trans('admin_content.choose_one')}}</option>
                                            <option value="0">{{trans('admin_content.without_country')}}</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{trans('admin_content.please_choose_country')}}
                                        </div>
                                    </div>

                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">{{trans('admin_content.add')}}</button>
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
