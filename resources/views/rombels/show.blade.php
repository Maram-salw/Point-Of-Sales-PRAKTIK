@extends('rombels.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
    <h2> Show Rombel</h2>
</div>
<div class="pull-right">
        <a class="btn btn-primary" href="{{ route('rombels.index') }}"> Back</a>
    </div>
    </div>
</div>
<div class="row">
<div class="col-xs-10 col-sm-10 col-md-10">
    <div class="form-group">
        <strong>Nama Rombel:</strong>
        {{ $rombel->nama_rombel}}
    </div>
    </div>
</div>
@endsection
