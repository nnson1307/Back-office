<button type="button" id="action-button" class="btn btn-bold btn-label-brand btn-sm" data-toggle="modal" data-target="#kt_modal_3" style="display: none;">Launch Modal</button>
<div class="modal fade show" id="kt_modal_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $trans['create']['detail_form']['faq']['title'] }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body" style="overflow: scroll;">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-3">
                            <input type="text" class="form-control" id="search-title"
                                   placeholder="{{ $trans['create']['detail_form']['faq']['placeholder']['TITLE'] }}">
                        </div>
                        <div class="col-lg-3">
                            <select type="text" class="form-control ss--width-100" id="search-group">
                                <option value="-1">
                                    {{ $trans['create']['detail_form']['faq']['GROUP'] }}
                                </option>
                                @if($groupList->count() != 0)
                                    @foreach($groupList as $group)
                                        <option value="{{ $group['faq_group_id'] }}" data-tokens="ketchup mustard">
                                            {{ $group['faq_group_title'] }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <select type="text" class="form-control ss--width-100" id="search-activated">
                                <option value="-1">
                                    {{ $trans['create']['detail_form']['faq']['header']['STATUS'] }}
                                </option>
                                <option value="1">
                                    {{ $trans['create']['detail_form']['faq']['IS_ACTIVATED']['YES'] }}
                                </option>
                                <option value="0">
                                    {{ $trans['create']['detail_form']['faq']['IS_ACTIVATED']['NO'] }}
                                </option>
                            </select>
                        </div>
                        <div class="col-lg-3">
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-btn">
                    {{ $trans['create']['detail_form']['faq']['BTN_CLOSE'] }}
                </button>
                <button type="button" class="btn btn-primary" id="choose-faq">
                    {{ $trans['create']['detail_form']['faq']['BTN_ADD'] }}
                </button>
            </div>
        </div>
    </div>
</div>
