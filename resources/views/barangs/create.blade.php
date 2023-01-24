@extends('barangs.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
    <h2>Add New Barang</h2>
</div>
    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('barangs.index') }}"> Back</a>
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
<form action="{{ route('barangs.store') }}" method="POST">
@csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Barang:</strong>
                <input type="string" name="nama_barang" class="form-control" placeholder="Nama Barang">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Merk:</strong>
                <select class="form-control" name="nama_merk">
                    <option value="">--Pilih Merk--</option>
                    @foreach ($merk as $data)
                    <option value="{{$data->nama_merk}}">{{ $data->nama_merk }}</option>
                    @endforeach
                </select>          
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Distributor:</strong>
                <select class="form-control" name="nama_distributor">
                    <option value="">--Pilih Distributor--</option>
                    @foreach ($distributor as $data)
                    <option value="{{$data->nama_distributor}}">{{ $data->nama_distributor }}</option>
                    @endforeach
                </select>            
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Barang:</strong>
                <input type="number" min='0' name="harga_barang" class="form-control" placeholder="Harga Barang">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Harga Beli:</strong>
                <input type="number" min='0' name="harga_beli" class="form-control" placeholder="Harga Beli">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stok:</strong>
                <input type="number" min='0' name="stok" class="form-control" placeholder="Stok">
            </div>
        </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tgl Masuk:</strong>
                <input type="date" name="tgl_masuk" class="form-control" placeholder="Tgl Masuk">
            </div>
        </div> -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Petugas:</strong>
                <input type="string" name="nama_petugas" class="form-control" placeholder="Nama Petugas">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
