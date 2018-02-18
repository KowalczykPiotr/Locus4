<!-- Dodaj -->

<form ng-submit="addLetter()" role="form">
    <div class="d-flex flex-column ddd">
        <input type="hidden" ng-model="add.customer_id">
        <div class="form-group row">
            <label for="inputNadawca" class="col-4 control-label">@lang('clients.lab_sender')</label>
            <div class="col-8">
                <input required type="text" class="form-control form-control-sm" ng-model="add.name" placeholder="@lang('clients.inp_sender')">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputUserGroup" class="col-4 control-label">@lang('clients.lab_type')</label>
            <div class="col-sm-8">
                <select required class="form-control form-control-sm" ng-model="add.letter_type">
                    <option value="" selected hidden>@lang('clients.opt_select')</option>
                    <option ng-repeat="item in letter_type" value="[[item.id]]">[[item.name]]</option>

                </select>
            </div>
        </div>

        <div class="row mt-auto">
            <div class="col-md-12">
                <div ng-if="add.status == 'OK'"    class="alert alert-success " role="alert">@lang('common.msg_addOK')</div>
                <div ng-if="add.status == 'ERROR'" class="alert alert-danger "  role="alert">@lang('common.msg_addERROR')</div>
            </div>
        </div>

        <div class="form-group row justify-content-end">
            <div class="col-md-3">
                    <button ng-disabled="add.status == 'WAIT'" id="addLetterBtn" type="submit" class="btn btn-primary btn-block p-2">
                        <i ng-if="add.status == 0" class="far fa-envelope"></i>
                        <i ng-if="add.status == 1" class="fas fa-spinner fa-pulse"></i>
                        <i ng-if="add.status == 2" class="fas fa-check"></i>
                        <i ng-if="add.status == 3" class="fas fa-exclamation-triangle"></i>
                       &nbsp;@lang('clients.btn_add')
                    </button>
            </div>
        </div>
    </div>
</form>