<?php

namespace App\Http\Controllers;

use App\Models\Belanja;
use App\Models\Berita;
use App\Models\GambaranUmum;
use App\Models\Pembiayaan;
use App\Models\Pembiyayaan;
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
        // Mengatur tahun yang ingin ditampilkan
        $yearsArray = [
            $currentYear - 2, // Tahun sekarang - 2
            $currentYear - 1, // Tahun sekarang - 1
            $currentYear      // Tahun sekarang
        ];
    
        // Ambil data untuk tahun yang dipilih
        $pendapatan = Pendapatan::select(DB::raw('SUM(jumlah) as total'), DB::raw('YEAR(created_at) as year'))
            ->groupBy('year')
            ->pluck('total', 'year');
    
        $belanja = Belanja::select(DB::raw('SUM(jumlah) as total'), DB::raw('YEAR(created_at) as year'))
            ->groupBy('year')
            ->pluck('total', 'year');
    
        // Mengambil data pembiayaan
        $pembiayaan = Pembiayaan::select('kategori_pembiayaan', 'jumlah')->get();
    
        // Data APBDes untuk tahun yang ditentukan
        $data = [
            'pendapatan' => $pendapatan,
            'belanja' => $belanja
        ];
    
        return view('pages.apbdes.index', compact('data', 'pendapatan', 'belanja', 'pembiayaan', 'years'));
    }

}
