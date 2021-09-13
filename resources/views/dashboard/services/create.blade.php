@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الخدمات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة
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

                    <form class="___class_+?9___" action="{{ route('services.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('post') }}

                        <div class="___class_+?9___">
                            @foreach (getLocale() as $key => $locale)

                                <input type="hidden" name=" service[{{ $key }}][translation_lang]"
                                    class="form-control" placeholder="@lang('site.'.$locale.'.name')"
                                    value="{{ $locale }}">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">@lang('site.'.$locale.'.name')
                                        @error("service.$key.name")
                                            <span class="text-danger">الحقل مطلوب</p>
                                            @enderror
                                    </label>
                                    <input type="text" name="service[{{ $key }}][name]" class="form-control"
                                        placeholder="@lang('site.'.$locale.'.name')" value="{{ old('name') }}">
                                </div>

                                <div class="form-group ">
                                    <div class="form-group has-success mg-b-0">
                                        <textarea name="service[{{ $key }}][description]"
                                            class="form-control mg-t-20" placeholder="@lang('site.'.$locale.'.description')"
                                            rows="3"></textarea>
                                    </div>
                                </div>
                            @endforeach

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
                            <img src="{{ asset('uploads/img/default.png') }}" style="width: 100px;"
                                class="thumbnail image-preview" alt="">
                        </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 mb-0">@lang('site.add')</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- row -->
@endsection
@section('js')
@endsection
