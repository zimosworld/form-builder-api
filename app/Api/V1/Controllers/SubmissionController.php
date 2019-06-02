<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\StoreSubmission;
use App\{Submission, SubmissionValue, File};
use Illuminate\Http\JsonResponse;

class SubmissionController extends BaseController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSubmission  $request
     * @return JsonResponse
     */
    public function store(StoreSubmission $request): JsonResponse
    {
        $submission = Submission::create(['form_id' => $request->form_id]);

        $submissionValues = SubmissionValue::hydrate($request->values);

        $submission->submissionValues()->saveMany($submissionValues);

        return $this->sendResponse(null,  __('messages.created_record', ['model' => Submission::$name]), 201);
    }

}
