<?php

namespace Tests\Api\V1;

use App\Form;
use Tests\TestCase;

class FormTest extends TestCase
{
    /**
     * Fake form ID for testing
     *
     * @var int $fakeFormId
     */
    private $fakeFormId = 99999;

    /**
     * Test retrieval of list of forms
     *
     * @return void
     */
    public function testGetFormList(): void
    {
        $forms = factory(Form::class, 5)->create()->map(function ($form) {
            return $form;
        });

        $this->get(route('form.index'))
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => $forms->toArray(),
                'message' => __('messages.list_record', ['model' => Form::$name]),
            ]);
    }

    /**
     * Test create form
     *
     * @return void
     */
    public function testCreateForm(): void
    {
        $data = [
            'slug' => $this->faker->slug,
            'name' => $this->faker->title,
            'description' => $this->faker->paragraph
        ];

        $this->post(route('form.store'), $data)
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
                'data' => $data,
                'message' => __('messages.created_record', ['model' => Form::$name]),
            ]);
    }

    /**
     * Test create form fails with no data
     *
     * @return void
     */
    public function testCreateFormFail(): void
    {
        $this->post(route('form.store'), [])
            ->assertStatus(400)
            ->assertJson([
                'success' => false,
                'message' => __('messages.validation_failed'),
                'data' => true
            ]);
    }

    /**
     * Test retrieving a single form
     *
     * @return void
     */
    public function testGetSingleForm(): void
    {
        $form = factory(Form::class)->create();

        $this->get(route('form.show', $form->id))
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'data' => $form->toArray(),
                'message' => __('messages.show_record', ['model' => Form::$name]),
            ]);
    }

    /**
     * Test retrieving single form that does not exist
     *
     * @return void
     */
    public function testGetSingleFormFail(): void
    {
        $this->get(route('form.show', $this->fakeFormId))
            ->assertStatus(404)
            ->assertJson([
                'success' => false,
                'message' => __('messages.missing_record', ['model' => Form::$name, 'id' => $this->fakeFormId]),
            ]);
    }

    /**
     * Test updating single form
     *
     * @return void
     */
    public function testUpdateSingleForm(): void
    {
        $form = factory(Form::class)->create();

        $data = [
            'name' => $this->faker->title,
            'description' => $this->faker->paragraph
        ];

        $this->put(route('form.update', $form->id), $data)
            ->assertStatus(200)
            ->assertJson([
               'success' => true,
               'data' => $data,
               'message' => __('messages.updated_record', ['model' => Form::$name]),
            ]);
    }

    /**
     * Test updating single form that does not exist
     *
     * @return void
     */
    public function testUpdateSingleFormFail(): void
    {
        $data = [
            'name' => $this->faker->title,
            'description' => $this->faker->paragraph
        ];

        $this->put(route('form.update', $this->fakeFormId), $data)
            ->assertStatus(404)
            ->assertJson([
                'success' => false,
                'message' => __('messages.missing_record', ['model' => Form::$name, 'id' => $this->fakeFormId]),
            ]);
    }

    /**
     * Test deleting form
     *
     * @return void
     */
    public function testDeleteForm(): void
    {
        $form = factory(Form::class)->create();

        $this->delete(route('form.destroy', $form->id))
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => __('messages.deleted_record', ['model' => Form::$name, 'id' => $form->id])
            ]);
    }
}
