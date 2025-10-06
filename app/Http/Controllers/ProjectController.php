<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\PdfToImage\Pdf;

class ProjectController extends Controller
{
    /**
     * عرض كل المشاريع
     */
    public function index()
    {
        $projects = Project::all();
        return view('welcome', compact('projects'));
    }

    /**
     * عرض فورم إنشاء مشروع جديد
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * تخزين مشروع جديد
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'description' => 'nullable|string',
            'link' => 'nullable|url', // إذا كان رابط لموقع
            'file' => 'nullable|file|mimes:pdf|max:20480', // إذا كان ملف PDF
        ]);

        // إذا رفع ملف PDF
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('projects', 'public');
            $data['link'] = 'storage/' . $path;

            // 🖼️ توليد صورة معاينة لأول صفحة
            $pdfPath = storage_path('app/public/' . $path);
            $previewPath = 'previews/' . uniqid() . '.jpg';
            $fullPreviewPath = storage_path('app/public/' . $previewPath);

            try {
                $pdf = new Pdf($pdfPath);
                $pdf->setPage(1)
                    ->setResolution(150)
                    ->saveImage($fullPreviewPath);

                $data['preview'] = 'storage/' . $previewPath;
            } catch (\Exception $e) {
                // لو ما قدر يولد صورة، تجاهل
                $data['preview'] = null;
            }
        }

        Project::create($data);

        return redirect()->route('projects.index')
            ->with('success', 'تم إضافة المشروع بنجاح');
    }

    /**
     * عرض بورتفوليو
     */
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
                'preview' => $project->preview 
                    ? asset($project->preview) 
                    : (!$isPdf 
                        ? "https://api.screenshotmachine.com?key=fadae1&url=" . urlencode($project->link) . "&dimension=1024x768" 
                        : null),
            ];
        });

        $services = Service::all();

        return view('welcome', compact('projects', 'services'));
    }
}