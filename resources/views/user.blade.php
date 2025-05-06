@extends('layout/aplikasi')
@section('title', 'Users')
@section('konten')



<section class="content">
    <div class="content-wrapper">

        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Users List</h1>
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
                <a href="#" class="btn btn-secondary" >View Banes User</a>
                <a href="#" class="btn btn-primary">New Registered User</a>
              </div>

                  <div class="my-3">
                    <table class="table">
                      <thead>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Action</th>
                      </thead>
                    <tbody>
                      @foreach ($users as $item)
                      <tr>
                        <td>{{ $loop->iteration}} </td>
                        <td>{{ $item->username }}</td>
                        <td>
                          @if ($item->phone)
                              {{$item->phone}}
                              @else
                              -
                          @endif
                        </td>
                        <td>
                          <a href="#" class="btn btn-success">Detail</a>
                          <a href="#" class="btn btn-danger">Baned</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  </div>



                </div>
            </div>
        </div>
    </div>
</section>

@endsection

