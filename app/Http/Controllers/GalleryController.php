<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
     public function index()
    {
        $categories = GalleryCategory::with('galleries')->get();
        $biodata = Biodata::first();
        return view('frontend.gallery.index', compact('categories','biodata'));
     }

    public function show(Gallery $gallery)
    {
        $biodata = Biodata::first();
        return view('frontend.gallery.show', compact('gallery','biodata'));
    }


}
