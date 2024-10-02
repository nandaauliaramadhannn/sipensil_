<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\PesertaMail;
use App\Models\Pendaftran;
use Illuminate\Http\Request;
use App\Models\UserPendaftaran;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class PesertaController extends Controller
{

    public function page_pesert($id)
    {
        $user = Auth::user();
        $pendaftaran = Pendaftran::findOrFail($id);
        return view('frontend.peserta.index', compact('user', 'pendaftaran'));
    }


    public function page_store(Request $request, $id)
    {
        $pendaftaran = Pendaftran::findOrFail($id);

            $user = Auth::user();
            if (empty($user->data_user) || !$user->data_user->isComplete()) {
                Alert::toast('Silakan lengkapi data Anda sebelum mendaftar', 'error');
                return redirect()->route('user.profile');
            }
        $existingRegistration = UserPendaftaran::where('user_id', Auth::user()->id)
            ->where('pendaftaran_id', $pendaftaran->id)
            ->first();

        if ($existingRegistration) {
            Alert::toast('Anda sudah terdaftar untuk pelatihan ini', 'error');
            return redirect()->route('index', $pendaftaran->id);
        }

        if ($pendaftaran->kouta <= $pendaftaran->userPendaftaran()->count()) {
            Alert::toast('Kuota untuk pelatihan ini sudah terpenuhi', 'error');
            return redirect()->route('index', $pendaftaran->id);
        }

        $date = now();
        $datePart = $date->format('Ymd');

        $latestRegistration = UserPendaftaran::where('pendaftaran_id', $pendaftaran->id)
            ->whereDate('created_at', $date->toDateString())
            ->orderBy('id', 'desc')
            ->first();

        $number = $latestRegistration ? (int) substr($latestRegistration->registration_number, -4) + 1 : 1;
        $registrationNumber = sprintf('%s-%04d', $datePart, $number);

        $userpendaftaran = UserPendaftaran::create([
            'user_id' => Auth::user()->id,
            'pendaftaran_id' => $pendaftaran->id,
            'no_pendaftran' => $registrationNumber,
        ]);


        Mail::to(Auth::user()->email)->send(new PesertaMail($pendaftaran, $registrationNumber, Auth::user()));

        Alert::toast('Pendaftaran berhasil', 'success');
        return redirect()->route('page_bukti.pendaftaran', $userpendaftaran->pendaftaran->id);
    }

    public function page_bukti($id)
    {
        $user = Auth::user();
        $dataUser = $user->data_user;
        $pendaftaran = Pendaftran::findOrFail($id);

        $userPendaftaran = UserPendaftaran::where('user_id', $user->id)
            ->where('pendaftaran_id', $pendaftaran->id)
            ->first();
        if (!$userPendaftaran) {
            Alert::toast('Anda belum terdaftar untuk pelatihan ini', 'error');
            return redirect()->route('index', $pendaftaran->id);
        }

        return view('frontend.peserta.bukti', compact('pendaftaran', 'dataUser','userPendaftaran'));
    }
}
