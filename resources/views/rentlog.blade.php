@extends('layout/aplikasi')
@section('title', 'Rent Logs')
@section('konten')

<section class="content">
    <div class="content-wrapper">

        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Rent Log list</h1>
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
              <div class="mt-5">
                
                <x-rent-log-table :rentlog='$rent_logs' />
              
              </div>
            </div>
        </div>
    </div>
</section>

@endsection