@extends('merks.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2> Show Merk</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('merks.index') }}"> Back</a>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Merk:</strong>
{{ $merk->nama_merk }}
</div>
</div>
</div>
@endsection
