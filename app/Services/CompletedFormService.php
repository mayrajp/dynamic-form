<?php

namespace App\Services;

use App\Models\CompletedForm;
use App\Models\DynamicForm;
use App\Models\Field;
use Exception;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CompletedFormService
{
    public function create(array $data)
    {
        $dynamicForm = DynamicForm::findOrFail($data['dynamic_form_id']);

        $time = strtotime($data['expires_in']);

        $completedForm = $dynamicForm->completedForms()->create([
            'user_id' => $data['user_id'],
            'expires_in' => date('Y-m-d', $time),
        ]);

        foreach ($data['answers'] as $answare) {

            $field = Field::find($answare['field_id']);

            if ($field->type == 'file') {
                $this->saveTypeFile($completedForm, $answare);
            } else {
                $completedForm->answers()->create([
                    'field_id' => $answare['field_id'],
                    'answare' => json_encode($answare['answare']),
                ]);
            }
        }
    }

    private function saveTypeFile(CompletedForm $completedForm, array $answare)
    {
        $fileBase64 = $answare['answare'];

        $extension = explode('/', explode(':', substr($fileBase64, 0, strpos($fileBase64, ';')))[1])[1];   // .jpg .png .pdf

        $replace = substr($fileBase64, 0, strpos($fileBase64, ',') + 1);

        $file = str_replace($replace, '', $fileBase64);

        $file = str_replace(' ', '+', $file);

        $fileName = uniqid() . '.' . $extension;

        Storage::disk('public')->put($fileName, base64_decode($file));

        $completedForm->answers()->create([
            'field_id' => $answare['field_id'],
            'answare' => json_encode($fileName),
        ]);
    }
}
