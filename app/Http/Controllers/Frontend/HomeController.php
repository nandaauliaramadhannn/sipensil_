<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Silder;
use App\Models\Pendaftran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function page_index()
    {
        $sliders = Silder::where('is_active', 1)->get();
        $pendaftaran = Pendaftran::where('status', 'dibuka')
        ->where('periode_akhir', '>=', Carbon::now())
        ->paginate(8);
        Pendaftran::where('status', 'dibuka')
            ->where('periode_akhir', '<', Carbon::now())
            ->update(['status' => 'ditutup']);
        return view('frontend.home', compact('sliders','pendaftaran'));
    }
}
