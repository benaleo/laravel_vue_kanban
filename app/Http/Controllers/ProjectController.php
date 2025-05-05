<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    /**
     * @return \Inertia\Response
     */
    public function index() : Response
    {
        $projects = Project::latest()->paginate(10);
        return Inertia::render('components/ProjectDialog', compact('projects'));

    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

}
