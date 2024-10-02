<?php

namespace App\Http\Controllers\Backend;

use App\Models\Pelatihan;
use App\Models\Pendaftran;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PendaftaranController extends Controller
{
    public function page_pendaftaran()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            $pendaftaran = Pendaftran::latest()->get();
        } elseif ($user->role === 'lembaga') {
            $pendaftaran = Pendaftran::where('user_id', $user->id)->get();
        } else {

            $pendaftaran = collect();
        }
        if (auth()->user()->role === 'admin') {
            return view('backend.admin.pendaftaran.page_index', compact('pendaftaran'));
        }elseif(auth()->user()->role === 'lembaga'){
            return view('backend.pendaftaran.page_index', compact('pendaftaran'));
        }
    }

    public function page_create()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $pelatihan = Pelatihan::latest()->get();
        } elseif ($user->role === 'lembaga') {
            $pelatihan = Pelatihan::where('user_id', $user->id)->latest()->get();
        } else {
            $pelatihan = collect(); // atau []
        }
        if (auth()->user()->role === 'admin') {
            return view('backend.admin.pendaftaran.page_create', compact('pelatihan'));
        }elseif(auth()->user()->role === 'lembaga'){
            return view('backend.pendaftaran.page_create', compact('pelatihan'));
        }

    }

    public function page_store(Request $request)
    {
            $request->validate([
            'user_id' => 'required|uuid',
            'jenis' => 'nullable|string',
            'tempat_latihan' => 'nullable|string',
            'no_hp' => 'nullable|string',
            'email' => 'nullable|email',
            'persyaratan' => 'nullable|string',
            'fasilitas' => 'nullable|string',
            'periode_awal' => 'required|date',
            'periode_akhir' => 'required|date|after_or_equal:periode_awal',
            'kouta' => 'nullable|string',
            'images' => 'nullable|image|max:2048',
            'sifat' => 'nullable|in:offline,online,blended Learning,dll',
            'status' => 'nullable|in:dibuka,ditutup,pending',
        ]);


        $akte = null;

        if ($request->hasFile('images') && $request->file('images')->isValid()) {
            $file = $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $fileName = Str::uuid() . '.' . $extension;
            $file->move(public_path('upload/pelatihan/'), $fileName);
            $images = $fileName;
        }

        $pendaftaran = Pendaftran::create([
            'id' => Str::uuid(),
            'user_id' => Auth::id(),
            'jenis' => $request->jenis,
            'pelatihan_id' => $request->pelatihan_id,
            'tempat_latihan' => $request->tempat_latihan,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'persyaratan' => $request->persyaratan,
            'fasilitas' => $request->fasilitas,
            'periode_awal' => $request->periode_awal,
            'periode_akhir' => $request->periode_akhir,
            'kouta' => $request->kouta,
            'images' => $images,
            'sifat' => $request->sifat,
            'status' => $request->status,
        ]);

        Alert::toast('penftaran pelatihan berhasil', 'success');
        if(auth()->user()->role === 'admin'){
            Alert::toast('penftaran pelatihan berhasil', 'success');
            return redirect()->route('admin.pendaftaran.page_pendaftaran');
        }elseif(auth()->user()->role === 'lembaga'){
            Alert::toast('penftaran pelatihan berhasil', 'success');
            return redirect()->route('pendaftaran.page_pendaftaran');
        }
    }

    public function getPelatihan($id)
    {
        $pelatihan = Pelatihan::find($id);
        if ($pelatihan) {
            return response()->json(['kategori' => $pelatihan->kategori->name]);
        }
        return response()->json(['kategori' => null], 404);
    }

    public function show_page($id)
    {
        $pendaftaran = Pendaftran::findOrFail($id);
        if(auth()->user()->role === 'admin'){
            return view('backend.admin.pendaftaran.page_show', compact('pendaftaran'));
        }elseif(auth()->user()->role === 'lembaga'){
            return view('backend.pendaftaran.page_show', compact('pendaftaran'));
        }

    }

    public function page_edit($id)
    {
        $pendaftaran = Pendaftran::findOrFail($id);
        $pelatihan = Pelatihan::latest()->get();
        return view('backend.pendaftaran.page_edit', compact('pendaftaran','pelatihan'));
    }
}
