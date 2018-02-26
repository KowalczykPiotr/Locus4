@extends('layouts.app')
@section('title', 'Klienci')
@section('mnu-clients', 'active')
@section('content')


<script> var root = './'; </script>
<script> var _token = "{{ csrf_token() }}" </script>


<div class="container mt-5">

    @include('messages')

    <div class="jumbotron p-4 mt-3">
        <h4>@lang('admin/clients.title')
            <a href="{{ url('/admin/clients/add/') }}" type="button" title="@lang('admin/clients.pop_add')" class="float-right btn btn-primary">
                <i class="fas fa-plus-square"></i>
            </a>
        </h4>
    </div>

    <div class="jumbotron p-4 mt-4">
        <form action="{{ url('/admin/clients/') }}" role="form" method="post">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputName">@lang('admin/clients.sf_name')</label>
                    <input type="text" name="name" class="form-control" id="inputName" value="{{ $input->name }}" placeholder="@lang('admin/clients.sf_name')">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputEmail">@lang('admin/clients.sf_email')</label>
                    <input type="test" name="email" class="form-control" id="inputEmail" value="{{ $input->email }}" placeholder="@lang('admin/clients.sf_email')">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputPhone">@lang('admin/clients.sf_phone')</label>
                    <input type="test" name="phone" class="form-control" id="inputPhone" value="{{ $input->phone }}" placeholder="@lang('admin/clients.sf_phone')">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputGroup">@lang('admin/clients.sf_group')</label>
                    <select id="inputGroup" name="group" class="form-control">
                        <option value="" @empty($input->group) selected @endempty >@lang('admin/clients.sf_select')</option>
                        @foreach($customer_groups as $customer_group)
                            <option value="{{ $customer_group->id }}" @if($input->group == $customer_group->id) selected @endif >{{ $customer_group->group_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <a href="{{ url('/admin/clients/') }}" class="btn btn-outline-primary">
                <i class="fas fa-users"></i>
                @lang('admin/clients.btn_reset')
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-search"></i>
                @lang('admin/clients.btn_search')
            </button>

        </form>
    </div>



    <div>
        <table  class="table tab-clients table-sm table-hover">
            <thead>
            <tr>
                <th>@lang('admin/clients.col_id')</th>
                <th>@lang('admin/clients.col_name')</th>
                <th>@lang('admin/clients.col_email')</th>
                <th>@lang('admin/clients.col_phone')</th>
                <th><span class="float-right">@lang('admin/clients.col_action')</span></th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{$customer->id}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->email}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>
                <span class="float-right">
                    <a href="{{ url('/admin/clients/view/')}}/{{$customer->id}}" type="button" title="@lang('admin/clients.pop_view')" class="btn btn-primary btn-sm btn-action"><i class="fas fa-eye"></i></a>
                    <a href="{{ url('/admin/clients/edit/')}}/{{$customer->id}}" type="button" title="@lang('admin/clients.pop_edit')" class="btn btn-primary btn-sm btn-action"><i class="fas fa-edit"></i></a>
                    <a href="#"
                       onclick="if (confirm('@lang('admin/clients.confirm_del')')) {window.location.href =  '{{ url('/admin/clients/delete/')}}/{{$customer->id}}' }"
                       type="button" title="@lang('admin/clients.pop_del')"  class="btn btn-primary btn-sm btn-action"><i class="fas fa-trash-alt"></i></a>
                </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @if (isset($prev))
        <a href="{{ url('/admin/clients/') }}" type="button" title="@lang('admin/clients.pop_prev')" class="btn btn-primary">
            <i class="fas fa-backward"></i>
        </a>
    @endif

    @if (isset($next))
        <a href="{{ url('/admin/clients/')}}/{{$next}}" type="button" title="@lang('admin/clients.pop_next')" class="btn btn-primary">
            <i class="fas fa-forward"></i>
        </a>
    @endif
</div>


@endsection