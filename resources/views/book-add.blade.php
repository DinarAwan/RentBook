@extends('layout/aplikasi')

@section('konten')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<section class="content">
    <div class="content-wrapper">

        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0"> Add New Book</h1>
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

                    <form action="book-add" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="code" class="form-label">Code</label>
                            <input type="text" name="book_code" id="code" class="form-control" placeholder="Book's Code" value="{{ old('book_code') }}">
                        </div>

                        <div class="mb-3">
                          <label for="title" class="form-label">Title</label>
                          <input type="text" name="title" id="title" class="form-control" placeholder="Book's Title" value="{{ old('title') }}">
                        </div>

                        <div class="mb-3">
                          <label for="image" class="form-label">Image</label>
                          <input type="file" name="image" class="form-control">
                        </div>

                        <div>
                          <label for="category" class="form-label">Category</label>
                          <select name="categories[]" id="category" class="form-control select-multiple" placeholder="category">
                              @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                              @endforeach
                        </select>
                        </div>

                        <div class="mt-3">
                          
                            <a href="/books" class="btn btn-secondary" ><< Back</a>
                          
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.select-multiple').select2();
});
</script>
@endsection