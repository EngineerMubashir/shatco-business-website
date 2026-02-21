<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Faq;
use App\Models\Inquiry;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceMedia;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Project; // if you have a projects table

class FrontendController extends Controller
{
    /**
     * Render frontend home page with all dynamic data
     */
    public function index()
    {
        return view('frontend.home', [
            'settings' => Setting::pluck('value', 'key')->toArray(),
            'admins' => Admin::all(),
            'faqs' => Faq::all(),
            'inquiries' => Inquiry::all(),
            'services' => Service::with(['category', 'media'])->get(),
            'service_categories' => ServiceCategory::with('services')->get(),
            'service_media' => ServiceMedia::all(),
            'testimonials' => Testimonial::all(),
            // 'projects' => Project::latest()->get(), // optional
        ]);
    }

    /**
     * Show a single service details page
     */
    public function showService($slug)
    {
        $service = Service::with(['category', 'media'])->where('slug', $slug)->firstOrFail();

        return view('frontend.services.service-details', [
            'service' => $service,
            'services' => Service::with(['category', 'media'])->get(),
            'service_categories' => ServiceCategory::with('services')->get(),
            'settings' => Setting::pluck('value', 'key')->toArray(),
            'related_services' => Service::where('id', '!=', $service->id)->take(3)->get(),
        ]);
    }

    /**
     * Show a single project details page
     */
    public function showProject($id)
    {
        
        $project = [
            1 => [
                'id' => 1,
                'title' => 'MEP project with main contractor at NHC villa project',
                'category' => 'MEP Services',
                'location' => 'Near Riyadh Airport (Murcia)',
                'description' => 'Comprehensive MEP services for luxury villas, including HVAC, electrical, and plumbing systems integration.',
                'fullDescription' => 'This project involved complete MEP work including HVAC design, electrical wiring, lighting installation, and water systems integration. Our team ensured compliance with safety and performance standards.',
                'image' => asset('assests/images/projects/mep.webp'),
                'year' => '2022',
            ],
            2 => [
                'id' => 2,
                'title' => 'Low current project for SEC',
                'category' => 'Low Current Solutions',
                'location' => 'Saudi Electric Company, Abha',
                'description' => 'Implementation of advanced low current systems for improved security and communication infrastructure.',
                'fullDescription' => 'We installed state-of-the-art low current systems, including fire alarms, access control, and structured cabling to enhance operational security and performance.',
                'image' => asset('assests/images/projects/low-current.webp'),
                'year' => '2021',
            ],
            // Add other projects here...
        ];

        $projectData = $project[$id] ?? null;

        if (!$projectData) {
            abort(404, 'Project not found');
        }

        return view('frontend.project.project-details', compact('projectData'));
    }


    /**
     * Show all services under a single category
     */
    public function showCategory($slug)
    {
        $category = ServiceCategory::where('slug', $slug)->with('services')->firstOrFail();

        return view('frontend.category', [
            'category' => $category,
            'services' => $category->services,
            'settings' => Setting::pluck('value', 'key')->toArray(),

        ]);
    }


    /**
     * Show FAQ page
     */
    public function faq()
    {
        return view('frontend.layouts.faqs', [
            'settings' => Setting::pluck('value', 'key')->toArray(),
            'faqs' => Faq::all(),
            'services' => Service::with(['category', 'media'])->get(),
            'service_categories' => ServiceCategory::with('services')->get(),
        ]);
    }

    public function testimonials()
    {
        return view('frontend.layouts.testimonials', [
            'settings' => Setting::pluck('value', 'key')->toArray(),
            'testimonials' => Testimonial::all(),
            'services' => Service::with(['category', 'media'])->get(),
            'service_categories' => ServiceCategory::with('services')->get(),
        ]);
    }
    public function services()
    {
        return view('frontend.layouts.services', [
            'settings' => Setting::pluck('value', 'key')->toArray(),
            'services' => Service::with(['category', 'media'])->get(),
            'service_categories' => ServiceCategory::with('services')->get(),
        ]);
    }
    public function projects()
    {
        return view('frontend.layouts.projects', [
            'settings' => Setting::pluck('value', 'key')->toArray(),
            'services' => Service::with(['category', 'media'])->get(),
            'service_categories' => ServiceCategory::with('services')->get(),
        ]);
    }
    public function about()
    {
        return view('frontend.layouts.about', [
            'settings' => Setting::pluck('value', 'key')->toArray(),
            'services' => Service::with(['category', 'media'])->get(),
            'service_categories' => ServiceCategory::with('services')->get(),
        ]);
    }
}
