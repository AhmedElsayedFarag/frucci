@extends('admin.layouts.app')

@section('pageTitle')
    {{trans('admin_content.dashboard')}}
@endsection

@section('pageSubTitle')
    {{trans('admin_content.edit_category')}}
@endsection

@section('content')

    <!--start div-->
    <div class="row" style="display:block">

        <div class="row breadcrumbs-top m-2">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{trans('admin_content.categories')}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('admin_content.main')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{trans('admin_content.edit_category')}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{trans('admin_content.edit_category')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @include('alert')
                        <form class="form form-horizontal needs-validation" method="post" enctype="multipart/form-data" action="{{route('categories.update', $category->id)}}">
                            {{method_field('PATCH')}}  {{csrf_field()}}
                            <div class="form-body">
                                <div class="row">
                                <div class="row">
                                    @foreach($category->getTranslationsArray() as $locale =>$value)
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>{{trans("admin_content.name_$locale")}}</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input class="form-control" placeholder="{{trans('admin_content.category')}}" name="{{"name_$locale"}}" value="{{$value['name']}}" required>
                                                    <div class="invalid-feedback">
                                                        {{trans('admin_content.please_enter_name')}}
                                                    </div>
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
                                                    <input type="file" class="form-control" name="image" accept=".gif, .jpg, .png, .webp">
                                                    <div class="invalid-feedback">
                                                        {{trans('admin_content.please_upload_image')}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="form-group  col-md-6">
                                        <label>{{trans('admin_content.main_category')}}</label>
                                        <select class="form-control" name ="parent_id" required>
                                            <option value="" selected disabled>{{trans('admin_content.choose_one')}}</option>
                                            <option {{$category->parent_id == 0 ? 'selected' : ''}} value="0">{{trans('admin_content.without_main_category')}}</option>
                                            @foreach($categories as $cat)
                                                <option {{$category->parent_id == $cat->id ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{trans('admin_content.please_choose_category')}}
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
