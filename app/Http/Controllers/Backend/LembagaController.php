<?php

namespace App\Http\Controllers\Backend;

use App\Models\Lembaga;
use App\Models\Pelatihan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LembagaController extends Controller
{
    public function page_dashboard()
    {
        $user = Auth::user();
        $totalpelatihan = Pelatihan::where('user_id', $user->id)->latest()->count();
        return view('backend.lembaga.dashboard', compact('totalpelatihan'));
    }

    public function showFillForm()
    {
        return view('backend.lembaga.fill');
    }

    public function storeLembagaId(Request $request)
    {

            $request->validate([
                'name' => 'required|string|max:255',
            ]);


            $lembaga = Lembaga::create([
                'id' => Str::uuid(),
                'name' => $request->name,
            ]);


            $user = Auth::user();
            $user->update([
                'lembaga_id' => $lembaga->id,
            ]);


            return redirect()->route('lembaga.dashboard');

    }
}
