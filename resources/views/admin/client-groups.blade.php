@extends('layouts.app')
@section('title', 'Administracja')
@section('mnu-admin', 'active')
@section('content')


<script> var root = './'; </script>
<script> var _token = "{{ csrf_token() }}" </script>


<div class="container mt-5">

    @include('messages')

    <div class="card-header mt-3">
        <h4>@lang('admin.client_groups')
            <a href="{{ url('/admin/customer-groups/add/') }}"><button type="button" class="float-right btn btn-primary"><i class="fas fa-plus-square"></i></button></a>
        </h4>
    </div>

    <div>
        <table  class="table tab-groups table-sm table-hover">
            <thead>
            <tr>
                <th>@lang('admin.id')</th>
                <th>@lang('admin.customer_group_name')</th>
                <th class="text-center">@lang('admin.customer_group_sort')</th>
                <th><span class="float-right">@lang('admin.customer_group_actions')</span></th>
            </tr>
            </thead>
            <tbody>
            @foreach($customer_groups as $group)
            <tr>
                <td>{{$group->id}}</td>
                <td>{{$group->group_name}}</td>
                <td class="text-center">{{$group->sort_order}}</td>
                <td>
                    <span class="float-right">
                        <a href="{{ url('/admin/customer-groups/edit/')}}/{{$group->id}}" type="button" title="@lang('admin.pop_edit')" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="#"
                           onclick="if (confirm('@lang('admin.confirm_del')')) {window.location.href =  '{{ url('/admin/customer-groups/delete/')}}/{{$group->id}}' }"
                           type="button" title="@lang('admin.pop_del')"  class="btn btn-primary btn-sm"><i class="fas fa-trash-alt"></i></a>
                    </span>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>


</div>
@endsection