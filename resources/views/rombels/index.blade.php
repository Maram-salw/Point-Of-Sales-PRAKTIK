@extends('rombels.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
    <h2>Data Rombel</h2>
    <a href="products">Produk</a>
    <a href="siswas">Siswa</a>
    <a href="rombels">Rombel</a>
    <a href="rayons">Rayon</a>

</div>
<div class="pull-right">
        <a class="btn btn-success" href="{{ route('rombels.create') }}"> Create New Rombel</a>
    </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Nama Rombel</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($rombels as $rombel)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $rombel->nama_rombel}}</td>
        <td>
            <form action="{{ route('rombels.destroy',$rombel->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('rombels.show',$rombel->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('rombels.edit',$rombel->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin, ingin menghapus {{$rombel->nama_rombel}}?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{!! $rombels->links() !!}
@endsection
