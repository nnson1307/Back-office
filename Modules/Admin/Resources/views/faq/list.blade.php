<div class="kt-section__content">
    <table class="table table-striped">
        <thead>
        <tr>
            <th id="th_faq_title">
                <p class="pn-pointer" onclick="faq.sort(this, 'faq_title')"
                   data-sort="{{ ($filter['sort_faq$faq_title'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::faq.table.COLUMN_TITLE')
                    @if (isset($_GET['sort_faq$faq_title']) && $_GET['sort_faq$faq_title'] != null)
                        <i class="fa {{ ($filter['sort_faq$faq_title'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th id="th_faq_group_title">
                <p class="pn-pointer" onclick="faq.sort(this, 'faq_group_title')"
                   data-sort="{{ ($filter['sort_fgr$faq_group_title'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::faq.table.COLUMN_TITLE_PARENT')
                    @if (isset($_GET['sort_fgr$faq_group_title']) && $_GET['sort_fgr$faq_group_title'] != null)
                        <i class="fa {{ ($filter['sort_fgr$faq_group_title'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th id="th_faq_position">
                <p class="pn-pointer" onclick="faq.sort(this, 'faq_position')"
                   data-sort="{{ ($filter['sort_faq$faq_position'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::faq.table.COLUMN_POSITION')
                    @if (isset($_GET['sort_faq$faq_position']) && $_GET['sort_faq$faq_position'] != null)
                        <i class="fa {{ ($filter['sort_faq$faq_position'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th id="th_is_actived">
                <p class="pn-pointer" onclick="faq.sort(this, 'is_actived')"
                   data-sort="{{ ($filter['sort_faq$is_actived'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::faq.table.COLUMN_IS_ACTIVED')
                    @if (isset($_GET['sort_faq$is_actived']) && $_GET['sort_faq$is_actived'] != null)
                        <i class="fa {{ ($filter['sort_faq$is_actived'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th><p>@lang('admin::faq.index.ACTION')</p></th>
        </tr>
        </thead>
        <tbody>
        @if(isset($list) && $list->count() > 0)
            @foreach($list as $item)
                <tr>
                    <td>
                        <a href="{{ route('admin.faq.show', $item['faq_id']) }}"
                           title="{{ $item['faq_title'] }}">
                            {{ subString($item['faq_title']) }}
                        </a>
                    </td>
                    <td>
                        <p title="{{ $item['faq_group_title'] }}">
                            {{ subString($item['faq_group_title']) }}
                        </p>
                    </td>
                    <td>
                        <p title="{{ $item['faq_position'] }}">
                            {{ subString($item['faq_position']) }}
                        </p>
                    </td>
                    <td>
                        <span class="kt-switch kt-switch--success">
							<label>
							    <input type="checkbox" class="switch-status"
                                       data-status="{{ $item['is_actived'] }}"
                                       data-id="{{ $item['faq_id'] }}"
                                        {{ ($item['is_actived'] == 1) ? 'checked' : '' }}>
							    <span></span>
							</label>
						</span>
                    </td>
                    <td>
                        <div class="kt-portlet__head-toolbar">
                            <div class="btn-group" role="group">
                                <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Hành động
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                    <a href="{{ route('admin.faq.show', $item['faq_id']) }}" class="dropdown-item">
                                        <i class="la la-search"></i>
                                        <span class="kt-nav__link-text kt-margin-l-5">@lang('admin::policy-terms.input.BUTTON_VIEW')</span>
                                    </a>
                                    @include('helpers.button', ['button' => [
                                                'route' => 'admin.faq.edit',
                                                 'html' => '<a href="'.route('admin.faq.edit', $item['faq_id']).'" class="dropdown-item">'
                                                 .'<i class="la la-edit"></i>'
                                                 .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::faq.input.BUTTON_EDIT').'</span>'.
                                            '</a>'
                                        ]])

                                    @include('helpers.button', ['button' => [
                                               'route' => 'admin.faq.destroy',
                                                'html' => '<a href="javascript:void(0)" onclick="faq.remove('.$item['faq_id'].')" class="dropdown-item">'
                                                .'<i class="la la-trash"></i>'
                                                .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::faq.input.BUTTON_REMOVE').'</span>'.
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
    <input type="hidden" name="sort_fgr$faq_group_title" id="sort_faq_group_title" value="{{$filter['sort_fgr$faq_group_title']}}">
    <input type="hidden" name="sort_faq$faq_position" id="sort_faq_position" value="{{ $filter['sort_faq$faq_position'] }}">
    <input type="hidden" name="sort_faq$is_actived" id="sort_is_actived" value="{{ $filter['sort_faq$is_actived'] }}">
</div>
{{ $list->appends($filter)->links('helpers.paging') }}
