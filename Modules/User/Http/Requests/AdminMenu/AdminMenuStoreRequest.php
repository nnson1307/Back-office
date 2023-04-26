<?php

namespace Modules\User\Http\Requests\AdminMenu;

use Illuminate\Foundation\Http\FormRequest;

class AdminMenuStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $menuCategoryId = $this->input('menu_category_id');
        return [
            'menu_name' => 'required|unique:admin_menu,menu_name,'.
                'NULL,menu_id,menu_category_id,'.$menuCategoryId.',is_actived,1',
            'menu_position' => 'integer|max:1000000|numeric|unique:admin_menu,menu_position,'.
                'NULL,menu_id,menu_category_id,'.$menuCategoryId.',is_actived,1',
        ];
    }

    public function messages()
    {
        return [
            'menu_name.required' => __('user::validation.admin_menu.PLEASE_ENTER_NAME'),
            'menu_name.unique' => __('user::validation.admin_menu.NAME_EXIST'),
            'menu_position.numeric' => __('user::validation.admin_menu.ONLY_NUMBER'),
            'menu_position.integer' => __('user::validation.admin_menu.ONLY_NUMBER'),
            'menu_position.unique' => __('user::validation.admin_menu.POSITION_EXIST'),
            'menu_position.max' => __('user::validation.admin_menu.MAX_NUMBER'),
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
