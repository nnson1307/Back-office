<table class="table table-striped">
    <thead>
    <tr>
        <th></th>
        <th>{{ $trans['create']['detail_form']['brand']['header']['LOGO'] }}</th>
        <th>{{ $trans['create']['detail_form']['brand']['header']['BRAND_NAME'] }}</th>
        <th>{{ $trans['create']['detail_form']['brand']['header']['BRAND_CODE'] }}</th>
        <th>{{ $trans['create']['detail_form']['brand']['header']['COMPANY_NAME'] }}</th>
        <th>{{ $trans['create']['detail_form']['brand']['header']['LINK'] }}</th>
        <th>{{ $trans['create']['detail_form']['brand']['header']['STATUS'] }}</th>
        <th>{{ $trans['create']['detail_form']['brand']['header']['IS_PUBLISHED'] }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($detailListPaging as $detail)
        <tr>
            <td>
                <label class="kt-radio">
                    <input type="radio" class="brand-radio" name="brand_radio"
                           value="{{ $detail['brand_id'] }}" data-name="{{ $detail['brand_name'] }}"
                    >
                    <span></span>
                </label>
            </td>
            <td>
                <img width="60" height="60" src="{{ $detail['brand_avatar'] }}" >
            </td>
            <td>
                <p title="{{ $detail['brand_name'] }}">
                    {{ subString($detail['brand_name']) }}
                </p>
            </td>
            <td>
                <p title="{{ $detail['brand_code'] }}">
                    {{ subString($detail['brand_code']) }}
                </p>
            </td>
            <td>
                <p title="{{ $detail['company_name'] }}">
                    {{ subString($detail['company_name']) }}
                </p>
            </td>
            <td>
                <p title="{{ $detail['brand_url'] }}">
                    {{ subString($detail['brand_url']) }}
                </p>
            </td>
            <td>
                {{ $detail['is_activated'] == 1
                ? $trans['create']['detail_form']['brand']['IS_ACTIVATED']['YES']
                : $trans['create']['detail_form']['brand']['IS_ACTIVATED']['NO'] }}
            </td>
            <td>
                {{ $detail['is_published'] == 1
                ? $trans['create']['detail_form']['brand']['IS_PUBLISHED']['NO']
                : $trans['create']['detail_form']['brand']['IS_PUBLISHED']['NO'] }}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $detailListPaging->links('admin::notification.component.paging', ['display' => false]) }}
