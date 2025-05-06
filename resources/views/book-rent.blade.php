@extends('layout/aplikasi')
@section('title', 'Peminjaman')

@section('konten')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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


            <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">
                <h1 class="mb-5">Book Rent Form</h1>

                <div class="mt-5">
                  @if (session('message'))
                    <div class="alert {{session('alert-class')}}">
                        {{ session('message') }}
                    </div>
                @endif
                </div>

                <form action="book-rent" method="post">
                  @csrf
                    <div class="mb-3">
                        <label for="user" class="form-label">User</label>
                        <select name="user_id" id="user" class="form-control userbox">
                            <option value="">Selec User</option>
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="book" class="form-label">Book</label>
                        <select name="book_id" id="book" class="form-control select" >
                            <option value="">Selec Book</option>
                            @foreach ($books as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>

                      
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </div>
                </form>

                
            </div>

          </div>
      </div>
    </div>
</section>

{{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.userbox').select2();
});
</script> --}}


<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

<script>
  
$(document).ready(function() {
    $('.select').select2();
});
</script>
@endsection

