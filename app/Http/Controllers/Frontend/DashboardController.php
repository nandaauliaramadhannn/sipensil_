<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Desa;
use App\Models\DataUser;
use App\Models\Kecamatan;
use App\Models\Pendaftran;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\UserPendaftaran;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function page_dashboard()
    {
        $datapelatihan = UserPendaftaran::where('user_id', Auth::user()->id)->count();
        $userpendaftaran = UserPendaftaran::where('user_id', Auth::user()->id)
            ->whereHas('pendaftaran', function($query) {
                $query->where('periode_awal', '>=', Carbon::now());
            })
            ->with('pendaftaran')
            ->paginate(3);

        foreach ($userpendaftaran as $item) {
            $periodeAwal = Carbon::parse($item->pendaftaran->periode_awal);
            $countdown = $periodeAwal->diffInSeconds(Carbon::now());

            $item->countdown = gmdate("H:i:s", $countdown);
        }
        return view('frontend.dashboard', compact('datapelatihan','userpendaftaran'));
    }

    public function getDesasByKecamatan($kecamatan_id)
    {
        $desa = Desa::where('kecamatan_id', $kecamatan_id)->get();
        return response()->json($desa);
    }


    public function page_profile()
    {
        $user = Auth::user();
        $dataUser = $user->data_user;
        $kecamatan = Kecamatan::all();
        return view('frontend.user.profile', compact('dataUser','kecamatan'));
    }

    public function update_profile(Request $request)
    {
        $user = Auth::user();
        $dataUser = $user->data_user;

        $validatedData = $request->validate([
            'jenis_kelamin' => 'required|in:1,2',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'pendidikan' => 'required|string|max:255',
            'umur' => 'required|integer|min:1',
            'kecamatan_id' => 'nullable|exists:kecamatan,id',
            'desa_id' => 'nullable|exists:desa,id',
            'tinggi_badan' => 'required|string|max:10',
            'berat_badan' => 'required|string|max:10',
            'ktp' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'ijazah' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->hasFile('photo')) {
            $fileName = Str::uuid() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('upload/user/'), $fileName);
            $validatedData['photo'] = $fileName;
        }

        if ($request->hasFile('ktp')) {
            $fileName = Str::uuid() . '.' . $request->file('ktp')->getClientOriginalExtension();
            $request->file('ktp')->move(public_path('upload/user/'), $fileName);
            $validatedData['ktp'] = $fileName;
        }

        if ($request->hasFile('ijazah')) {
            $fileName = Str::uuid() . '.' . $request->file('ijazah')->getClientOriginalExtension();
            $request->file('ijazah')->move(public_path('upload/user/'), $fileName);
            $validatedData['ijazah'] = $fileName;
        }

        if ($dataUser) {
            $dataUser->update($validatedData);
        } else {
            $dataUser = new DataUser($validatedData);
            $dataUser->user_id = $user->id;
            $dataUser->save();
        }

        Alert::toast('Profil berhasil diperbarui!', 'success');
        return redirect()->route('user.profile');
    }
}
