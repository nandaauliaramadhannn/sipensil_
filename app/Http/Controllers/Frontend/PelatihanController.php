<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Kategori;
use App\Models\Pendaftran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PelatihanController extends Controller
{
    public function all_page(Request $request)
    {
        $categories = Kategori::all();


        $pendaftaran = Pendaftran::where('status', 'dibuka')
            ->where('periode_akhir', '>=', Carbon::now());

        if ($request->has('category')) {
            $pendaftaran = $pendaftaran->whereHas('pelatihan.kategori', function ($query) use ($request) {
                $query->where('id', $request->category);
            });
        }

        $pendaftaran = $pendaftaran->get();

        return view('frontend.pelatihan.index', compact('pendaftaran', 'categories'));

    }
}
