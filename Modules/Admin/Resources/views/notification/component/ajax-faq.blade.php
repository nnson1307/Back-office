<table class="table table-striped">
    <thead>
    <tr>
        <th></th>
        <th>{{ $trans['create']['detail_form']['faq']['header']['TITLE'] }}</th>
        <th>{{ $trans['create']['detail_form']['faq']['header']['GROUP_TITLE'] }}</th>
        <th>{{ $trans['create']['detail_form']['faq']['header']['GROUP_POSITION'] }}</th>
        <th>{{ $trans['create']['detail_form']['faq']['header']['STATUS'] }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($detailListPaging as $detail)
        <tr>
            <td>
                <label class="kt-radio">
                    <input type="radio" class="faq-radio" name="faq_radio"
                           value="{{ $detail['faq_id'] }}" data-title="{{ $detail['faq_title'] }}"
                    >
                    <span></span>
                </label>
            </td>
            <td>
                <p title="{{ $detail['faq_title'] }}">
                    {{ subString($detail['faq_title']) }}
                </p>
            </td>
            <td>
                <p title="{{ $detail['faqGroup']['faq_group_title'] }}">
                    {{ subString($detail['faqGroup']['faq_group_title']) }}
                </p>
            </td>
            <td>
                <p title="{{ $detail['faqGroup']['faq_group_position'] }}">
                    {{ subString($detail['faqGroup']['faq_group_position']) }}
                </p>
            </td>
            <td>
                {{ $detail['faqGroup']['is_actived'] == 1
                ? $trans['create']['detail_form']['faq']['IS_ACTIVATED']['YES']
                : $trans['create']['detail_form']['faq']['IS_ACTIVATED']['NO'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $detailListPaging->links('helpers.paging', ['display' => false]) }}
