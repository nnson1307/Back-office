<div class="form-group">
    <div class="kt-section__content">
        <table class="table table-striped">
            <thead>
            <tr>
                <th><p>@lang('admin::form.form.index.name')</p></th>
                <th><p>@lang('admin::form.question.index.question_type')</p></th>
                <th><p>@lang('admin::form.question.index.question_title')</p></th>
                <th><p>@lang('admin::form.question.index.question_position')</p></th>
                <th><p>@lang('admin::form.form.index.active')</p></th>
            </tr>
            </thead>
            <tbody>
            @if(isset($listQuestion))
                @foreach($listQuestion as $question)
                    <tr>
                        <td> <p title="{{$question['feedback_form_name']}}">{{__(subString($question['feedback_form_name']))}}</p> </td>
                        <td> <p title="{{$question['feedback_question_type']}}">{{ subString($question['feedback_question_type']) }}</p> </td>
                        <td> <p title="{{$question['feedback_question_title']}}">{{ subString($question['feedback_question_title']) }}</p> </td>
                        <td> <p>{{ subString($question['feedback_question_position']) }}</p> </td>
                        <td><p>
                                <span class="kt-switch kt-switch--success">
                                    <label>
                                        @if($question['feedback_question_active'] == 0)
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
                                                    'route' => 'page.form.question.edit',
                                                     'html' => '<a href="'.route('page.form.question.edit', $question['feedback_question_id']).'" class="dropdown-item">'
                                                     .'<i class="la la-edit"></i>'
                                                     .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::form.question.index.edit-question').'</span>'.
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
