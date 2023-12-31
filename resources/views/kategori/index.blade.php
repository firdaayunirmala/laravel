@extends('layouts.admin')

@section('judul')
Data Kategori
@endsection
<!-- Page Heading -->
@section('tabel')
<div class="p-3">
    {{-- Kelola Kategori --}}
    <a href="/kategori/create" class="btn btn-primary my-3">Tambah Kategori</a>
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategori as $key => $value)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$value->nama_kategori}}</td>
                <td class="mr-3">
                    <a href="/kategori/{{$value->id}}" class="btn btn-info">Detail </a>
                    <a href="/kategori/{{$value->id}}/edit" class="btn btn-success">Edit</a>
                    <a href="/kategori/ {{$value->id }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                </td>/div>
            </tr>
            {{--tidak ada data  --}}
        </tbody>
        @empty
        <tr colspan="6">
            <td>No data</td>
        </tr>
        @endforelse
    </table>
</div>
@endsection


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css" />
