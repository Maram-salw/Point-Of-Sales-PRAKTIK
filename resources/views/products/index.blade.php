@extends('products.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
    <h2>Halaman Product</h2>
    <a href="siswas">Siswa</a>
    <a href="products">Produk</a>
    <a href="rombels">Rombel</a>
    <a href="rayons">Rayon</a>

</div>
    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
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
    <th>Nama</th>
    <th>Detail</th>
    <th width="280px">Action</th>
</tr>
@foreach ($products as $product)
<tr>
        <td>{{ ++$i }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->detail }}</td>
    <td>
        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
            <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin, ingin menghapus {{$product->name}}?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
{!! $products->links() !!}
@endsection
