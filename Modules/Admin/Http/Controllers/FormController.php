<?php


namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Repositories\FormAnswer\FormAnswerRepositoryInterface;
use Modules\Admin\Repositories\FormQuestion\FormQuestionRepositoryInterface;
use Modules\Admin\Repositories\Form\FormRepositoryInterface;

class FormController extends Controller
{
    protected $form;
    protected $formQuestion;
    protected $formAnswer;
    protected $request;

    public function __construct(
        FormRepositoryInterface $form,
        FormQuestionRepositoryInterface $formQuestion,
        FormAnswerRepositoryInterface $formAnswer,
        Request $request
    ) {
        $this->request = $request;
        $this->form = $form;
        $this->formQuestion = $formQuestion;
        $this->formAnswer = $formAnswer;
    }

//      Dánh sách form
    public function indexForm()
    {
        $param = $this->request->all();
        $listForm = $this->form->getListForm($param);
        return view('admin::form.form.index', [
            'listForm' => $listForm,
            'filter' => $param
        ]);
    }

//      Khởi tạo form
    public function createForm()
    {
        return view('admin::form.form.create');
    }
//      Tạo form mới
    public function createFormPost()
    {
        $param = $this->request->all();
        $createForm = $this->form->createForm($param);
        return $createForm;
    }
//Sửa form
    public function editForm($idForm)
    {
        $getDetail = $this->form->getDetail($idForm);
        return view('admin::form.form.edit', [
            'detail' => $getDetail,
        ]);
    }

//    Cập nhật form
    public function editFormPost()
    {
        $param = $this->request->all();
        $editForm  = $this->form->editForm($param);
        return $editForm;
    }
//Danh sách câu hỏi
    public function indexQuestion()
    {
        $param = $this->request->all();
        $listQuestion = $this->formQuestion->getListQuestion($param);
        return view('admin::form.question.index', [
            'listQuestion' => $listQuestion,
            'filter' => $param
        ]);
    }
//Trang tạo câu hỏi
    public function createQuestion()
    {
        $getListForm = $this->form->getAll();
        return view('admin::form.question.create', [
            'getListForm' => $getListForm
        ]);
    }

//    Tạo câu hỏi
    public function createQuestionPost()
    {
        $param = $this->request->all();
        $createQuestion = $this->formQuestion->createQuestion($param);
        return $createQuestion;
    }

//    Hiển thị chỉnh sửa
    public function editQuestion($idQuestion)
    {
        $getDetail = $this->formQuestion->getDetail($idQuestion);
        $getListForm = $this->form->getAll();
        return view('admin::form.question.edit', [
            'detail' => $getDetail,
            'getListForm' => $getListForm
        ]);
    }

//    Cập nhật câu hỏi
    public function editQuestionPost()
    {
        $param = $this->request->all();
        $editQuestion = $this->formQuestion->editQuestion($param);
        return $editQuestion;
    }

    //Danh sách câu trả lời
    public function indexAnswer()
    {
        $param  = $this->request->all();

        $getListAnswer = $this->formAnswer->getListAnswer($param);

        return view('admin::form.answer.index', [
            'filter' => $param,
            'getListAnswer' => $getListAnswer
        ]);
    }

    public function showAnswer($formId, $userId)
    {
        $detail = $this->formAnswer->showAnswer($formId, $userId);

        return view('admin::form.answer.detail', [
            'detail' => $detail,
        ]);
    }
}
