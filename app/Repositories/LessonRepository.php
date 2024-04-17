<?php

namespace App\Repositories;

use App\Models\Lesson;

class LessonRepository
{

    protected $entity;

    public function __construct(Lesson $lesson)
    {
        $this->entity = $lesson;
    }

    public function getLessonsModule(int $moduleId)
    {
        return $this->entity->where('module_id', $moduleId)->get();
    }

    public function createNewLesson(int $moduleId, array $data)
    {
        $data['module_id'] = $moduleId;

        return $this->entity->create($data);
    }

    public function getLessonByModule($moduleId, $identify)
    {
        return $this->entity
            ->where('module_id', $moduleId)
            ->where('uuid', $identify)
            ->firstOrFail();
    }

    public function updateLessonByUuid(int $moduleId, string $identify, array $data)
    {
        $module = $this->getLessonByUuid($identify);

        $data['module_id'] = $moduleId;

        return $module->update($data);
    }

    public function deleteLessonByUuid($identify)
    {
        $module = $this->getLessonByUuid($identify);

        return $module->delete();
    }

    public function getLessonByUuid($identify)
    {
        return $this->entity
            ->where('uuid', $identify)
            ->firstOrFail();
    }


}
