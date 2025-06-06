@extends('layout/aplikasi')


@section('konten')

<section class="content">
    <div class="content-wrapper">

        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Delete Book list</h1>
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
                <a href="/books" class="btn btn-secondary" ><< Back</a>
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
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          @foreach ($deletedBooks as $item)  
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->book_code}}</td>
                          <td>{{$item->title}}</td>
                          <td>
                            <a href="book-restore/{{$item->slug}}" class="btn btn-success">restore</a>
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