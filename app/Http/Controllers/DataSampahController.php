<?php

namespace App\Http\Controllers;

use App\Models\DataSampah;
use Illuminate\Http\Request;

class DataSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_title'] = 'Data Sampah';
        $data['DataSampahOrganik'] = DataSampah::where('tipe','Organik')->sum('jumlah_kg');
        $data['DataSampahAnorganik'] = DataSampah::where('tipe','Anorganik')->sum('jumlah_kg');
        $data['DataSampahResidu'] = DataSampah::where('tipe','Residu')->sum('jumlah_kg');
        $data['DataSampah'] = DataSampah::orderBy('id','desc')->get();
		return view('data_sampah.index',$data);
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
            $data = new DataSampah();
            $data->tipe = $request->tipe;
            $data->tanggal = $request->tanggal;
            $data->jumlah_kg = $request->jumlah_kg;
            $data->deskripsi = $request->deskripsi;
            if ($request->hasFile('foto')) {
                 $image = $request->file('foto');
                 $name = time() . '.' . $image->getClientOriginalExtension();
                 $destinationPath = public_path('assets/img/foto_sampah/');
                 $image->move($destinationPath, $name);
                 $data->foto = $name;
             }
             $data->save();
 
             return redirect()->back()->with('success','Data has been created');
         } catch (\Throwable $th) {
             return redirect()->back()->with('failed','Data Failed created');
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(DataSampah $dataSampah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataSampah $dataSampah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = DataSampah::find($id);
            $data->tipe = $request->tipe;
            $data->tanggal = $request->tanggal;
            $data->jumlah_kg = $request->jumlah_kg;
            $data->deskripsi = $request->deskripsi;
            if ($request->hasFile('foto')) {
                 $image = $request->file('foto');
                 $name = time() . '.' . $image->getClientOriginalExtension();
                 $destinationPath = public_path('assets/img/foto_sampah/');
                 $image->move($destinationPath, $name);
                 $data->foto = $name;
             }
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
            $data = DataSampah::find($id);
            $data->delete();
 
             return redirect()->back()->with('success','Data has been deleted');
         } catch (\Throwable $th) {
             return redirect()->back()->with('failed','Data Failed deleted');
         }
    }
}
