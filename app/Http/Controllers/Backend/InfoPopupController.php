<?php

namespace App\Http\Controllers\Backend;


use App\Models\InfoPopup;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class InfoPopupController extends Controller
{
    public function page_index()
    {

        $popup = InfoPopup::latest()->get();
        return view('backend.admin.popup.index', compact('popup'));
    }

    public function page_create()
    {
        return view('backend.admin.popup.page_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'message' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        try {
            $image = null;

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = Str::uuid() . '.' . $extension;
                $file->move(public_path('upload/popup/'), $fileName);
                $image = $fileName;
            }

            InfoPopup::create([
                'title' => $request->title,
                'message' => $request->message,
                'image' => $image,
            ]);

            Alert::toast('Data popup berhasil ditambahkan', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Failed to store popup: ' . $e->getMessage());
            Alert::toast('Gagal menambahkan data popup. Silakan coba lagi.', 'error');
        }

       return redirect()->back();
    }


    public function destroy($id)
    {
        $popup = InfoPopup::findOrFail($id);

        if ($popup->image && file_exists(public_path('upload/popup/' . $popup->image))) {
            unlink(public_path('upload/popup/' . $popup->image));
        }
        $popup->delete();

        Alert::toast('Data popup berhasil dihapus', 'success');
        return redirect()->route('admin.popup.page_index');
    }
}
