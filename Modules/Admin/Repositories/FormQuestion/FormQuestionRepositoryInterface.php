<?php

namespace Modules\Admin\Repositories\FormQuestion;

interface FormQuestionRepositoryInterface
{
    public function getListQuestion($param);
    public function createQuestion($data);
    public function getDetail($id);
    public function editQuestion($data);
}
