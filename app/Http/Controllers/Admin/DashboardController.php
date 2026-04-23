<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use App\Models\Zone;
use App\Models\Attraction;
use App\Models\Review;

class DashboardController extends Controller
{
    public function index()
    {
        $counter = [
            'zones' => Zone::count(),
            'attractions' => Attraction::count(),
            'reviews' => Review::count(),
            'published_reviews' => Review::where('is_approved', true)->count(),
            'unpublished_reviews' => Review::where('is_approved', false)->count(),
        ];

        return view('admin.pages.index', compact('counter'));
    }
}