<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::latest()->get();
        return view('admin.service_categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:service_categories,name',
            'description' => 'nullable|string|max:1000',
        ]);

        ServiceCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return back()->with('success', 'Category added successfully.');
    }

    public function update(Request $request, ServiceCategory $service_category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:service_categories,name,' . $service_category->id,
            'description' => 'nullable|string|max:1000',
        ]);

        $service_category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        return back()->with('success', 'Category updated successfully.');
    }

    public function destroy(ServiceCategory $service_category)
    {
        $service_category->delete();
        return back()->with('success', 'Category deleted successfully.');
    }
}
