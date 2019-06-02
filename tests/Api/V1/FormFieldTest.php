<?php

namespace Tests\Api\V1;

use App\{Form, FormField, Input, Select, TextArea, File};
use Tests\TestCase;

class FormFieldTest extends TestCase
{

    /**
     * Test retrieval list of fields for a form
     *
     * @return void
     */
    public function testGetFormFieldsList(): void
    {
        $form = factory(Form::class)->create();

        $formFields = factory(FormField::class, 5)->create(['form_id' => $form])->map(function ($formFields) {
            return $formFields;
        });

        $this->get(route('field.index', $form->id))
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => true,
                'message' => __('messages.list_record', ['model' => FormField::$name]),
            ]);
    }

    /**
     * Test create form
     *
     * @return void
     */
    public function testCreateFormField(): void
    {
        $form = factory(Form::class)->create();

        $fieldType = $this->faker->randomElement(FormField::$field_types);

        $data = [
            'form_id' => $form->id,
            'type' => $fieldType,
            'name' => $this->faker->word,
        ];

        $data = array_merge($data, factory("App\\{$fieldType}")->make([])->toArray());

        $this->post(route('field.store', $form->id), $data)
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => true,
                'message' => __('messages.created_record', ['model' => FormField::$name]),
            ]);
    }

    /**
     * Test retrieval of one field for form
     *
     * @return void
     */
    public function testGetFormField(): void
    {
        $form = factory(Form::class)->create();

        $formFields = factory(FormField::class, 1)->create(['form_id' => $form])->map(function ($formFields) {
            return $formFields;
        });

        $this->get(route('field.index', [$form->id, $formFields->first()->id]))
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => true,
                'message' => __('messages.list_record', ['model' => FormField::$name]),
            ]);
    }

    /**
     * Test updating form field
     *
     * @return void
     */
    public function testUpdateFormField(): void
    {
        $form = factory(Form::class)->create();

        $formFields = factory(FormField::class, 1)->create(['form_id' => $form])->map(function ($formFields) {
            return $formFields;
        });

        $data = [
            'name' => $this->faker->word()
        ];

        $this->patch(route('field.update', [$form->id, $formFields->first()->id]), $data)
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => true,
                'message' => __('messages.updated_record', ['model' => FormField::$name]),
            ]);
    }
}
