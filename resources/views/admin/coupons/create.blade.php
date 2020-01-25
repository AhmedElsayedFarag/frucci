@extends('admin.layouts.app')

@section('pageTitle')
    {{trans('admin_content.dashboard')}}
@endsection

@section('pageSubTitle')
    {{trans('admin_content.add_coupon')}}
@endsection

@section('content')

    <!--start div-->
    <div class="row" style="display:block">

        <div class="row breadcrumbs-top m-2">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{trans('admin_content.coupons')}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('admin_content.main')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{trans('admin_content.add_coupon')}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{trans('admin_content.add_coupon')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @include('alert')
                        <form class="form form-horizontal needs-validation" method="post" action="{{route('coupons.store')}}">
                            @csrf
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.coupon')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input class="form-control" placeholder="{{trans('admin_content.coupon')}}" name="coupon" required>
                                                <div class="invalid-feedback">
                                                    {{trans('admin_content.please_enter_coupon')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.option')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <label>{{trans('admin_content.brand')}}<input type="radio" id='enable_brand' name="option" value="brand" required></label>
                                                <label>{{trans('admin_content.products')}}<input type="radio" id="disable_brand" name="option" value="products" required></label>
                                                <div class="invalid-feedback">
                                                    {{trans('admin_content.please_choose_one')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group  col-md-6">
                                        <label>{{trans('admin_content.type_coupon')}}</label>
                                        <select class="form-control" id="change_type" name ="type" required>
                                            <option value="" selected disabled >{{trans('admin_content.choose_one')}}</option>
                                            <option value="percentage">{{trans('admin_content.percentage')}}</option>
                                            <option value="discount">{{trans('admin_content.discount')}}</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            {{trans('admin_content.please_choose_type')}}
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.value')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" id="change_value" placeholder="{{trans('admin_content.value')}}" step="any" min="" max="" name="value" required>
                                                <div class="invalid-feedback">
                                                    {{trans('admin_content.please_enter_value')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.expire_date')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="date" id="valid_date" class="form-control" min="" placeholder="{{trans('admin_content.expire_date')}}" name="expire_date">
                                                <div class="invalid-feedback">
                                                    {{trans('admin_content.please_enter_expire_date')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.number_of_users')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" placeholder="{{trans('admin_content.number_of_users')}}" name="number_of_users">
                                                <div class="invalid-feedback">
                                                    {{trans('admin_content.please_enter_number_of_users')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group  col-md-6">
                                        <label>{{trans('admin_content.brand')}}</label>
                                        <select class="form-control" name ="brand_id" id="select_brand" disabled required>
                                            <option value="" selected disabled >{{trans('admin_content.choose_one')}}</option>
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{trans('admin_content.please_choose_brand')}}
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

@section('scripts')
    <script>
        $('#change_type').change(function(){
            if($(this).val() === 'percentage'){
               $('#change_value').attr({
                   "max" : 0.99,
                   "min" : 0.01
               });



            }else{
                $('#change_value').attr({
                    'min': 1,
                    'max' : 1000000,
                });
            }
        });
    </script>

    <script>
        $('#disable_brand').click(function(){

                $('#select_brand').attr('disabled', 'disabled');

        });

        $('#enable_brand').click(function(){
            $('#select_brand').removeAttr('disabled');



        });
    </script>

    <script>
        $('#valid_date').click(function ()
        {
            var todaysDate = new Date();
            var year = todaysDate.getFullYear();
            var month = ("0" + (todaysDate.getMonth() + 1)).slice(-2);
            var day = ("0" + todaysDate.getDate()).slice(-2);
            var minDate = (year +"-"+ month +"-"+ day);
            $('#valid_date').attr('min',minDate);
        });
    </script>
@endsection
