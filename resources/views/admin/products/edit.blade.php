@extends('admin.layouts.app')

@section('pageTitle')
    {{trans('admin_content.dashboard')}}
@endsection

@section('pageSubTitle')
    {{trans('admin_content.edit_product')}}
@endsection

@section('content')

    <!--start div-->
    <div class="row" style="display:block">

        <div class="row breadcrumbs-top m-2">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">{{trans('admin_content.products')}}</h2>
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('admin_content.main')}}</a>
                        </li>
                        <li class="breadcrumb-item active">{{trans('admin_content.edit_product')}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{trans('admin_content.edit_product')}}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        @include('alert')
                        <form class="form form-horizontal needs-validation" method="post" enctype="multipart/form-data" action="{{route('products.update', $product->id)}}">
                            {{method_field('PATCH')}} {{csrf_field()}}
                            <div class="form-body">
                                <div class="row">
                                    @foreach($product->getTranslationsArray() as $locale =>$value)
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans("admin_content.name_$locale")}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="{{trans('admin_content.name')}}" name="{{"name_$locale"}}" value="{{$value['name']}}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans("admin_content.description_$locale")}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="7" placeholder="{{trans('admin_content.description')}}" name="{{"description_$locale"}}" required>{{$value['description']}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans("admin_content.short_description_$locale")}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="7" placeholder="{{trans('admin_content.description')}}" name="{{"short_description_$locale"}}" required>{{$value['short_description']}}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans("admin_content.pattern_$locale")}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="{{trans('admin_content.pattern')}}" name="{{"pattern_$locale"}}" value="{{$value['pattern']}}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans("admin_content.material_$locale")}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="{{trans('admin_content.material')}}" name="{{"material_$locale"}}" value="{{$value['material']}}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans("admin_content.size_$locale")}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="{{trans('admin_content.size')}}" name="{{"size_$locale"}}" value="{{$value['size']}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.price_before')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" placeholder="{{trans('admin_content.price_before')}}" name="price_before" value="{{$product->price_before}}" min="1">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.price_after')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" placeholder="{{trans('admin_content.price_after')}}" name="price_after" value="{{$product->price_after}}" min="1">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.colors')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="color" class="form-control" placeholder="{{trans('admin_content.colors')}}" name="colors" value="{{$product->colors}}">
                                            </div>
                                        </div>
                                    </div>

                                        <div class="form-group  col-md-6">
                                            <label>{{trans('admin_content.status')}}</label>
                                            <select class="form-control" name ="status" required>
                                                <option value="" selected disabled >{{trans('admin_content.choose_one')}}</option>
                                                <option @if($product->status == 0) selected @endif value="0">{{trans('admin_content.not_available')}}</option>
                                                <option @if($product->status == 1) selected @endif value="1">{{trans('admin_content.available')}}</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                {{trans('admin_content.please_enter_state')}}
                                            </div>
                                        </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.quantity')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" placeholder="{{trans('admin_content.quantity')}}" name="quantity" value="{{$product->quantity}}" min="0" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.serial_number')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="number" class="form-control" placeholder="{{trans('admin_content.serial_number')}}" name="serial_number" value="{{$product->serial_number}}" min="0" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group  col-md-6">
                                        <label>{{trans('admin_content.brand')}}</label>
                                        <select class="form-control" name ="brand_id" required>
                                            <option value="" selected disabled >{{trans('admin_content.choose_one')}}</option>
                                            @foreach($brands as $brand)
                                                <option {{$product->brand_id == $brand->id ? 'selected' : ''}} value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            {{trans('admin_content.please_enter_name')}}
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <span>{{trans('admin_content.thumbnail')}}</span>
                                            </div>
                                            <div class="col-md-10">
                                                <input type="file" class="form-control" name="thumbnail" accept=".gif, .jpg, .png, .webp">
                                                <div class="invalid-feedback">
                                                    {{trans('admin_content.please_upload_thumbnail')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <span>{{trans('admin_content.images')}}</span>
                                                </div>
                                                <div class="col-md-10">
                                                    <input multiple type="file" class="form-control" name="images[]" accept=".gif, .jpg, .png, .webp">
                                                </div>
                                            </div>
                                        </div>

                                    <div class="col-12">
                                        <div class="form-group  col-md-6">
                                            <label>{{trans('admin_content.categories')}}</label>
                                            <select multiple class="form-control" name ="cat_ids[]" required>
                                                <option value=""  disabled >{{trans('admin_content.choose_one_or_many')}}</option>
                                                @foreach($categories as $category)
                                                    <option  value="{{$category->id}}" {{(in_array($category->id,$product->categories->pluck('id')->toArray())==$category->id)?'selected':''}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">
                                                {{trans('admin_content.please_choose_one_or_many_products')}}
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
