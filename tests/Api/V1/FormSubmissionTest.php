<?php

namespace Tests\Api\V1;

use App\{Form, FormField, Submission, SubmissionValue};
use Tests\TestCase;

class FormSubmissionTest extends TestCase
{

    /**
     * Test Submission of form
     *
     * @return void
     */
    public function testFormSubmission(): void
    {
        $form = factory(Form::class)->create();

        $formFields = factory(FormField::class, 5)->create(['form_id' => $form])->map(function ($formFields) {
            return $formFields;
        });

        $submissionValues = [];
        foreach($formFields as $field) {
            $submissionValues[] = factory(SubmissionValue::class)->make(['field' => $field])->toArray();
        }

        $submission = factory(Submission::class)->make(['form' => $form, 'values' => $submissionValues]);

        $this->post(route('submission.store', $form->id), $submission->toArray())
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => null,
                'message' => __('messages.created_record', ['model' => Submission::$name]),
            ]);

    }

}
