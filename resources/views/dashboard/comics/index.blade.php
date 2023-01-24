@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Comics</h1>
  </div>
  
  @if (session()->has('success'))
      <div class="alert alert-success col-lg-10" role="alert">
        {{ session('success') }}
      </div>
  @endif

  <div class="table-responsive col-lg-10">
    <a href="/dashboard/comics/create" class="btn btn-primary mb-3">Create Comic!</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($comics as $comic)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $comic->title }}</td>
          <td>{{ $comic->category->name }}</td>
          <td>
            <a href="/dashboard/comics/{{ $comic->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/comics/{{ $comic->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/comics/{{ $comic->slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus?')"><span data-feather="trash-2"></span></button>
            </form> 
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection