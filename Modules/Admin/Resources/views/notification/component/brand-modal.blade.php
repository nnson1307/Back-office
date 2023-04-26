<button type="button" id="action-button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#kt_modal_4" style="display: none;">Launch Modal</button>
<div class="modal fade show" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $trans['create']['detail_form']['brand']['title'] }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body" style="overflow: scroll;">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-2">
                            <input type="text" class="form-control" id="search-brand-name"
                                   placeholder="{{ $trans['create']['detail_form']['brand']['placeholder']['BRAND_NAME'] }}">
                        </div>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" id="search-brand-code"
                                   placeholder="{{ $trans['create']['detail_form']['brand']['placeholder']['BRAND_CODE'] }}">
                        </div>
                        <div class="col-lg-2">
                            <input type="text" class="form-control" id="search-company-name"
                                   placeholder="{{ $trans['create']['detail_form']['brand']['placeholder']['COMPANY_NAME'] }}">
                        </div>
                        <div class="col-lg-2">
                            <select type="text" class="form-control ss--width-100" id="search-activated">
                                <option value="-1">
                                    {{ $trans['create']['detail_form']['brand']['header']['STATUS'] }}
                                </option>
                                <option value="1">
                                    {{ $trans['create']['detail_form']['brand']['IS_ACTIVATED']['YES'] }}
                                </option>
                                <option value="0">
                                    {{ $trans['create']['detail_form']['brand']['IS_ACTIVATED']['NO'] }}
                                </option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <select type="text" class="form-control ss--width-100" id="search-published">
                                <option value="-1">
                                    {{ $trans['create']['detail_form']['brand']['header']['IS_PUBLISHED'] }}
                                </option>
                                <option value="1">
                                    {{ $trans['create']['detail_form']['brand']['IS_PUBLISHED']['YES'] }}
                                </option>
                                <option value="0">
                                    {{ $trans['create']['detail_form']['brand']['IS_PUBLISHED']['NO'] }}
                                </option>
                            </select>
                        </div>
                        <div class="col-lg-1">
                            <button type="button" class="btn btn-primary" id="submit-search" style="float: right">
                                {{ $trans['create']['detail_form']['brand']['BTN_SEARCH'] }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="kt-section__content" id="item-list"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-btn">Hủy</button>
                <button type="button" class="btn btn-primary" id="choose-brand">Thêm thương hiệu</button>
            </div>
        </div>
    </div>
</div>
