@extends('admin.layouts.app')

@section('pageTitle')
    {{trans('admin_content.dashboard')}}
@endsection

@section('pageSubTitle')
    {{trans('admin_content.add_question')}}
@endsection

@section('content')

    <!--start div-->
    <div class="row" style="display:block">

        <div class="row breadcrumbs-top m-2">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{trans('admin_content.questions')}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('admin_content.main')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{trans('admin_content.add_question')}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{trans('admin_content.add_question')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @include('alert')
                        <form class="form form-horizontal needs-validation" method="post" action="{{route('questions.store')}}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.question_en')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="7" placeholder="{{trans('admin_content.question')}}" name="question_en" required></textarea>
                                                <div class="invalid-feedback">
                                                    {{trans('admin_content.please_enter_question')}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.answer_en')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="7" placeholder="{{trans('admin_content.answer')}}" name="answer_en" required></textarea>
                                                <div class="invalid-feedback">
                                                    {{trans('admin_content.please_enter_answer')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.question_ar')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="7" placeholder="{{trans('admin_content.question')}}" name="question_ar" required></textarea>
                                                <div class="invalid-feedback">
                                                    {{trans('admin_content.please_enter_question')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.answer_ar')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="7" placeholder="{{trans('admin_content.answer')}}" name="answer_ar" required></textarea>
                                                <div class="invalid-feedback">
                                                    {{trans('admin_content.please_enter_answer')}}
                                                </div>
                                            </div>
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
