<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use Illuminate\Support\Facades\File;


class ZoneController extends Controller
{
    public function index()
    {
        $zones = Zone::all();
        return view('admin.pages.zones.index', compact('zones'));
    }

    public function create()
    {
        return view('admin.pages.zones.create');

    }

    public function store(Request $request)
    {
         $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable',
        'price_range' => 'required',
        'image' => 'required|image|max:2048',
    ]);
     $data = $validated; // 🔥 FIX PENTING

if ($request->hasFile('image')) {

        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('images/zones'), $filename);

        $data['image'] = $filename;
    } 
    Zone::create($data);
    return redirect()->route('admin.zones.index')->with('success', 'Zone created successfully.');
    }

    public function show($id)
    {
        $zone = Zone::findOrFail($id);
        return view('admin.pages.zones.show', compact('zone'));
    }

    public function edit($id)
    {
        $zone = Zone::findOrFail($id);
        return view('admin.pages.zones.edit', compact('zone'));
    }

    public function update(Request $request, $id)
    {
$zone = Zone::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable',
        'price_range' => 'required',
        'image' => 'required',
        
    ]);

    $data = $validated;

    if ($request->hasFile('image')) {

        // hapus gambar lama
        if ($zone->image && File::exists(public_path('images/zones/' . $zone->image))) {
            File::delete(public_path('images/zones/' . $zone->image));
        }

        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('images/zones'), $filename);

        $data['image'] = $filename;
    } else {
        $data['image'] = $zone->image;
    }

    $zone->update($data);

    return redirect('/zones')->with('success', 'Zone updated successfully.');
}    

    public function destroy($id)
    {
        $zone = Zone::find($id);

        if ($zone) {

            // 🔥 HAPUS GAMBAR JUGA
            if ($zone->image && File::exists(public_path('images/zones/' . $zone->image))) {
                File::delete(public_path('images/zones/' . $zone->image));
            }

            $zone->delete();

            return redirect('/zones')->with('success', 'Zone deleted successfully.');
        } else {
            return redirect('/zones')->with('error', 'Zone not found.');
        }
    }
}