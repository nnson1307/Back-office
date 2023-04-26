<div class="modal fade" id="modal-qr-code" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Qr code
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <img src="https://chart.googleapis.com/chart?chs=150x150&cht=qr&chl={{$brand_customer_code}}&choe=UTF-8"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    @lang('user::store-user.reset-password.BUTTON_CANCEL')
                </button>
            </div>
        </div>
    </div>
</div>