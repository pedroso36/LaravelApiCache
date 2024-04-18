<?php

namespace Tests\Feature\Api;

use App\Models\Course;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseTest extends TestCase
{
    /**
     * get all Courses.
     */
    public function test_get_all_courses(): void
    {
        $response = $this->getJson('/api/courses');

        $response->assertStatus(200);
    }

    /**
     * get all Courses.
     */
    public function test_get_count_courses(): void
    {
        Course::factory()->count(10)->create();

        $response = $this->getJson('/api/courses');

        $response->assertJsonCount(10, 'data');

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * get all Courses.
     */
    public function test_get_not_found_course(): void
    {
        $response = $this->getJson('/api/courses/fake_id');

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    /**
     * get all Courses.
     */
    public function test_get_course(): void
    {
        $course = Course::factory()->create();

        $response = $this->getJson("/api/courses/{$course->uuid}");

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * get all Courses.
     */
    public function test_validations_create_course(): void
    {
        $response = $this->postJson("/api/courses", []);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * get all Courses.
     */
    public function test_create_course(): void
    {
        $response = $this->postJson("/api/courses", [
            'name' => 'Curso laravel'
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    /**
     * get all Courses.
     */
    public function test_validation_update_course(): void
    {
        $course = Course::factory()->create();

        $response = $this->putJson("/api/courses/{$course->uuid}", []);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * get all Courses.
     */
    public function test_update_course(): void
    {
        $course = Course::factory()->create();

        $response = $this->putJson("/api/courses/{$course->uuid}", [
            'name' => 'Curso laravel Update'
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * get all Courses.
     */
    public function test_404_update_course(): void
    {
        $response = $this->putJson("/api/courses/fake_id", [
            'name' => 'Curso laravel Update'
        ]);

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    /**
     * get all Courses.
     */
    public function test_delete_course(): void
    {
        $course = Course::factory()->create();

        $response = $this->deleteJson("/api/courses/{$course->uuid}");

        $response->assertStatus(Response::HTTP_NO_CONTENT);
    }

    /**
     * get all Courses.
     */
    public function test_404_delete_course(): void
    {
        $response = $this->deleteJson("/api/courses/fake_id");

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

}
