<div class="kt-section__content">
    <table class="table table-striped">
        <thead>
        <tr>
            <th id="th_faq_type">
                <p class="pn-pointer" onclick="policyTerms.sort(this, 'faq_type')"
                   data-sort="{{ ($filter['sort_faq$faq_type'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::policy-terms.table.COLUMN_TITLE_PARENT')
                    @if (isset($_GET['sort_faq$faq_type']) && $_GET['sort_faq$faq_type'] != null)
                        <i class="fa {{ ($filter['sort_faq$faq_type'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th id="th_faq_title">
                <p class="pn-pointer" onclick="policyTerms.sort(this, 'faq_title')"
                   data-sort="{{ ($filter['sort_faq$faq_title'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::policy-terms.table.COLUMN_TITLE')
                    @if (isset($_GET['sort_faq$faq_title']) && $_GET['sort_faq$faq_title'] != null)
                        <i class="fa {{ ($filter['sort_faq$faq_title'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th>
                <p>@lang('admin::policy-terms.table.COLUMN_CREATED_AT')</p>
            </th>
            <th><p>@lang('admin::policy-terms.index.ACTION')</p></th>
        </tr>
        </thead>
        <tbody>
        @if(isset($list) && $list->count() > 0)
            @foreach($list as $item)
                <tr>
                    <td>
                        @switch($item['faq_type'])
                            @case('privacy_policy')
                                <p title="Trang chính sách bảo mật">@lang('admin::policy-terms.index.PAGE_PRIVACY_POLICY')</p>
                                @break
                            @case('terms_use')
                                <p title="Trang điều khoản sử dụng">@lang('admin::policy-terms.index.PAGE_TERM_OF_USE')</p>
                                @break
                        @endswitch
                    </td>
                    <td>
                        <a href="{{ route('admin.policy-terms.show', $item['faq_id']) }}"
                           title="{{ $item['faq_title'] }}">
                            {{ subString($item['faq_title']) }}
                        </a>
                    </td>
                    <td>
                        {{ ($item['created_at'] != null) ? date('d/m/Y H:i:s', strtotime($item['created_at'])) : '' }}
                    </td>
                    <td>
                        <div class="kt-portlet__head-toolbar">
                            <div class="btn-group" role="group">
                                <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Hành động
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                    <a href="{{ route('admin.policy-terms.show', $item['faq_id']) }}" class="dropdown-item">
                                        <i class="la la-search"></i>
                                        <span class="kt-nav__link-text kt-margin-l-5">@lang('admin::policy-terms.input.BUTTON_VIEW')</span>
                                    </a>
                                    @include('helpers.button', ['button' => [
                                                'route' => 'admin.policy-terms.edit',
                                                 'html' => '<a href="'.route('admin.policy-terms.edit', $item['faq_id']).'" class="dropdown-item">'
                                                 .'<i class="la la-edit"></i>'
                                                 .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::policy-terms.input.BUTTON_EDIT').'</span>'.
                                            '</a>'
                                        ]])

                                    @include('helpers.button', ['button' => [
                                               'route' => 'admin.policy-terms.destroy',
                                                'html' => '<a href="javascript:void(0)" onclick="policyTerms.remove('.$item['faq_id'].')" class="dropdown-item">'
                                                .'<i class="la la-trash"></i>'
                                                .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::policy-terms.input.BUTTON_REMOVE').'</span>'.
                                           '</a>'
                                       ]])
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <input type="hidden" name="sort_faq$faq_title" id="sort_faq_title" value="{{ $filter['sort_faq$faq_title'] }}">
    <input type="hidden" name="sort_faq$faq_type" id="sort_faq_type" value="{{$filter['sort_faq$faq_type']}}">
</div>
{{ $list->appends($filter)->links('helpers.paging') }}
