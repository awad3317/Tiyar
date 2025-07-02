<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('welcome', compact('projects'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
            'file' => 'nullable|file|mimes:pdf|max:20480',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('projects', 'public');
            $data['link'] = 'storage/' . $path;
        }

        Project::create($data);
        return redirect()->route('projects.index')->with('success', 'تم إضافة المشروع بنجاح');
    }


    public function showPortfolio()
    {
        $projects = Project::all()->map(function ($project) {
            $isPdf = Str::endsWith($project->link, '.pdf');

            return (object)[
                'id' => $project->id,
                'title' => $project->title,
                'description' => $project->description,
                'type' => $project->type,
                'link' => $project->link,
                'is_pdf' => $isPdf,
                'url' => $isPdf ? asset($project->link) : $project->link,
            ];
        });

        $services = Service::all();

        return view('welcome', compact('projects', 'services'));
    }



}
