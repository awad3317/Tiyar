<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\Clients;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Services\ImageService;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::all();
        return view('welcome', compact('projects'));
    }

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            'pdf_file' => 'nullable|file|mimes:pdf|max:20480',
        ]);
        if ($request->hasFile('image')) {
            $imageService = new ImageService();
            $data['image'] = $imageService->saveImage($request->file('image'), 'projects');
        }


        // if ($request->hasFile('image')) {
        //     $path = $request->file('image')->store('projects', 'public');
        //     $data['image'] = 'storage/' . $path;
        // }

        if ($request->hasFile('pdf_file')) {
            $path = $request->file('pdf_file')->store('projects-pdfs', 'public');
            $data['link'] = 'storage/' . $path;
        }

        Project::create($data);
        return redirect()->route('projects.index')->with('success', 'تم إضافة المشروع بنجاح');
    }


    public function showPortfolio()
    {
        // جلب المشاريع مع العميل المرتبط
        $projects = Project::with('client')->get();

        // جلب كل العملاء (إذا لزم للأقسام الأخرى)
        $clients = Clients::all();

        // جلب الخدمات
        $services = Service::all();


        return view('welcome', compact('projects', 'services', 'clients'));
    }
}
