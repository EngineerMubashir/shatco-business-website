<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->latest()->get();
        $categories = ServiceCategory::all();
        return view('admin.services.index', compact('services', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'is_featured' => 'nullable|boolean',
        ]);

        $thumbnailPath = null;

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();

            // ✅ Move file to /public/services/
            $file->move(public_path('services'), $fileName);

            // ✅ Save full public path relative to public directory
            $thumbnailPath = 'services/' . $fileName;
        }

        Service::create([
            'service_category_id' => $request->service_category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'icon' => $request->icon,
            'thumbnail' => $thumbnailPath,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('admin.services.index')->with('success', '✅ Service added successfully!');
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
            'is_featured' => 'nullable|boolean',
        ]);

        $thumbnailPath = $service->thumbnail;

        if ($request->hasFile('thumbnail')) {
            // 🗑️ Delete old thumbnail if exists
            if ($thumbnailPath && file_exists(public_path($thumbnailPath))) {
                unlink(public_path($thumbnailPath));
            }

            $file = $request->file('thumbnail');
            $fileName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();

            // ✅ Store in /public/services/
            $file->move(public_path('services'), $fileName);

            // ✅ Save relative public path
            $thumbnailPath = 'services/' . $fileName;
        }

        $service->update([
            'service_category_id' => $request->service_category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'icon' => $request->icon,
            'thumbnail' => $thumbnailPath,
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('admin.services.index')->with('success', '✅ Service updated successfully!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        // 🗑️ Delete old thumbnail if exists
        if ($service->thumbnail && file_exists(public_path($service->thumbnail))) {
            unlink(public_path($service->thumbnail));
        }

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', '🗑️ Service deleted successfully!');
    }
}
