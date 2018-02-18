<script src="{{ URL::asset('js/my-scripts/provide-letter.js') }}" type="text/javascript"></script>

<div  ng-controller="provideCtrl" class="modal fade3" id="modalClient" tabindex="-1" role="dialog" aria-labelledby="modalDelArtConfirmLabel" aria-hidden="true">
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
                            <a href="#tab-dodaj"     ng-click="tabDodaj()"  role="tab" class="nav-link active"   data-toggle="tab">@lang('clients.tab_add')</a>
                            <a href="#tab-wydaj"     ng-click="tabWydaj();" role="tab" class="nav-link"    data-toggle="tab">@lang('clients.tab_provide')</a>
                            <a href="#tab-lista"     ng-click="resetForm()" role="tab" class="nav-link" data-toggle="tab">@lang('clients.tab_list')</a>
                            <a href="#tab-sygnal"    ng-click="resetForm()" role="tab" class="nav-link" data-toggle="tab">@lang('clients.tab_notifications')</a>
                        </div>
                    </div>


                    <!-- Zawartość zakładek -->
                    <div class="col-9">
                        <div class="tab-content w-100">

                        <div class="tab-pane fade show active" id="tab-dodaj">
                            <!--dodaj -->
                            @include('clients-modal-dodaj')
                        </div>

                        <div class="tab-pane fade" id="tab-wydaj">
                            <!-- Wydaj -->
                            @include('clients-modal-wydaj')
                        </div>


                        <!-- Lista -->
                        <div class="tab-pane fade" id="tab-lista">
                        </div>

                        <!-- Powiadomienia -->
                        <div class="tab-pane fade" id="tab-sygnal">
                        </div>


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










