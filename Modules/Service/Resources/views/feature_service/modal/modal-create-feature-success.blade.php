<div id="modal-reset-password-success">
    <div class="modal fade" id="kt_modal_reset_password_success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @lang('user::store-user.reset-password.TITLE_RESET_PASSWORD_SUCCESS')
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="kt-scroll ps ps--active-y" data-scroll="true" style="overflow: hidden;">
                        @include('user::store-user.popup.popup-reset-password-success')
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"
                            id="btn-add-group-child-to-list"
                            class="btn btn-primary"
                            onclick="reset_password.closeModal('#kt_modal_reset_password_success')">
                        @lang('user::store-user.reset-password.BUTTON_FINISHED')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>