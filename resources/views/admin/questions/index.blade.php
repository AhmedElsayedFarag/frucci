

@extends('admin.layouts.app')

@section('pageTitle'){{(App()->getLocale() == 'ar') ? 'لوحة التحكم' : 'Dashboard'}}
@endsection

@section('pageSubTitle') {{(App()->getLocale() == 'ar') ? 'الأسئلة' : 'Questions'}}
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
                        <li class="breadcrumb-item active">{{(App()->getLocale() == 'ar') ? 'الأسئلة' : 'Questions'}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>



        <div class="table-responsive">
            <a href="{{route('questions.create')}}" class="btn btn-primary btn-block my-2 waves-effect waves-light">{{(App()->getLocale() == 'ar') ? 'اضافة سؤال' : 'Add question'}} </a>
            <table class="table table-bordered mb-0">
                <thead>
                <tr align="center">
                    <th>#</th>
                    <th>{{(App()->getLocale() == 'ar') ? 'السؤال' : 'Question'}}</th>
                    <th>{{(App()->getLocale() == 'ar') ? 'الاجابة' : 'Answer'}}</th>
                    <th>{{(App()->getLocale() == 'ar') ? 'الاجراء المتخذ' : 'Taken action'}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr align="center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$question->question}}</td>
                        <td>{{$question->answer}}</td>
                        <td>
                            <a href="{{route('questions.edit', $question->id)}}"><i class="fa fa-edit"></i></a>

                           <a title="delete" onclick="return true;" class="remove-alert" id="confirm-color" object_id="{{ $question->id }}" delete_url="/questions/" href="#">
                                <i class="fa fa-times"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    </div>
    <!--end div-->

@endsection










@section('scripts')

@endsection
