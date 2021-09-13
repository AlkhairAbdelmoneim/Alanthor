@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <form action="{{ route('contact.index') }}" method="GET">
            @csrf
            <div class="breadcrumb-header justify-content-between">
                <div class="card-body pb-0">
                    <div class="input-group mb-2">
                        <input type="text" name="search" class="form-control" placeholder="بحث....." value="{{ request()->search }}">
                        <span class="input-group-append">
                            <button class="btn ripple btn-primary" type="submit">@lang('site.search')</button>
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    @if (isset($contacts) && $contacts->count() != 0)

                        <div class="table-responsive">
                            <table class="table table-striped mg-b-0 text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>@lang('site.name_send')</th>
                                        <th>@lang('site.email')</th>
                                        <th>@lang('site.phone')</th>
                                        <th>@lang('site.subject')</th>
                                        <th>@lang('site.message')</th>
                                        <th>@lang('site.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $value)
                                        <tr>
                                            <th scope="row">{{ $value->id }}</th>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ $value->subject }}</td>
                                            <td>{!! $value->message !!}</td>
                                            <td>{{-- $value->created_at->toFormattedDateString() --}}</td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ route('contact.edit', $value->id) }}"><i
                                                        class="fa fa-pulse"></i>@lang('site.edit')</a>

                                                <form method="post" action="{{ route('contact.destroy', $value->id) }}"
                                                    style="display: inline-block">
                                                    @csrf
                                                    {{ method_field('delete') }}

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-danger "><i
                                                                class="fa fa-trash"></i>@lang('site.delete')</button>
                                                    </div>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="content-center">
                                {{ $contacts->appends(request()->query())->links() }}
                            </div>

                        </div><!-- bd -->

                    @else
                        لا يوجد بيانات حاليا
                    @endif
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
@endsection
@section('js')
@endsection
