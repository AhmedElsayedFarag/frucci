@extends('admin.layouts.app')

@section('pageTitle')
    {{(App()->getLocale() == 'ar') ? 'لوحة التحكم' : 'Dashboard'}}
@endsection

@section('pageSubTitle')
    {{(App()->getLocale() == 'ar') ? 'اضافة سؤال' : 'Add question'}}
@endsection

@section('content')

    <!--start div-->
    <div class="row" style="display:block">

        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{(App()->getLocale() == 'ar') ? 'الأسئلة' : 'Questions'}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('main')}}">{{(App()->getLocale() == 'ar') ? 'الرئيسية' : 'Main'}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{(App()->getLocale() == 'ar') ? 'اضافة سؤال' : 'Add question'}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="card" style="height: 419px;">
                <div class="card-header">
                    <h4 class="card-title">{{(App()->getLocale() == 'ar') ? 'اضافة سؤال' : 'Add question'}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @include('alert')
                        <form class="form form-horizontal" novalidate method="post" action="{{route('questions.store')}}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>{{(App()->getLocale() == 'ar') ? 'السؤال' : 'Question'}}</span>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea class="form-control" placeholder="{{(App()->getLocale() == 'ar') ? 'السؤال' : 'Question'}}" name="question" required></textarea>
                                                <div class="invalid-feedback">
                                                    {{(App()->getLocale() == 'ar') ? 'من فضلك أدخل سؤال' : 'Please, enter question'}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>{{(App()->getLocale() == 'ar') ? 'الاجابة' : 'Answer'}}</span>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea class="form-control" placeholder="{{(App()->getLocale() == 'ar') ? 'الاجابة' : 'Answer'}}" name="answer" required></textarea>
                                                <div class="invalid-feedback">
                                                    {{(App()->getLocale() == 'ar') ? 'من فضلك أدخل اجابة' : 'Please, enter answer'}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">{{(App()->getLocale() == 'ar') ? 'اضافة' : 'Add'}}</button>
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