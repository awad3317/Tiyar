<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Clients;
use Illuminate\Http\Request;
use App\Services\ImageService;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Clients::all();
        return view('welcome', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.our-clients');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $data = $request->validate([
            'client_name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480',
            'link_of_location' => 'nullable|url',
            'location' => 'nullable|string|max:255',
        ]);
        if($request->hasFile('logo')){
            $imageService = new ImageService();
            $data['logo'] = $imageService->saveImage($request->file('logo'), 'clients');
        }
        Clients::create($data);
        return redirect()->back()->with('success','تم إرسال الطلب بنجاح شكرا لاستخدامك خدمتنا!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}