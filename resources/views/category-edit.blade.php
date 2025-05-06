@extends('layout/aplikasi')

@section('konten')

<section class="content">
    <div class="content-wrapper">

        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0"> Edit Category</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  
                </ol>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid">
            <div class=" mt-5 w-50">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                    <form action="/category-edit/{{$category->slug}}" method="post">
                        @csrf
                        @method('put')
                        <div>
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$category->name}}" placeholder="Add New Category">
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-success" type="submit">Update</button>
                        </div>
                    </form>

            </div>


        </div>
    </div>
</section>

@endsection