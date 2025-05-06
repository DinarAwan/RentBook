@extends('layout/layout')

@section('konten')

<section class="content">
    <div class="content-wrapper">

        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0"></h1>
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

            <form action="" method="get">
            <div class="row">
              <div class="col-12 col-sm-6">
                <select name="category" id="category" class="form-control">
                  <option value="">Select Category</option>
                  @foreach ($categories as $item)
                      <option value="{{ $item->id }}">{{$item->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12 col-sm-6">
                <div class="input-group mb-3">
                  <input type="text" name="title" class="form-control" placeholder="Search books" >
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
            <div class="my-5">
                <div class="row">

                    @foreach ($books as $item)
                    <div class="col-3 col-md-4 col-sm-6 mb-3" style="width: 13rem;">
                        <div class="h-100">
                            <img src="{{ $item->cover !=null ? asset('storage/cover/'.$item->cover) : asset('images/a4858ba1c4ae4beef4a0466f5298b1fa.jpg') }}" class="card-img-top" draggable="false" style="width: 150px ">
                            <div class="card-body">
                              <b><h5 class="card-title fw-bold mt-2">{{ $item->title }}</h5></b>
                              <p class="card-text">
                                @foreach ($item->categories as $category)
                                {{ $category->name }} <br>
                                @endforeach
                              </p>
                              <a href="#" class="card-text mb-3 {{ $item->status == 'in stock' ? 'btn btn-success': 'btn btn-danger' }} ">{{ $item->status }}</a>
                            </div>
                        </div>
                    </div>    
                    @endforeach

                  
                    
                </div>
            </div>

          </div>
      </div>
    </div>
</section>

@endsection