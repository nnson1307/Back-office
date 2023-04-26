<div class="row">
    <div class="form-group col-lg-3">
        <input class="form-control" type="text" id="keyword_admin_menu$menu_name"
               name="keyword_admin_menu$menu_name"
               placeholder="@lang('user::admin-menu.table.ADMIN_MENU_NAME')"
               value="{{$filter['keyword_admin_menu$menu_name'] != null?$filter['keyword_admin_menu$menu_name'] : ''}}">
    </div>
    <div class="form-group col-lg-3">
        <a class="btn btn-secondary btn-hover-brand" href="{{route('user.admin-menu.index')}}">
            @lang('user::admin-menu.input.BUTTON_REMOVE')
        </a>
        <button type="submit"
                class="btn btn-primary btn-hover-brand">
            @lang('user::admin-menu.input.BUTTON_SEARCH')
        </button>
    </div>
</div>
