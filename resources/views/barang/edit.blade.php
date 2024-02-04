@extends('layouts.admin')

@section('judul', 'Edit barang')

@section('content')
<h2>Edit Data Profile Barang {{$barang->id}} </h2>

<form action="/barang/{{$barang->id}}" method="POST">
            @csrf
           @method('PUT')
    <div class="p-3">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Kategori</label><br>
                    <select id="kategori" required class="form-control" name="kategori">
                        <option selected>Pilih Kategori</option>
                       @foreach($kategori as $kategori) 
                       <option value='{{ $kategori->id }}'>{{ $kategori->nama_kategori }} </option> 
                       @endforeach
                    </select>
                </div>
            </div>

           <div class="col">
                <div class="form-group ">
                    <label>Harga Barang</label>
                    <input type="number" name='harga' class="form-control" value="{{$barang->harga_brg}}" id="nama" placeholder="Masukan Harga Barang">
                    @error('harga')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
             <div class="col">
                <div class="form-group ">
                    <label>Nama barang </label>
                    <input type="text" name='nama' class="form-control" value="{{$barang->nama_brg}}" id="nama" placeholder="Masukan Nama barang">
                    @error('nama')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
          
            <div class="col">
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" name='deskripsi' value="{{$barang->deskripsi_brg}}" id="nama" placeholder="Masukan Deskripsi"></textarea>
                    @error('deskripsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col">
                <div class="form-group ">
                    <label>Stock Barang</label>
                    <input type="number" name='stock' class="form-control" value="{{$barang->stock_brg}}" id="nama" placeholder="Masukan Stock Barang">
                    @error('stock')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="filename" required class="form-control" >
                </div>
            </div>
        </div>
    </div>


    <div class="p-3">
        <a href="/barang" class="btn btn-success">Kembali</a>
        <button type="submit" class="btn btn-primary ">Submit</button>
    </div>
</form>
@endsection
