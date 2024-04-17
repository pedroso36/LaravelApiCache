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

}
