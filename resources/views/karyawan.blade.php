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
        <h2 class=" text-center mb-4 mt-3 fw-bold ">Data Pegawai</h2>
        <div class="row g-3 align-item-center mb-3">
            <div class="col-auto">
                <form action="/karyawan"  method="GET">
                <input type="search" name="search" class="form-control" placeholder="cari data..">
                </form>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{$message}}
            </div>
        @endif
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>jenis Kelamin</th>
                    <th>No Telpon</th>
                    <th>Kota</th>
                    <th>Masuk</th>
                    <th>Sertif</th>
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
                    <td>{{$dat->sertif}} </td>
                    <td>
                        <a class="btn btn-warning" href="/tampildata/{{$dat->id}}">Update</a>
                        {{-- <a class="btn btn-danger" href="/hapusdata/{{$dat->id}} ">Keluar</a> --}}
                    </td>
                </tr>
                 @endforeach
            </tbody>
        </table>
        {{$data->links() }}
    </div>

</div>










 
@endsection