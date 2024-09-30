<?php

namespace App\Http\Controllers\Backend;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    public function page_index()
    {
        $kategoris = Kategori::latest()->get();
        return view('backend.kategori.index', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $kategori = Kategori::create([
            'id' => Str::uuid()->toString(),
            'name'  => $request->name,
        ]);

        Alert::toast('Data kategori berhasil ditambahkan', 'success');
        return redirect()->back();
    }
}
