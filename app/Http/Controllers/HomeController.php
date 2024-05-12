<?php

namespace App\Http\Controllers;

use App\Models\CatatanKeuangan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(Request $request){
        $data['page_title'] = 'Dashboard';

        $tahunReq = $request->tahun;

        if ($tahunReq != null) {
           $tahun = $tahunReq;
        }else{
            $tahun = date('Y');
        }

        $data['kas_masuk'] = CatatanKeuangan::whereYear('tanggal',$tahun)->whereIn('tipe',['Piutang','Pemasukan'])->get()->sum('saldo');
        $data['kas_keluar'] = CatatanKeuangan::whereYear('tanggal',$tahun)->whereIn('tipe',['Pengeluaran','Utang'])->get()->sum('saldo');

        $data['charts_kas_masuk'] = [];
        $data['charts_kas_keluar'] = [];
        $bulan = range(1,12);
        foreach ($bulan as $key => $value) {
            $cekSaldoMasuk = CatatanKeuangan::whereYear('tanggal',$tahun)->whereMonth('tanggal',$value)->whereIn('tipe',['Piutang','Pemasukan'])->get()->sum('saldo');
            $cekSaldoKeluar = CatatanKeuangan::whereYear('tanggal',$tahun)->whereMonth('tanggal',$value)->whereIn('tipe',['Pengeluaran','Utang'])->get()->sum('saldo');
            array_push($data['charts_kas_masuk'], $cekSaldoMasuk);
            array_push($data['charts_kas_keluar'], $cekSaldoKeluar);
        }

        $data['tahun'] = $tahun;

		return view('dashboard',$data);
    }
}
