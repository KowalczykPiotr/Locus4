@extends('layouts.app')
@section('title', 'Administracja')
@section('mnu-admin', 'active')
@section('content')

<script> var root = './'; </script>
<script> var _token = "{{ csrf_token() }}" </script>


<div class="container mt-5">

    @include('messages')

    <div class="card-header mt-3">
        <h4>@lang('admin.client_groups')</h4>
    </div>

    <div class="p-3">
        <form action="{{ url('/admin/customer-groups/update/') }}" role="form" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$customer_group->id}}">
            <div class="form-group row">
                <label for="input-group_name" class="col-lg-6 control-label text-right">@lang('admin.lab_groupname')</label>
                <div class="col-lg-6">
                    <input id="input-group_name" name="group_name" required type="text" class="form-control form-control-sm {{ $errors->has('group_name') ? ' is-invalid' : '' }}" placeholder="@lang('admin.inp_groupname')" value="{{$customer_group->group_name}}">
                    @if ($errors->has('group_name'))
                        <div class="invalid-feedback"> {{ $errors->first('group_name') }} </div>
                    @endif

                </div>
            </div>
            <div class="form-group row">
                <label for="input-sort_order" class="col-lg-6 control-label text-right">@lang('admin.lab_sort_order')</label>
                <div class="col-lg-6">
                    <input id="input-sort_order" name="sort_order" required type="text" class="form-control form-control-sm {{ $errors->has('sort_order') ? ' is-invalid' : '' }}" placeholder="@lang('admin.inp_sort_order')" value="{{ $customer_group->sort_order }}">
                    @if ($errors->has('sort_order'))
                        <div class="invalid-feedback"> {{ $errors->first('sort_order') }} </div>
                    @endif

                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-md-2">
                    <a href="{{ url('/admin/customer-groups/') }}" class="btn btn-primary btn-block p-2">
                        <i class="fas fa-times"></i>
                        @lang('admin.btn_cancel')
                    </a>
                </div>
                <div class="col-md-2">
                    <button id="addLetterBtn" type="submit" class="btn btn-primary btn-block p-2">
                        <i class="fas fa-database"></i>
                        @lang('admin.btn_edit')
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection