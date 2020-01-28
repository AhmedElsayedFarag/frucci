@extends('admin.layouts.app')

@section('pageTitle')
    {{trans('admin_content.dashboard')}}
@endsection

@section('pageSubTitle')
    {{trans('admin_content.countries_cities')}}
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
                        <li class="breadcrumb-item active">{{trans('admin_content.edit_country_city')}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{trans('admin_content.edit_country_city')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @include('alert')
                        <form class="form form-horizontal needs-validation" method="post" action="{{route('countries-cities.update', $countryCity->id)}}">
                            {{method_field('PATCH')}}  {{csrf_field()}}
                            <div class="form-body">
                                <div class="row">
                                    @foreach($countryCity->getTranslationsArray() as $locale =>$value)
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans("admin_content.name_$locale")}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input class="form-control" placeholder="{{trans('admin_content.country_city')}}" name="{{"name_$locale"}}" value="{{$value['name']}}" required>
                                                <div class="invalid-feedback">
                                                    {{trans('admin_content.please_enter_name')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div class="form-group  col-md-6">
                                        <label>{{trans('admin_content.country')}}</label>
                                        <select class="form-control" name ="parent_id" >
                                            <option value="" selected disabled>{{trans('admin_content.choose_one')}}</option>
                                            <option {{$countryCity->parent_id == 0 ? 'selected' : ''}} value="0">{{trans('admin_content.without_country')}}</option>
                                            @foreach($countries as $country)
                                                <option {{$countryCity->parent_id == $country->id ? 'selected' : ''}} value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{trans('admin_content.please_choose_country')}}
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
