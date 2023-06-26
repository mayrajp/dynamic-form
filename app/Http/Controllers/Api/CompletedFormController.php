<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompletedFormRequest;
use App\Http\Resources\CompletedFormResource;
use App\Models\CompletedForm;
use App\Services\CompletedFormService;
use Exception;

class CompletedFormController extends Controller
{
    private CompletedFormService $formService;

    public function __construct()
    {
        $this->formService = new CompletedFormService();
    }

    public function index()
    {
        $forms = CompletedForm::all();

        return CompletedFormResource::collection($forms);
    }

    public function show(int $id)
    {
        $form = CompletedForm::findOrFail($id);

        return new CompletedFormResource($form);
    }

    public function create(CompletedFormRequest $request)
    {
        try {

            $data = $request->validated();

            $this->formService->create($data);

            return response()->json([
                'message' => 'Answers added successfully',
            ], 200);

        } catch (Exception $exception) {

            return response()->json(['error' => $exception->getMessage()]);
        }
    }

    public function update()
    {

    }
}
