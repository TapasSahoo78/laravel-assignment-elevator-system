<?php

namespace App\Repositories;

use App\Models\Task as SELF_MODEL;

class TaskRepository
{
    public function paginate($perPage)
    {
        return SELF_MODEL::orderBy('id')->paginate($perPage);
    }

    public function create(array $data)
    {
        return SELF_MODEL::create($data);
    }

    public function find($id)
    {
        return SELF_MODEL::find($id);
    }

    public function update($id, array $data)
    {
        $task = SELF_MODEL::findOrFail($id);
        $task->update($data);
        return $task;
    }

    public function delete($id)
    {
        $task = SELF_MODEL::findOrFail($id);
        return $task->delete();
    }
}
