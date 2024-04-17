<?php

namespace App\Services;

use App\Repositories\CourseRepository;

class CourseService
{

    protected $courseRepository;

    public function __construct(CourseRepository $CourseRepository)
    {
        $this->courseRepository = $CourseRepository;
    }
    public function getCourses()
    {
        return $this->courseRepository->getAllCourses();
    }

    public function createNewCourse(array $data)
    {
        return $this->courseRepository->createNewCourse($data);
    }

    public function getCourseByUuid(string $identify)
    {
        return $this->courseRepository->getCourseByUuid($identify);
    }

    public function destroyCourse(string $identify)
    {
        return $this->courseRepository->deleteCourseByUuid($identify);
    }

    public function updateCourseByUuid($identify, $data)
    {
        return $this->courseRepository->updateCourseByUuid($identify, $data);
    }

}
