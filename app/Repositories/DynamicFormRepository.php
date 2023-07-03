<?php

namespace App\Repositories;

use App\Models\DynamicForm;

class DynamicFormRepository 
{
    public function getDynamicFormWithFields(int $dynamicFormId, array $fields = [])
    {
        return DynamicForm::select($fields)->where('id', $dynamicFormId)->get();
    }
}