<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Services\TaskService;
use App\Traits\ApiResponse;

class TaskController extends Controller
{
    use ApiResponse;

    protected $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tasks = $this->taskService->getAllTasks();
            $message = $tasks ? config('message.MSG_RECORD_FETCHED_SUCCESS') : config('message.MSG_RECORD_FETCHED_FAILED');
            return $this->responseJson(true, 200, $message, TaskResource::collection($tasks)->response()->getData(true));
        } catch (\Exception $e) {
            logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
            return $this->responseJson(false, 500, app()->isProduction() ? config('message.MSG_ERROR_TRY_AGAIN') : $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        try {
            $task = $this->taskService->createTask($request->all());
            $message = $task ? config('message.MSG_RECORD_INSERT_SUCCESS') : config('message.MSG_RECORD_INSERT_FAILED');
            return $this->responseJson(true, 201, $message, new TaskResource($task));
        } catch (\Exception $e) {
            logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
            return $this->responseJson(false, 500, app()->isProduction() ? config('message.MSG_ERROR_TRY_AGAIN') : $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        try {
            $status = filter_var($request->status, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

            if (is_null($status)) {
                return $this->responseJson(false, 422, 'Invalid status value. It should be true or false.');
            }

            $task = $this->taskService->markTaskAsCompleted($id, ['is_completed' => $status]);

            $message = $task ? config('message.MSG_RECORD_UPDATE_SUCCESS') : config('message.MSG_RECORD_UPDATE_FAILED');
            return $this->responseJson(true, 201, $message, new TaskResource($task));
        } catch (\Exception $e) {
            logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
            return $this->responseJson(false, 500, app()->isProduction() ? config('message.MSG_ERROR_TRY_AGAIN') : $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $task = $this->taskService->deleteTask($id);

            if ($task) {
                return $this->responseJson(true, 200, config('message.MSG_RECORD_DELETE_SUCCESS'));
            } else {
                return $this->responseJson(false, 404, config('message.MSG_RECORD_DELETE_FAILED'));
            }
        } catch (\Exception $e) {
            logger($e->getMessage() . ' -- ' . $e->getLine() . ' -- ' . $e->getFile());
            return $this->responseJson(false, 500, app()->isProduction() ? config('message.MSG_ERROR_TRY_AGAIN') : $e->getMessage());
        }
    }
}
