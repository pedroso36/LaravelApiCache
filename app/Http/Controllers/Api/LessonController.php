<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateLesson;
use App\Http\Requests\StoreUpdateModule;
use App\Http\Resources\LessonResource;
use App\Services\LessonService;
use App\Services\ModuleService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LessonController extends Controller
{
    protected $lessonService;

    public function __construct(LessonService $lessonService)
    {
        $this->lessonService = $lessonService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($module)
    {
        $lessons = $this->lessonService->getLessonsByModule($module);

        return LessonResource::collection($lessons);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateLesson $request, $module)
    {
        $module = $this->lessonService->createNewLesson($request->validated());

        return new LessonResource($module);

    }

    /**
     * Display the specified resource.
     */
    public function show($module, string $identify)
    {
        $module = $this->lessonService->getLessonsByModule($module, $identify);

        return new LessonResource($module);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateLesson $request, $module, string $identify)
    {
        $this->lessonService->updateLesson($identify, $request->validated());

        return response()->json(['message'=> 'updated'], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $identify)
    {
        $this->lessonService->deleteLesson($identify);

        return response()->noContent();
    }
}
