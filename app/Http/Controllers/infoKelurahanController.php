<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use Illuminate\Http\Request;

class infoKelurahanController extends Controller
{
    public function rt_rw()
    {
        return view('admin.infoKelurahan.rt_rw', [
            'rt' => Rt::all(),
            'rw' => Rw::all()
        ]);
    }

    public function storeRt(Request $request)
    {

        
        $rules = $request->validate([
            'nama_rt' => 'required|numeric',
        ]);


        Rt::create($rules);
        return redirect()->route('rt_rw')->with('success', 'Rt Berhasil Di Tambahkan');
    }

    public function destroyRt(Rt $rt)
    {
        try {
            Rt::destroy($rt->id);
            return redirect()->route('rt_rw')->with('success', 'Rt Berhasil Di Hapus');
        } catch (\Exception $e) {
            return redirect()->route('rt_rw')->with('error', 'Rt Tidak Dapat Di Hapus Mungkin Data Dingunakan Di Tabel Lain');
        }
    }

    public function storeRw(Request $request)
    {

        $rules = $request->validate([
            'nama_rw' => 'required|numeric',
        ]);
        Rw::create($rules);
        return redirect()->route('rt_rw')->with('success', 'Rw Berhasil Di Tambahkan');
    }

    public function destroyRw(Rw $rw)
    {
        try {
            Rw::destroy($rw->id);
            return redirect()->route('rt_rw')->with('success', 'Rw Berhasil Di Hapus');
        } catch (\Exception $e) {
            return redirect()->route('rt_rw')->with('error', 'Rw Tidak Dapat Di Hapus Mungkin Data Dingunakan Di Tabel Lain');
        }
    }
}
