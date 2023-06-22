<?php

namespace App\Services;

use App\Models\DynamicForm;

class DynamicFormService
{

    public function create(array $data): DynamicForm
    {
        $newDynamicForm = DynamicForm::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'created_by' => $data['created_by'],
        ]);

        return $newDynamicForm;
    }

    public function update(DynamicForm $dynamicForm, array $data): DynamicForm
    {
        $dynamicForm->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'created_by' => $data['created_by'],
        ]);
        
        return $dynamicForm;
    }
}
