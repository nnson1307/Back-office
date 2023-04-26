<div class="row">
    <div class="form-group col-lg-3">
        <input class="form-control" type="text" id="keyword_admin_menu_category$menu_category_name"
               name="keyword_admin_menu_category$menu_category_name"
               placeholder="@lang('user::admin-menu-category.index.ADMIN_MENU_CATEGORY_NAME')"
               value="{{$filter['keyword_admin_menu_category$menu_category_name'] != null?$filter['keyword_admin_menu_category$menu_category_name'] : ''}}">
    </div>
    <div class="form-group col-lg-3">
        <a class="btn btn-secondary btn-hover-brand" href="{{route('user.admin-menu-category.index')}}">
            @lang('user::admin-menu-category.input.BUTTON_REMOVE')
        </a>
        <button type="submit"
                class="btn btn-primary btn-hover-brand">
            @lang('user::admin-menu-category.input.BUTTON_SEARCH')
        </button>
    </div>
</div>
