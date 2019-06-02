<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Collections\FormCollection;
use App\Api\V1\Requests\StoreForm;
use App\Api\V1\Requests\UpdateForm;
use App\Api\V1\Resources\FormResource;
use App\Form;
use Illuminate\Http\JsonResponse;

class FormController extends BaseController
{
    /**
     * FormController constructor.
     */
    public function __construct()
    {
        $this->middleware('v1.form.exists')->except(['index', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $forms = Form::all();

        return $this->sendResponse(new FormCollection($forms), __('messages.list_record', ['model' => Form::$name]), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreForm  $request
     * @return JsonResponse
     */
    public function store(StoreForm $request): JsonResponse
    {
        $form = Form::create($request->all());

        return $this->sendResponse(new FormResource($form), __('messages.created_record', ['model' => Form::$name]), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $form = Form::find($id);

        return $this->sendResponse(new FormResource($form), __('messages.show_record', ['model' => Form::$name]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateForm  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(UpdateForm $request, int $id): JsonResponse
    {
        $form = Form::find($id);
        $form->update($request->all());

        return $this->sendResponse(new FormResource($form), __('messages.updated_record', ['model' => Form::$name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $form = Form::find($id);
        $form->delete();

        return $this->sendResponse(null, __('messages.deleted_record', ['model' => Form::$name, 'id' => $id]), 200);
    }
}
