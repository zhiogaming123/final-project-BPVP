<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;
use App\Models\Zone;
use Illuminate\Support\Facades\File;

class AttractionController extends Controller
{
    public function index()
    {
        $attractions = Attraction::all();
        return view('admin.pages.attractions.index', compact('attractions'));
    }

    public function create()
    {
        $Zones = Zone::all();
        return view('admin.pages.attractions.create', compact('Zones'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'price_range' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        $data = $validated;
        $data['zone_id'] = $request->zone_id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images/attractions'), $filename);
            $data['image'] = $filename;
        }

        Attraction::create($data);

        return redirect()->route('admin.attractions.index');
    }

    public function show($id)
    {
        $attraction = Attraction::findOrFail($id);
        // Get reviews for this attraction
        $approvedReviews = $attraction->reviews()->where('is_approved', true)->get();
        return view('landing.pages.detail-attractions', compact('attraction', 'approvedReviews'));
    }

    public function edit($id)
    {
        $attraction = Attraction::findOrFail($id);
        $Zones = Zone::all();

        return view('admin.pages.attractions.edit', compact('attraction', 'Zones'));
    }

    public function update(Request $request, $id)
    {
        $attraction = Attraction::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'price_range' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $validated;
        $data['zone_id'] = $request->zone_id;

        if ($request->hasFile('image')) {

            if ($attraction->image && File::exists(public_path('images/attractions/' . $attraction->image))) {
                File::delete(public_path('images/attractions/' . $attraction->image));
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images/attractions'), $filename);
            $data['image'] = $filename;
        } else {
            $data['image'] = $attraction->image;
        }

        $attraction->update($data);

        return redirect()->route('admin.attractions.index');
    }

    public function destroy($id)
    {
        $attraction = Attraction::find($id);

        if ($attraction) {

            if ($attraction->image && File::exists(public_path('images/attractions/' . $attraction->image))) {
                File::delete(public_path('images/attractions/' . $attraction->image));
            }

            $attraction->delete();

            return redirect()->route('admin.attractions.index');
        }

        return redirect()->route('admin.attractions.index');
    }
}