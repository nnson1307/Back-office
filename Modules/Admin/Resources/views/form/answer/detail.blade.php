@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Câu trả lời
            </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            {{$detail['form']['feedback_form_name']}}
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>
            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions"></div>
        </div>
        <div class="kt-subheader__toolbar">
            <a href="{{route('page.form.answer')}}" class="btn btn-default btn-bold">
                @lang('admin::faq-group.input.BUTTON_CANCEL')
            </a>
        </div>
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__body">
                <!--end: Search Form -->
                @foreach($detail['answer'] as $item)
                    <div class="form-group">
                        <label>
                            {{$item['feedback_question_title']}}
                        </label>
                        <input readonly class="form-control"
                               type="text"
                               value="{{$item['feedback_answer_value']}}">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('after_script')
@endsection
