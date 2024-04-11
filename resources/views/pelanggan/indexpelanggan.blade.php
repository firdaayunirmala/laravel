@extends('layouts.admin')

@section('judul')
Data Profile Pelanggan
@endsection
<!-- Page Heading -->

@section('tabel')

<div class="p-3">
{{-- Kelola Profile Pelanggan --}}
    <a href="/tambahpelanggan" class="btn btn-primary my-3">Tambah Data Profile Pelanggan</a> 
    {{-- Kelola user / Pengguna Pelanggan --}}
    {{-- <a href="/userpelanggan" class="btn btn-warning my-3">Data User</a>  --}}

    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">No Hp</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($profile as $key => $value)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td>{{$value->nama_lengkap}}</td>
                <td>{{ $value->no_hp}}</td>
                <td>{{ $value->alamat}}</td>
                <td class="mr-3">
                    <a href="/pelanggan/{{$value->id}}" class="btn btn-info" >Show </a> 
                    <a href="/pelanggan/{{$value->id}}/edit" class="btn btn-success">Edit</a>
                    <a href="/pelanggan/ {{$value->id }}" class="btn btn-danger" data-confirm-delete="true">Delete</a>
                </td>
</div>
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
