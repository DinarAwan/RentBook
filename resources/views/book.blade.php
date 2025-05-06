@extends('layout/aplikasi')
@section('title', 'Books')
@section('konten')

<section class="content">
    <div class="content-wrapper">

        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Book</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  
                </ol>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid">
          <div class="row">

            <div class="my-3">
              <a href="book-deleted" class="btn btn-secondary" >View Data Delete</a>
              <a href="book-add" class="btn btn-primary">Add Data</a>
            </div>

                    <div class="mt25">
                      @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    </div>

                <div class="my-3">
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Title</th>
                        <th>category</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        @foreach ($books as $item)       
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->book_code }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                          @foreach ($item->categories as $category)
                              {{ $category->name }} <br>
                          @endforeach
                        </td>
                        <td>{{ $item->status }}</td>
                        <td>
                          <a href="/book-edit/{{$item->slug}}" class="btn btn-success">Edit</a>
                          <a href="book-delete/{{$item->slug}}" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
          </div>
      </div>
    </div>
</section>

@endsection