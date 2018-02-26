@extends('layouts.app')
@section('title', 'Administracja')
@section('mnu-admin', 'active')
@section('content')

    <script> var root = './'; </script>
    <script> var _token = "{{ csrf_token() }}" </script>


    <div class="container mt-5">

        @include('messages')


        <div class="jumbotron p-4 mt-3">
            <h4>@lang('admin/clients-edit.title')</h4>
        </div>

        <div class="p-3">
            <form action="{{ url('/admin/clients/update/') }}" role="form" method="post">
                {{ csrf_field() }}

                <input type="hidden" name="id" value="{{ $customer->id }}">
                <div class="form-group row">
                    <label for="input-name" class="col-lg-6 control-label text-right">@lang('admin/clients-edit.lab_name')</label>
                    <div class="col-lg-6">
                        <input id="input-name" name="name" required type="text" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="@lang('admin/clients-edit.inp_name')" value="{{ $customer->name }}">
                        @if ($errors->has('name'))
                            <div class="invalid-feedback"> {{ $errors->first('name') }} </div>
                        @endif

                    </div>
                </div>
                <div class="form-group row">
                    <label for="input-email" class="col-lg-6 control-label text-right">@lang('admin/clients-edit.lab_email')</label>
                    <div class="col-lg-6">
                        <input id="input-email" name="email" required type="email" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="@lang('admin/clients-edit.inp_email')" value="{{ $customer->email }}">
                        @if ($errors->has('email'))
                            <div class="invalid-feedback"> {{ $errors->first('email') }} </div>
                        @endif

                    </div>
                </div>
                <div class="form-group row">
                    <label for="input-phone" class="col-lg-6 control-label text-right">@lang('admin/clients-edit.lab_phone')</label>
                    <div class="col-lg-6">
                        <input id="input-phone" name="phone" required type="text" class="form-control form-control-sm {{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="@lang('admin/clients-edit.inp_phone')" value="{{ $customer->phone }}">
                        @if ($errors->has('phone'))
                            <div class="invalid-feedback"> {{ $errors->first('phone') }} </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="input-group" class="col-lg-6 control-label text-right">@lang('admin/clients-edit.lab_group')</label>
                    <div class="col-lg-6">
                        <select id="input-group" name="group" class="form-control form-control-sm  {{ $errors->has('group') ? ' is-invalid' : '' }}">
                            @foreach($customer_groups as $customer_group)
                                <option @if($customer_group->id == $customer->customer_group_id) selected @endif value="{{ $customer_group->id }}">{{ $customer_group->group_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group row justify-content-end">
                    <div class="col-md-2">
                        <a href="{{ url('/admin/clients/') }}" class="btn btn-primary btn-block p-2">
                            <i class="fas fa-times"></i>
                            @lang('admin/clients-edit.btn_cancel')
                        </a>
                    </div>
                    <div class="col-md-2">
                        <button id="addLetterBtn" type="submit" class="btn btn-primary btn-block p-2">
                            <i class="fas fa-database"></i>
                            &nbsp;@lang('admin/clients-edit.btn_save')
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection