<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Import semua model yang dibutuhkan
use App\Models\Biodata;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Organization;
use App\Models\Activity;
use Illuminate\Container\Attributes\Log;

class Homecontroller extends Controller
{
    public function index()
    {
        return view('frontend.home', [
            'biodata' => Biodata::first(),
            'skills' => Skill::all(),
            'projects' => Project::latest()->get(),
            'educations' => Education::orderBy('start_year', 'desc')->get(),
            'experiences' => Experience::orderBy('start_date', 'desc')->get(),
            'organizations' => Organization::orderBy('start_date', 'desc')->get(),
            'activities' => Activity::latest()->get(),
        ]);
    }

            public function contact()
        {
            $biodata = Biodata::first();
            return view('frontend.contact', compact('biodata'));
        }

        public function sendContact(Request $request)
        {
            $validated = $request->validate([
                'name' => 'required|max:100',
                'email' => 'required|email',
                'message' => 'required|max:1000',
            ]);

            // Contoh simpan ke log
           // Log::info("message");('Pesan Kontak:', $validated);

            return back()->with('success', 'Pesan Anda berhasil dikirim!');
        }
}
