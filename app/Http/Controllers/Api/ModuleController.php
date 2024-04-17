<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateModule;
use App\Http\Resources\ModuleResource;
use App\Services\ModuleService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ModuleController extends Controller
{
    protected $moduleService;

    public function __construct(moduleService $moduleService)
    {
        $this->moduleService = $moduleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($course)
    {
        $modules = $this->moduleService->getModulesCourse($course);

        return ModuleResource::collection($modules);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateModule $request, $course)
    {
        $module = $this->moduleService->createNewModule($request->validated());

        return new ModuleResource($module);

    }

    /**
     * Display the specified resource.
     */
    public function show($course, string $identify)
    {
        $course = $this->moduleService->getModuleByCourse($course, $identify);

        return new ModuleResource($course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateModule $request, $course, string $identify)
    {
        $this->moduleService->updateModule($identify, $request->validated());

        return response()->json(['message'=> 'updated'], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $identify)
    {
        $this->moduleService->deleteModule($identify);

        return response()->noContent();
    }
}
