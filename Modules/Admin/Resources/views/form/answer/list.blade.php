<div class="form-group">
    <div class="kt-section__content">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><p>@lang('admin::form.answer.feedback_form')</p></th>
                <th><p>@lang('admin::form.answer.full_name')</p></th>
                <th><p>@lang('admin::form.answer.email')</p></th>
                <th><p>@lang('admin::form.answer.phone')</p></th>
                <th><p>@lang('admin::form.answer.action')</p></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($getListAnswer))
                @foreach($getListAnswer as $form)
                    <tr>
                        <td> <p title="{{$form['feedback_form_name']}}">{{__(subString($form['feedback_form_name']))}}</p> </td>
                        <td> <p title="{{$form['fullname']}}">{{ subString($form['fullname']) }}</p> </td>
                        <td> <p title="{{$form['email']}}">{{ subString($form['email']) }}</p> </td>
                        <td> <p title="{{$form['phone']}}">{{ subString($form['email']) }}</p> </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenu" data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                    Hành động
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                    @include('helpers.button', ['button' => [
                                                    'route' => 'page.form.answer.show',
                                                     'html' => '<a href="'.route('page.form.answer.show', [$form['feedback_form_id'], $form['user_id']]).'" class="dropdown-item">'
                                                     .'<i class="fa flaticon-eye"></i>'
                                                     .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::district.index.DETAIL').'</span>'.
                                                '</a>'
                                            ]])
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
