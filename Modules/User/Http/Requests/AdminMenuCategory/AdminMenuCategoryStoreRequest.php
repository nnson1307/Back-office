<?php

namespace Modules\User\Http\Requests\AdminMenuCategory;

use Illuminate\Foundation\Http\FormRequest;

class AdminMenuCategoryStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'menu_category_name' => 'required|max:250|unique:admin_menu_category,menu_category_name,'.
                'NULL,menu_category_id,is_actived,1',
            'menu_category_position' => 'integer|max:1000000|numeric|unique:admin_menu_category,menu_category_position,'.
                'NULL,menu_category_id,is_actived,1',
        ];
    }

    public function messages()
    {
        return [
            'menu_category_name.required' => __('user::validation.admin_menu_category.PLEASE_ENTER_NAME'),
            'menu_category_name.max' => __('user::validation.admin_menu_category.MAX_LENGTH_250'),
            'menu_category_name.unique' => __('user::validation.admin_menu_category.NAME_EXIST'),
            'menu_category_position.numeric' => __('user::validation.admin_menu_category.ONLY_NUMBER'),
            'menu_category_position.integer' => __('user::validation.admin_menu_category.ONLY_NUMBER'),
            'menu_category_position.unique' => __('user::validation.admin_menu_category.POSITION_EXIST'),
            'menu_category_position.max' => __('user::validation.admin_menu_category.MAX_NUMBER'),
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
