@extends('backend.layout')

@section('content')

<form method="POST" action="{{ route('categories.store')}}" class="mt-3" enctype="multipart/form-data">
    @csrf

    @if ($errors->any())
        <div class="alert alert-warning text-primary">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-6">
            <div calss="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
        </div>
        <div class="col-lg-6">
            <div calss="mb-3">
                <label for="gambar" class="form-label">File Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
        </div>

            <div class="col-lg-12">
                <button type="sumbit" class="btn btn-primary">Submit</button>
            </div>
    </div>

</form>

@endsection
