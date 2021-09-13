@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الطلاب</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ عرض
                    الكورسات</span>
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

                    @include('partials._errors')
                    
                    <form action="{{route('course.store') }}" method="POST">
                        @csrf
                        {{ method_field('post') }}

                        <div class="___class_+?9___">
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('site.name')</label>
                                <input type="text" name="name" class="form-control" placeholder="@lang('site.name')" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">@lang('site.price')</label>
                                <input type="text" name="price" class="form-control" placeholder="@lang('site.price')" value="{{ old('price') }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputPassword1">@lang('site.duration')</label>
                                <input type="text" name="course_duration" class="form-control" placeholder="@lang('site.duration')" value="{{ old('course_duration') }}">
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
