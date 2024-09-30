<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Pendaftran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetialPelatihanController extends Controller
{
    public function show_page($id)
    {
        $pendaftaran = Pendaftran::findOrFail($id);
        return view('frontend.pendaftaran.page_show', compact('pendaftaran'));
    }
}
