@extends('admin.layouts.app')

@section('pageTitle')
    {{trans('admin_content.dashboard')}}
@endsection

@section('pageSubTitle')
    {{trans('admin_content.edit_country')}}
@endsection

@section('content')

    <!--start div-->
    <div class="row" style="display:block">

        <div class="row breadcrumbs-top m-2">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{trans('admin_content.countries')}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('admin_content.main')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{trans('admin_content.edit_country')}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{trans('admin_content.edit_country')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @include('alert')
                        <form class="form form-horizontal needs-validation" method="post" action="{{route('countries.update', $country->id)}}">
                            {{method_field('PATCH')}} {{csrf_token()}}
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    @foreach($country->getTranslationsArray() as $locale =>$value)
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>{{trans("admin_content.country")}}</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input class="form-control" placeholder="{{trans('admin_content.country')}}" name="{{"name_$locale"}}" value="{{$value['name']}}" required>
                                                    <div class="invalid-feedback">
                                                        {{trans('admin_content.please_enter_name')}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

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
