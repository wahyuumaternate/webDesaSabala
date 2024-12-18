<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\GambaranUmum;
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
        // Data APBDes untuk 2022, 2023, dan 2024
        $data = [
            'pendapatan' => [
                '2022' => 4500000000,
                '2023' => 4700000000,
                '2024' => 4802205800
            ],
            'belanja' => [
                '2022' => 4600000000,
                '2023' => 4700000000,
                '2024' => 4888222678
            ]
        ];

        // Data Pendapatan Desa 2024
        $pendapatan = [
            'Pendapatan Asli Desa' => 2802205800,
            'Pendapatan Transfer' => 4802205800,
            'Pendapatan Lain-lain' => 0
        ];

        // Data Belanja Desa Tahun 2024
        $belanja = [
            'Penyelenggaraan Pemerintahan Desa' => 2004886353,
            'Pelaksanaan Pembangunan Desa' => 2158774559,
            'Pembinaan Kemasyarakatan Desa' => 495161766,
            'Pemberdayaan Masyarakat Desa' => 35000000,
            'Penanggulangan Bencana, Keadaan Darurat, dan Mendesak' => 194400000
        ];

        $pembiayaan = [
            'Penerimaan' => 86016878,
            'Pengeluaran' => 0
        ];

        return view('pages.apbdes.index', compact('data','pendapatan','belanja','pembiayaan'));
    }
}
