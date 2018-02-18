@extends('layouts.app')
@section('content')


<script src="{{ URL::asset('js/tableHeadFixer.js') }}" type="text/javascript"></script>

<script> var root = './'; </script>
<script> var _token = "{{ csrf_token() }}" </script>


<div class="container mt-5" ng-app="mainModule" ng-controller="simpleCtrl">


    <label><span class="oi oi-magnifying-glass"  aria-hidden="true"></span>
        <input  ng-change="listFirst()" list="browsers" name="myBrowser" ng-model="dupa" /></label>



    <div class="card-header mt-3">
        <h4>Użytkownicy: <small>Lista</small></h4>
    </div>



    <!-- --------------------------------------------------------->

    <script>
        $(document).ready(function() {
            $("#fixTable>table").tableHeadFixer();
        });
    </script>

    <div id="fixTable">
        <table  class="table table-sm table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nazwa</th>
                <th>Email</th>
                <th>Telefon</th>
            </tr>
            </thead>
            <tbody>
            <tr ng-click="selectClient(item.id)" ng-repeat="item in customers">
                <td>[[item.id]]</td>
                <td>[[item.name]]</td>
                <td>[[item.email]]</td>
                <td>[[item.phone]]</td>
            </tr>
            <tr id="scroll-tab-2">
                <td colspan="4">
                    <img ng-hide="hide_loader" class="push-left ng-hide" src="./assets/img/loader.gif" alt="" style="width:  20px;">
                </td>
            </tr>

            </tbody>
        </table>

    </div>

    <!-- --------------------------------------------------------->

    @include('clients-modal')

</div>
@endsection