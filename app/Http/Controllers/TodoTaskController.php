<?php

namespace App\Http\Controllers;

use App\TodoTask;
use Illuminate\Http\Request;
use App\Http\Resources\TodoTaskResource;
use App\Http\Requests\TodoTaskUpdateRequest;

class TodoTaskController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function update(TodoTask $todoTask, TodoTaskUpdateRequest $request){
        $input = $request->validated();

        $todoTask->fill($input);
        $todoTask->save();

        return new TodoTaskResource($todoTask);
    }
}
