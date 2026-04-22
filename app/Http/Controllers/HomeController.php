<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\Service;
use App\Models\Experience;
use App\Models\Setting;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {

        if (! session()->has('visited')) {

            $path = storage_path('app/visitors.txt');
        
            if (! file_exists($path)) {
                file_put_contents($path, 0);
            }
        
            $count = (int) file_get_contents($path);
            file_put_contents($path, $count + 1);
        
            session(['visited' => true]);
        }
        $projects = Project::query()
            ->when(request('search'), function ($query) {
                $query->where('title', 'like', '%' . request('search') . '%')
                      ->orWhere('description', 'like', '%' . request('search') . '%');
            })
            ->when(request('category'), function ($query) {
                $query->where('category_id', request('category'));
            })
            ->latest()
            ->get();

        return view('home', [
            'projects' => $projects,
            'skills' => Skill::all(),
            'services' => Service::all(),
            'experiences' => Experience::latest()->get(),
            'setting' => Setting::first(),
            'testimonials' => Testimonial::latest()->get(),
            'categories' => \App\Models\Category::all(),
        ]);
    }
}