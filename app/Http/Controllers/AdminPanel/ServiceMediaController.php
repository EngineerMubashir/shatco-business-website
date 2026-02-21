<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceMedia;
use App\Models\Service;

class ServiceMediaController extends Controller
{
    public function index()
    {
        $media = ServiceMedia::with('service')->latest()->get();
        $services = Service::all();
        return view('admin.service_media.index', compact('media', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'file' => 'required|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:70240',
            'type' => 'required|in:image,video',
        ]);

        if ($request->hasFile('file')) {
            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $path = 'uploads/service_media/';
            $request->file('file')->move(public_path($path), $filename);
            $filePath = $path . $filename;
        }

        ServiceMedia::create([
            'service_id' => $request->service_id,
            'file_path' => $filePath ?? null,
            'type' => $request->type,
        ]);

        return redirect()->route('admin.service_media.index')->with('success', 'Media uploaded successfully!');
    }

    public function update(Request $request, $id)
    {
        $media = ServiceMedia::findOrFail($id);

        $request->validate([
            'service_id' => 'required|exists:services,id',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:70240',
            'type' => 'required|in:image,video',
        ]);

        $filePath = $media->file_path;

        if ($request->hasFile('file')) {
            if (file_exists(public_path($media->file_path))) {
                unlink(public_path($media->file_path));
            }
            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $path = 'uploads/service_media/';
            $request->file('file')->move(public_path($path), $filename);
            $filePath = $path . $filename;
        }

        $media->update([
            'service_id' => $request->service_id,
            'file_path' => $filePath,
            'type' => $request->type,
        ]);

        return redirect()->route('admin.service_media.index')->with('success', 'Media updated successfully!');
    }

    public function destroy($id)
    {
        $media = ServiceMedia::findOrFail($id);

        if (file_exists(public_path($media->file_path))) {
            unlink(public_path($media->file_path));
        }

        $media->delete();
        return redirect()->route('admin.service_media.index')->with('success', 'Media deleted successfully!');
    }
}
