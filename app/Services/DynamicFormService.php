<?php

namespace App\Services;

use App\Models\DynamicForm;
use App\Models\Field;

class DynamicFormService
{

    public function create(array $data): DynamicForm
    {
        $newDynamicForm = DynamicForm::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'created_by' => $data['created_by'],
        ]);

        foreach ($data['fields'] as $field) {

            $newDynamicForm->fields()->create([
                'label' => $field['label'],
                'type' => $field['type'],
                'class' => $field['class'],
                'img_url' => $field['img_url'],
                'is_required' => $field['is_required'],
                'is_multiple' => $field['is_multiple'],
                'options' => json_encode($field['options']),
            ]);
        }
        
        return $newDynamicForm;
    }
}
