@extends('layout/aplikasi')


@section('konten')

<section class="content">
    <div class="content-wrapper">

        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Delete Category list</h1>
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
                <a href="/categories" class="btn btn-secondary" ><< Back</a>
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
                          <th>Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          @foreach ($deletedCategories as $item)  
                          <td>{{$loop->iteration}}</td>
                          <td>{{$item->name}}</td>
                          <td>
                            <a href="category-restore/{{$item->slug}}" class="btn btn-success">restore</a>
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