<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Zone;
use App\Models\Attraction;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        $zones = Zone::all();
        $attractions = Attraction::all();

        return view('admin.pages.reviews.index', compact('reviews', 'zones', 'attractions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reviewer_name' => 'required',
            'description' => 'required',
            'comment' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'type' => 'required',
            'reviewable_id' => 'required',
        ]);

        $data = $validated;

        
        $data['reviewable_type'] = $request->type == 'zone'
            ? Zone::class
            : Attraction::class;

        Review::create($data);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review created successfully.');
    }

    public function edit($id)
    {
        $reviews = Review::all();
        $zones = Zone::all();
        $attractions = Attraction::all();
        $editReview = Review::findOrFail($id);

        return view('admin.pages.reviews.index', compact(
            'reviews',
            'zones',
            'attractions',
            'editReview'
        ));
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $validated = $request->validate([
            'reviewer_name' => 'required',
            'description' => 'required',
            'comment' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review->update($validated);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
        $review = Review::find($id);

        if ($review) {
            $review->delete();
        }

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Deleted');
    }

    public function approve($id)
{
    $review = Review::findOrFail($id);
    $review->is_approved = true;
    $review->save();

    return back()->with('success', 'Review approved');
}

public function unapprove($id)
{
    $review = Review::findOrFail($id);
    $review->is_approved = false;
    $review->save();

    return back()->with('success', 'Review unapproved');

}
}