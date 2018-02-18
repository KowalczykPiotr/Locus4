@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row mt-4">

        <div class="alert alert-primary" role="alert">
            This is a primary alert—check it out!
        </div>

    </div>

    <div class="row mt-4">

        <span class="badge badge-primary">Badge Primary</span>

    </div>


    <div class="row mt-4">

        <button type="button" class="btn btn-primary">Primary</button>
        <button type="button" class="btn btn-outline-primary">Primary</button>

    </div>

    <div class="row mt-4">

        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header">Header</div>
            <div class="card-body">
                <h5 class="card-title">Primary card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>

    </div>


    <div class="row mt-4">

        <ul class="list-group">
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item list-group-item-primary">This is a primary list group item</li>
            <li class="list-group-item list-group-item-secondary">This is a secondary list group item</li>
        </ul>

    </div>

    <div class="row mt-4">

        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action active">
                Cras justo odio
            </a>
            <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
        </div>

    </div>

    <div class="row mt-4">


    </div>

    <div class="row mt-4">


    </div>























    <div class="row mt-4">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
