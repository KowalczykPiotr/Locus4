<script src="{{ URL::asset('js/my-scripts/clients-letters-modal.js') }}" type="text/javascript"></script>

<div  ng-controller="lettersCtrl" class="modal fade3" id="modalLetters" tabindex="-1" role="dialog" aria-labelledby="modalDelArtConfirmLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div  class="modal-header">
                <h5 class="modal-title">@lang('clients.lab_title')</h5>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Zamknij</span></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <!-- Zakładki -->
                    <div class="col-3">
                        <div class="nav flex-column nav-pills" role="tablist">
                            <a href=""     ng-click="tabDodaj()"   class="nav-link active"   data-toggle="tab">@lang('clients.tab_add')</a>
                            <a href=""     ng-click="tabWydaj()"   class="nav-link"    data-toggle="tab">@lang('clients.tab_provide')</a>
                            <a href=""     ng-click="resetForm()"  class="nav-link" data-toggle="tab">@lang('clients.tab_list')</a>
                            <a href=""     ng-click="tabSygnal()"  class="nav-link" data-toggle="tab">@lang('clients.tab_notifications')</a>
                        </div>
                    </div>

                    <!-- Zawartość zakładek -->
                    <div class="col-9">

                        <div class="tab-content w-100">
                            <div ng-include="ClientsTabUrl" onload="loaded();"></div>
                        </div>

                    </div>
                </div>


                <div class="modal-footer">

                    <div class="form-group row mt-auto w-80 justify-content-end">

                        <div class="col-md-3">

                            <button type="button" class="btn btn-default btn-block" data-dismiss="modal">@lang('clients.btn_close')</button>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>










