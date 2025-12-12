<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('admin.banner.banner', compact('banners'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'title' => 'nullable|string|max:255'
    //     ]);

    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('banners', 'public');
    //     } else {
    //         return back()->with('error', 'Image upload failed.');
    //     }

    //     Banner::create([
    //         'image' => $imagePath,
    //         'title' => $request->title
    //     ]);

    //     return redirect()->route('banners.index')->with('success', 'Banner added successfully');
    // }
 public function store(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'title' => 'nullable|string|max:255',
        'subtitle' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'button_text' => 'nullable|string|max:100',
        'button_link' => 'nullable|string|max:255',
    ]);

    $data = [];

    // Handle image upload
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('banners/images', 'public');
    }

    // Extra fields
    $data['title'] = $request->title;
    $data['subtitle'] = $request->subtitle;
    $data['description'] = $request->description;
    $data['button_text'] = $request->button_text;
    $data['button_link'] = $request->button_link;

    Banner::create($data);

    return redirect()->route('banners.index')->with('success', 'Banner added successfully');
}


    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit-banner', compact('banner'));
    }
    
    // public function update(Request $request, $id)
    // {
    //     $banner = Banner::findOrFail($id);
    
    //     $request->validate([
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
            
    //         'title' => 'nullable|string|max:255'
    //     ]);
    
    //     if ($request->hasFile('image')) {
    //         // Delete old image
    //         Storage::disk('public')->delete($banner->image);
            
    //         // Upload new image
    //         $imagePath = $request->file('image')->store('banners', 'public');
    //         $banner->image = $imagePath;
    //     }
    
    //     $banner->title = $request->title;
    //     $banner->save();
    
    //     return redirect()->route('banners.index')->with('success', 'Banner updated successfully');
    // }
    public function update(Request $request, $id)
{
    $banner = Banner::findOrFail($id);

    $data = [
        'title' => $request->title,
    ];

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('banners', 'public');
    }

    if ($request->hasFile('video')) {
        $data['video'] = $request->file('video')->store('banners/videos', 'public');
    }

    $banner->update($data);

    return redirect()->route('banners.index')->with('success', 'Banner updated successfully!');
}
    public function destroy($id)
{
    $banner = Banner::findOrFail($id);

    // Delete image if it exists
    if ($banner->image) {
        Storage::disk('public')->delete($banner->image);
    }

    // Delete video if it exists
    if ($banner->video) {
        Storage::disk('public')->delete($banner->video);
    }

    $banner->delete();

    return redirect()->route('banners.index')->with('success', 'Banner deleted successfully.');
}

}
