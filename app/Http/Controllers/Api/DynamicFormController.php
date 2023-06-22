<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DynamicFormRequest;
use App\Http\Requests\DynamicFormUpdateRequest;
use App\Http\Resources\DynamicFormResource;
use App\Models\DynamicForm;
use App\Models\Post;
use App\Services\DynamicFormService;
use Exception;
use Illuminate\Http\Request;

class DynamicFormController extends Controller
{

    private DynamicFormService $dynamicFormService;

    public function __construct()
    {
        $this->dynamicFormService = new DynamicFormService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllForms()
    {

        $forms = DynamicForm::all();

        return DynamicFormResource::collection($forms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(DynamicFormRequest $request)
    {
        try {
            $data = $request->validated();

            $return = $this->dynamicFormService->create($data);

            return new DynamicFormResource($return);
        } catch (Exception $exception) {

            return response()->json(['error' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $dynamicForm = DynamicForm::findOrFail($id);

        return new DynamicFormResource($dynamicForm);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(DynamicFormRequest $request, int $id)
    {
        try {

            $data = $request->validated();

            $dynamicForm = DynamicForm::findOrFail($id);

            $this->dynamicFormService->update($dynamicForm, $data);

            return new DynamicFormResource($dynamicForm);
        } catch (Exception $exception) {

            return response()->json(['error' => $exception->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        try {

            $dynamicForm = DynamicForm::findOrFail($id);

            $dynamicForm->fields()->delete();

            $dynamicForm->delete();

            return response()->json(['message' => 'Successfully deleted'], 200);
            
        } catch (Exception $exception) {

            return response()->json(['error' => $exception->getMessage()]);
        }
    }
}
