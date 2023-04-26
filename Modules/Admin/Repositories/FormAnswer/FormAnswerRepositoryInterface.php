<?php

namespace Modules\Admin\Repositories\FormAnswer;

interface FormAnswerRepositoryInterface
{
    public function getListAnswer($param);

    public function showAnswer($formId, $userId);
}
