<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Collections\FormFieldCollection;
use App\Api\V1\Requests\StoreField;
use App\Api\V1\Resources\FormFieldResource;
use App\{Api\V1\Requests\UpdateField, FormField, Input, Select, TextArea, File};
use Illuminate\Http\JsonResponse;

class FormFieldController extends BaseController
{
    /**
     * FormFieldController constructor.
     */
    public function __construct()
    {
        $this->middleware('v1.form.exists');
    }

    /**
     * Display a listing of the resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function index(int $id): JsonResponse
    {
        $formFields = FormField::with('field')->where('form_id', $id)->get();

        return $this->sendResponse(new FormFieldCollection($formFields), __('messages.list_record', ['model' => FormField::$name]), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreField  $request
     * @return JsonResponse
     */
    public function store(StoreField $request): JsonResponse
    {
        $class = "App\\{$request->type}";

        $fieldExtended = $class::create($request->all());

        $form = $fieldExtended->formField()->create($request->all());

        return $this->sendResponse(new FormFieldResource($form), __('messages.created_record', ['model' => FormField::$name]), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $formId
     * @param  int  $fieldId
     * @return JsonResponse
     */
    public function show(int $formId, int $fieldId): JsonResponse
    {
        $form = FormField::with('field')->where('form_id', $formId)->find($fieldId);

        return $this->sendResponse(new FormFieldResource($form), __('messages.show_record', ['model' => FormField::$name]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateField  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(UpdateField $request, int $id): JsonResponse
    {
        $form = FormField::find($id);
        $form->update($request->all());

        return $this->sendResponse(new FormFieldResource($form), __('messages.updated_record', ['model' => FormField::$name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $form = FormField::find($id);
        $form->delete();

        return $this->sendResponse(null, __('messages.deleted_record', ['model' => FormField::$name, 'id' => $id]), 200);
    }
}
