<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use App\Http\Resources\TodoResource;
use App\Http\Requests\TodoStoreRequest;
use App\Http\Requests\TodoUpdateRequest;
use App\Http\Resources\TodoTaskResource;
use App\Http\Requests\TodoTaskStoreRequest;

class TodoController extends Controller
{
    public function __construct() {

        $this->middleware('auth:api');

    }

    public function index() {
        return TodoResource::collection(auth()->user()->todos);
    }

    public function store(TodoStoreRequest $request) {
        $input = $request->validated();
        $todo = auth()->user()->todos()->create($input);

        return new TodoResource($todo);
    }

    public function update(Todo $todo, TodoUpdateRequest $request) {
        $input = $request->validated();
        $todo->fill($input);
        $todo->save();

        return new TodoResource($todo->fresh());
    }

    public function destroy(Todo $todo) {
        $todo->delete();
    }

    public function show(Todo $todo) {
        // Get tasks Relation to pass in TodoResource resource
        $todo->load('tasks');

        return new TodoResource($todo);
    }

    public function addTask(Todo $todo, TodoTaskStoreRequest $request) {
        $input = $request->validated();

        $todoTask = $todo->tasks()->create($input);

        return new TodoTaskResource($todoTask);
    }

}
