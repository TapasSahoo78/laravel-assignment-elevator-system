<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getAllTasks()
    {
        return $this->taskRepository->paginate(1);
    }

    public function createTask(array $data)
    {
        return $this->taskRepository->create($data);
    }

    public function markTaskAsCompleted($id, array $data)
    {
        $task = $this->taskRepository->find($id);

        if (!$task) {
            throw new \Exception('Task not found');
        }

        $task->update($data);

        return $task;
    }

    public function deleteTask($id)
    {
        $task = $this->taskRepository->find($id);

        if (!$task) {
            throw new \Exception('Task not found');
        }
        return $this->taskRepository->delete($id);
    }
}
