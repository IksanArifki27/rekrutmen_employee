@extends('layouts.admin')

@section('content')
       
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">Halaman Data</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Dashboard v2</li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
{{-- content main --}}
<div class="container">
        <h2 class=" text-center mb-4 mt-3 fw-bold ">Daftar Data Pegawai</h2>
        {{-- <a href="/tambahData" class="btn btn-success mb-3">Tambah </a> --}}
        <div class="row g-3 align-item-center mb-3">
            <div class="col-auto">
                <form action="/pegawai"  method="GET">
                <input type="search" name="search" class="form-control" placeholder="cari data..">
                </form>
            </div>
            <a href="/cetakPDF" class="btn btn-danger">Cetak Data</a>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{$message}}
            </div>
        @endif
        <table class="table table-striped table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>jenis Kelamin</th>
                    <th>No Telpon</th>
                    <th>Kota</th>
                    <th>Masuk</th>
                    <th>CV</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; ?>
                @foreach ($data as $index => $dat)
                <tr>
                    <td>{{$index + $data->firstItem()}} </td>
                    <td>
                        <img src="{{asset('fotoPegawai/'. $dat->foto) }}" alt="" width="40px;">
                    </td>
                    <td>{{$dat->nama}} </td>
                    <td>{{$dat->jenis_kelamin}} </td>
                    <td>0{{$dat->noHp}} </td>
                    <td>{{$dat->kota}} </td>
                    <td>{{$dat->created_at}} </td>
                    <td>{{$dat->cv}} </td>
                    <td>
                        <a class="btn btn-warning" href="/tampildata/{{$dat->id}}">Update</a>
                        {{-- <a class="btn btn-danger" onclick="alert('Apakah anda yakin untuk Mengelurkan {{$dat->nama}}! ')" href="/hapusdata/{{$dat->id}}">Keluar</a> --}}
                        <a href="#" class="btn btn-danger delete" data-id="{{$dat->id}}" data-nama="{{$dat->nama}} " >Hapus</a>
                    </td>
                </tr>
                 @endforeach
            </tbody>
        </table>
        {{$data->links() }}
    </div>
</div>


 
@endsection