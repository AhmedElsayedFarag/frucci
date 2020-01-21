@extends('admin.layouts.app')

@section('pageTitle')
    {{trans('admin_content.dashboard')}}
@endsection

@section('pageSubTitle')
    {{trans('admin_content.edit_brand')}}
@endsection

@section('content')

    <!--start div-->
    <div class="row" style="display:block">

        <div class="row breadcrumbs-top m-2">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{trans('admin_content.brands')}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('admin_content.main')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{trans('admin_content.edit_brand')}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{trans('admin_content.edit_brand')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @include('alert')
                        <form class="form form-horizontal needs-validation" method="post" enctype="multipart/form-data" action="{{route('brands.update', $brand->id)}}">
                            {{method_field('PATCH')}}  {{csrf_field()}}
                            <div class="form-body">
                                <div class="row">
                                    @foreach($brand->getTranslationsArray() as $locale =>$value)
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.name')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="{{trans('admin_content.name')}}" name="{{"name_$locale"}}" value="{{$value['name']}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.description')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea class="form-control" placeholder="{{trans('admin_content.description')}}" name="{{"description_$locale"}}">{{$value['description']}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.image')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="file" class="form-control" name="image">
                                                <div class="invalid-feedback">
                                                    {{trans('admin_content.please_upload_image')}}
                                                </div>
                                            </div>
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
