<?php

namespace Modules\Admin\Repositories\Form;

interface FormRepositoryInterface
{
    public function getListForm(array $filter = []);
    public function createForm($data);
    public function getDetail($id);
    public function editForm($data);
    public function getAll();
}
