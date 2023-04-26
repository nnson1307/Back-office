<div class="form-group">
    <div class="kt-section__content">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><p>@lang('admin::form.form.index.name')</p></th>
                <th><p>@lang('admin::form.form.index.description')</p></th>
                <th><p>@lang('admin::form.form.index.rating_min')</p></th>
                <th><p>@lang('admin::form.form.index.rating_max')</p></th>
                <th><p>@lang('admin::form.form.index.active')</p></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($listForm))
                @foreach($listForm as $form)
                    <tr>
                        <td> <p title="{{$form['feedback_form_name']}}">{{__(subString($form['feedback_form_name']))}}</p> </td>
                        <td> <p title="{{$form['feedback_form_description']}}">{{ subString($form['feedback_form_description']) }}</p> </td>
                        <td><p>{{$form['feedback_form_rating_min']}}</p></td>
                        <td><p>{{$form['feedback_form_rating_max']}}</p></td>
                        <td><p>
                                <span class="kt-switch kt-switch--success">
                                    <label>
                                        @if($form['feedback_form_active'] == 0)
                                            <input  type="checkbox" disabled="disabled"
                                                   name=""
                                            >
                                        @else
                                            <input  type="checkbox" checked
                                                   disabled="disabled"
                                                   name=""
                                            >
                                        @endif
                                        <span></span>
                                    </label>
                                </span>
                            </p>
                        </td>
                        <td>
                            <div class="kt-portlet__head-toolbar">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Hành động
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                        @include('helpers.button', ['button' => [
                                                    'route' => 'page.form.form.edit',
                                                     'html' => '<a href="'.route('page.form.form.edit', $form['feedback_form_id']).'" class="dropdown-item">'
                                                     .'<i class="la la-edit"></i>'
                                                     .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::form.form.index.edit-form').'</span>'.
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
    </div>
</div>