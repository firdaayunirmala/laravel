@extends('layouts.admin')

@section('judul')
  Detail Data Kategori
@endsection

@section('content')

<div class="p-3">
<div class="card" style="width: 24rem;" >
  <div class="card-body ">
    <h5 class="card-title">Detail Data Kategori ke {{$kategori->id}}</h5>
   <h2>{{$kategori->nama_kategori}}</h2>
  </div>
</div>

<a href="/kategori" class="btn btn-primary my-3">Kembali</a>
</div>

@endsection
