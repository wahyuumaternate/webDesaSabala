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
}
