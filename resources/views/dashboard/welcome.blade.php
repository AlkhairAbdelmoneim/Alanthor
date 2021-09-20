@extends('layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> مرحبا بك يا,{{ ' ' . auth()->user()->name }}</h2>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="___class_+?7___">
                        <h6 class="mb-3 tx-12 text-white">كل الرسائل</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="___class_+?11___">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ $ContactCount }}</h4>
                                <p class="mb-0 tx-12 text-white op-7">اخر الرسائل الوارده</p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                                <span class="text-white op-7"> +100</span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="___class_+?21___">
                        <h6 class="mb-3 tx-12 text-white">كل الخدمات</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="___class_+?25___">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ $ServiceCount }}</h4>
                                <p class="mb-0 tx-12 text-white op-7">اخر الخدمات المضافه</p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                <span class="text-white op-7"> 100%</span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="___class_+?35___">
                        <h6 class="mb-3 tx-12 text-white">كل المنشورات</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="___class_+?39___">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ $BlogCount }}</h4>
                                <p class="mb-0 tx-12 text-white op-7">اخر المنشورات المضافين</p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                                <span class="text-white op-7"> 100%</span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline3"
                    class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="___class_+?49___">
                        <h6 class="mb-3 tx-12 text-white">كل خدمات الشركة</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="___class_+?53___">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ $ProductCount }}</h4>
                                <p class="mb-0 tx-12 text-white op-7">اخر الخدمات المضافة</p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                <span class="text-white op-7"> 100%</span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
    </div>
    <!-- row closed -->

        <!-- row opened -->
        <div class="row row-sm">
            <div class="col-xl-4 col-md-12 col-lg-12">
                <div class="card  box-shadow-0">
                    <div class="card-header">
                        <h4 class="card-title mb-1">تغيير الباسورد</h4>
                        @include('partials._errors')
    
                    </div>
                    <div class="card-body pt-0">
                        <form action="{{ route('change') }}" method="post">
                            @csrf
                            {{ method_field('post') }}
                            <div class="___class_+?9___">
    
                                <div class="form-group">
                                    <label for="exampleInputPassword1">@lang('site.old_password')</label>
                                    <input type="password" name="old_password" class="form-control"
                                        placeholder="@lang('site.old_password')">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">@lang('site.new_password')</label>
                                    <input type="password" name="new_password" class="form-control"
                                        placeholder="@lang('site.new_password')">
                                </div>
                            </div>
    
                            <button type="submit" class="btn btn-primary mt-3 mb-0">@lang('site.edit')</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header pb-1">
                        <h3 class="card-title mb-2">اخر الخدمات المضافة</h3>
                    </div>
                    <div class="card-body p-0 customers mt-1">
                        <div class="list-group list-lg-group list-group-flush">
    
                            @foreach ($last_product as $value)
                                <div class="list-group-item list-group-item-action" href="#">
                                    <div class="media mt-0">
                                        <img class="avatar-lg rounded-circle ml-3 my-auto"
                                            src="{{ $value->image_path }}" alt="Image description" title="image" alt="No image found">
                                        <div class="media-body">
                                            <div class="d-flex align-items-center">
                                                <div class="mt-1">
                                                    <h5 class="mb-1 tx-15">{{ $value->name }}</h5>
                                                    <p class="mb-0 tx-13 text-muted">
                                                        {{ $value->created_at->toFormattedDateString() }}<span
                                                            class="text-danger ml-2">{{-- $value->job --}}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
    
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-header pb-1">
                        <h3 class="card-title mb-2">اخر الرسائل الواردة</h3>
                    </div>
                    <div class="card-body p-0 customers mt-1">
                        <div class="list-group list-lg-group list-group-flush">
    
                            @foreach ($last_contact as $value)
                                <div class="list-group-item list-group-item-action" href="#">
                                    <div class="media mt-0">
                                        <div class="avatar avatar-md bg-success rounded-circle">
                                            M
                                        </div>
                                        <div class="media-body">
                                            <div class="d-flex align-items-center">
                                                <div class="mt-1">
                                                    <h5 class="mb-1 tx-15">{{ $value->name }}</h5>
                                                    <p class="mb-0 tx-13 text-muted">
                                                        {{-- $value->created_at->toFormattedDateString() --}}<span
                                                            class="text-danger ml-2">{{$value->phone }}</span></p>
                                                            <p class="mb-0 tx-13 text-muted"><span
                                                                    class="text-danger ml-2">{{$value->email }}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row close -->

@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>

    <script>
        $(document).on('click', '.btn_print1', function() {

            $('.print1').printThis({
                header: "<h1>فاتورة منصرفات الشركة</h1>",
            });
        });

        $(document).on('click', '.btn_print2', function() {

            $('.print2').printThis({
                header: "<h1>فاتورة منصرفات الكورس</h1>",
            });
        });
    </script>
@endsection
