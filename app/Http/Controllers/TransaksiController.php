<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::latest()->paginate(5);
        return view('transaksis.index',compact('transaksis'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $barang = Barang::all();
        return view('transaksis.create',compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_barang' => 'required',
        //     'harga_barang' => 'required',
        //     'total_barang' => 'required',
        //     'total_harga' => 'required',
        //     'total_bayar' => 'required',
        //     'kembalian' => 'required',
        //     'tanggal_beli' => 'required',
        //     ]);

            Transaksi::create([
            'nama_barang' => $request->nama_barang ,
            'harga_barang' => $request->harga_barang,
            'total_barang' => $request->total_barang,
            'total_harga' =>   $request->total_barang * $request->harga_barang,
            'total_bayar' => $request->total_bayar,
            'kembalian' => $request->total_bayar - $request->total_barang * $request->harga_barang,
            'tanggal_beli' => Carbon::now(),
            ]);

            // Barang::create([
            //     'nama_barang' => $request->nama_barang ,
            //     'stok' => 'stok' - $request->total_barang,
            // ]);

            return redirect()->route('transaksis.index')
            ->with('success','Transaksi created successfully.');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksis.show',compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $barang = Barang::all();
        return view('transaksis.edit',compact('transaksi','barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        // $request->validate([
        //     'nama_barang' => 'required',
        //     'harga_barang' => 'required',
        //     'total_barang' => 'required',
        //     'total_harga' => 'required',
        //     'total_bayar' => 'required',
        //     'kembalian' => 'required',
        //     'tanggal_beli' => 'required',
        //     ]);
            $transaksi->update([
                'nama_barang' => $request->nama_barang ,
                'harga_barang' => $request->harga_barang,
                'total_barang' => $request->total_barang,
                'total_harga' =>   $request->total_barang * $request->harga_barang,
                'total_bayar' => $request->total_bayar,
                'kembalian' => $request->total_bayar - $request->total_barang * $request->harga_barang,
                'tanggal_beli' => Carbon::now(),
            ]);
            return redirect()->route('transaksis.index')
            ->with('success','Transaksi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksis.index')
        ->with('success','Transaksi deleted successfully');
}

    }
