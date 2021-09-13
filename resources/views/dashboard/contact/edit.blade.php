@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الكورسات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">تعديل
                    </span>
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
                    
                    {{--  <form action="{{route('contact.update' ,$contact->id) }}" method="POST">
                        @csrf
                        {{ method_field('put') }}  --}}

                        <div class="___class_+?9___">
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('site.name_send')</label>
                                <input type="text" name="name" class="form-control" placeholder="@lang('site.name')" value="{{ $contact->name}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">@lang('site.email')</label>
                                <input type="email" name="email" class="form-control" placeholder="@lang('site.price')" value="{{ $contact->email}}">
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputPassword1">@lang('site.phone')</label>
                                <input type="text" name="phone" class="form-control" placeholder="@lang('site.duration')" value="{{ $contact->phone }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">@lang('site.subject')</label>
                                <input type="text" name="subject" class="form-control" placeholder="@lang('site.duration')" value="{{ $contact->subject }}">
                            </div>

                            <div class="form-group ">
                                <div class="form-group has-success mg-b-0">
                                    <textarea name="messaage"
                                        class="form-control mg-t-20" placeholder="@lang('site.messaage')"
                                        rows="3">{{$contact->message}}</textarea>
                                </div>
                            </div>

                        </div>
                        {{--  <button type="submit" class="btn btn-primary mt-3 mb-0">@lang('site.add')</button>  --}}
                        <form method="post" action="{{ route('contact.destroy', $contact->id) }}"
                            style="display: inline-block">
                            @csrf
                            {{ method_field('delete') }}

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger "><i
                                        class="fa fa-trash"></i>@lang('site.delete')</button>
                            </div>
                        </form>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
@endsection
@section('js')
@endsection
