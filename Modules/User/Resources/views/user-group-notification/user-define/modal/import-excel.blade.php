<div class="modal fade" id="import-excel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    @lang('user::user-group-notification.create.ADD_CUSTOMERS_TO_THE_EXCEL_LIST')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row kt-margin-b-10">
                    <div class="col-lg-12">
                        @lang('user::user-group-notification.create.CHOOSE_FILE_UPLOAD')
                </div>
                </div>
                <div class="row kt-margin-b-10">
                    <div class="col-lg-8">
                        <input class="form-control" readonly id="show">
                        <span class="text-danger error-input-excel"></span>
                    </div>
                    <div class="col-lg-4">
                        <label for="file_excel" class="btn btn-primary">
                            @lang('user::user-group-notification.create.UPLOAD_FILE')
                        </label>
                        <input accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                               id="file_excel" onchange="userGroupDefine.showNameFile()" type="file" style="display: none">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{ route('user.user-group-notification.export-excel-examle') }}">
                            @lang('user::user-group-notification.create.DOWNLOAD_FILE_EXAMPLE')
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    @lang('user::user-group-notification.create.CLOSE')
                </button>
                <button type="button" class="btn btn-primary" onclick="userGroupDefine.import()">
                    @lang('user::user-group-notification.create.ADD_USER')
                </button>
            </div>
        </div>
    </div>
</div>
