

@extends('admin.layouts.app')

@section('pageTitle'){{trans('admin_content.dashboard')}}
@endsection

@section('pageSubTitle') {{trans('admin_content.coupons')}}
@endsection

@section('content')

    <!--start div-->
    <div class="row" style="display:block">


        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{trans('admin_content.coupons')}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('admin_content.main')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{trans('admin_content.coupons')}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="{{route('coupons.create')}}" class="btn btn-primary btn-block my-2 waves-effect waves-light">{{trans('admin_content.add_coupon')}} </a>
                            <table class="table table-bordered mb-0">
                                <thead>
                                <tr align="center">
                                    <th>#</th>
                                    <th>{{trans('admin_content.coupon')}}</th>
                                    <th>{{trans('admin_content.option')}}</th>
                                    <th>{{trans('admin_content.brand')}}</th>
                                    <th>{{trans('admin_content.type_coupon')}}</th>
                                    <th>{{trans('admin_content.value')}}</th>
                                    <th>{{trans('admin_content.expire_date')}}</th>
                                    <th>{{trans('admin_content.number_of_users')}}</th>
                                    <th>{{trans('admin_content.taken_action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($coupons as $coupon)
                                    <tr align="center">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$coupon->coupon}}</td>
                                        @if($coupon->option == 'brand')
                                        <td>{{trans('admin_content.brand')}}</td>
                                        @else
                                        <td>{{trans('admin_content.products')}}</td>
                                        @endif
                                        <td>{{optional($coupon->brand)->name}}</td>
                                        @if($coupon->type == 'percentage')
                                            <td>{{trans('admin_content.percentage')}}</td>
                                        @else
                                            <td>{{trans('admin_content.discount')}}</td>
                                        @endif
                                        @if($coupon->type == 'discount')
                                            <td>{{$coupon->value . ' ' . trans('admin_content.currency')}}</td>
                                        @else
                                            <td>{{$coupon->value}}</td>
                                        @endif
                                        <td>{{$coupon->expire_date}}</td>
                                        <td>{{$coupon->number_of_users}}</td>
                                        <td>
                                            <a title="delete" onclick="return true;" class="remove-alert" id="confirm-color" object_id="{{ $coupon->id }}" delete_url="/coupons/" href="#">
                                            <i class="fa fa-times"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--end div-->

@endsection










@section('scripts')

@endsection
