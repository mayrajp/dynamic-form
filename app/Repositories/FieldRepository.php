<?php

namespace App\Repositories;

use App\Models\DynamicForm;
use App\Models\Field;

class FieldRepository 
{
    public function getFieldWithFields(int $dynamicFormId, array $fields = [])
    {
        return Field::select($fields)->where('id', $dynamicFormId)->get();
    }
}