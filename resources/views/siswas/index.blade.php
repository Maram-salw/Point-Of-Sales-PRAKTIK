@extends('siswas.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
    <h2>Data Siswa</h2>
    <a href="products">Produk</a>
    <a href="siswas">Siswa</a>
    <a href="rombels">Rombel</a>
    <a href="rayons">Rayon</a>

</div>
<div class="pull-right">
        <a class="btn btn-success" href="{{ route('siswas.create') }}"> Create New Siswa</a>
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
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Rombel</th>
        <th>Rayon</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($siswas as $siswa)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $siswa->nis }}</td>
        <td>{{ $siswa->nama }}</td>
        <td>{{ $siswa->rombel }}</td>
        <td>{{ $siswa->rayon }}</td>
        <td>
            <form action="{{ route('siswas.destroy',$siswa->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('siswas.show',$siswa->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('siswas.edit',$siswa->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin, ingin menghapus {{$siswa->nis}}-{{$siswa->nama}}?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{!! $siswas->links() !!}
@endsection
