<?php

namespace App\Http\Controllers\Backend;

use App\Models\Silder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function page_index()
    {
        $sliders  = Silder::latest()->get();
        return view('backend.admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('backend.admin.slider.create');
    }
    public function store(Request $request)
    {

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = Str::uuid() . '.' . $extension;
            $file->move(public_path('upload/slider/'), $fileName);
            $image = $fileName;
        } else {
            return back()->withInput()->withErrors(['image' => 'The image upload failed.']);
        }
        $slider = new Silder();
        $slider->title = $request->title;
        $slider->image = $image;
        $slider->url = $request->url;
        $slider->description = $request->description;
        $slider->is_active = $request->has('is_active') ? 1 : 0;

        $slider->save();

        Alert::toast('Data slider berhasil ditambahkan', 'success');
        return redirect()->back();

    }
    public function toggleStatus($id)
    {
        $slider = Silder::find($id);

        if ($slider) {
            // Toggle status
            $slider->is_active = !$slider->is_active;
            $slider->save();

            Alert::toast('Status slider berhasil diubah', 'success');
        } else {
            Alert::toast('Slider tidak ditemukan', 'error');
        }

        return redirect()->back();
    }


}
