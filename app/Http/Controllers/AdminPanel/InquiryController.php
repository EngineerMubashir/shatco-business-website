<?php
namespace App\Http\Controllers\AdminPanel;
use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Service;
use Illuminate\Http\Request;
class InquiryController extends Controller
{ 
    public function index()
    {
        $inquiries = Inquiry::with('service')->latest()->get();
        $services = Service::all();
        return view('admin.inquiries.index', compact('inquiries', 'services'));
    }
    public function store(Request $request)
    {
        $request->validate([    
            'name' => 'required|string|max:255',
            'email' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'inquiry_service_id' => 'required',
            'message' => 'nullable|string|max:255',
        ]);
        Inquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'inquiry_service_id' => $request->inquiry_service_id,
            'message' => $request->message,
        ]);
        return redirect()->route('admin.inquiries.index')->with('success', 'Inquiries added successfully!');
    }
    public function update(Request $request, $id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'inquiry_service_id' => 'required',
            'message' => 'nullable|string|max:255',
        ]);
        $inquiry->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'inquiry_service_id' => $request->inquiry_service_id,
            'message' => $request->message,
        ]);
        return redirect()->route('admin.inquiries.index')->with('success', 'Inquiriy updated successfully!');
    }
    public function destroy($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();
        return redirect()->route('admin.inquiries.index')->with('success', 'Testimonial deleted successfully!');
    }
}
