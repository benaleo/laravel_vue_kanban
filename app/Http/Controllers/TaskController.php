<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class TaskController extends Controller
{
    public function index(string $projectId): Response
    {
        $tasks = Task::where('project_id', $projectId)->get();

        return Inertia::render('app/Kanban', [
            'tasks' => $tasks,
            'projectId' => $projectId
        ]);
    }

}
