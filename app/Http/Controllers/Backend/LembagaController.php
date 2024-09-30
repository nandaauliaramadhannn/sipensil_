<?php

namespace App\Http\Controllers\Backend;

use App\Models\Lembaga;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LembagaController extends Controller
{
    public function page_dashboard()
    {
        return view('backend.lembaga.dashboard');
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
