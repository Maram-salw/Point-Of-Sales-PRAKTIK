@extends('transaksis.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
    <h2>Add New Transaksi</h2>
</div>
<div class="pull-right">
        <a class="btn btn-primary" href="{{ route('transaksis.index') }}"> Back</a>
    </div>
    </div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('transaksis.store') }}" method="POST">
@csrf
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <select class="form-control" name="nama_barang">
                    <option value="">--Pilih Barang--</option>
                    @foreach ($barang as $data)
                    <option value="{{$data->nama_barang}}">{{ $data->nama_barang }}</option>
                    @endforeach
                </select>          
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga:</strong>
                <select class="form-control" name="harga_barang">
                    <option value="">--Pilih harga--</option>
                    @foreach ($barang as $data)
                    <option value="{{$data->harga_barang}}">{{ $data->harga_barang }}</option>
                    @endforeach
                </select>            
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Barang:</strong>
                <input type="number" min='0' name="total_barang" value="{{ $data->total_barang }}" class="form-control" placeholder="Total Barang">
            </div>
        </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Harga:</strong>
                <input type="integer" name="total_harga" class="form-control" placeholder="total_harga">
            </div>
        </div> -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Bayar:</strong>
                <input type="number" min='0' name="total_bayar" value="{{ $data->total_bayar }}" class="form-control" placeholder="Total Bayar">
            </div>
        </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kembalian</strong>
                <input type="integer" name="kembalian" class="form-control" placeholder="kembalian">
            </div>
        </div> -->
        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Beli:</strong>
                <input type="date" name="tanggal_beli" class="form-control" placeholder="Tanggal Beli">
            </div>
        </div> -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection