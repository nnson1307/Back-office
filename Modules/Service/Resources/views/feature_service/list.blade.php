<div class="kt-subheader__toolbar hy-customer">
    @include('helpers.button', ['button' => [
        'route' => 'service.service.create',
        'html' => '<a href="javascript:void(0)" onclick="service.showPopup()" class="btn btn-label-brand btn-bold">'
        .__('service::feature_service.button.CREATE_FEATURE').
    '</a>'
    ]])
</div>
<div class="kt-section__content kt-portlet__body">
    <table class="table table-striped table-bordered hy-table">
        <thead>
        <tr>
            <th>
                @lang('service::feature_service.index.NAME_FEATURE')
            </th>
            <th>
                @lang('service::feature_service.index.des')
            </th>
            <th>
                @lang('service::service.table.CREATE_DATE')
            </th>
            <th>
                @lang('service::service.table.UPDATE_DATE')
            </th>
            <th>@lang('service::service.index.STATUS')</th>
            <th><p>@lang('admin::country.index.ACTION')</p></th>
        </tr>
        </thead>
        <tbody id="table-list-feature">

        </tbody>
    </table>
</div>
