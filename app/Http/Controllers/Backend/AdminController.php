<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Kategori;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\UserPendaftaran;

class AdminController extends Controller
{
    public function page_dashboard()
    {
        $totallembag = User::where('role','lembaga')->count();
        $totalpelatihan =  Pelatihan::count();
        $kategoriCount = Kategori::count();
        $counttotaluser = UserPendaftaran::count();
        return view('backend.admin.dashboard', compact('totallembag','totalpelatihan','kategoriCount','counttotaluser'));
    }

    public function page_pendaftaran()
    {
        return view('backend.admin.pendaftaran.page_index');
    }

    public function chartPelatihan()
    {
        $data = Pelatihan::selectRaw('MONTH(rencana_pelatihan) as month, pelatihan.kategori_id, kategori.name as kategori_name, COUNT(*) as count')
        ->join('kategori', 'pelatihan.kategori_id', '=', 'kategori.id') // Pastikan nama tabel dan kolom sesuai
        ->groupBy('month', 'pelatihan.kategori_id', 'kategori.name')
        ->orderBy('month')
        ->get();

    // Label bulan
    $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $datasets = [];

    // Ambil kategori yang unik
    $kategoriNames = $data->pluck('kategori_name')->unique();

    foreach ($kategoriNames as $kategoriName) {
        $dataset = [
            'label' => $kategoriName,
            'data' => array_fill(0, 12, 0),
            'backgroundColor' => 'rgba(0, 158, 253, 0.5)',
            'borderColor' => 'rgba(0, 158, 253, 1)',
            'borderWidth' => 1,
        ];

        foreach ($data as $row) {
            if ($row->kategori_name == $kategoriName) {
                $dataset['data'][$row->month - 1] = $row->count;
            }
        }

        $datasets[] = $dataset;
    }

    return response()->json(['labels' => $labels, 'datasets' => $datasets]);

    }


        public function topKategoriPelatihan()
        {

            $topKategori = Pelatihan::select('kategori_id', DB::raw('COUNT(*) as count'))
                ->groupBy('kategori_id')
                ->orderBy('count', 'desc')
                ->limit(10)
                ->get();

            $kategoriIds = $topKategori->pluck('kategori_id');
            $kategoriNames = Kategori::whereIn('id', $kategoriIds)->pluck('name', 'id');
            $result = $topKategori->map(function ($item) use ($kategoriNames) {
                return [
                    'kategori_id' => $item->kategori_id,
                    'kategori_name' => $kategoriNames[$item->kategori_id],
                    'count' => $item->count,
                ];
            });

            return response()->json($result);
        }
}
