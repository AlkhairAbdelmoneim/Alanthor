@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الخدمات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
                    خدمه</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0 ">
                {{-- <div class="card-header">
								<h4 class="card-title mb-1">Vertical Form</h4>
								<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>
							</div> --}}
                <div class="card-body">

                    {{-- @include('partials._errors') --}}

                    <form class="___class_+?9___" action="{{ route('products.update',$service->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}

                        <div class="___class_+?9___">

                                <input type="hidden" name=" service[][translation_lang]"
                                    class="form-control" value="{{$service->translation_lang}}">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">@lang('site.'.$service->translation_lang.'.name')
                                        @error("service.0.name")
                                            <span class="text-danger">الحقل مطلوب</p>
                                            @enderror
                                    </label>
                                    <input type="text" name="service[0][name]" class="form-control"
                                        placeholder="@lang('site.'.$service->translation_lang.'.name')" value="{{ $service->name }}">
                                </div>

                                <div class="form-group ">
                                    <div class="form-group has-success mg-b-0">
                                        <textarea name="service[0][description]"
                                            class="form-control mg-t-20" placeholder="@lang('site.'.$service->translation_lang.'.description')"
                                            rows="3">{{$service->description}}</textarea>
                                    </div>
                                </div>

                            <div class="form-group">
                                <div class="">
                                    <div class=" custom-file"
                                    style="margin-bottom: 10px">
                                    <input name="image" class="custom-file-input input_img" id="customFile" type="file">
                                    <label class="custom-file-label" for="customFile">إختر صورة</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group  mg-b-0">
                            <img src="{{ $service->image_path }}" style="width: 100px;"
                                class="thumbnail image-preview" alt="">
                        </div>

                </div>
                <button type="submit" class="btn btn-primary mt-3 mb-0">@lang('site.edit')</button>
                </form>
            </div>

            <div class="panel panel-primary tabs-style-3">
                <div class="tab-menu-heading">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">

                            @foreach ($service->products as $index => $lang)

                                <li class=""><a href=" #tab11{{ $index }}" class="active"
                                    data-toggle="tab"><i
                                        class="fa fa-laptop"></i>{{ __('site.' . $lang->translation_lang . 'name') }}</a>
                                </li>

                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="panel-body tabs-menu-body">
                    <div class="tab-content">

                        @foreach ($service->products as $lang)
                            <div class="tab-pane active" id="tab11{{ $index }}">

                                <form class="___class_+?9___" action="{{ route('products.update', $lang->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('put') }}

                                    <div class="___class_+?9___">

                                        <input type="hidden" name=" service[][translation_lang]" class="form-control"
                                            value="{{ $lang->translation_lang }}">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">@lang('site.'.$lang->translation_lang.'.name')
                                                @error('service.0.name')
                                                    <span class="text-danger">الحقل مطلوب</p>
                                                    @enderror
                                            </label>
                                            <input type="text" name="service[0][name]" class="form-control"
                                                placeholder="@lang('site.'.$lang->translation_lang.'.name')"
                                                value="{{ $lang->name }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">@lang('site.'.$lang->translation_lang.'.description')
                                            </label>
                                            <textarea name="service[0][description]" style="margin-top: 5px; width:100%"
                                                class="form-control "
                                                placeholder="@lang('site.'.$lang->translation_lang.'.description')" rows="3"
                                                cols="12">{{ $lang->description }}</textarea>
            
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-info mt-3 mb-0">@lang('site.edit')</button>
                                </form>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- row -->
@endsection
@section('js')
@endsection
