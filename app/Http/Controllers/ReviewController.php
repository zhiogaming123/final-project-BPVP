<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Attraction;
use App\Models\Zone;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $approvedReviews = Review::where('is_approved', true)
            ->orderBy('created_at', 'desc')
            ->get();
        $attractions = Attraction::all();
        $zones = Zone::all();

        return view('landing.pages.reviews.index', compact('approvedReviews', 'attractions', 'zones'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reviewer_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'type' => 'required|in:zone,attraction',
            'reviewable_id' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'reviewer_name' => $validated['reviewer_name'],
            'email' => $validated['email'],
            'description' => $validated['description'],
            'comment' => $validated['description'],
            'rating' => $validated['rating'],
            'is_approved' => false,
            'reviewable_type' => $validated['type'] == 'zone' ? Zone::class : Attraction::class,
            'reviewable_id' => $validated['reviewable_id'],
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('reviews', $imageName, 'public');
            $data['image'] = 'reviews/' . $imageName;
        }

        Review::create($data);

        return redirect()->back()
    ->with('success', 'Review Anda berhasil dikirim! Tunggu persetujuan admin.');
    }
}
