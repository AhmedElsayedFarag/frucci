@extends('admin.layouts.app')

@section('pageTitle')
    {{(App()->getLocale() == 'ar') ? 'لوحة التحكم' : 'Dashboard'}}
@endsection

@section('pageSubTitle')
    {{(App()->getLocale() == 'ar') ? 'تعديل سؤال' : 'Edit question'}}
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
                        <li class="breadcrumb-item active">{{(App()->getLocale() == 'ar') ? 'تعديل سؤال' : 'Edit question'}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="card" style="height: 419px;">
                <div class="card-header">
                    <h4 class="card-title">{{(App()->getLocale() == 'ar') ? 'تعديل سؤال' : 'Edit question'}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @include('alert')
                        <form class="form form-horizontal" novalidate method="post" action="{{route('questions.update', $question->id)}}">
                            {{method_field('PATCH')}} {{csrf_field()}}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <span>{{(App()->getLocale() == 'ar') ? 'السؤال' : 'Question'}}</span>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea class="form-control" placeholder="السؤال" name="question" required>{{$question->question}}</textarea>
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
                                                <textarea class="form-control" placeholder="الاجابة" name="answer" required>{{$question->answer}}</textarea>
                                                <div class="invalid-feedback">
                                                    {{(App()->getLocale() == 'ar') ? 'من فضلك أدخل اجابة' : 'Please, enter answer'}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">{{(App()->getLocale() == 'ar') ? 'تعديل' : 'Edit'}}</button>
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