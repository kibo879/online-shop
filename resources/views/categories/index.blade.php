@extends('backend.layout')

@section('content')
        <div class="row" mt-2>
            <div class="col-sm-12 col-md-8">
        <h2>List Categories </h2>
            </div>
            <div class="col-sm col-md-4">
                <a href="{{route('categories.create')}}"class="btn btn-outline-warning float-end">Add product</a>
            </div>

            <table class="table">
                <thead class="bg-success text-white">
                  <tr>
                    <th class="col-sm-10 col-md-5" scope="col">nama</th>
                    <th class="col-sm-10 col-md-5" scope="col">gambar</th>
                    <th scope="col" class="col-sm-8 col-md-4">Action</th>
              </tr>
            </thead>
            <tbody>


                @foreach ($categories as $categories)
                <tr>

                  <th scope="row">{{$categories->nama}}</th>
                  <td>
                      <img src="{{ asset('uploads/' . $categories->gambar) }}" alt="" class="img-thumbnail" width=100px>
                  </td>

                  <td>
                    <form action="{{ route ('categories.delete', ['id' => $categories->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"class="btn btn-danger">Hapus</button>
                    <a href="{{ route('categories.edit', ['id' => $categories ->id]) }}" class="btn btn-warning mt-2">Edit</a>
                    </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
