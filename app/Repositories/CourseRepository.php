<?php

namespace App\Repositories;

use App\Models\Course;

class CourseRepository
{
    protected $entity;

    public function __construct(Course $course)
    {
        $this->entity = $course;
    }

    public function getAllCourses()
    {
        return $this->entity->get();
    }

    public function createNewCourse(array $data)
    {
        return $this->entity->create($data);
    }

    public function getCourseByUuid($identify)
    {
        return $this->entity->where('uuid', $identify)->firstOrFail();
    }

    public function deleteCourseByUuid($identify)
    {
        $course = $this->getCourseByUuid($identify);

        $course->delete();
    }

    public function updateCourseByUuid($identify, $data)
    {
        $course = $this->getCourseByUuid($identify);

        $course->update($data);
    }
}
