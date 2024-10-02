<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Pelatihan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;

class RencanaController extends Controller
{
    public function page_index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $pelatihans = Pelatihan::latest()->get();
        } elseif ($user->role === 'lembaga') {
            $pelatihans = Pelatihan::where('user_id', $user->id)->get();
        } else {

            $pelatihans = collect();
        }
        if (auth()->user()->role === 'admin') {

            return view('backend.admin.rencana.page_index', compact('pelatihans'));
        }elseif(auth()->user()->role === 'lembaga'){

            return view('backend.rencana.page_index', compact('pelatihans'));
        }
    }

    public function create_page()
    {
        $kategori = Kategori::latest()->get();
        $users = User::where('role','lembaga')->get();
        if(Auth::user()->role === 'admin'){
            return view('backend.admin.rencana.page_create', compact('users','kategori'));
        }elseif(Auth::user()->role === 'lembaga'){
            return view('backend.rencana.page_create', compact('users','kategori'));
        }
    }
    public function store_page(Request $request)
    {

            $validatedData = $request->validate([
                'nama_pelatihan' => 'required|string|max:255',
                'kategori_id' => 'required|exists:kategori,id',
                'jumlah_peserta' => 'required|integer|min:1',
                'rencana_pelatihan' => 'required|date|after_or_equal:today',
                'rating' => 'nullable|integer|min:0|max:5',
                'selected_user_id' => 'required_if:role,admin|exists:users,id',
            ]);

            $userId = auth()->user()->role === 'admin'
                ? $validatedData['selected_user_id']
                : Auth::id();

            Pelatihan::create([
                'id' => Str::uuid(),
                'user_id' => $userId,
                'nama_pelatihan' => $validatedData['nama_pelatihan'],
                'kategori_id' => $validatedData['kategori_id'],
                'jumlah_peserta' => $validatedData['jumlah_peserta'],
                'rencana_pelatihan' => $validatedData['rencana_pelatihan'],
                'rating' => $validatedData['rating'] ?? null,
            ]);

            Alert::toast('Data pelatihan berhasil ditambahkan', 'success');

            if(auth()->user()->role === 'admin'){
                return redirect()->route('admin.rencana.page_index');
            }elseif(auth()->user()->role === 'lembaga'){
                return redirect()->route('rencana.page_index');
            }

    }

        public function edit_page($id)
        {
            $pelatihan = Pelatihan::findOrFail($id);
            $kategori = Kategori::latest()->get();
            if(Auth::user()->role === 'admin'){
                return view('backend.admin.rencana.page_edit', compact('pelatihan','kategori'));
            }elseif(Auth::user()->role === 'lembaga'){
                return view('backend.rencana.page_edit', compact('pelatihan','kategori'));
            }
        }

        public function update_page(Request $request, $id)
        {

            $pelatihan = Pelatihan::findOrFail($id);
            $pelatihan->update($request->all());
            Alert::toast( 'Data pelatihan berhasil di ubah', 'success');
            if(auth()->user()->role === 'admin'){
                Alert::toast( 'Data pelatihan berhasil di ubah', 'success');
                return redirect()->route('admin.rencana.page_index');
            }elseif(auth()->user()->role === 'lembaga'){
                Alert::toast( 'Data pelatihan berhasil di ubah', 'success');
                return redirect()->route('rencana.page_index');
            }

        }

        public function destroy_page($id)
        {

            $pelatihan = Pelatihan::where('id', $id)->firstOrFail();
            $pelatihan->delete($id);
            Alert::toast( 'Data pelatihan berhasil di hapus', 'success');
            if(auth()->user()->role === 'admin'){
                Alert::toast( 'Data pelatihan berhasil di hapus', 'success');
                return redirect()->route('admin.rencana.page_index');
            }elseif(auth()->user()->role === 'lembaga'){
                Alert::toast( 'Data pelatihan berhasil di hapus', 'success');
                return redirect()->route('rencana.page_index');
            }
        }
}
