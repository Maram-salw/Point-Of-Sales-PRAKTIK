<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\Distributor;
use App\Models\Barang;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::latest()->paginate(5);
        return view('barangs.index',compact('barangs'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merk = Merk::all();
        $distributor = Distributor::all();
        return view('barangs.create',compact('merk','distributor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->validate([
            //'nama_barang' => 'required',
            //'nama_merk' => 'required',
            //'nama_distributor' => 'required',
            //'harga_barang' => 'required',
            //'harga_beli' => 'required',
            //'stok' => 'required',
            //'tgl_masuk' => 'required',
            //'nama_petugas' => 'required',
            //]);
            Barang::create([
            'nama_barang' => $request->nama_barang,
            'nama_merk' => $request->nama_merk,
            'nama_distributor' => $request->nama_distributor,
            'harga_barang' => $request->harga_barang,
            'harga_beli' => $request->harga_beli,
            'stok' => $request->stok,
            'tgl_masuk' => Carbon::now(),
            'nama_petugas' => $request->nama_petugas,
            ]);
            return redirect()->route('barangs.index')
            ->with('success','Barang created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        return view('barangs.show',compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        $merk = Merk::all();
        $distributor = Distributor::all();
        return view('barangs.edit',compact('barang','merk','distributor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            // 'nama_barang' => 'required',
            // 'nama_merk' => 'required',
            // 'nama_distributor' => 'required',
            // 'harga_barang' => 'required',
            // 'harga_beli' => 'required',
            // 'stok' => 'required',
            // 'tgl_masuk' => 'required',
            // 'nama_petugas' => 'required',
            ]);
            $barang->update([
                'nama_barang' => $request->nama_barang,
                'nama_merk' => $request->nama_merk,
                'nama_distributor' => $request->nama_distributor,
                'harga_barang' => $request->harga_barang,
                'harga_beli' => $request->harga_beli,
                'stok' => $request->stok,
                'tgl_masuk' => Carbon::now(),
                'nama_petugas' => $request->nama_petugas,
            ]);
            return redirect()->route('barangs.index')
            ->with('success','Barang updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barangs.index')
        ->with('success','Barang deleted successfully');
    }
}
