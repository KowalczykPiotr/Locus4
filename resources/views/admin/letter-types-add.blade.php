@extends('layouts.app')
@section('title', 'Administracja')
@section('mnu-admin', 'active')
@section('content')

<script> var root = './'; </script>
<script> var _token = "{{ csrf_token() }}" </script>


<div class="container mt-5">

    @include('messages')


    <div class="jumbotron p-4 mt-3">
        <h4>@lang('admin/letter-types-add.title')</h4>
    </div>

    <div class="p-3">
        <form action="{{ url('/admin/letter-types/save/') }}" role="form" method="post">
            {{ csrf_field() }}

            <div class="form-group row">
                <label for="input-name" class="col-lg-6 control-label text-right">@lang('admin/letter-types-add.lab_name')</label>
                <div class="col-lg-6">
                    <input id="input-name" name="name" required type="text" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="@lang('admin/letter-types-add.inp_name')" value="{{ old('name') }}">
                    @if ($errors->has('name'))
                        <div class="invalid-feedback"> {{ $errors->first('name') }} </div>
                    @endif

                </div>
            </div>
            <div class="form-group row">
                <label for="input-sort_order" class="col-lg-6 control-label text-right">@lang('admin/letter-types-add.lab_sort')</label>
                <div class="col-lg-6">
                    <input id="input-sort_order" name="sort_order" required type="text" class="form-control form-control-sm {{ $errors->has('sort_order') ? ' is-invalid' : '' }}" placeholder="@lang('admin/letter-types-add.inp_sort')" value="{{ old('sort_order') }}">
                    @if ($errors->has('sort_order'))
                        <div class="invalid-feedback"> {{ $errors->first('sort_order') }} </div>
                    @endif

                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-md-2">
                    <a href="{{ url('/admin/letter-types/') }}" class="btn btn-primary btn-block p-2">
                        <i class="fas fa-times"></i>
                        @lang('admin/letter-types-add.btn_cancel')
                    </a>
                </div>
                <div class="col-md-2">
                    <button id="addLetterBtn" type="submit" class="btn btn-primary btn-block p-2">
                        <i class="fas fa-database"></i>
                        &nbsp;@lang('admin/letter-types-add.btn_add')
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection