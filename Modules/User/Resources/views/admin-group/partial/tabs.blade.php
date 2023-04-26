<div class="kt-portlet__head">
    <div class="kt-portlet__head-toolbar">
        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-left nav-tabs-line-primary"
            role="tablist">
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link active" data-toggle="tab" href="#admin-group-child"--}}
{{--                   role="tab"--}}
{{--                   aria-selected="true">--}}
{{--                    @lang('user::admin-group.create.ADMIN_GROUP_CHILD')--}}
{{--                </a>--}}
{{--            </li>--}}
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#admin-list"
                   role="tab"
                   aria-selected="true">
                    @lang('user::admin-group.create.ADMIN_LIST')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#admin-group-action-menu"
                   role="tab"
                   aria-selected="true">
                    @lang('user::admin-group.create.ADMIN_GROUP_ACTION_MENU')
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#admin-group-action"
                   role="tab"
                   aria-selected="true">
                    @lang('user::admin-group.create.ADMIN_GROUP_ACTION')
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="kt-form kt-form--label-right">
    <div class="kt-portlet__body">
        <div class="tab-content">
{{--            <div class="tab-pane active" id="admin-group-child">--}}
{{--                <div class="kt-section kt-margin-t-30">--}}
{{--                    <div class="kt-section__body">--}}
{{--                        @include('user::admin-group.partial.list-admin-group-child')--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="tab-pane active" id="admin-list">
                <div class="kt-section kt-margin-t-30">
                    <div class="kt-section__body">
                        @if (isset($detail))
                            @include('user::admin-group.partial.list-admin-list-static')
                        @else
                            @include('user::admin-group.partial.list-admin-list')
                        @endif
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="admin-group-action-menu">
                <div class="kt-section kt-margin-t-30">
                    <div class="kt-section__body">
                        @include('user::admin-group.partial.list-admin-group-action-menu')
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="admin-group-action">
                <div class="kt-section kt-margin-t-30">
                    <div class="kt-section__body">
                        @include('user::admin-group.partial.list-admin-group-action')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="kt-portlet__foot"></div>
</div>
