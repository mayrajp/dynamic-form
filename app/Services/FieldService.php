<?php

namespace App\Services;

use App\Models\DynamicForm;
use App\Models\Field;
use PhpParser\Node\Expr\BooleanNot;

class FieldService
{
    public function create(DynamicForm $dynamicForm, array $data)
    {
        $dynamicForm->fields()->create([
            'label' => $data['label'],
            'type' => $data['type'],
            'class' => $data['class'],
            'is_required' => $data['is_required'],
            'is_multiple' => $data['is_multiple'],
            'options' => json_encode($data['options']),
            'is_active' => true,
        ]);

        return $dynamicForm;
    }

    public function update(Field $field, DynamicForm $dynamicForm, array $data)
    {
        $is_modified = $this->fieldHasBeenModified($field, $data);

        
        if ($is_modified) {
            $dynamicForm->fields()->create([
                'label' => $data['label'],
                'type' => $data['type'],
                'class' => $data['class'],
                'is_required' => $data['is_required'],
                'is_multiple' => $data['is_multiple'],
                'options' => json_encode($data['options']),
                'is_active' => true,
            ]);

            $field->is_active = false;

            $field->save();
            
        } else {

            $field->update([
                'label' => $data['label'],
                'type' => $data['type'],
                'class' => $data['class'],
                'is_required' => $data['is_required'],
                'is_multiple' => $data['is_multiple'],
                'options' => json_encode($data['options']),
                'is_active' => true,
            ]);
        }
    }

    private function fieldHasBeenModified(Field $field, array $data): bool
    {

        if ($field->label != $data['label']) {
            return true;
        }

        if ($field->type != $data['type']) {
            return true;
        }

        return false;
    }
}
