<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCourse;
use App\Http\Resources\CourseResource;
use App\Services\CourseService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends Controller
{

    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = $this->courseService->getCourses();

        return CourseResource::collection($courses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateCourse $request)
    {
        $course = $this->courseService->createNewCourse($request->validated());

        return new CourseResource($course);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $identify)
    {
        $course = $this->courseService->getCourseByUuid($identify);

        return new CourseResource($course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateCourse $request, string $identify)
    {
        $course = $this->courseService->updateCourseByUuid($identify, $request->validated());

        return response()->json(['message'=> 'updated'], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $identify)
    {
        $this->courseService->destroyCourse($identify);

        return response()->noContent();
    }
}
