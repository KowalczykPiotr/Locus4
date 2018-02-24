@if(Session::has('alert-danger'))
<div class="alert alert-danger fade show" role="alert">
    <strong>@lang('admin.error')</strong> {{ Session::get('alert-danger') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(Session::has('alert-success'))
    <div class="alert alert-success fade show" role="alert">
        <strong>@lang('admin.success')</strong> {{ Session::get('alert-success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif