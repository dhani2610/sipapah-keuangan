<?php

namespace App\Http\Controllers;

use App\Models\CatatanKeuangan;
use Illuminate\Http\Request;

class CatatanKeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_title'] = 'Catatan Keuangan';
        $data['keuangan'] = CatatanKeuangan::orderBy('tanggal','desc')->get();
		return view('catatan-keuangan.index',$data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = new CatatanKeuangan();
            $data->keterangan = $request->keterangan;
            $data->saldo = $request->saldo;
            $data->tanggal = $request->tanggal;
            $data->jenis = $request->jenis;
            $data->tipe = $request->tipe;
             $data->save();
 
             return redirect()->back()->with('success','Data has been created');
         } catch (\Throwable $th) {
             return redirect()->back()->with('failed','Data Failed created');
         }
    }
    /**
     * Display the specified resource.
     */
    public function show(CatatanKeuangan $catatanKeuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CatatanKeuangan $catatanKeuangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = CatatanKeuangan::find($id);
            $data->keterangan = $request->keterangan;
            $data->saldo = $request->saldo;
            $data->tanggal = $request->tanggal;
            $data->jenis = $request->jenis;
            $data->tipe = $request->tipe;
             $data->save();
 
             return redirect()->back()->with('success','Data has been edited');
         } catch (\Throwable $th) {
             return redirect()->back()->with('failed','Data Failed edited');
         }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = CatatanKeuangan::find($id);
            $data->delete();
 
             return redirect()->back()->with('success','Data has been deleted');
         } catch (\Throwable $th) {
             return redirect()->back()->with('failed','Data Failed deleted');
         }
    }
}
