<div class="row">
    <div class="form-group col-lg-3">
        <input class="form-control" type="text" id="keyword_admin_group$group_name"
               name="keyword_admin_group$group_name"
               placeholder="@lang('user::admin-group.index.ADMIN_GROUP_NAME')"
               value="{{$filter['keyword_admin_group$group_name'] != null?$filter['keyword_admin_group$group_name'] : ''}}">
    </div>
    <div class="form-group col-lg-3">
        <a class="btn btn-secondary btn-hover-brand" href="{{route('user.admin-group.index')}}">
            @lang('user::admin-group.input.BUTTON_REMOVE')
        </a>
        <button type="submit" class="btn btn-primary btn-hover-brand">
            @lang('user::admin-group.input.BUTTON_SEARCH')
        </button>
    </div>
</div>
