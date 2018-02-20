<form ng-submit="sygnalLetter()" class="form-horizontal" role="form">
    <div class="d-flex flex-column ddd">
        <script>
            $(document).ready(function() {
                $("#fixModalTable>table").tableHeadFixer();

                $("#chSelectSygnal").change(function() {
                    if ( $(this).is(':checked') ){

                        $( "input:checked.sygnal-all" ).trigger( "click" );
                    }
                    $( ".sygnal-all" ).trigger( "click" );
                });
            });
        </script>
        <div  id="fixModalTable" class="table-responsive">
            <table class="table table-sm table-hover">
                <thead>
                <tr>
                    <th><input type="checkbox" ng-model="sygnal.SelectDeselect" id="chSelectSygnal" ></th>
                    <th>@lang('clients.col_sender')</th>
                    <th>@lang('clients.col_type')</th>
                    <th>@lang('clients.col_date')</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="item in letters">
                    <td><input type="checkbox" class="sygnal-all" ng-model="sygnal.id[item.id]" value="[[item.id]]"></td>
                    <td>[[item.name]]</td>
                    <td>[[item.letter_type.name]]</td>
                    <td>[[item.created_at | asDate | date:'yyyy-MM-dd']]<td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="row mt-auto">
            <div class="col-md-12">
                <div ng-if="sygnal.status == 'OK'"    class="alert alert-success " role="alert">@lang('common.msg_sygnalOK')</div>
                <div ng-if="sygnal.status == 'ERROR'" class="alert alert-danger " role="alert">@lang('common.msg_sygnalERROR')</div>
            </div>
        </div>

        <div class="form-group row justify-content-end">

            <div class="col-md-3">
                <button ng-disabled="sygnal.status == 'WAIT'" type="submit" class="btn btn-primary btn-block p-2">
                    <i ng-if="sygnal.status == 'IDLE'" class="fas fa-envelope-open"></i>
                    <i ng-if="sygnal.status == 'WAIT'" class="fas fa-spinner fa-pulse"></i>
                    &nbsp;@lang('clients.btn_sygnal')
                </button>
            </div>
        </div>
    </div>
</form>
