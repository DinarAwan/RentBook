@extends('layout/aplikasi')

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

<h2> Are you sure for delete book {{$book->title}}</h2>
<div class="mt-3">
    <a href="/book-destroy/{{$book->slug}}" class="btn btn-danger me-5">Sure</a>
    <a href="/books" class="btn btn-info">Cancel</a>
</div>

@endsection