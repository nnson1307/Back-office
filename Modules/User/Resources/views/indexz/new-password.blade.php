<div class="modal fade" id="kt_datatable_records_fetch_modal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('Changes password')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>

            <form id="form-password">
                <div class="modal-body">
                    <div class="kt-portlet__body">

                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">@lang('Password')</label>
                            <div class="col-lg-9 col-xl-9">
                                <input class="form-control" type="password" id="password_new" name="password_new"
                                       placeholder="">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-brand" data-dismiss="modal">@lang('Cancel')</button>
                    <button type="submit" class="btn btn-facebook" onclick="reset_password.submit_reset()">
                        @lang('Save change')
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
