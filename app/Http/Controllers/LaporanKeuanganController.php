<?php

namespace App\Http\Controllers;

use App\Exports\LaporanKeuangan;
use App\Models\CatatanKeuangan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanKeuanganController extends Controller
{
    public function index(Request $request)
    {
        $data['page_title'] = 'Laporan Keuangan';
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $tipe = $request->tipe;
        if ($start_date != null && $end_date != null) {
            $data['keuangan'] = CatatanKeuangan::where('tipe',$tipe)->whereBetween('tanggal',[$start_date,$end_date])->orderBy('tanggal','desc')->get();
        }else{
            $data['keuangan'] = CatatanKeuangan::orderBy('tanggal','desc')->get();
        }
		return view('catatan-keuangan.laporan',$data);
    }
    public function downloadExcel(Request $request)
    {
        $data['page_title'] = 'Laporan Keuangan';
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $tipe = $request->tipe;
        if ($start_date != null && $end_date != null) {
            $data['keuangan'] = CatatanKeuangan::where('tipe',$tipe)->whereBetween('tanggal',[$start_date,$end_date])->orderBy('tanggal','desc')->get();
        }else{
            $data['keuangan'] = CatatanKeuangan::orderBy('tanggal','desc')->get();
        }

        $nama_file = 'Laporan Keuangan '.$start_date.'-'.$end_date.'.xlsx';
        return Excel::download(new LaporanKeuangan($data), $nama_file);
    }

    public function cetak(Request $request)
    {
        $data['page_title'] = 'Laporan Keuangan';
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $tipe = $request->tipe;
        if ($start_date != null && $end_date != null) {
            $data['keuangan'] = CatatanKeuangan::where('tipe',$tipe)->whereBetween('tanggal',[$start_date,$end_date])->orderBy('tanggal','desc')->get();
        }else{
            $data['keuangan'] = CatatanKeuangan::orderBy('tanggal','desc')->get();
        }
		return view('catatan-keuangan.pdf',$data);
    }
}
