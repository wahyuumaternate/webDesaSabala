<?php

namespace App\Http\Controllers;

use App\Models\Belanja;
use App\Models\Berita;
use App\Models\GambaranUmum;
use App\Models\Pembiayaan;
use App\Models\Pembiyayaan;
use App\Models\Pemuda;
use App\Models\Pendapatan;
use App\Models\SambutanLurah;
use App\Models\Sejarah;
use App\Models\StrukturOrganisasi;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    
    public function berita() {
        return view('pages.berita.index',[
            'berita'=> Berita::with([])->latest()->paginate(8)
        ]);
    }
    public function detailberita(Berita $berita) {
        $berita->increment('views');

        return view('pages.berita.detail',[
            'berita'=> $berita,
            'recentberita'=> Berita::paginate(8),
            'sambutan_lurah'=> SambutanLurah::all()
        ]);
    }

    public function visimisi() {
        return view('pages.profil_kelurahan.visi_misi',[
            'visimisi'=> VisiMisi::all()
        ]);
    }

    public function sambutanlurah(SambutanLurah $sambutanLurah) {
        
        DB::table('sambutan_lurah')->increment('views');

        return view('pages.berita.sambutanlurah',[
            'sambutanLurah'=> $sambutanLurah,
            'recentberita'=> Berita::paginate(8),
        ]);
    }

    public function struktur_organisasi() {
            
            return view('pages.profil_kelurahan.struktur_organisasi',[
                'struktur' => StrukturOrganisasi::all(),
            ]);
    }
    public function strukturorganisasiPemuda() {
            
            return view('pages.profil_kelurahan.strukturorganisasiPemuda',[
                'struktur' => Pemuda::all(),
            ]);
    }

    public function sejarah() {
        return view('pages.profil_kelurahan.sejarah',[
            'sejarah'=> Sejarah::all()
        ]);
    }

    public function gambaranumum() {
        return view('pages.profil_kelurahan.gambaran_umum',[
            'gambaranumum'=> GambaranUmum::all()
        ]);
    }

    public function apbdes()
{
    // Ambil semua tahun unik dari Pendapatan
    $years = Pendapatan::select(DB::raw('YEAR(created_at) as year'))
            ->distinct()
            ->pluck('year');
    
    // Mendapatkan tahun saat ini
    $currentYear = date('Y');
    $yearsArray = [
        $currentYear - 2, // Tahun sekarang - 2
        $currentYear - 1, // Tahun sekarang - 1
        $currentYear      // Tahun sekarang
    ];
    
    // Data Pendapatan dengan format [kategori_pendapatan => total]
    $pendapatan = Pendapatan::select('kategori_pendapatan', DB::raw('SUM(jumlah) as total'))
        ->groupBy('kategori_pendapatan')
        ->pluck('total', 'kategori_pendapatan'); // Format: [kategori_pendapatan => total]

    // Data Belanja dengan format [kategori_belanja => total]
    $belanja = DB::table('belanja')
        ->select('kategori_belanja', DB::raw('SUM(jumlah) as total'))
        ->groupBy('kategori_belanja')
        ->pluck('total', 'kategori_belanja'); // Format: [kategori_belanja => total]

    // Data Pembiayaan (array objek)
    $pembiayaan = Pembiayaan::select('kategori_pembiayaan', 'jumlah')->get();

    // Ambil data Pendapatan per tahun
    $pendapatanYear = Pendapatan::select(DB::raw('YEAR(created_at) as year'), DB::raw('SUM(jumlah) as total'))
        ->groupBy('year')
        ->pluck('total', 'year'); // Format: [2024 => total, 2025 => total]

    // Ambil data Belanja per tahun
    $belanjaYear = DB::table('belanja')
        ->select(DB::raw('YEAR(created_at) as year'), DB::raw('SUM(jumlah) as total'))
        ->groupBy('year')
        ->pluck('total', 'year'); // Format: [2024 => total, 2025 => total]

    // Data APBDes untuk tahun yang ditentukan
    return view('pages.apbdes.index', compact('pendapatan', 'belanja', 'pembiayaan', 'years','belanjaYear','pendapatanYear'));
}


}
