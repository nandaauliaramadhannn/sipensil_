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

        return view('backend.rencana.page_index', compact('pelatihans'));
    }

    public function create_page()
    {
        $kategori = Kategori::latest()->get();
        $users = User::where('role','lembaga')->get();
        return view('backend.rencana.page_create', compact('kategori','users'));
    }
    public function store_page(Request $request)
    {

        try {
            $validatedData = $request->validate([
                'nama_pelatihan' => 'required|string|max:255',
                'kategori_id' => 'required|exists:kategori,id',
                'jumlah_peserta' => 'required|integer|min:1',
                'rencana_pelatihan' => 'required|date|after_or_equal:today',
                'rating' => 'nullable|integer|min:0|max:5',
                'selected_user_id' => 'required_if:role,admin|exists:users,id',
            ]);

            // Tentukan user_id berdasarkan role
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
            return response()->json(['redirect' => route('rencana.page_index')]);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat menambahkan data pelatihan'], 500);
        }
    }

        public function edit_page($id)
        {
            $pelatihan = Pelatihan::findOrFail($id);
            $kategori = Kategori::latest()->get();
            return view('backend.rencana.page_edit', compact('pelatihan','kategori'));
        }

        public function update_page(Request $request, $id)
        {

            $pelatihan = Pelatihan::findOrFail($id);
            $pelatihan->update($request->all());
            Alert::toast( 'Data pelatihan berhasil di ubah', 'success');
            return redirect()->route('rencana.page_index');
        }

        public function destroy_page($id)
        {

            $pelatihan = Pelatihan::where('id', $id)->firstOrFail();
            $pelatihan->delete($id);
            Alert::toast( 'Data pelatihan berhasil di hapus', 'success');
            return redirect()->route('rencana.page_index');

        }
}
