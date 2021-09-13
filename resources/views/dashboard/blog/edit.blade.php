@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المنشورا</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
                    المنشورات</span>
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

                    <form class="___class_+?9___" action="{{ route('blog.update', $blog->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}

                        <div class="___class_+?9___">

                            <input type="hidden" name=" blog[][translation_lang]" class="form-control"
                                value="{{ $blog->translation_lang }}">

                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('site.'.$blog->translation_lang.'.title')
                                    @error('blog.0.title')
                                        <span class="text-danger">الحقل مطلوب</p>
                                        @enderror
                                </label>
                                <input type="text" name="blog[0][title]" class="form-control"
                                    placeholder="@lang('site.'.$blog->translation_lang.'.title')"
                                    value="{{ $blog->title }}">
                            </div>

                            <div class="form-group ">
                                <div class="form-group has-success mg-b-0">
                                    <textarea name="blog[0][content]" class="form-control mg-t-20"
                                        placeholder="@lang('site.'.$blog->translation_lang.'.content')"
                                        rows="3">{{ $blog->content }}</textarea>
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
                            <img src="{{ $blog->image_path }}" style="width: 100px;" class="thumbnail image-preview"
                                alt="">
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

                            @foreach ($blog->blogs as $index => $lang)

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

                        @foreach ($blog->blogs as $lang)
                            <div class="tab-pane active" id="tab11{{ $index }}">

                                <form class="___class_+?9___" action="{{ route('blog.update', $lang->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('put') }}

                                    <div class="___class_+?9___">

                                        <input type="hidden" name=" blog[][translation_lang]" class="form-control"
                                            value="{{ $lang->translation_lang }}">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">@lang('site.'.$lang->translation_lang.'.title')
                                                @error('blog.0.title')
                                                    <span class="text-danger">الحقل مطلوب</p>
                                                    @enderror
                                            </label>
                                            <input type="text" name="blog[0][title]" class="form-control"
                                                placeholder="@lang('site.'.$lang->translation_lang.'.title')"
                                                value="{{ $lang->title }}">
                                        </div>

                                        <div class="form-group ">
                                            <div class="form-group has-success mg-b-0">
                                                <textarea name="blog[0][content]" class="form-control mg-t-20"
                                                    placeholder="@lang('site.'.$blog->translation_lang.'.content')"
                                                    rows="3">{{ $lang->content }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3 mb-0">@lang('site.edit')</button>
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
